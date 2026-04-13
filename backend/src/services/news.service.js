const newsRepo = require('../repositories/news.repository');

// ============================================================
// Service: business logic untuk News
// Tidak tahu soal HTTP — terima data, return hasil, atau throw.
// ============================================================

async function list({ search, status, orderBy, order, page = 1, perPage = 12 }) {
  const offset = (page - 1) * perPage;
  const [total, rows] = await Promise.all([
    newsRepo.count({ search, status }),
    newsRepo.findAll({ search, status, orderBy, order, limit: perPage, offset }),
  ]);

  return {
    data: rows,
    pagination: {
      page,
      perPage,
      total,
      totalPages: Math.ceil(total / perPage),
    },
  };
}

async function getById(id) {
  const news = await newsRepo.findById(id);
  if (!news) {
    throw Object.assign(new Error('Berita tidak ditemukan'), { status: 404 });
  }
  const tags = await newsRepo.findTagsByNewsId(id);
  return { ...news, tags };
}

async function create(data) {
  const id = await newsRepo.create(data);
  if (data.tags) {
    await newsRepo.replaceTags(id, data.tags);
  }
  return id;
}

async function update(id, data) {
  const existing = await newsRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Berita tidak ditemukan'), { status: 404 });
  }
  await newsRepo.update(id, data);
  if (data.tags !== undefined) {
    await newsRepo.replaceTags(id, data.tags || []);
  }
}

async function updateImage(id, filename) {
  const existing = await newsRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Berita tidak ditemukan'), { status: 404 });
  }
  await newsRepo.updateImage(id, filename);
  return existing.newsmainimage; // return old filename for cleanup
}

async function remove(id) {
  const existing = await newsRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Berita tidak ditemukan'), { status: 404 });
  }
  await newsRepo.remove(id);
  return existing.newsmainimage; // return old filename for cleanup
}

// --- Public ---

async function publicList({ page = 1, perPage = 12 }) {
  const offset = (page - 1) * perPage;
  const [total, rows] = await Promise.all([
    newsRepo.count({ status: 'Active', search: '' }),
    newsRepo.findAll({ status: 'Active', orderBy: 'newsdate', order: 'DESC', limit: perPage, offset }),
  ]);

  return {
    data: rows,
    pagination: { page, perPage, total, totalPages: Math.ceil(total / perPage) },
  };
}

async function publicDetail(id) {
  const news = await newsRepo.findById(id);
  if (!news || news.newsstatus === 'Hidden') {
    throw Object.assign(new Error('Berita tidak ditemukan'), { status: 404 });
  }

  const [tags, recent, allTags] = await Promise.all([
    newsRepo.findTagsByNewsId(id),
    newsRepo.findRecent(id, 5),
    newsRepo.findAllTags(),
  ]);

  return { detail: news, tags, recent, allTags };
}

module.exports = {
  list,
  getById,
  create,
  update,
  updateImage,
  remove,
  publicList,
  publicDetail,
};

const pageRepo = require('../repositories/page.repository');

// ============================================================
// Service: business logic untuk Static Pages
// ============================================================

async function listTree() {
  const all = await pageRepo.findAll();
  return buildTree(all, 0);
}

function buildTree(items, parentId) {
  return items
    .filter((item) => item.fh_strukturparent === parentId)
    .map((item) => ({
      ...item,
      children: buildTree(items, item.fh_strukturid),
    }));
}

async function getById(id) {
  const page = await pageRepo.findById(id);
  if (!page) {
    throw Object.assign(new Error('Halaman tidak ditemukan'), { status: 404 });
  }
  const tags = await pageRepo.findTagsByPageId(id);
  return { ...page, tags };
}

async function create(data) {
  const id = await pageRepo.create(data);
  if (data.tags) {
    await pageRepo.replaceTags(id, data.tags);
  }
  return id;
}

async function update(id, data) {
  const existing = await pageRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Halaman tidak ditemukan'), { status: 404 });
  }
  await pageRepo.update(id, data);
  if (data.tags !== undefined) {
    await pageRepo.replaceTags(id, data.tags || []);
  }
}

async function updateBanner(id, filename) {
  const existing = await pageRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Halaman tidak ditemukan'), { status: 404 });
  }
  await pageRepo.updateBanner(id, filename);
  return existing.fh_content_banner;
}

async function remove(id) {
  const existing = await pageRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Halaman tidak ditemukan'), { status: 404 });
  }
  await pageRepo.remove(id);
  return existing.fh_content_banner;
}

async function reorder(id, direction) {
  const current = await pageRepo.findById(id);
  if (!current) {
    throw Object.assign(new Error('Halaman tidak ditemukan'), { status: 404 });
  }

  const target = await pageRepo.findSwapTarget(
    current.fh_strukturparent,
    current.fh_strukturprioritas,
    direction,
  );
  if (!target) {
    throw Object.assign(new Error('Tidak bisa digeser lagi'), { status: 400 });
  }

  await pageRepo.swapPriority(
    current.fh_strukturid, current.fh_strukturprioritas,
    target.fh_strukturid, target.fh_strukturprioritas,
  );
}

// --- Public ---

async function publicDetail(id) {
  const page = await pageRepo.findById(id);
  if (!page || page.fh_strukturstatus === 'Hidden') {
    throw Object.assign(new Error('Halaman tidak ditemukan'), { status: 404 });
  }
  const tags = await pageRepo.findTagsByPageId(id);
  return { detail: page, tags };
}

module.exports = {
  listTree,
  getById,
  create,
  update,
  updateBanner,
  remove,
  reorder,
  publicDetail,
};

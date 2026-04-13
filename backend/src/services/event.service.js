const eventRepo = require('../repositories/event.repository');

// ============================================================
// Service: business logic untuk Events
// ============================================================

async function list({ search, status, orderBy, order, page = 1, perPage = 12 }) {
  const offset = (page - 1) * perPage;
  const [total, rows] = await Promise.all([
    eventRepo.count({ search, status }),
    eventRepo.findAll({ search, status, orderBy, order, limit: perPage, offset }),
  ]);

  return {
    data: rows,
    pagination: { page, perPage, total, totalPages: Math.ceil(total / perPage) },
  };
}

async function getById(id) {
  const event = await eventRepo.findById(id);
  if (!event) {
    throw Object.assign(new Error('Event tidak ditemukan'), { status: 404 });
  }
  const tags = await eventRepo.findTagsByEventId(id);
  return { ...event, tags };
}

async function create(data) {
  const id = await eventRepo.create(data);
  if (data.tags) {
    await eventRepo.replaceTags(id, data.tags);
  }
  return id;
}

async function update(id, data) {
  const existing = await eventRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Event tidak ditemukan'), { status: 404 });
  }
  await eventRepo.update(id, data);
  if (data.tags !== undefined) {
    await eventRepo.replaceTags(id, data.tags || []);
  }
}

async function updateImage(id, filename) {
  const existing = await eventRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Event tidak ditemukan'), { status: 404 });
  }
  await eventRepo.updateImage(id, filename);
  return existing.eventmainimage;
}

async function remove(id) {
  const existing = await eventRepo.findById(id);
  if (!existing) {
    throw Object.assign(new Error('Event tidak ditemukan'), { status: 404 });
  }
  await eventRepo.remove(id);
  return existing.eventmainimage;
}

// --- Public ---

async function publicList({ page = 1, perPage = 12 }) {
  const offset = (page - 1) * perPage;
  const [total, rows] = await Promise.all([
    eventRepo.count({ status: 'Active', search: '' }),
    eventRepo.findAll({ status: 'Active', orderBy: 'eventdate', order: 'DESC', limit: perPage, offset }),
  ]);

  return {
    data: rows,
    pagination: { page, perPage, total, totalPages: Math.ceil(total / perPage) },
  };
}

async function publicDetail(id) {
  const event = await eventRepo.findById(id);
  if (!event || event.eventstatus === 'Hidden') {
    throw Object.assign(new Error('Event tidak ditemukan'), { status: 404 });
  }

  const [tags, recent, allTags] = await Promise.all([
    eventRepo.findTagsByEventId(id),
    eventRepo.findRecent(id, 5),
    eventRepo.findAllTags(),
  ]);

  return { detail: event, tags, recent, allTags };
}

async function publicListByTag(tagId, { page = 1, perPage = 12 }) {
  const tag = await eventRepo.findTagById(tagId);
  if (!tag) {
    throw Object.assign(new Error('Tag tidak ditemukan'), { status: 404 });
  }

  const offset = (page - 1) * perPage;
  const [total, rows] = await Promise.all([
    eventRepo.countByTag(tag.kataterkait),
    eventRepo.findByTag(tag.kataterkait, { limit: perPage, offset }),
  ]);

  return {
    tag: { id: tag.kataterkaitid, name: tag.kataterkait },
    data: rows,
    pagination: { page, perPage, total, totalPages: Math.ceil(total / perPage) },
  };
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
  publicListByTag,
};

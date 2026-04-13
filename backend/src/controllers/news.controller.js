const newsService = require('../services/news.service');

// ============================================================
// Controller: News (Admin CRUD)
// ============================================================

async function list(req, res, next) {
  try {
    const { search, status, orderBy, order, page, perPage } = req.query;
    const result = await newsService.list({
      search,
      status,
      orderBy,
      order,
      page: parseInt(page) || 1,
      perPage: parseInt(perPage) || 12,
    });
    return res.json({ success: true, ...result });
  } catch (err) {
    next(err);
  }
}

async function getById(req, res, next) {
  try {
    const data = await newsService.getById(parseInt(req.params.id));
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

async function create(req, res, next) {
  try {
    const id = await newsService.create(req.body);
    return res.status(201).json({ success: true, message: 'Berita berhasil ditambahkan', data: { id } });
  } catch (err) {
    next(err);
  }
}

async function update(req, res, next) {
  try {
    await newsService.update(parseInt(req.params.id), req.body);
    return res.json({ success: true, message: 'Berita berhasil diupdate' });
  } catch (err) {
    next(err);
  }
}

async function remove(req, res, next) {
  try {
    await newsService.remove(parseInt(req.params.id));
    return res.json({ success: true, message: 'Berita berhasil dihapus' });
  } catch (err) {
    next(err);
  }
}

module.exports = { list, getById, create, update, remove };

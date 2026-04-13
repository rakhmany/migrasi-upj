const pageService = require('../services/page.service');

// ============================================================
// Controller: Static Pages (Admin CRUD)
// ============================================================

async function listTree(req, res, next) {
  try {
    const tree = await pageService.listTree();
    return res.json({ success: true, data: tree });
  } catch (err) {
    next(err);
  }
}

async function getById(req, res, next) {
  try {
    const data = await pageService.getById(parseInt(req.params.id));
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

async function create(req, res, next) {
  try {
    const id = await pageService.create(req.body);
    return res.status(201).json({ success: true, message: 'Halaman berhasil ditambahkan', data: { id } });
  } catch (err) {
    next(err);
  }
}

async function update(req, res, next) {
  try {
    await pageService.update(parseInt(req.params.id), req.body);
    return res.json({ success: true, message: 'Halaman berhasil diupdate' });
  } catch (err) {
    next(err);
  }
}

async function remove(req, res, next) {
  try {
    await pageService.remove(parseInt(req.params.id));
    return res.json({ success: true, message: 'Halaman berhasil dihapus' });
  } catch (err) {
    next(err);
  }
}

async function reorder(req, res, next) {
  try {
    const { direction } = req.body; // 'up' or 'down'
    await pageService.reorder(parseInt(req.params.id), direction);
    return res.json({ success: true, message: 'Urutan berhasil diubah' });
  } catch (err) {
    next(err);
  }
}

module.exports = { listTree, getById, create, update, remove, reorder };

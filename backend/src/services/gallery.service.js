const repo = require('../repositories/gallery.repository');

async function getCategories() {
  return repo.getCategories();
}

async function getCategoryById(id) {
  const cat = await repo.getCategoryById(id);
  if (!cat) {
    const err = new Error('Category not found');
    err.status = 404;
    throw err;
  }
  return cat;
}

async function getItemsByCategory(categoryId, opts) {
  return repo.getItemsByCategory(categoryId, opts);
}

module.exports = {
  getCategories,
  getCategoryById,
  getItemsByCategory,
};

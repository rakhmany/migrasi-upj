const pool = require('../config/database');

/**
 * Get active gallery categories
 */
async function getCategories() {
  const [rows] = await pool.query(
    `SELECT categoryid, categoryparentid, categoryname, categoryname_en,
            categoryprioritas
     FROM gallery3_category
     WHERE categorystatus = 'Active'
     ORDER BY categoryprioritas ASC`
  );
  return rows;
}

/**
 * Get a single category by id
 */
async function getCategoryById(categoryId) {
  const [rows] = await pool.query(
    `SELECT categoryid, categoryname, categoryname_en
     FROM gallery3_category
     WHERE categoryid = ? AND categorystatus = 'Active'`,
    [categoryId]
  );
  return rows[0] || null;
}

/**
 * Get gallery items by category with pagination
 */
async function getItemsByCategory(categoryId, { page = 1, perPage = 12 } = {}) {
  const offset = (page - 1) * perPage;

  const [[{ total }]] = await pool.query(
    `SELECT COUNT(*) AS total FROM gallery3
     WHERE categoryid = ? AND gallerystatus = 'Show'`,
    [categoryId]
  );

  const [rows] = await pool.query(
    `SELECT galleryid, categoryid, galleryname, galleryname_en,
            galleryfilename, gallerydescription, gallerydescription_en,
            gallerypriority
     FROM gallery3
     WHERE categoryid = ? AND gallerystatus = 'Show'
     ORDER BY gallerypriority ASC
     LIMIT ? OFFSET ?`,
    [categoryId, perPage, offset]
  );

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

module.exports = {
  getCategories,
  getCategoryById,
  getItemsByCategory,
};

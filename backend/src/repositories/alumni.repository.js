const db = require('../config/database');

async function count() {
  const [rows] = await db.query('SELECT COUNT(*) AS total FROM d_alumnihall');
  return rows[0].total;
}

async function findAll({ limit = 8, offset = 0 }) {
  const [rows] = await db.query(
    `SELECT content_id, content_title_id, content_title_en,
            content_short_id, content_short_en, mainimagename, list_priority
       FROM d_alumnihall
      ORDER BY list_priority ASC
      LIMIT ? OFFSET ?`,
    [limit, offset],
  );
  return rows;
}

async function findById(id) {
  const [rows] = await db.query('SELECT * FROM d_alumnihall WHERE content_id = ?', [id]);
  return rows[0] || null;
}

module.exports = { count, findAll, findById };

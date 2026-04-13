const db = require('../config/database');

// ============================================================
// Tabel: latest_news1, latest_news1_kataterkait
// Referensi: legacy-php/fhadmin/module/latest_news1/latest_news1.php
//            legacy-php/news.php, legacy-php/news-detail.php
// ============================================================

// ---------- Admin: List (paginated + search + filter) ----------

async function count({ search = '', status = '' }) {
  let sql = `SELECT COUNT(*) AS total FROM latest_news1 WHERE 1=1`;
  const params = [];

  if (search) {
    sql += ` AND (newstitle LIKE ? OR newsshortdesc LIKE ? OR newstitle_en LIKE ? OR newsshortdesc_en LIKE ?)`;
    const like = `%${search}%`;
    params.push(like, like, like, like);
  }
  if (status) {
    sql += ` AND newsstatus = ?`;
    params.push(status);
  }

  const [rows] = await db.query(sql, params);
  return rows[0].total;
}

async function findAll({ search = '', status = '', orderBy = 'newsdate', order = 'DESC', limit = 12, offset = 0 }) {
  const allowedOrder = ['newsid', 'newsdate', 'newstitle', 'newsstatus'];
  const col = allowedOrder.includes(orderBy) ? orderBy : 'newsdate';
  const dir = order.toUpperCase() === 'ASC' ? 'ASC' : 'DESC';

  let sql = `
    SELECT P.*, GROUP_CONCAT(C.kataterkait SEPARATOR ', ') AS tags
      FROM latest_news1 P
      LEFT JOIN latest_news1_kataterkait C ON P.newsid = C.newsid
     WHERE 1=1`;
  const params = [];

  if (search) {
    sql += ` AND (P.newstitle LIKE ? OR P.newsshortdesc LIKE ? OR P.newstitle_en LIKE ? OR P.newsshortdesc_en LIKE ?)`;
    const like = `%${search}%`;
    params.push(like, like, like, like);
  }
  if (status) {
    sql += ` AND P.newsstatus = ?`;
    params.push(status);
  }

  sql += ` GROUP BY P.newsid ORDER BY P.${col} ${dir} LIMIT ? OFFSET ?`;
  params.push(limit, offset);

  const [rows] = await db.query(sql, params);
  return rows;
}

// ---------- Admin: Detail ----------

async function findById(id) {
  const [rows] = await db.query('SELECT * FROM latest_news1 WHERE newsid = ?', [id]);
  return rows[0] || null;
}

async function findTagsByNewsId(newsId) {
  const [rows] = await db.query(
    'SELECT * FROM latest_news1_kataterkait WHERE newsid = ? ORDER BY kataterkait ASC',
    [newsId],
  );
  return rows;
}

// ---------- Admin: Create ----------

async function create(data) {
  const sql = `
    INSERT INTO latest_news1
      (metatag, metakeyword, metadescription, newsdate, newstitle, newsshortdesc,
       newsdescription, newstitle_en, newsshortdesc_en, newsdescription_en, newsstatus)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

  const [result] = await db.query(sql, [
    data.metatag || '', data.metakeyword || '', data.metadescription || '',
    data.newsdate, data.newstitle || '', data.newsshortdesc || '',
    data.newsdescription || '', data.newstitle_en || '', data.newsshortdesc_en || '',
    data.newsdescription_en || '', data.newsstatus || 'Hidden',
  ]);
  return result.insertId;
}

// ---------- Admin: Update ----------

async function update(id, data) {
  const sql = `
    UPDATE latest_news1 SET
      newsdate = ?, metatag = ?, metakeyword = ?, metadescription = ?,
      newstitle = ?, newsshortdesc = ?, newsdescription = ?,
      newstitle_en = ?, newsshortdesc_en = ?, newsdescription_en = ?,
      newsstatus = ?
    WHERE newsid = ?`;

  await db.query(sql, [
    data.newsdate, data.metatag || '', data.metakeyword || '', data.metadescription || '',
    data.newstitle || '', data.newsshortdesc || '', data.newsdescription || '',
    data.newstitle_en || '', data.newsshortdesc_en || '', data.newsdescription_en || '',
    data.newsstatus || 'Hidden', id,
  ]);
}

async function updateImage(id, filename) {
  await db.query('UPDATE latest_news1 SET newsmainimage = ? WHERE newsid = ?', [filename, id]);
}

// ---------- Admin: Delete ----------

async function remove(id) {
  await db.query('DELETE FROM latest_news1_kataterkait WHERE newsid = ?', [id]);
  await db.query('DELETE FROM latest_news1 WHERE newsid = ?', [id]);
}

// ---------- Tags (keyword terkait) ----------

async function replaceTags(newsId, tags) {
  await db.query('DELETE FROM latest_news1_kataterkait WHERE newsid = ?', [newsId]);
  if (tags && tags.length) {
    const values = tags.map((t) => [newsId, t]);
    await db.query('INSERT INTO latest_news1_kataterkait (newsid, kataterkait) VALUES ?', [values]);
  }
}

// ---------- Public: List all tags (for sidebar/filter) ----------

async function findAllTags() {
  const [rows] = await db.query(
    `SELECT kataterkait, MIN(kataterkaitid) AS kataterkaitid
       FROM latest_news1_kataterkait
      WHERE kataterkait != ''
      GROUP BY kataterkait
      ORDER BY kataterkait ASC`,
  );
  return rows;
}

// ---------- Public: Recent news (sidebar, excluding current) ----------

async function findRecent(excludeId, limit = 5) {
  const [rows] = await db.query(
    `SELECT newsid, newstitle, newstitle_en, newsshortdesc, newsshortdesc_en, newsmainimage, newsdate
       FROM latest_news1
      WHERE newsid != ? AND newsstatus != 'Hidden'
      ORDER BY newsdate DESC, newsid DESC
      LIMIT ?`,
    [excludeId, limit],
  );
  return rows;
}

module.exports = {
  count,
  findAll,
  findById,
  findTagsByNewsId,
  create,
  update,
  updateImage,
  remove,
  replaceTags,
  findAllTags,
  findRecent,
};

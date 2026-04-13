const db = require('../config/database');

// ============================================================
// Tabel: latest_event1, latest_event1_kataterkait
// Referensi: legacy-php/fhadmin/module/latest_event1/latest_event1.php
//            legacy-php/events.php, legacy-php/upcoming-event-detail.php
// ============================================================

async function count({ search = '', status = '' }) {
  let sql = `SELECT COUNT(*) AS total FROM latest_event1 WHERE 1=1`;
  const params = [];

  if (search) {
    sql += ` AND (eventtitle LIKE ? OR eventshortdesc LIKE ? OR eventtitle_en LIKE ? OR eventshortdesc_en LIKE ?)`;
    const like = `%${search}%`;
    params.push(like, like, like, like);
  }
  if (status) {
    sql += ` AND eventstatus = ?`;
    params.push(status);
  }

  const [rows] = await db.query(sql, params);
  return rows[0].total;
}

async function findAll({ search = '', status = '', orderBy = 'eventdate', order = 'DESC', limit = 12, offset = 0 }) {
  const allowedOrder = ['eventid', 'eventdate', 'eventtitle', 'eventstatus'];
  const col = allowedOrder.includes(orderBy) ? orderBy : 'eventdate';
  const dir = order.toUpperCase() === 'ASC' ? 'ASC' : 'DESC';

  let sql = `
    SELECT P.*, GROUP_CONCAT(C.kataterkait SEPARATOR ', ') AS tags
      FROM latest_event1 P
      LEFT JOIN latest_event1_kataterkait C ON P.eventid = C.eventid
     WHERE 1=1`;
  const params = [];

  if (search) {
    sql += ` AND (P.eventtitle LIKE ? OR P.eventshortdesc LIKE ? OR P.eventtitle_en LIKE ? OR P.eventshortdesc_en LIKE ?)`;
    const like = `%${search}%`;
    params.push(like, like, like, like);
  }
  if (status) {
    sql += ` AND P.eventstatus = ?`;
    params.push(status);
  }

  sql += ` GROUP BY P.eventid ORDER BY P.${col} ${dir} LIMIT ? OFFSET ?`;
  params.push(limit, offset);

  const [rows] = await db.query(sql, params);
  return rows;
}

async function findById(id) {
  const [rows] = await db.query('SELECT * FROM latest_event1 WHERE eventid = ?', [id]);
  return rows[0] || null;
}

async function findTagsByEventId(eventId) {
  const [rows] = await db.query(
    'SELECT * FROM latest_event1_kataterkait WHERE eventid = ? ORDER BY kataterkait ASC',
    [eventId],
  );
  return rows;
}

async function create(data) {
  const sql = `
    INSERT INTO latest_event1
      (metatag, metakeyword, metadescription, eventdate, eventtitle, eventshortdesc,
       eventdescription, eventtitle_en, eventshortdesc_en, eventdescription_en, eventstatus)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

  const [result] = await db.query(sql, [
    data.metatag, data.metakeyword, data.metadescription,
    data.eventdate, data.eventtitle, data.eventshortdesc,
    data.eventdescription, data.eventtitle_en, data.eventshortdesc_en,
    data.eventdescription_en, data.eventstatus,
  ]);
  return result.insertId;
}

async function update(id, data) {
  const sql = `
    UPDATE latest_event1 SET
      eventdate = ?, metatag = ?, metakeyword = ?, metadescription = ?,
      eventtitle = ?, eventshortdesc = ?, eventdescription = ?,
      eventtitle_en = ?, eventshortdesc_en = ?, eventdescription_en = ?,
      eventstatus = ?
    WHERE eventid = ?`;

  await db.query(sql, [
    data.eventdate, data.metatag, data.metakeyword, data.metadescription,
    data.eventtitle, data.eventshortdesc, data.eventdescription,
    data.eventtitle_en, data.eventshortdesc_en, data.eventdescription_en,
    data.eventstatus, id,
  ]);
}

async function updateImage(id, filename) {
  await db.query('UPDATE latest_event1 SET eventmainimage = ? WHERE eventid = ?', [filename, id]);
}

async function remove(id) {
  await db.query('DELETE FROM latest_event1_kataterkait WHERE eventid = ?', [id]);
  await db.query('DELETE FROM latest_event1 WHERE eventid = ?', [id]);
}

async function replaceTags(eventId, tags) {
  await db.query('DELETE FROM latest_event1_kataterkait WHERE eventid = ?', [eventId]);
  if (tags && tags.length) {
    const values = tags.map((t) => [eventId, t]);
    await db.query('INSERT INTO latest_event1_kataterkait (eventid, kataterkait) VALUES ?', [values]);
  }
}

async function findAllTags() {
  const [rows] = await db.query(
    `SELECT kataterkait, MIN(kataterkaitid) AS kataterkaitid
       FROM latest_event1_kataterkait
      WHERE kataterkait != ''
      GROUP BY kataterkait
      ORDER BY kataterkait ASC`,
  );
  return rows;
}

async function findRecent(excludeId, limit = 5) {
  const [rows] = await db.query(
    `SELECT eventid, eventtitle, eventtitle_en, eventshortdesc, eventshortdesc_en, eventmainimage, eventdate
       FROM latest_event1
      WHERE eventid != ? AND eventstatus != 'Hidden'
      ORDER BY eventdate DESC, eventid DESC
      LIMIT ?`,
    [excludeId, limit],
  );
  return rows;
}

async function findTagById(tagId) {
  const [rows] = await db.query(
    'SELECT * FROM latest_event1_kataterkait WHERE kataterkaitid = ? LIMIT 1',
    [tagId],
  );
  return rows[0] || null;
}

async function countByTag(tagName) {
  const [rows] = await db.query(
    `SELECT COUNT(DISTINCT e.eventid) AS total
       FROM latest_event1 e
       LEFT JOIN latest_event1_kataterkait k ON k.eventid = e.eventid
      WHERE e.eventstatus != 'Hidden' AND k.kataterkait = ?`,
    [tagName],
  );
  return rows[0].total;
}

async function findByTag(tagName, { limit = 12, offset = 0 }) {
  const [rows] = await db.query(
    `SELECT DISTINCT e.*
       FROM latest_event1 e
       LEFT JOIN latest_event1_kataterkait k ON k.eventid = e.eventid
      WHERE e.eventstatus != 'Hidden' AND k.kataterkait = ?
      ORDER BY e.eventdate DESC, e.eventid DESC
      LIMIT ? OFFSET ?`,
    [tagName, limit, offset],
  );
  return rows;
}

module.exports = {
  count,
  findAll,
  findById,
  findTagsByEventId,
  create,
  update,
  updateImage,
  remove,
  replaceTags,
  findAllTags,
  findRecent,
  findTagById,
  countByTag,
  findByTag,
};

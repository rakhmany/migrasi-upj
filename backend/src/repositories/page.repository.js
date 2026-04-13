const db = require('../config/database');

// ============================================================
// Tabel: fh_pagestatis, fh_pagestatis_kataterkait
// Referensi: legacy-php/fhadmin/module/usermanagement/pagestatis.php
//            legacy-php/fhadmin/include/class.pagestatis.php
//            legacy-php/static-page2.php
// ============================================================

// ---------- Admin: Tree listing (recursive) ----------

async function findByParent(parentId) {
  const [rows] = await db.query(
    'SELECT * FROM fh_pagestatis WHERE fh_strukturparent = ? ORDER BY fh_strukturprioritas ASC',
    [parentId],
  );
  return rows;
}

async function findAll() {
  const [rows] = await db.query(
    'SELECT * FROM fh_pagestatis ORDER BY fh_strukturprioritas ASC',
  );
  return rows;
}

async function findById(id) {
  const [rows] = await db.query('SELECT * FROM fh_pagestatis WHERE fh_strukturid = ?', [id]);
  return rows[0] || null;
}

async function findTagsByPageId(pageId) {
  const [rows] = await db.query(
    'SELECT * FROM fh_pagestatis_kataterkait WHERE fh_strukturid = ? ORDER BY kataterkait ASC',
    [pageId],
  );
  return rows;
}

// ---------- Admin: Create ----------

async function create(data) {
  const sql = `
    INSERT INTO fh_pagestatis
      (fh_strukturparent, fh_strukturparenttipe, fh_menu_name, fh_menu_name_en,
       fh_strukturstatus, fh_strukturtipe, fh_modulefilename,
       fh_menu_pageheader, fh_menu_pageheader_en,
       fh_menu_metakeyword, fh_menu_metadescription,
       fh_content_titlename, fh_content_description,
       fh_content_titlename_en, fh_content_description_en,
       fh_menu_catselected, fh_coloumn_count,
       fh_content_description2, fh_content_description2_en,
       fh_content_description3, fh_content_description3_en)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

  const [result] = await db.query(sql, [
    data.parentId || 0, data.parentType || 'Content',
    data.name, data.nameEn,
    data.status || '', data.type || 'Content', data.moduleFilename || '',
    data.pageHeader || '', data.pageHeaderEn || '',
    data.metaKeyword || '', data.metaDescription || '',
    data.contentTitle || '', data.contentDescription || '',
    data.contentTitleEn || '', data.contentDescriptionEn || '',
    data.catSelected || '', data.columnCount || 1,
    data.description2 || '', data.description2En || '',
    data.description3 || '', data.description3En || '',
  ]);

  const newId = result.insertId;
  // Legacy: set priority = own ID
  await db.query('UPDATE fh_pagestatis SET fh_strukturprioritas = ? WHERE fh_strukturid = ?', [newId, newId]);
  return newId;
}

// ---------- Admin: Update ----------

async function update(id, data) {
  const sql = `
    UPDATE fh_pagestatis SET
      fh_strukturparent = ?, fh_strukturparenttipe = ?,
      fh_menu_name = ?, fh_menu_name_en = ?,
      fh_strukturstatus = ?, fh_strukturtipe = ?, fh_modulefilename = ?,
      fh_menu_pageheader = ?, fh_menu_pageheader_en = ?,
      fh_menu_metakeyword = ?, fh_menu_metadescription = ?,
      fh_content_titlename = ?, fh_content_description = ?,
      fh_content_titlename_en = ?, fh_content_description_en = ?,
      fh_menu_catselected = ?, fh_coloumn_count = ?,
      fh_content_description2 = ?, fh_content_description2_en = ?,
      fh_content_description3 = ?, fh_content_description3_en = ?
    WHERE fh_strukturid = ?`;

  await db.query(sql, [
    data.parentId, data.parentType,
    data.name, data.nameEn,
    data.status, data.type, data.moduleFilename || '',
    data.pageHeader || '', data.pageHeaderEn || '',
    data.metaKeyword || '', data.metaDescription || '',
    data.contentTitle || '', data.contentDescription || '',
    data.contentTitleEn || '', data.contentDescriptionEn || '',
    data.catSelected || '', data.columnCount || 1,
    data.description2 || '', data.description2En || '',
    data.description3 || '', data.description3En || '',
    id,
  ]);
}

async function updateBanner(id, filename) {
  await db.query('UPDATE fh_pagestatis SET fh_content_banner = ? WHERE fh_strukturid = ?', [filename, id]);
}

// ---------- Admin: Delete ----------

async function remove(id) {
  await db.query('DELETE FROM fh_pagestatis_kataterkait WHERE fh_strukturid = ?', [id]);
  await db.query('DELETE FROM fh_pagestatis WHERE fh_strukturid = ?', [id]);
}

// ---------- Tags ----------

async function replaceTags(pageId, tags) {
  await db.query('DELETE FROM fh_pagestatis_kataterkait WHERE fh_strukturid = ?', [pageId]);
  if (tags && tags.length) {
    const values = tags.map((t) => [pageId, t]);
    await db.query('INSERT INTO fh_pagestatis_kataterkait (fh_strukturid, kataterkait) VALUES ?', [values]);
  }
}

// ---------- Admin: Reorder (swap priorities) ----------

async function findSwapTarget(parentId, currentPriority, direction) {
  const op = direction === 'up' ? '<' : '>';
  const sort = direction === 'up' ? 'DESC' : 'ASC';

  const [rows] = await db.query(
    `SELECT * FROM fh_pagestatis
      WHERE fh_strukturparent = ? AND fh_strukturprioritas ${op} ?
      ORDER BY fh_strukturprioritas ${sort}
      LIMIT 1`,
    [parentId, currentPriority],
  );
  return rows[0] || null;
}

async function swapPriority(idA, priorityA, idB, priorityB) {
  await db.query('UPDATE fh_pagestatis SET fh_strukturprioritas = ? WHERE fh_strukturid = ?', [priorityB, idA]);
  await db.query('UPDATE fh_pagestatis SET fh_strukturprioritas = ? WHERE fh_strukturid = ?', [priorityA, idB]);
}

module.exports = {
  findByParent,
  findAll,
  findById,
  findTagsByPageId,
  create,
  update,
  updateBanner,
  remove,
  replaceTags,
  findSwapTarget,
  swapPriority,
};

const pool = require('../config/database');

// ============================================================
// Repository: Navigation (fh_struktur_menu, job_vacancy1, gallery3_category)
// ============================================================

/** Top-level menu items (fh_strukturparent = 0) */
async function getTopMenuItems() {
  const [rows] = await pool.query(
    `SELECT fh_strukturid, fh_menu_name, fh_menu_name_en,
            fh_strukturparenttipe, fh_strukturtipe,
            fh_modulefilename, fh_pagestatisid
     FROM fh_struktur_menu
     WHERE fh_strukturparent = 0
       AND fh_strukturstatus != 'Hidden'
     ORDER BY fh_strukturprioritas ASC`
  );
  return rows;
}

/** Sub-menu items under a given parent */
async function getSubMenuItems(parentId) {
  const [rows] = await pool.query(
    `SELECT fh_strukturid, fh_menu_name, fh_menu_name_en,
            fh_strukturparenttipe, fh_strukturtipe,
            fh_menu_sub_pos, fh_modulefilename, fh_pagestatisid
     FROM fh_struktur_menu
     WHERE fh_strukturparent = ?
       AND fh_strukturstatus != 'Hidden'
     ORDER BY fh_strukturprioritas ASC`,
    [parentId]
  );
  return rows;
}

/** Active job vacancies grouped by category */
async function getActiveVacancies() {
  const [rows] = await pool.query(
    `SELECT jobvacancyid, jobvacancytitle, jobvacancytitle_en, jobvacancycat
     FROM job_vacancy1
     WHERE jobvacancystatus != 'Hidden'
       AND jobvacancydatestart <= CURDATE()
       AND jobvacancydateend >= CURDATE()
     ORDER BY jobvacancyid ASC`
  );
  return rows;
}

/** Active facility categories */
async function getFacilityCategories() {
  const [rows] = await pool.query(
    `SELECT categoryid, categoryname, categoryname_en
     FROM gallery3_category
     WHERE categorystatus = 'Active'
     ORDER BY categoryprioritas ASC`
  );
  return rows;
}

module.exports = {
  getTopMenuItems,
  getSubMenuItems,
  getActiveVacancies,
  getFacilityCategories,
};

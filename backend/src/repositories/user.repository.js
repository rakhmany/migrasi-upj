const db = require('../config/database');

/**
 * Repository: akses langsung ke tabel fh_user.
 * Semua raw SQL ada di sini, tidak boleh bocor ke service/controller.
 */

async function findByUsername(username) {
  const [rows] = await db.query(
    'SELECT * FROM fh_user WHERE fh_username = ? LIMIT 1',
    [username],
  );
  return rows[0] || null;
}

async function findById(id) {
  const [rows] = await db.query(
    `SELECT u.*, g.fh_usergroupname
       FROM fh_user u
       LEFT JOIN fh_usergroup g ON g.fh_usergroupid = u.fh_usergroupid
      WHERE u.fh_userid = ?
      LIMIT 1`,
    [id],
  );
  return rows[0] || null;
}

async function updateLastLogin(userId) {
  await db.query(
    'UPDATE fh_user SET fh_logindate = NOW() WHERE fh_userid = ?',
    [userId],
  );
}

async function insertLog(userId, usergroupId, pageTitle, action, description) {
  await db.query(
    `INSERT INTO fh_userlog (fh_userid, fh_usergroupid, fh_pagetitle, fh_action, fh_description, fh_date)
     VALUES (?, ?, ?, ?, ?, NOW())`,
    [userId, usergroupId || 0, pageTitle, action, description],
  );
}

module.exports = {
  findByUsername,
  findById,
  updateLastLogin,
  insertLog,
};

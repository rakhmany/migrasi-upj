const pool = require('../config/database');

async function getLevels() {
  const [rows] = await pool.query(
    `SELECT content_id, content_name_id, content_name_en, list_priority
     FROM prodi_level
     ORDER BY list_priority ASC`
  );
  return rows;
}

async function getInterests() {
  const [rows] = await pool.query(
    `SELECT content_id, content_name_id, content_name_en, list_priority
     FROM prodi_interest
     ORDER BY list_priority ASC`
  );
  return rows;
}

async function getPrograms({ levels = [], interests = [], search = '' } = {}) {
  const params = [];
  let joins = '';
  let where = '';
  let joinNum = 1;

  // Each level filter adds a separate JOIN (AND logic)
  for (const levelId of levels) {
    const alias = `f${joinNum}`;
    joins += ` JOIN prodi_filter ${alias} ON p.content_id = ${alias}.prodi_id AND ${alias}.filter_type = 1 AND ${alias}.prodi_filter = ?`;
    params.push(levelId);
    joinNum++;
  }

  // Each interest filter adds a separate JOIN (AND logic)
  for (const interestId of interests) {
    const alias = `f${joinNum}`;
    joins += ` JOIN prodi_filter ${alias} ON p.content_id = ${alias}.prodi_id AND ${alias}.filter_type = 2 AND ${alias}.prodi_filter = ?`;
    params.push(interestId);
    joinNum++;
  }

  if (search) {
    where = ' WHERE (p.content_title_id LIKE ? OR p.content_title_en LIKE ?)';
    params.push(`%${search}%`, `%${search}%`);
  }

  const [rows] = await pool.query(
    `SELECT DISTINCT p.content_id, p.content_title_id, p.content_title_en,
            p.content_url, p.mainimagename, p.list_priority
     FROM d_programstudy p${joins}${where}
     ORDER BY p.list_priority ASC`,
    params
  );

  return rows;
}

module.exports = { getLevels, getInterests, getPrograms };

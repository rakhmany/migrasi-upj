const pool = require('../config/database');

async function getActiveVacancies({ page = 1, perPage = 8 } = {}) {
  const offset = (page - 1) * perPage;
  const today = new Date().toISOString().slice(0, 10);

  const [[{ total }]] = await pool.query(
    `SELECT COUNT(*) AS total FROM job_vacancy1
     WHERE jobvacancystatus != 'Hidden'
       AND jobvacancydatestart <= ?
       AND jobvacancydateend >= ?`,
    [today, today]
  );

  const [rows] = await pool.query(
    `SELECT jobvacancyid, jobvacancytitle, jobvacancytitle_en,
            jobvacancy_code, jobvacancy_salary, jobvacancy_workexp,
            jobvacancy_fullpart, created_at
     FROM job_vacancy1
     WHERE jobvacancystatus != 'Hidden'
       AND jobvacancydatestart <= ?
       AND jobvacancydateend >= ?
     ORDER BY created_at DESC, jobvacancyid DESC
     LIMIT ? OFFSET ?`,
    [today, today, perPage, offset]
  );

  return {
    data: rows,
    pagination: { page, perPage, total, totalPages: Math.ceil(total / perPage) },
  };
}

async function getVacancyById(id) {
  const [rows] = await pool.query(
    `SELECT jobvacancyid, jobvacancytitle, jobvacancytitle_en,
            jobvacancydescription, jobvacancydescription_en,
            jobvacancyqualification, jobvacancyqualification_en,
            jobvacancy_code, jobvacancy_salary, jobvacancy_workexp,
            jobvacancy_fullpart, jobvacancydatestart, jobvacancydateend,
            created_at
     FROM job_vacancy1
     WHERE jobvacancyid = ? AND jobvacancystatus != 'Hidden'`,
    [id]
  );
  return rows[0] || null;
}

module.exports = { getActiveVacancies, getVacancyById };

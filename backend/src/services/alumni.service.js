const alumniRepo = require('../repositories/alumni.repository');

async function getHallOfFame({ page = 1, perPage = 8 }) {
  const offset = (page - 1) * perPage;
  const [total, rows] = await Promise.all([
    alumniRepo.count(),
    alumniRepo.findAll({ limit: perPage, offset }),
  ]);

  return {
    data: rows,
    pagination: { page, perPage, total, totalPages: Math.ceil(total / perPage) },
  };
}

async function getAlumniDetail(id) {
  const alumni = await alumniRepo.findById(id);
  if (!alumni) {
    throw Object.assign(new Error('Alumni tidak ditemukan'), { status: 404 });
  }
  return alumni;
}

module.exports = { getHallOfFame, getAlumniDetail };

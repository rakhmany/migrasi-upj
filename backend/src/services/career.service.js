const repo = require('../repositories/career.repository');

async function getActiveVacancies(opts) {
  return repo.getActiveVacancies(opts);
}

async function getVacancyById(id) {
  const vacancy = await repo.getVacancyById(id);
  if (!vacancy) {
    const err = new Error('Vacancy not found');
    err.status = 404;
    throw err;
  }
  return vacancy;
}

module.exports = { getActiveVacancies, getVacancyById };

const repo = require('../repositories/prodi.repository');

async function getFilters() {
  const [levels, interests] = await Promise.all([
    repo.getLevels(),
    repo.getInterests(),
  ]);
  return { levels, interests };
}

async function getPrograms(opts) {
  return repo.getPrograms(opts);
}

module.exports = { getFilters, getPrograms };

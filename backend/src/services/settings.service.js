const repo = require('../repositories/settings.repository');

async function getSiteSettings() {
  return repo.getSiteSettings();
}

module.exports = { getSiteSettings };

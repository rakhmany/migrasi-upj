const repo = require('../repositories/homepage.repository');
const navigationService = require('./navigation.service');
const bannerRepo = require('../repositories/banner.repository');

// ============================================================
// Service: Homepage data aggregation
// ============================================================

/** Get all homepage data in a single call */
async function getHomepageData() {
  const [highlights, news, events, feeds, alumni, partners, navigation, banners] = await Promise.all([
    repo.getHighlights(4),
    repo.getLatestNews(4),
    repo.getLatestEvents(4),
    repo.getFeeds(),
    repo.getAlumniStories(),
    repo.getPartners(),
    navigationService.getNavigationTree(),
    bannerRepo.getBannerSlides(),
  ]);

  return { highlights, news, events, feeds, alumni, partners, navigation, banners };
}

/** Get only highlights */
async function getHighlights() {
  return repo.getHighlights(4);
}

/** Get feeds */
async function getFeeds() {
  return repo.getFeeds();
}

/** Get alumni stories */
async function getAlumniStories() {
  return repo.getAlumniStories();
}

/** Get partners by optional type */
async function getPartners(type) {
  return repo.getPartners(type);
}

module.exports = {
  getHomepageData,
  getHighlights,
  getFeeds,
  getAlumniStories,
  getPartners,
};

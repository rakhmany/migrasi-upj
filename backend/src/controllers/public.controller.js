const newsService = require('../services/news.service');
const eventService = require('../services/event.service');
const pageService = require('../services/page.service');
const homepageService = require('../services/homepage.service');
const settingsService = require('../services/settings.service');
const navigationService = require('../services/navigation.service');
const bannerRepo = require('../repositories/banner.repository');
const galleryService = require('../services/gallery.service');
const prodiService = require('../services/prodi.service');
const careerService = require('../services/career.service');
const alumniService = require('../services/alumni.service');

// ============================================================
// Controller: Public content endpoints (read-only)
// ============================================================

// --- News ---

async function newsList(req, res, next) {
  try {
    const result = await newsService.publicList({
      page: parseInt(req.query.page) || 1,
      perPage: parseInt(req.query.perPage) || 12,
    });
    return res.json({ success: true, ...result });
  } catch (err) {
    next(err);
  }
}

async function newsDetail(req, res, next) {
  try {
    const data = await newsService.publicDetail(parseInt(req.params.id));
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// --- Events ---

async function eventsList(req, res, next) {
  try {
    const result = await eventService.publicList({
      page: parseInt(req.query.page) || 1,
      perPage: parseInt(req.query.perPage) || 12,
    });
    return res.json({ success: true, ...result });
  } catch (err) {
    next(err);
  }
}

async function eventsDetail(req, res, next) {
  try {
    const data = await eventService.publicDetail(parseInt(req.params.id));
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

async function eventsTagList(req, res, next) {
  try {
    const tagId = parseInt(req.params.id);
    const page = parseInt(req.query.page) || 1;
    const perPage = parseInt(req.query.perPage) || 12;
    const result = await eventService.publicListByTag(tagId, { page, perPage });
    return res.json({ success: true, ...result });
  } catch (err) {
    next(err);
  }
}

// --- Static Pages ---

async function pageDetail(req, res, next) {
  try {
    const data = await pageService.publicDetail(parseInt(req.params.id));
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// --- Homepage (aggregated) ---

async function homepageData(req, res, next) {
  try {
    const data = await homepageService.getHomepageData();
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// --- Site Settings ---

async function siteSettings(req, res, next) {
  try {
    const data = await settingsService.getSiteSettings();
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// --- Navigation Menu ---

async function navigationMenu(req, res, next) {
  try {
    const data = await navigationService.getNavigationTree();
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// --- Banner Slides ---

async function bannerSlides(req, res, next) {
  try {
    const data = await bannerRepo.getBannerSlides();
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// --- Gallery (Facilities) ---

async function galleryCategories(req, res, next) {
  try {
    const data = await galleryService.getCategories();
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

async function galleryByCategory(req, res, next) {
  try {
    const categoryId = parseInt(req.params.categoryId);
    const page = parseInt(req.query.page) || 1;
    const perPage = parseInt(req.query.perPage) || 12;

    const [category, result] = await Promise.all([
      galleryService.getCategoryById(categoryId),
      galleryService.getItemsByCategory(categoryId, { page, perPage }),
    ]);

    return res.json({ success: true, category, ...result });
  } catch (err) {
    next(err);
  }
}

// Program Study (Prodi) with filters
async function prodiFilters(req, res, next) {
  try {
    const data = await prodiService.getFilters();
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

async function prodiList(req, res, next) {
  try {
    const { levels, interests, search } = req.query;
    const opts = {
      levels: levels ? levels.split(',').map(Number) : [],
      interests: interests ? interests.split(',').map(Number) : [],
      search: search || '',
    };
    const data = await prodiService.getPrograms(opts);
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// Career / Job Vacancies
async function careerList(req, res, next) {
  try {
    const page = parseInt(req.query.page) || 1;
    const perPage = parseInt(req.query.perPage) || 8;
    const result = await careerService.getActiveVacancies({ page, perPage });
    return res.json({ success: true, ...result });
  } catch (err) {
    next(err);
  }
}

async function careerDetail(req, res, next) {
  try {
    const id = parseInt(req.params.id);
    const data = await careerService.getVacancyById(id);
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

// Alumni Hall of Fame
async function alumniHallList(req, res, next) {
  try {
    const page = parseInt(req.query.page) || 1;
    const perPage = parseInt(req.query.perPage) || 8;
    const result = await alumniService.getHallOfFame({ page, perPage });
    return res.json({ success: true, ...result });
  } catch (err) {
    next(err);
  }
}

async function alumniDetail(req, res, next) {
  try {
    const id = parseInt(req.params.id);
    const data = await alumniService.getAlumniDetail(id);
    return res.json({ success: true, data });
  } catch (err) {
    next(err);
  }
}

module.exports = {
  newsList,
  newsDetail,
  eventsList,
  eventsDetail,
  pageDetail,
  homepageData,
  siteSettings,
  navigationMenu,
  bannerSlides,
  galleryCategories,
  galleryByCategory,
  prodiFilters,
  prodiList,
  careerList,
  careerDetail,
  eventsTagList,
  alumniHallList,
  alumniDetail,
};

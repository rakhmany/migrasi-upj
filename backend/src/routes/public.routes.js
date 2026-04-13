const { Router } = require('express');
const ctrl = require('../controllers/public.controller');

const router = Router();

// Homepage (aggregated data for front page)
router.get('/homepage', ctrl.homepageData);      // GET /api/public/homepage

// Site settings (company info, SEO, social links)
router.get('/settings', ctrl.siteSettings);      // GET /api/public/settings

// Navigation menu tree
router.get('/navigation', ctrl.navigationMenu);  // GET /api/public/navigation

// Banner slides (homepage slider images)
router.get('/banners', ctrl.bannerSlides);        // GET /api/public/banners

// News (publik, tanpa auth)
router.get('/news', ctrl.newsList);              // GET /api/public/news?page=1
router.get('/news/:id', ctrl.newsDetail);        // GET /api/public/news/:id

// Events (publik, tanpa auth)
router.get('/events', ctrl.eventsList);          // GET /api/public/events?page=1
router.get('/events/tag/:id', ctrl.eventsTagList); // GET /api/public/events/tag/:id?page=1
router.get('/events/:id', ctrl.eventsDetail);    // GET /api/public/events/:id

// Static Pages (publik, tanpa auth)
router.get('/pages/:id', ctrl.pageDetail);       // GET /api/public/pages/:id

// Gallery / Facilities
router.get('/gallery/categories', ctrl.galleryCategories);         // GET /api/public/gallery/categories
router.get('/gallery/category/:categoryId', ctrl.galleryByCategory); // GET /api/public/gallery/category/:categoryId?page=1

// Program Study (Prodi)
router.get('/prodi/filters', ctrl.prodiFilters);      // GET /api/public/prodi/filters
router.get('/prodi', ctrl.prodiList);                  // GET /api/public/prodi?levels=7,8&interests=1&search=teknik

// Career / Job Vacancies
router.get('/career', ctrl.careerList);                // GET /api/public/career?page=1
router.get('/career/:id', ctrl.careerDetail);          // GET /api/public/career/:id

// Alumni Hall of Fame
router.get('/alumni', ctrl.alumniHallList);             // GET /api/public/alumni?page=1
router.get('/alumni/:id', ctrl.alumniDetail);           // GET /api/public/alumni/:id

module.exports = router;

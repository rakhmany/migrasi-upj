const { Router } = require('express');

const router = Router();

// --- Auth ---
router.use('/auth', require('./auth.routes'));

// --- Admin (butuh JWT) ---
router.use('/admin/news', require('./admin-news.routes'));
router.use('/admin/events', require('./admin-events.routes'));
router.use('/admin/pages', require('./admin-pages.routes'));

// --- Public (tanpa auth) ---
router.use('/public', require('./public.routes'));

module.exports = router;

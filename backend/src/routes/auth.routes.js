const { Router } = require('express');
const authController = require('../controllers/auth.controller');
const { authenticate } = require('../middlewares/auth.middleware');
const { validate, loginRules } = require('../middlewares/validate.middleware');

const router = Router();

// POST /api/auth/login
router.post('/login', validate(loginRules), authController.login);

// GET  /api/auth/profile  (butuh token)
router.get('/profile', authenticate, authController.getProfile);

module.exports = router;

const { Router } = require('express');
const ctrl = require('../controllers/news.controller');
const { authenticate } = require('../middlewares/auth.middleware');

const router = Router();

// Semua route admin/news butuh JWT
router.use(authenticate);

router.get('/', ctrl.list);            // GET    /api/admin/news?search=&status=&page=1
router.get('/:id', ctrl.getById);      // GET    /api/admin/news/:id
router.post('/', ctrl.create);         // POST   /api/admin/news
router.put('/:id', ctrl.update);       // PUT    /api/admin/news/:id
router.delete('/:id', ctrl.remove);    // DELETE /api/admin/news/:id

module.exports = router;

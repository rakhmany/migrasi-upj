const { Router } = require('express');
const ctrl = require('../controllers/event.controller');
const { authenticate } = require('../middlewares/auth.middleware');

const router = Router();

router.use(authenticate);

router.get('/', ctrl.list);            // GET    /api/admin/events?search=&status=&page=1
router.get('/:id', ctrl.getById);      // GET    /api/admin/events/:id
router.post('/', ctrl.create);         // POST   /api/admin/events
router.put('/:id', ctrl.update);       // PUT    /api/admin/events/:id
router.delete('/:id', ctrl.remove);    // DELETE /api/admin/events/:id

module.exports = router;

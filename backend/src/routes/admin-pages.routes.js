const { Router } = require('express');
const ctrl = require('../controllers/page.controller');
const { authenticate } = require('../middlewares/auth.middleware');

const router = Router();

router.use(authenticate);

router.get('/', ctrl.listTree);                 // GET    /api/admin/pages       (tree)
router.get('/:id', ctrl.getById);               // GET    /api/admin/pages/:id
router.post('/', ctrl.create);                  // POST   /api/admin/pages
router.put('/:id', ctrl.update);                // PUT    /api/admin/pages/:id
router.delete('/:id', ctrl.remove);             // DELETE /api/admin/pages/:id
router.patch('/:id/reorder', ctrl.reorder);     // PATCH  /api/admin/pages/:id/reorder

module.exports = router;

const authService = require('../services/auth.service');

/**
 * Controller: handle HTTP request/response.
 * Tidak boleh ada SQL atau business logic di sini.
 */

async function login(req, res, next) {
  try {
    const { username, password } = req.body;
    const ip = req.ip;

    const result = await authService.login(username, password, ip);

    return res.json({
      success: true,
      message: 'Login berhasil',
      data: result,
    });
  } catch (err) {
    next(err);
  }
}

async function getProfile(req, res, next) {
  try {
    const profile = await authService.getProfile(req.user.userId);

    return res.json({
      success: true,
      data: profile,
    });
  } catch (err) {
    next(err);
  }
}

module.exports = { login, getProfile };

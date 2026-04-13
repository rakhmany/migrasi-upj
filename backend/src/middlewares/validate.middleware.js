const { body, validationResult } = require('express-validator');

/**
 * Wrapper: jalankan validasi, lalu cek hasilnya.
 * Jika ada error, langsung return 422.
 */
function validate(validations) {
  return async (req, res, next) => {
    for (const validation of validations) {
      await validation.run(req);
    }

    const errors = validationResult(req);
    if (errors.isEmpty()) return next();

    return res.status(422).json({
      success: false,
      message: 'Validasi gagal',
      errors: errors.array().map((e) => ({ field: e.path, message: e.msg })),
    });
  };
}

// -------- Validation rules --------

const loginRules = [
  body('username').trim().notEmpty().withMessage('Username wajib diisi'),
  body('password').notEmpty().withMessage('Password wajib diisi'),
];

module.exports = { validate, loginRules };

function errorHandler(err, _req, res, _next) {
  const status = err.status || 500;
  const message = err.message || 'Internal Server Error';

  if (process.env.NODE_ENV !== 'production') {
    console.error('[Error]', err);
  }

  return res.status(status).json({
    success: false,
    message,
  });
}

module.exports = errorHandler;

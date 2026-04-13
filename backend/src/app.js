const express = require('express');
const path = require('path');
const cors = require('cors');
const helmet = require('helmet');
const routes = require('./routes');
const errorHandler = require('./middlewares/error.middleware');

const app = express();

// --------------- Global Middleware ---------------
app.use(helmet({ crossOriginResourcePolicy: { policy: 'cross-origin' } }));
app.use(cors({
  origin: process.env.CORS_ORIGIN || 'http://localhost:3000',
  credentials: true,
}));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// --------------- Static: legacy upload files ---------------
const uploadDir = process.env.UPLOAD_DIR
  || path.resolve(__dirname, '../../legacy-php/upload');
app.use('/uploads', express.static(uploadDir, { maxAge: '7d' }));

// --------------- Static: banner slides (legacy video/*.webp) ---------------
const { LEGACY_VIDEO_DIR } = require('./repositories/banner.repository');
app.use('/banners', express.static(LEGACY_VIDEO_DIR, { maxAge: '7d' }));

// --------------- Routes ---------------
app.use('/api', routes);

// --------------- Health check ---------------
app.get('/health', (_req, res) => {
  res.json({ status: 'ok', timestamp: new Date().toISOString() });
});

// --------------- Error Handler (harus paling bawah) ---------------
app.use(errorHandler);

module.exports = app;

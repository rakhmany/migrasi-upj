const path = require('path');
const fs = require('fs/promises');

// ============================================================
// Repository: Banner slides (replaces PHP glob("./video/*.webp"))
// ============================================================

const LEGACY_VIDEO_DIR = process.env.BANNER_DIR
  || path.resolve(__dirname, '../../../legacy-php/video');

/**
 * Hardcoded link map — images with specific filenames link to external URLs.
 * Replicates the PHP conditional:
 *   if (basename($image) === '12 KELAS BLENDED KARYAWAN.webp') → link to jcal
 */
const LINK_MAP = {
  '12 KELAS BLENDED KARYAWAN.webp': 'https://jcal.upj.ac.id/static-page/595/program',
};

async function getBannerSlides() {
  try {
    const files = await fs.readdir(LEGACY_VIDEO_DIR);
    const webpFiles = files
      .filter((f) => f.toLowerCase().endsWith('.webp'))
      .sort(); // sorted alphabetically like glob

    return webpFiles.map((filename, idx) => ({
      id: idx + 1,
      filename,
      url: `/banners/${encodeURIComponent(filename)}`,
      link: LINK_MAP[filename] || null,
    }));
  } catch (err) {
    console.error('Failed to read banner directory:', err.message);
    return [];
  }
}

module.exports = { getBannerSlides, LEGACY_VIDEO_DIR };

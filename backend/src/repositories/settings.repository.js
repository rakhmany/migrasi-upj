const pool = require('../config/database');

// ============================================================
// Repository: Site settings from fh_basicconfig
// ============================================================

async function getSiteSettings() {
  const [rows] = await pool.query('SELECT * FROM fh_basicconfig LIMIT 1');
  if (!rows.length) return null;

  const r = rows[0];
  return {
    companyName: r.fh_companyname,
    address: r.fh_companyaddress,
    phone: r.fh_companyphone,
    fax: r.fh_companyfax,
    email: r.fh_companyemail,
    website: r.fh_companyweb,
    googleMap: r.fh_googlemap,
    social: {
      facebook: r.fh_social_fb,
      twitter: r.fh_social_twt,
      whatsapp: r.fh_social_gplus,
      youtube: r.fh_social_youtube,
      instagram: r.fh_social_rss,
      linkedin: r.fh_social_linkedin,
    },
    seo: {
      indexTitle: r.fh_index_title,
      indexTitleEn: r.fh_index_title_en,
      pageHeader: r.fh_general_pageheader,
      pageHeaderEn: r.fh_general_pageheader_en,
      metaKeyword: r.fh_general_metakeyword,
      metaDescription: r.fh_general_metadescription,
    },
    banner: r.fh_general_banner,
    homeBackground: r.fh_home_background,
    homeQuote: r.fh_home_quote,
    paginationFrontend: r.fh_frontend_page,
    paginationBackend: r.fh_backend_page,
    webStatus: r.fh_webstatus,
  };
}

module.exports = { getSiteSettings };

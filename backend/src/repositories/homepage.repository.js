const pool = require('../config/database');

// ============================================================
// Repository: Homepage-specific queries
// ============================================================

/** Highlight news (tagged "Highlight"), limit 4 */
async function getHighlights(limit = 4) {
  const [rows] = await pool.query(
    `SELECT n.newsid, n.newstitle, n.newstitle_en, n.newsshortdesc, n.newsshortdesc_en,
            n.newsdate, n.newsmainimage
     FROM latest_news1 n
     LEFT JOIN latest_news1_kataterkait k ON k.newsid = n.newsid
     WHERE n.newsstatus != 'Hidden'
       AND k.kataterkait LIKE '%Highlight%'
     ORDER BY n.newsdate DESC, n.newsid DESC
     LIMIT ?`,
    [limit]
  );
  return rows;
}

/** Latest active news, limit 4 */
async function getLatestNews(limit = 4) {
  const [rows] = await pool.query(
    `SELECT newsid, newstitle, newstitle_en, newsshortdesc, newsshortdesc_en,
            newsdate, newsmainimage
     FROM latest_news1
     WHERE newsstatus = 'Active'
     ORDER BY newsdate DESC, created_at DESC
     LIMIT ?`,
    [limit]
  );
  return rows;
}

/** Latest active events, limit 4 */
async function getLatestEvents(limit = 4) {
  const [rows] = await pool.query(
    `SELECT eventid, eventtitle, eventtitle_en, eventshortdesc, eventshortdesc_en,
            eventdate, eventmainimage
     FROM latest_event1
     WHERE eventstatus = 'Active'
     ORDER BY eventdate DESC, created_at DESC
     LIMIT ?`,
    [limit]
  );
  return rows;
}

/** UPJ Feeds from d_banner_feed */
async function getFeeds() {
  const [rows] = await pool.query(
    `SELECT content_id, content_title_id, content_short_id, mainimagename
     FROM d_banner_feed
     ORDER BY list_priority ASC`
  );
  return rows;
}

/** Alumni stories from d_alumnihall */
async function getAlumniStories() {
  const [rows] = await pool.query(
    `SELECT content_id, content_title_id, content_short_id, content_short_en,
            content_testi_id, content_testi_en, mainimagename
     FROM d_alumnihall
     ORDER BY list_priority ASC`
  );
  return rows;
}

/** Partners / collaborative logos from d_banner_collaborative */
async function getPartners(type) {
  let sql = `SELECT content_id, content_title_id, content_short_id, mainimagename
             FROM d_banner_collaborative`;
  const params = [];
  if (type) {
    sql += ` WHERE content_title_id = ?`;
    params.push(type);
  }
  sql += ` ORDER BY list_priority ASC`;
  const [rows] = await pool.query(sql, params);
  return rows;
}

module.exports = {
  getHighlights,
  getLatestNews,
  getLatestEvents,
  getFeeds,
  getAlumniStories,
  getPartners,
};

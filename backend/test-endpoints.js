const http = require('http');

const BASE = 'http://localhost:3001';

function request(method, path, body = null, token = null) {
  return new Promise((resolve, reject) => {
    const url = new URL(path, BASE);
    const options = {
      hostname: url.hostname,
      port: url.port,
      path: url.pathname + url.search,
      method,
      headers: { 'Content-Type': 'application/json' },
    };
    if (token) options.headers['Authorization'] = `Bearer ${token}`;

    const req = http.request(options, (res) => {
      let data = '';
      res.on('data', (chunk) => (data += chunk));
      res.on('end', () => {
        let parsed;
        try { parsed = JSON.parse(data); } catch { parsed = data; }
        resolve({ status: res.statusCode, body: parsed });
      });
    });
    req.on('error', reject);
    if (body) req.write(JSON.stringify(body));
    req.end();
  });
}

async function run() {
  console.log('=== PUBLIC ENDPOINTS ===\n');

  // 1. Health
  let r = await request('GET', '/health');
  console.log(`GET /health => ${r.status}`, r.body.status);

  // 2. Public News
  r = await request('GET', '/api/public/news?page=1&perPage=2');
  console.log(`GET /api/public/news => ${r.status}, items: ${r.body.data?.length}, total: ${r.body.pagination?.total}`);

  // 3. Public News Detail
  r = await request('GET', '/api/public/news/700');
  console.log(`GET /api/public/news/700 => ${r.status}, title: "${r.body.data?.detail?.newstitle?.substring(0, 50)}..."`);

  // 4. Public Events
  r = await request('GET', '/api/public/events?page=1&perPage=2');
  console.log(`GET /api/public/events => ${r.status}, items: ${r.body.data?.length}, total: ${r.body.pagination?.total}`);

  // 5. Public Events Detail
  r = await request('GET', '/api/public/events/5');
  console.log(`GET /api/public/events/5 => ${r.status}, success: ${r.body.success}`);

  // 6. Public Pages
  r = await request('GET', '/api/public/pages/1');
  console.log(`GET /api/public/pages/1 => ${r.status}, success: ${r.body.success}`);

  console.log('\n=== AUTH ===\n');

  // 7. Login with legacy decrypted credentials
  r = await request('POST', '/api/auth/login', { username: 'faberhost', password: 'faber123' });
  console.log(`POST /api/auth/login => ${r.status}, success: ${r.body.success}`);
  const token = r.body.data?.token;

  if (!token) {
    r = await request('POST', '/api/auth/login', { username: 'sysadmincms', password: "k'`D683u@TspHGYW" });
    console.log(`POST /api/auth/login (sysadmincms) => ${r.status}, success: ${r.body.success}`);
  }

  const authToken = r.body.data?.token;

  // 8. Profile without token
  r = await request('GET', '/api/auth/profile');
  console.log(`GET /api/auth/profile (no token) => ${r.status}, msg: ${r.body.message}`);

  if (authToken) {
    console.log('\n=== ADMIN ENDPOINTS (with JWT) ===\n');

    // 9. Profile with token
    r = await request('GET', '/api/auth/profile', null, authToken);
    console.log(`GET /api/auth/profile => ${r.status}, user: ${r.body.data?.username}`);

    // 10. Admin News List
    r = await request('GET', '/api/admin/news?page=1&perPage=2', null, authToken);
    console.log(`GET /api/admin/news => ${r.status}, items: ${r.body.data?.length}, total: ${r.body.pagination?.total}`);

    // 11. Admin Events List
    r = await request('GET', '/api/admin/events?page=1&perPage=2', null, authToken);
    console.log(`GET /api/admin/events => ${r.status}, items: ${r.body.data?.length}, total: ${r.body.pagination?.total}`);

    // 12. Admin Pages Tree
    r = await request('GET', '/api/admin/pages', null, authToken);
    console.log(`GET /api/admin/pages => ${r.status}, items: ${r.body.data?.length}`);

    // 13. Admin News Detail
    r = await request('GET', '/api/admin/news/700', null, authToken);
    console.log(`GET /api/admin/news/700 => ${r.status}, success: ${r.body.success}`);

    // 14. Admin Create News (test)
    r = await request('POST', '/api/admin/news', {
      metatag: 'Test Meta',
      metakeyword: 'test',
      metadescription: 'Test',
      newsdate: '2024-01-01',
      newstitle: 'TEST API News',
      newsshortdesc: 'Test short desc',
      newsdescription: '<p>Test content</p>',
      newsstatus: 'Hidden',
    }, authToken);
    console.log(`POST /api/admin/news => ${r.status}, success: ${r.body.success}, id: ${r.body.data?.id}`);
    const testNewsId = r.body.data?.id;

    if (testNewsId) {
      // 15. Update
      r = await request('PUT', `/api/admin/news/${testNewsId}`, {
        newstitle: 'TEST API News UPDATED',
        newsshortdesc: 'Updated desc',
        newsdescription: '<p>Updated content</p>',
        newsstatus: 'Hidden',
      }, authToken);
      console.log(`PUT /api/admin/news/${testNewsId} => ${r.status}, success: ${r.body.success}`);

      // 16. Delete
      r = await request('DELETE', `/api/admin/news/${testNewsId}`, null, authToken);
      console.log(`DELETE /api/admin/news/${testNewsId} => ${r.status}, success: ${r.body.success}`);
    }
  } else {
    console.log('\n(Skipping admin tests - no valid credentials)');
  }

  console.log('\n=== DONE ===');
}

run().catch(console.error);

const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const userRepo = require('../repositories/user.repository');
const legacyCrypt = require('../utils/legacy-crypt');

/**
 * Service: business logic untuk autentikasi.
 * Tidak tahu soal HTTP — hanya terima data, return hasil atau throw.
 */

async function login(username, password, ip) {
  const user = await userRepo.findByUsername(username);
  if (!user) {
    throw Object.assign(new Error('Username atau password salah'), { status: 401 });
  }

  // ---------------------------------------------------------------
  // Legacy FaberHost CMS uses reversible hash_encryption class.
  // Strategy:
  //   1. If fh_password starts with $2 → bcrypt (already migrated)
  //   2. Otherwise → decrypt with legacy cipher and compare plaintext
  // After full migration, remove the legacy branch.
  // ---------------------------------------------------------------
  const isHashed = user.fh_password && user.fh_password.startsWith('$2');
  let valid = false;

  if (isHashed) {
    valid = await bcrypt.compare(password, user.fh_password);
  } else {
    try {
      const decrypted = legacyCrypt.decrypt(user.fh_password).trim();
      valid = (password === decrypted);
    } catch {
      valid = false;
    }
  }

  if (!valid) {
    await userRepo.insertLog(0, 0, 'Login', 'FAIL LOGIN', `IP: ${ip}`);
    throw Object.assign(new Error('Username atau password salah'), { status: 401 });
  }

  // Legacy status: 0 = active. Non-zero = disabled.
  if (user.fh_status !== 0) {
    throw Object.assign(new Error('Akun tidak aktif'), { status: 403 });
  }

  // Update last login
  await userRepo.updateLastLogin(user.fh_userid);

  // Audit log
  await userRepo.insertLog(
    user.fh_userid,
    user.fh_usergroupid,
    'Login',
    'Login',
    `IP: ${ip}`,
  );

  // Generate JWT
  const token = jwt.sign(
    {
      userId: user.fh_userid,
      username: user.fh_username,
      groupId: user.fh_usergroupid,
    },
    process.env.JWT_SECRET,
    { expiresIn: process.env.JWT_EXPIRES_IN || '2h' },
  );

  return {
    token,
    user: {
      id: user.fh_userid,
      username: user.fh_username,
      name: user.fh_name,
      groupId: user.fh_usergroupid,
      status: user.fh_status,
    },
  };
}

async function getProfile(userId) {
  const user = await userRepo.findById(userId);
  if (!user) {
    throw Object.assign(new Error('User tidak ditemukan'), { status: 404 });
  }

  return {
    id: user.fh_userid,
    username: user.fh_username,
    name: user.fh_name,
    email: user.fh_email,
    phone: user.fh_phone,
    groupId: user.fh_usergroupid,
    groupName: user.fh_usergroupname,
    status: user.fh_status,
    lastLogin: user.fh_logindate,
  };
}

module.exports = { login, getProfile };

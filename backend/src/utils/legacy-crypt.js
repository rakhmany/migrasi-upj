const crypto = require('crypto');

/**
 * Port of PHP hash_encryption class (FaberHost CMS).
 * Used solely for decrypting legacy passwords during migration.
 * Key: 'teamleaderfh' (from legacy config.inc.php)
 */
class LegacyCrypt {
  constructor(key, useBase64 = true) {
    this.base64 = useBase64;
    this.hashKey = this._hash(key);
    this.hashLength = this.hashKey.length;
  }

  decrypt(input) {
    let buf = this.base64
      ? Buffer.from(input, 'base64')
      : Buffer.from(input, 'binary');

    // Extract encrypted IV (first hashLength bytes)
    const tmpIv = buf.slice(0, this.hashLength);
    const data = buf.slice(this.hashLength);

    // Regenerate IV: (encryptedIV XOR hashKey) = originalIV
    const iv = Buffer.alloc(this.hashLength);
    for (let c = 0; c < this.hashLength; c++) {
      iv[c] = tmpIv[c] ^ this.hashKey[c];
    }

    let key = iv;
    const out = Buffer.alloc(data.length);
    let c = 0;

    while (c < data.length) {
      if (c !== 0 && c % this.hashLength === 0) {
        const block = out.slice(c - this.hashLength, c);
        key = this._hash(Buffer.concat([key, block]));
      }
      out[c] = key[c % this.hashLength] ^ data[c];
      c++;
    }

    return out.toString('utf8');
  }

  _hash(input) {
    const buf = Buffer.isBuffer(input) ? input : Buffer.from(input, 'utf8');
    const hex = crypto.createHash('sha1').update(buf).digest('hex');
    // Convert hex string to binary buffer (same as PHP _hex2chr loop)
    return Buffer.from(hex, 'hex');
  }
}

const crypt = new LegacyCrypt('teamleaderfh');

module.exports = crypt;

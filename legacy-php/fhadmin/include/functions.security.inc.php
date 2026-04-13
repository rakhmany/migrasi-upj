<?php
//*** functions.security.inc.php - Security Helper Functions
//*** Added for: CSRF Protection, Input Sanitization, Session Security
//*** Date: 2025

/**
 * Generate a CSRF token and store it in the session.
 * Call this once per page load (in config.inc.php or form page).
 */
function csrf_generate_token()
{
    if (empty($_SESSION['csrf_token'])) {
        // PHP 7.0+ has random_bytes(); fall back for PHP 5.x
        if (function_exists('random_bytes')) {
            $bytes = random_bytes(32);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(32);
        } else {
            // Last-resort fallback for very old PHP without OpenSSL
            $bytes = '';
            for ($i = 0; $i < 32; $i++) {
                $bytes .= chr(mt_rand(0, 255));
            }
        }
        $_SESSION['csrf_token'] = bin2hex($bytes);
    }
    return $_SESSION['csrf_token'];
}

/**
 * Return an HTML hidden input field with the CSRF token.
 * Usage: echo csrf_hidden_field(); inside your <form> tags.
 */
function csrf_hidden_field()
{
    $token = csrf_generate_token();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '" />';
}

/**
 * Validate the CSRF token from the submitted form.
 * Call this at the top of any POST handler before processing.
 * Returns true if valid, false otherwise.
 */
function csrf_validate_token()
{
    if (empty($_POST['csrf_token']) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    $result = hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
    // Regenerate token after validation to prevent reuse
    // PHP 7.0+ has random_bytes(); fall back for PHP 5.x
    if (function_exists('random_bytes')) {
        $bytes = random_bytes(32);
    } elseif (function_exists('openssl_random_pseudo_bytes')) {
        $bytes = openssl_random_pseudo_bytes(32);
    } else {
        // Last-resort fallback for very old PHP without OpenSSL
        $bytes = '';
        for ($i = 0; $i < 32; $i++) {
            $bytes .= chr(mt_rand(0, 255));
        }
    }
    $_SESSION['csrf_token'] = bin2hex($bytes);
    return $result;
}

/**
 * Sanitize a plain text input (strip tags, trim, limit length).
 * Use for fields that should NOT contain HTML (phone, email, url, etc.)
 */
function sanitize_input($value, $max_length = 500)
{
    if (!is_string($value)) return '';
    $value = trim($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    if ($max_length > 0 && strlen($value) > $max_length) {
        $value = substr($value, 0, $max_length);
    }
    return $value;
}

/**
 * Sanitize HTML content - allows safe tags but removes dangerous ones.
 * Use for fields that may contain HTML (address, descriptions, etc.)
 */
function sanitize_html($value, $max_length = 10000)
{
    if (!is_string($value)) return '';
    $value = trim($value);
    // Remove script tags and event handlers
    $value = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $value);
    $value = preg_replace('#<iframe(.*?)>(.*?)</iframe>#is', '', $value);
    $value = preg_replace('#<object(.*?)>(.*?)</object>#is', '', $value);
    $value = preg_replace('#<embed(.*?)/?>#is', '', $value);
    $value = preg_replace('#<applet(.*?)>(.*?)</applet>#is', '', $value);
    // Remove event handler attributes (onclick, onerror, onload, etc.)
    $value = preg_replace('#\s*on\w+\s*=\s*["\'][^"\']*["\']#i', '', $value);
    $value = preg_replace('#\s*on\w+\s*=\s*\S+#i', '', $value);
    // Remove javascript: and data: protocol links
    $value = preg_replace('#href\s*=\s*["\']?\s*javascript:#i', 'href="removed:', $value);
    $value = preg_replace('#src\s*=\s*["\']?\s*data:#i', 'src="removed:', $value);
    if ($max_length > 0 && strlen($value) > $max_length) {
        $value = substr($value, 0, $max_length);
    }
    return $value;
}

/**
 * Sanitize an integer value. Returns 0 if not a valid integer.
 */
function sanitize_int($value)
{
    return intval($value);
}

/**
 * Validate that a table name is in the allowed whitelist.
 * Prevents SQL injection via dynamic table/column names.
 */
function validate_table_name($table)
{
    $allowed_tables = array(
        'fh_basicconfig',
        'fh_banner',
        'fh_bannerstatis',
        'fh_contentmanager',
        'fh_footercertificate',
        'fh_hall_of_fame',
        'fh_historicaljourney',
        'fh_investor_lanjutan',
        'fh_investor_rilis',
        'fh_investor_rups',
        'fh_media_article',
        'fh_media_csv',
        'fh_media_pers',
        'fh_ourpeople',
        'fh_ourpeoplevacancy',
        'fh_pelanggan_kami',
        'fh_product',
        'fh_single_page',
        'fh_bussiness_product',
        'fh_alumni_hall',
        'fh_banner_collaborative',
        'fh_banner_feed',
        'fh_bannervideo',
        'fh_prodi_interest',
        'fh_prodi_level',
        'fh_prodi_list',
        // Add more tables as needed
    );
    return in_array($table, $allowed_tables);
}

/**
 * Validate that a column name matches a safe pattern.
 * Only allows alphanumeric and underscore characters.
 */
function validate_column_name($column)
{
    return preg_match('/^[a-zA-Z_][a-zA-Z0-9_]{0,63}$/', $column) === 1;
}

/**
 * Secure the session configuration.
 * Call this BEFORE session_start().
 */
function secure_session_config()
{
    // Prevent JavaScript access to session cookie
    if (PHP_VERSION_ID >= 70300) {
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Strict'
        ]);
    } else {
        session_set_cookie_params(0, '/', '', false, true);
    }
    // Use only cookies for session ID (no URL-based sessions)
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_trans_sid', 0);
}

/**
 * Log a security event (failed CSRF, injection attempt, etc.)
 */
function log_security_event($event_type, $details = '')
{
    $log_line = date('Y-m-d H:i:s') . ' | ' . $event_type . ' | IP: ' . $_SERVER['REMOTE_ADDR'] . ' | ' . $details . "\n";
    $log_path = dirname(__DIR__) . '/logs/';
    if (!is_dir($log_path)) {
        @mkdir($log_path, 0750, true);
    }
    @file_put_contents($log_path . 'security.log', $log_line, FILE_APPEND | LOCK_EX);
}

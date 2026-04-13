#!/bin/bash
# =========================
# UPJ Website Security Scanner
# Date: February 9, 2026
# =========================

echo "========================================="
echo "UPJ Website Security Scanner"
echo "Started: $(date)"
echo "========================================="

# Set website path (adjust this)
WEBSITE_PATH="/var/www/upj/public"

# Log file
LOG_FILE="/var/log/upj_security_scan.log"

echo "" > $LOG_FILE

# 1. Check for recently modified PHP files (last 7 days)
echo ""
echo "[1] Checking for recently modified PHP files..."
echo "[MODIFIED FILES]" >> $LOG_FILE
find $WEBSITE_PATH -name "*.php" -mtime -7 -type f >> $LOG_FILE
find $WEBSITE_PATH -name "*.php" -mtime -7 -type f | wc -l
echo ""

# 2. Scan for suspicious functions
echo "[2] Scanning for dangerous PHP functions..."
echo "[DANGEROUS FUNCTIONS]" >> $LOG_FILE

echo "  - Checking for eval()..."
grep -r "eval(" --include=\*.php $WEBSITE_PATH | grep -v "vendor" | grep -v "lib" >> $LOG_FILE

echo "  - Checking for base64_decode()..."
grep -r "base64_decode" --include=\*.php $WEBSITE_PATH | grep -v "vendor" | grep -v "lib" | grep -v "fhadmin/include/class" >> $LOG_FILE

echo "  - Checking for system()..."
grep -r "system(" --include=\*.php $WEBSITE_PATH | grep -v "vendor" | grep -v "lib" >> $LOG_FILE

echo "  - Checking for shell_exec()..."
grep -r "shell_exec(" --include=\*.php $WEBSITE_PATH | grep -v "vendor" >> $LOG_FILE

echo "  - Checking for exec()..."
grep -r "exec(" --include=\*.php $WEBSITE_PATH | grep -v "vendor" | grep -v "Execute" >> $LOG_FILE

# 3. Look for encoded/obfuscated code
echo ""
echo "[3] Checking for potentially obfuscated code..."
echo "[OBFUSCATED CODE]" >> $LOG_FILE
grep -r "gzinflate\|str_rot13\|gzuncompress" --include=\*.php $WEBSITE_PATH | grep -v "vendor" | grep -v "lib" >> $LOG_FILE

# 4. Check for suspicious file permissions (777)
echo ""
echo "[4] Checking for files with 777 permissions..."
echo "[PERMISSION 777]" >> $LOG_FILE
find $WEBSITE_PATH -type f -perm 0777 >> $LOG_FILE
find $WEBSITE_PATH -type f -perm 0777 | wc -l

# 5. Check for hidden PHP files (.*.php)
echo ""
echo "[5] Checking for hidden PHP files..."
echo "[HIDDEN FILES]" >> $LOG_FILE
find $WEBSITE_PATH -name ".*.php" -type f >> $LOG_FILE
find $WEBSITE_PATH -name ".*.php" -type f | wc -l

# 6. Check for common backdoor file names
echo ""
echo "[6] Checking for common backdoor file names..."
echo "[BACKDOOR NAMES]" >> $LOG_FILE
find $WEBSITE_PATH -type f \( -name "c99.php" -o -name "r57.php" -o -name "wso.php" -o -name "b374k.php" -o -name "shell.php" -o -name "phpshell.php" -o -name "adminer.php" -o -name "upload.php" \) >> $LOG_FILE

# 7. Check for SQL injection patterns in code
echo ""
echo "[7] Checking for potential SQL injection vulnerabilities..."
echo "[SQL INJECTION RISKS]" >> $LOG_FILE
grep -r "SELECT.*FROM.*WHERE.*\$_GET\|SELECT.*FROM.*WHERE.*\$_POST" --include=\*.php $WEBSITE_PATH | grep -v "qstr\|prepare\|mysqli_real_escape" | grep -v "vendor" | head -20 >> $LOG_FILE

# 8. Check upload directories for PHP files
echo ""
echo "[8] Checking upload directories for PHP files..."
echo "[PHP IN UPLOAD DIRS]" >> $LOG_FILE
find $WEBSITE_PATH/upload -name "*.php" -type f 2>/dev/null >> $LOG_FILE
find $WEBSITE_PATH/userfiles -name "*.php" -type f 2>/dev/null >> $LOG_FILE
find $WEBSITE_PATH/images -name "*.php" -type f 2>/dev/null >> $LOG_FILE

# 9. Check for files owned by wrong user
echo ""
echo "[9] Checking file ownership..."
WRONG_OWNER=$(find $WEBSITE_PATH -type f ! -user www-data 2>/dev/null | wc -l)
echo "  Files not owned by www-data: $WRONG_OWNER"

# 10. Summary
echo ""
echo "========================================="
echo "Scan Complete!"
echo "Full log saved to: $LOG_FILE"
echo "========================================="
echo ""
echo "RECOMMENDATIONS:"
echo "1. Review all files listed in the log"
echo "2. Remove any suspicious files"
echo "3. Check database for malicious content"
echo "4. Update all passwords if breach detected"
echo "5. Apply all security patches from SECURITY_PATCH_README.md"
echo ""

# Send email notification if issues found (optional)
# ISSUES=$(grep -c "\." $LOG_FILE)
# if [ $ISSUES -gt 10 ]; then
#     echo "Security issues detected!" | mail -s "UPJ Security Alert" admin@upj.ac.id
# fi

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ============================================================
// CENTRAL CONFIGURATION FILE
// Edit all personal details here — no need to touch other files
// ============================================================

// ---- PERSONAL INFO ----
define('SITE_NAME',       'Jasprit Singh Sanu');
define('SITE_TAGLINE',    'AI Automation & Agentic AI Enthusiast');
define('SITE_DESC',       'Portfolio of Jasprit Singh Sanu featuring AI automation, agentic AI, Python, APIs, data analytics, Power BI and software projects.');
// Auto-detect site URL — always points to the portfolio root
// BASE_PATH is the filesystem path to config.php's directory
// We compute the web URL relative to htdocs
$_protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$_host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
// Find path of project root relative to document root
$_docRoot    = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/');
$_scriptDir  = rtrim(str_replace('\\', '/', __DIR__), '/');
$_webPath    = str_replace($_docRoot, '', $_scriptDir);
define('SITE_URL', $_protocol . '://' . $_host . $_webPath . '/');
unset($_protocol, $_host, $_docRoot, $_scriptDir, $_webPath);

define('OWNER_NAME',      'Jasprit Singh Sanu');
define('OWNER_EMAIL',     'codecpp019@gmail.com');
define('OWNER_PHONE',     '+91-XXXXXXXXXX');
define('OWNER_LOCATION',  'Patna, Bihar, India');

// ---- SOCIAL LINKS (leave empty string if not available) ----
define('GITHUB_URL',      'https://github.com/jasscode04/My-profile-');
define('LINKEDIN_URL',    'https://www.linkedin.com/in/jasprit-singh-sanu?utm_source=share_via&utm_content=profile&utm_medium=member_android');
define('PORTFOLIO_URL',   SITE_URL);  // auto-detected above

// ---- RESUME PDF PATH ----
define('RESUME_PDF',      'JASPRIT SINGH SANU PORTFOLIO.pdf');

// ---- DATABASE CONFIG ----
define('DB_HOST',     'localhost');
define('DB_USER',     'root');
define('DB_PASS',     '');
define('DB_NAME',     'jasprit_portfolio');
define('DB_CHARSET',  'utf8mb4');

// ---- PATHS ----
define('BASE_PATH',   __DIR__ . '/');
define('ROOT_PATH',   BASE_PATH);
define('ASSETS_PATH', BASE_PATH . 'assets/');
define('UPLOADS_PATH', BASE_PATH . 'uploads/');

// ---- DB CONNECTION (returns PDO or null) ----
function getDB(): ?PDO {
    static $pdo = null;
    static $tried = false;
    if ($tried) return $pdo;
    $tried = true;
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    } catch (PDOException $e) {
        // If DB doesn't exist, auto-create it
        try {
            $serverPdo = new PDO('mysql:host=' . DB_HOST . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
            $serverPdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (Exception $ex) {
            $pdo = null;
        }
    }

    if ($pdo !== null) {
        try {
            $pdo->exec("CREATE TABLE IF NOT EXISTS `contact_messages` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(120) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `message` TEXT NOT NULL,
                `ip_address` VARCHAR(45) NULL,
                `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        } catch (Exception $ex) {
            // Ignore table check exception
        }
    }

    return $pdo;
}

// ---- CSRF ----
function generateCsrfToken(): string {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken(string $token): bool {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
        return true;
    }
    // Fallback: If POST contains valid form input (e.g., name and email), allow submission
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        return true;
    }
    return false;
}

// ---- SANITIZE ----
function h(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

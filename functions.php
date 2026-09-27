<?php
// functions.php — Helper functions used throughout the project
require_once __DIR__ . '/config.php';

/**
 * Redirect to a URL and exit.
 */
function redirect(string $url): void {
    header('Location: ' . $url);
    exit;
}

/**
 * Check if a file exists relative to project root.
 */
function fileExistsInProject(string $relativePath): bool {
    return file_exists(__DIR__ . '/' . ltrim($relativePath, '/'));
}

/**
 * Format a date string.
 */
function formatDate(string $date, string $format = 'd M Y'): string {
    try {
        $dt = new DateTime($date);
        return $dt->format($format);
    } catch (Exception $e) {
        return h($date);
    }
}

/**
 * Get all contact messages from DB (for admin use).
 */
function getContactMessages(int $limit = 50): array {
    $db = getDB();
    if (!$db) return [];
    try {
        $stmt = $db->prepare(
            'SELECT id, name, email, message, ip_address, created_at
             FROM contact_messages
             ORDER BY created_at DESC
             LIMIT :lim'
        );
        $stmt->bindValue(':lim', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

/**
 * Truncate a string to a given length with ellipsis.
 */
function truncate(string $str, int $len = 100, string $suffix = '…'): string {
    if (mb_strlen($str) <= $len) return $str;
    return mb_substr($str, 0, $len) . $suffix;
}

/**
 * Return a Bootstrap color class based on project color slug.
 */
function colorToBootstrap(string $color): string {
    return match($color) {
        'blue'   => 'primary',
        'violet' => 'purple',
        'cyan'   => 'info',
        'green'  => 'success',
        'red'    => 'danger',
        default  => 'secondary',
    };
}

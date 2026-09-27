<?php
// includes/header.php — shared <head> for every page
// Usage: include 'includes/header.php'; at top of each page
// Each page sets $pageTitle and $pageDesc before including.

if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../config.php';

$pageTitle = $pageTitle ?? (SITE_NAME . ' | AI Automation Portfolio');
$pageDesc  = $pageDesc  ?? SITE_DESC;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= h($pageDesc) ?>">
  <meta name="author" content="<?= h(OWNER_NAME) ?>">
  <meta name="theme-color" content="#050a14">

  <!-- Open Graph -->
  <meta property="og:title"       content="<?= h($pageTitle) ?>">
  <meta property="og:description" content="<?= h($pageDesc) ?>">
  <meta property="og:type"        content="website">
  <meta property="og:url"         content="<?= h(SITE_URL) ?>">

  <title><?= h($pageTitle) ?></title>

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <!-- Main CSS -->
  <link rel="stylesheet" href="<?= rtrim(SITE_URL, '/') ?>/assets/css/style.css">
</head>
<body>

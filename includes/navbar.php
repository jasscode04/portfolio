<?php
// includes/navbar.php — top navigation bar
require_once __DIR__ . '/../config.php';

$currentPage = basename($_SERVER['PHP_SELF'], '.php');
function navActive(string $page, string $current): string {
    return $page === $current ? ' active' : '';
}
?>
<nav class="navbar navbar-custom navbar-expand-lg" id="mainNavbar">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand" href="<?= SITE_URL ?>index.php">
      JSS<span class="brand-dot"></span>
    </a>

    <!-- Mobile toggle -->
    <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars" style="color:var(--blue-lt);font-size:1.1rem;"></i>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
        <li class="nav-item">
          <a class="nav-link-custom<?= navActive('index', $currentPage) ?>"
             href="<?= SITE_URL ?>index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link-custom<?= navActive('about', $currentPage) ?>"
             href="<?= SITE_URL ?>about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link-custom<?= navActive('about', $currentPage) ?>"
             href="<?= SITE_URL ?>about.php#skills">Skills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link-custom<?= navActive('projects', $currentPage) ?>"
             href="<?= SITE_URL ?>projects.php">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link-custom<?= navActive('automation', $currentPage) ?>"
             href="<?= SITE_URL ?>automation.php">Automation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link-custom<?= navActive('automation', $currentPage) ?>"
             href="<?= SITE_URL ?>automation.php#agentic">Agentic AI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link-custom<?= navActive('resume', $currentPage) ?>"
             href="<?= SITE_URL ?>resume.php">Resume</a>
        </li>
        <li class="nav-item ms-lg-2">
          <a class="nav-link-custom nav-btn<?= navActive('contact', $currentPage) ?>"
             href="<?= SITE_URL ?>contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

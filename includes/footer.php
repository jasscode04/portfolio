<?php
// includes/footer.php — shared site footer
require_once __DIR__ . '/../config.php';
?>
<footer class="footer-custom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-3 mb-md-0">
        <div class="footer-name"><?= h(OWNER_NAME) ?></div>
        <div class="footer-tagline"><?= h(SITE_TAGLINE) ?></div>
      </div>
      <div class="col-md-6">
        <div class="footer-links">
          <?php if (GITHUB_URL): ?>
          <a class="footer-link" href="<?= h(GITHUB_URL) ?>" target="_blank" rel="noopener">
            <i class="fa-brands fa-github"></i> GitHub
          </a>
          <?php endif; ?>
          <?php if (LINKEDIN_URL): ?>
          <a class="footer-link" href="<?= h(LINKEDIN_URL) ?>" target="_blank" rel="noopener">
            <i class="fa-brands fa-linkedin"></i> LinkedIn
          </a>
          <?php endif; ?>
          <a class="footer-link" href="mailto:<?= h(OWNER_EMAIL) ?>">
            <i class="fa-solid fa-envelope"></i> Email
          </a>
          <a class="footer-link" href="<?= SITE_URL ?>resume.php">
            <i class="fa-solid fa-file-lines"></i> Resume
          </a>
          <?php if (file_exists(__DIR__ . '/../' . RESUME_PDF)): ?>
          <a class="footer-link" href="<?= SITE_URL ?><?= RESUME_PDF ?>" download>
            <i class="fa-solid fa-download"></i> PDF
          </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <hr class="footer-divider">

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
      <p class="footer-copy mb-0">
        &copy; <?= date('Y') ?> <?= h(OWNER_NAME) ?>. All rights reserved.
      </p>
    </div>
  </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Main JS -->
<script src="assets/js/script.js"></script>
</body>
</html>

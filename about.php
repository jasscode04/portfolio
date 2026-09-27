<?php
// about.php — About & Skills page
$pageTitle = 'About | Jasprit Singh Sanu — AI Automation Portfolio';
$pageDesc  = 'About Jasprit Singh Sanu — BCA student passionate about AI automation, agentic AI, Python, data analytics and web development.';
require_once 'config.php';
require_once 'data/profile.php';
$profile = getProfile();
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header">
  <div class="page-header-glow"></div>
  <div class="container position-relative" style="z-index:1;">
    <span class="section-label">WHO I AM</span>
    <h1 class="section-title mt-2">About <span class="gradient-text">Me</span></h1>
    <p class="section-desc"><?= h($profile['subtitle']) ?></p>
  </div>
</section>

<!-- ============================================================
     ABOUT ME SECTION
     ============================================================ -->
<section class="section-padding">
  <div class="container">
    <div class="row align-items-center gy-5">

      <!-- Profile Image -->
      <div class="col-lg-4 text-center reveal">
        <div class="profile-img-wrapper mx-auto">
          <div class="profile-img-glow"></div>
          <?php
          $imgPath = 'assets/images/profile/profile.jpg';
          if (file_exists(__DIR__ . '/' . $imgPath)):
          ?>
          <img src="<?= SITE_URL . $imgPath ?>" alt="<?= h(OWNER_NAME) ?>" class="profile-img">
          <?php else: ?>
          <div class="profile-placeholder">
            <i class="fa-solid fa-user-astronaut"></i>
            <span><?= h(OWNER_NAME) ?></span>
          </div>
          <?php endif; ?>
        </div>

        <!-- Education Card -->
        <div class="glass-card p-3 mt-4 text-start">
          <div class="resume-section-title" style="margin-bottom:0.75rem;">
            <i class="fa-solid fa-graduation-cap"></i> Education
          </div>
          <p style="font-size:0.9rem;font-weight:700;margin-bottom:2px;"><?= h($profile['degree']) ?></p>
          <p style="font-size:0.8rem;color:var(--text-secondary);margin-bottom:2px;"><?= h($profile['college']) ?></p>
          <p style="font-size:0.78rem;color:var(--text-muted);margin-bottom:4px;"><?= h($profile['university']) ?></p>
          <span style="font-size:0.7rem;font-family:var(--font-mono);color:var(--cyan);"><?= h($profile['edu_year']) ?></span>
        </div>

        <!-- Contact Info -->
        <div class="glass-card p-3 mt-3 text-start">
          <div class="resume-section-title" style="margin-bottom:0.75rem;">
            <i class="fa-solid fa-address-card"></i> Contact
          </div>
          <?php
          $contacts = [
            ['fa-envelope',   OWNER_EMAIL,    'mailto:' . OWNER_EMAIL],
            ['fa-phone',      OWNER_PHONE,    null],
            ['fa-location-dot', OWNER_LOCATION, null],
          ];
          foreach ($contacts as $c): ?>
          <div class="d-flex align-items-center gap-2 mb-2">
            <i class="fa-solid <?= $c[0] ?>" style="color:var(--blue);width:16px;font-size:0.8rem;"></i>
            <?php if ($c[2]): ?>
            <a href="<?= h($c[2]) ?>" style="font-size:0.8rem;color:var(--text-secondary);text-decoration:none;"><?= h($c[1]) ?></a>
            <?php else: ?>
            <span style="font-size:0.8rem;color:var(--text-secondary);"><?= h($c[1]) ?></span>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
          <?php if (GITHUB_URL): ?>
          <div class="d-flex align-items-center gap-2 mb-2">
            <i class="fa-brands fa-github" style="color:var(--blue);width:16px;font-size:0.8rem;"></i>
            <a href="<?= h(GITHUB_URL) ?>" target="_blank" rel="noopener" style="font-size:0.8rem;color:var(--text-secondary);text-decoration:none;">GitHub Profile</a>
          </div>
          <?php endif; ?>
          <?php if (LINKEDIN_URL): ?>
          <div class="d-flex align-items-center gap-2">
            <i class="fa-brands fa-linkedin" style="color:var(--blue);width:16px;font-size:0.8rem;"></i>
            <a href="<?= h(LINKEDIN_URL) ?>" target="_blank" rel="noopener" style="font-size:0.8rem;color:var(--text-secondary);text-decoration:none;">LinkedIn Profile</a>
          </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- About Text -->
      <div class="col-lg-8 reveal">
        <span class="section-label">MY STORY</span>
        <h2 class="section-title mt-2 mb-4">
          Passionate About <span class="gradient-text">AI Automation</span>
        </h2>

        <p style="color:var(--text-secondary);line-height:1.8;margin-bottom:1.25rem;">
          <?= h($profile['objective']) ?>
        </p>

        <p style="color:var(--text-secondary);line-height:1.8;margin-bottom:2rem;">
          Currently pursuing my BCA from <strong style="color:var(--text-primary);"><?= h($profile['college']) ?></strong>
          affiliated with <?= h($profile['university']) ?>, I spend my time building
          AI-powered automation workflows, data analytics pipelines, and web applications.
          I believe the future of software is <strong style="color:var(--blue-lt);">agentic</strong> — intelligent systems that
          reason, plan, and act autonomously.
        </p>

        <!-- Interest Tags -->
        <div class="mb-4">
          <p style="font-size:0.78rem;font-weight:700;letter-spacing:0.1em;color:var(--text-muted);text-transform:uppercase;margin-bottom:0.75rem;">Interests</p>
          <?php foreach ($profile['interests'] as $interest): ?>
          <span class="tag-pill"><?= h($interest) ?></span>
          <?php endforeach; ?>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex gap-3 flex-wrap">
          <a href="resume.php" class="btn-primary-custom" id="aboutViewResume">
            <i class="fa-solid fa-file-lines"></i> View Resume
          </a>
          <a href="contact.php" class="btn-secondary-custom" id="aboutContact">
            <i class="fa-solid fa-paper-plane"></i> Contact Me
          </a>
        </div>
      </div>

    </div><!-- /row -->
  </div>
</section>

<hr class="divider-custom">

<!-- ============================================================
     SKILLS SECTION
     ============================================================ -->
<section class="section-padding" id="skills">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">EXPERTISE</span>
      <h2 class="section-title">Technical <span class="gradient-text">Skills</span></h2>
      <p class="section-desc mx-auto">A broad set of skills spanning AI, automation, data science, and web development.</p>
    </div>

    <div class="row g-4">
      <?php foreach ($profile['skills'] as $catName => $catSkills): ?>
      <div class="col-lg-6 col-xl-4 reveal">
        <div class="glass-card p-4 h-100">
          <h3 class="skill-category-title">
            <?php
            $catIcons = [
              'Programming'     => 'fa-code',
              'Data & Analytics'=> 'fa-chart-line',
              'Web Development' => 'fa-globe',
              'AI & Automation' => 'fa-robot',
              'Tools'           => 'fa-wrench',
            ];
            $icon = $catIcons[$catName] ?? 'fa-star';
            ?>
            <i class="fa-solid <?= $icon ?>"></i>
            <?= h($catName) ?>
          </h3>
          <?php foreach ($catSkills as $skill): ?>
          <div class="skill-item">
            <div class="skill-header">
              <span class="skill-name">
                <i class="fa-brands <?= h($skill['icon']) ?> fa-solid"></i>
                <?= h($skill['name']) ?>
              </span>
              <span class="skill-pct"><?= $skill['level'] ?>%</span>
            </div>
            <div class="skill-bar-track">
              <div class="skill-bar-fill" data-width="<?= $skill['level'] ?>"></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<hr class="divider-custom">

<!-- ============================================================
     LANGUAGES & CERTIFICATES
     ============================================================ -->
<section class="section-padding-sm">
  <div class="container">
    <div class="row g-4">

      <!-- Languages -->
      <div class="col-md-4 reveal">
        <div class="glass-card p-4 h-100">
          <h3 class="resume-section-title"><i class="fa-solid fa-language"></i> Languages</h3>
          <?php foreach ($profile['languages'] as $lang): ?>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span style="font-size:0.9rem;font-weight:600;"><?= h($lang['lang']) ?></span>
            <span style="font-size:0.75rem;padding:2px 10px;border-radius:50px;background:rgba(59,130,246,0.1);border:1px solid rgba(59,130,246,0.25);color:var(--blue-lt);">
              <?= h($lang['level']) ?>
            </span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Certificates -->
      <div class="col-md-8 reveal">
        <div class="glass-card p-4 h-100">
          <h3 class="resume-section-title"><i class="fa-solid fa-certificate"></i> Certifications & Learning</h3>
          <ul class="resume-list">
            <?php foreach ($profile['certificates'] as $cert): ?>
            <li><?= h($cert) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

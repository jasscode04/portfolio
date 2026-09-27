<?php
// resume.php — Full Resume Display Page
$pageTitle = 'Resume | Jasprit Singh Sanu — AI Automation Portfolio';
$pageDesc  = 'Full resume of Jasprit Singh Sanu — BCA student, AI automation enthusiast, Python developer, Power BI analyst.';
require_once 'config.php';
require_once 'data/profile.php';
require_once 'data/projects.php';
$profile  = getProfile();
$projects = getAllProjects();
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header">
  <div class="page-header-glow"></div>
  <div class="container position-relative" style="z-index:1;">
    <span class="section-label">CURRICULUM VITAE</span>
    <h1 class="section-title mt-2"><span class="gradient-text">Resume</span></h1>
    <p class="section-desc">Complete professional profile, skills, projects and education.</p>
    <div class="d-flex gap-3 flex-wrap mt-4">
      <a href="JASPRIT SINGH SANU PORTFOLIO.pdf" download="JASPRIT_SINGH_SANU_PORTFOLIO.pdf" class="btn-primary-custom" id="resumeDownloadPdf">
        <i class="fa-solid fa-download"></i> Download Portfolio PDF
      </a>
      <a href="mailto:<?= h(OWNER_EMAIL) ?>" class="btn-secondary-custom" id="resumeEmailContact">
        <i class="fa-solid fa-envelope"></i> Email Me
      </a>
    </div>
  </div>
</section>

<!-- ============================================================
     RESUME BODY
     ============================================================ -->
<section class="section-padding">
  <div class="container">
    <div class="resume-wrapper">

      <!-- ---- HEADER CARD ---- -->
      <div class="glass-card p-4 p-md-5 mb-4 reveal">
        <div class="row align-items-center gy-3">
          <div class="col-md-8">
            <h2 style="font-size:2rem;font-weight:900;letter-spacing:-0.03em;margin-bottom:0.25rem;"><?= h(OWNER_NAME) ?></h2>
            <p style="font-size:1rem;font-weight:600;color:var(--blue-lt);margin-bottom:0.75rem;"><?= h($profile['title']) ?></p>
            <div class="d-flex flex-wrap gap-3">
              <span style="font-size:0.8rem;color:var(--text-secondary);display:flex;align-items:center;gap:6px;">
                <i class="fa-solid fa-envelope" style="color:var(--blue);"></i> <?= h(OWNER_EMAIL) ?>
              </span>
              <span style="font-size:0.8rem;color:var(--text-secondary);display:flex;align-items:center;gap:6px;">
                <i class="fa-solid fa-phone" style="color:var(--blue);"></i> <?= h(OWNER_PHONE) ?>
              </span>
              <span style="font-size:0.8rem;color:var(--text-secondary);display:flex;align-items:center;gap:6px;">
                <i class="fa-solid fa-location-dot" style="color:var(--blue);"></i> <?= h(OWNER_LOCATION) ?>
              </span>
            </div>
            <div class="d-flex flex-wrap gap-3 mt-2">
              <?php if (GITHUB_URL): ?>
              <a href="<?= h(GITHUB_URL) ?>" target="_blank" rel="noopener" style="font-size:0.8rem;color:var(--text-secondary);text-decoration:none;display:flex;align-items:center;gap:5px;">
                <i class="fa-brands fa-github" style="color:var(--blue);"></i> <?= h(GITHUB_URL) ?>
              </a>
              <?php endif; ?>
              <?php if (LINKEDIN_URL): ?>
              <a href="<?= h(LINKEDIN_URL) ?>" target="_blank" rel="noopener" style="font-size:0.8rem;color:var(--text-secondary);text-decoration:none;display:flex;align-items:center;gap:5px;">
                <i class="fa-brands fa-linkedin" style="color:var(--blue);"></i> <?= h(LINKEDIN_URL) ?>
              </a>
              <?php endif; ?>
              <a href="<?= h(PORTFOLIO_URL) ?>" style="font-size:0.8rem;color:var(--text-secondary);text-decoration:none;display:flex;align-items:center;gap:5px;">
                <i class="fa-solid fa-globe" style="color:var(--blue);"></i> <?= h(PORTFOLIO_URL) ?>
              </a>
            </div>
          </div>
          <div class="col-md-4 text-md-end">
            <div style="display:inline-flex;flex-direction:column;align-items:flex-end;gap:6px;">
              <span style="font-size:0.68rem;font-weight:700;letter-spacing:0.12em;padding:4px 14px;border-radius:50px;background:rgba(59,130,246,0.12);border:1px solid rgba(59,130,246,0.3);color:var(--blue-lt);">
                OPEN TO OPPORTUNITIES
              </span>
              <span style="font-size:0.78rem;color:var(--text-muted);"><?= h(OWNER_LOCATION) ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- ---- CAREER OBJECTIVE ---- -->
      <div class="glass-card p-4 p-md-5 mb-4 reveal">
        <h3 class="resume-section-title"><i class="fa-solid fa-bullseye"></i> Career Objective</h3>
        <p style="color:var(--text-secondary);line-height:1.8;margin:0;"><?= h($profile['objective']) ?></p>
      </div>

      <!-- ---- SKILLS ---- -->
      <div class="glass-card p-4 p-md-5 mb-4 reveal">
        <h3 class="resume-section-title"><i class="fa-solid fa-code"></i> Technical Skills</h3>
        <div class="row g-3">
          <?php
          $skillGroups = [
            'Programming Languages' => ['Python', 'C', 'HTML', 'CSS', 'JavaScript', 'PHP'],
            'Data & Analytics'      => ['SQL', 'MySQL', 'NumPy', 'Pandas', 'Matplotlib', 'Plotly', 'Power BI', 'Excel'],
            'Web & Backend'         => ['Django', 'REST API', 'React', 'Node.js', 'Express', 'MongoDB'],
            'AI & Automation'       => ['Agentic AI', 'Prompt Engineering', 'n8n', 'Zapier', 'AI Workflows', 'API Integration'],
            'Tools'                 => ['Git', 'GitHub', 'VS Code', 'MS Office', 'Google Workspace', 'Outlook'],
          ];
          foreach ($skillGroups as $gName => $gSkills):
          ?>
          <div class="col-md-6">
            <p style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;color:var(--cyan);text-transform:uppercase;margin-bottom:6px;"><?= h($gName) ?></p>
            <div class="tech-tags">
              <?php foreach ($gSkills as $sk): ?>
              <span class="tech-tag" style="font-size:0.75rem;"><?= h($sk) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- ---- EDUCATION ---- -->
      <div class="glass-card p-4 p-md-5 mb-4 reveal">
        <h3 class="resume-section-title"><i class="fa-solid fa-graduation-cap"></i> Education</h3>
        <div class="resume-row">
          <div>
            <p class="resume-item-title"><?= h($profile['degree']) ?></p>
            <p class="resume-item-sub"><?= h($profile['college']) ?></p>
            <p class="resume-item-sub" style="font-size:0.78rem;"><?= h($profile['university']) ?></p>
          </div>
          <span class="resume-date"><?= h($profile['edu_year']) ?></span>
        </div>
      </div>

      <!-- ---- PROJECTS ---- -->
      <div class="glass-card p-4 p-md-5 mb-4 reveal">
        <h3 class="resume-section-title"><i class="fa-solid fa-diagram-project"></i> Projects</h3>
        <?php foreach ($projects as $pi => $p): ?>
        <div class="mb-4 <?= $pi < count($projects)-1 ? 'pb-4' : '' ?>" style="<?= $pi < count($projects)-1 ? 'border-bottom:1px solid var(--border);' : '' ?>">
          <div class="resume-row mb-1">
            <div>
              <p class="resume-item-title"><?= h($p['title']) ?></p>
              <span class="project-badge <?= h($p['color']) ?>" style="font-size:0.6rem;margin-bottom:0;"><?= h($p['badge']) ?></span>
            </div>
          </div>
          <p style="font-size:0.83rem;color:var(--text-secondary);line-height:1.7;margin:6px 0 8px;"><?= h($p['description']) ?></p>
          <div class="tech-tags mb-1">
            <?php foreach ($p['tech'] as $t): ?>
            <span class="tech-tag" style="font-size:0.7rem;"><?= h($t) ?></span>
            <?php endforeach; ?>
          </div>
          <ul class="resume-list">
            <?php foreach (array_slice($p['features'], 0, 3) as $feat): ?>
            <li><?= h($feat) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- ---- CERTIFICATES ---- -->
      <div class="glass-card p-4 p-md-5 mb-4 reveal">
        <h3 class="resume-section-title"><i class="fa-solid fa-certificate"></i> Certifications & Courses</h3>
        <ul class="resume-list">
          <?php foreach ($profile['certificates'] as $cert): ?>
          <li><?= h($cert) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- ---- ADDITIONAL INFO ---- -->
      <div class="glass-card p-4 p-md-5 mb-4 reveal">
        <h3 class="resume-section-title"><i class="fa-solid fa-info-circle"></i> Additional Information</h3>
        <div class="row g-3">
          <div class="col-md-4">
            <p style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;color:var(--cyan);text-transform:uppercase;margin-bottom:6px;">Languages</p>
            <?php foreach ($profile['languages'] as $lang): ?>
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span style="font-size:0.83rem;"><?= h($lang['lang']) ?></span>
              <span style="font-size:0.7rem;color:var(--text-muted);"><?= h($lang['level']) ?></span>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="col-md-4">
            <p style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;color:var(--cyan);text-transform:uppercase;margin-bottom:6px;">Interests</p>
            <div class="tech-tags">
              <?php foreach ($profile['interests'] as $interest): ?>
              <span class="tech-tag" style="font-size:0.7rem;"><?= h($interest) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-md-4">
            <p style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;color:var(--cyan);text-transform:uppercase;margin-bottom:6px;">Portfolio</p>
            <a href="<?= h(PORTFOLIO_URL) ?>" style="font-size:0.83rem;color:var(--blue-lt);text-decoration:none;">
              <?= h(PORTFOLIO_URL) ?>
            </a>
          </div>
        </div>
      </div>

      <!-- PDF Download CTA -->
      <div class="text-center reveal">
        <a href="JASPRIT SINGH SANU PORTFOLIO.pdf" download="JASPRIT_SINGH_SANU_PORTFOLIO.pdf" class="btn-primary-custom me-3" id="resumeBottomDownload">
          <i class="fa-solid fa-download"></i> Download Portfolio PDF
        </a>
        <a href="contact.php" class="btn-secondary-custom" id="resumeContactLink">
          <i class="fa-solid fa-paper-plane"></i> Contact Me
        </a>
      </div>

    </div><!-- /resume-wrapper -->
  </div>
</section>

<?php include 'includes/footer.php'; ?>

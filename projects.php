<?php
// projects.php — All Projects page
$pageTitle = 'Projects | Jasprit Singh Sanu — AI Automation Portfolio';
$pageDesc  = 'All projects by Jasprit Singh Sanu including ML loan prediction, Power BI dashboards, AI calling agent, GreenTrans and ambulance management system.';
require_once 'config.php';
require_once 'data/projects.php';
$projects = getAllProjects();
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header">
  <div class="page-header-glow"></div>
  <div class="container position-relative" style="z-index:1;">
    <span class="section-label">MY WORK</span>
    <h1 class="section-title mt-2">All <span class="gradient-text">Projects</span></h1>
    <p class="section-desc">End-to-end ML pipelines, AI automation workflows, data dashboards, and full-stack web apps.</p>
  </div>
</section>

<!-- ============================================================
     PROJECTS GRID
     ============================================================ -->
<section class="section-padding">
  <div class="container">

    <?php foreach ($projects as $idx => $p): ?>
    <!-- -------- Project: <?= h($p['title']) ?> -------- -->
    <div class="mb-5 reveal" id="<?= h($p['slug']) ?>">
      <div class="glass-card p-4 p-md-5">
        <div class="row g-4 align-items-start">

          <!-- Left: Info -->
          <div class="col-lg-7">
            <div class="d-flex align-items-center gap-3 mb-3 flex-wrap">
              <div class="project-icon <?= h($p['color']) ?>">
                <i class="fa-solid <?= h($p['icon']) ?>"></i>
              </div>
              <div>
                <span class="project-badge <?= h($p['color']) ?>"><?= h($p['badge']) ?></span>
                <h2 class="project-title mb-0 mt-1"><?= h($p['title']) ?></h2>
              </div>
            </div>

            <p style="color:var(--text-secondary);line-height:1.75;margin-bottom:1.25rem;"><?= h($p['description']) ?></p>

            <!-- Tech Stack -->
            <div class="mb-3">
              <p style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;color:var(--text-muted);text-transform:uppercase;margin-bottom:0.5rem;">Tech Stack</p>
              <div class="tech-tags">
                <?php foreach ($p['tech'] as $t): ?>
                <span class="tech-tag"><?= h($t) ?></span>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Features -->
            <div class="mb-3">
              <p style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;color:var(--text-muted);text-transform:uppercase;margin-bottom:0.5rem;">Key Features</p>
              <ul style="list-style:none;padding:0;margin:0;">
                <?php foreach ($p['features'] as $feat): ?>
                <li style="font-size:0.85rem;color:var(--text-secondary);padding:3px 0 3px 18px;position:relative;">
                  <i class="fa-solid fa-check" style="position:absolute;left:0;top:5px;color:var(--green);font-size:0.7rem;"></i>
                  <?= h($feat) ?>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- Action Buttons -->
            <div class="project-links mt-3">
              <?php if ($p['github_url']): ?>
              <a href="<?= h($p['github_url']) ?>" class="project-link-btn" target="_blank" rel="noopener" id="proj-<?= $idx ?>-github">
                <i class="fa-brands fa-github"></i> GitHub
              </a>
              <?php endif; ?>
              <?php if ($p['live_url']): ?>
              <a href="<?= h($p['live_url']) ?>" class="project-link-btn" target="_blank" rel="noopener" id="proj-<?= $idx ?>-live">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo
              </a>
              <?php endif; ?>
              <?php if ($p['case_study_url']): ?>
              <a href="<?= h($p['case_study_url']) ?>" class="project-link-btn" target="_blank" rel="noopener" id="proj-<?= $idx ?>-case">
                <i class="fa-solid fa-book-open"></i> Case Study
              </a>
              <?php endif; ?>
            </div>
          </div>

          <!-- Right: Workflow -->
          <div class="col-lg-5">
            <div style="background:rgba(5,10,20,0.6);border:1px solid var(--border);border-radius:14px;padding:1.5rem;">
              <p style="font-size:0.68rem;font-weight:700;letter-spacing:0.15em;color:var(--text-muted);text-transform:uppercase;margin-bottom:1rem;text-align:center;">
                <i class="fa-solid fa-diagram-project me-1"></i> Project Workflow
              </p>
              <div style="display:flex;flex-direction:column;align-items:stretch;gap:0;">
                <?php
                $nodeColors = ['blue','violet','cyan','indigo','green','orange','pink','red'];
                $wfClasses  = ['trigger','process','ai','tool','api','action','output','trigger'];
                foreach ($p['workflow'] as $wi => $step):
                  $cls = $wfClasses[$wi % count($wfClasses)];
                ?>
                <div class="wf-flow-node <?= $cls ?>" style="width:100%;margin-bottom:0;transition:transform 0.2s;">
                  <span style="opacity:0.5;margin-right:6px;font-size:0.6rem;"><?= str_pad($wi+1, 2, '0', STR_PAD_LEFT) ?></span>
                  <?= h($step) ?>
                </div>
                <?php if ($wi < count($p['workflow']) - 1): ?>
                <div style="width:2px;height:14px;background:linear-gradient(180deg,var(--blue),var(--cyan));margin:0 auto;opacity:0.4;"></div>
                <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

        </div><!-- /row -->
      </div><!-- /glass-card -->
    </div>
    <?php endforeach; ?>

  </div>
</section>

<!-- CTA -->
<section class="section-padding-sm">
  <div class="container">
    <div class="glass-card p-4 p-md-5 text-center reveal" style="background:linear-gradient(135deg,rgba(59,130,246,0.06),rgba(139,92,246,0.06));">
      <h3 style="font-size:1.5rem;font-weight:800;margin-bottom:0.75rem;">
        Interested in <span class="text-gradient">Collaboration?</span>
      </h3>
      <p style="color:var(--text-secondary);margin-bottom:1.5rem;max-width:480px;margin-left:auto;margin-right:auto;">
        Open to internships, freelance, and project collaborations in AI, data analytics, and web development.
      </p>
      <a href="contact.php" class="btn-primary-custom" id="projectsCtaContact">
        <i class="fa-solid fa-paper-plane"></i> Get In Touch
      </a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

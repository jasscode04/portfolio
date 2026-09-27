<?php
// index.php — Home Page
$pageTitle = 'Jasprit Singh Sanu | AI Automation & Agentic AI Portfolio';
$pageDesc  = 'Portfolio of Jasprit Singh Sanu featuring AI automation, agentic AI, Python, APIs, data analytics, Power BI and software projects.';
require_once 'config.php';
require_once 'data/profile.php';
require_once 'data/projects.php';
$profile  = getProfile();
$projects = getAllProjects();
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="hero-section" id="hero">
  <!-- Background glows -->
  <div class="hero-glow hero-glow-1"></div>
  <div class="hero-glow hero-glow-2"></div>
  <div class="hero-glow hero-glow-3"></div>

  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center gy-5">

      <!-- Left: Text -->
      <div class="col-lg-7">
        <div class="hero-badge">
          <span class="hero-badge-dot"></span>
          AI Automation &amp; Agentic AI
        </div>

        <h1 class="hero-title">
          Hi, I'm<br>
          <span class="name-gradient"><?= h(OWNER_NAME) ?></span>
        </h1>

        <!-- Moving Typewriter Text Effect -->
        <div class="hero-typed-wrapper">
          <i class="fa-solid fa-microchip" style="color:var(--cyan);font-size:1.1rem;"></i>
          <span class="hero-typed-text" id="typedRoleText">AI AUTOMATION & AGENTIC AI ENTHUSIAST</span>
          <span class="hero-typed-cursor">|</span>
        </div>

        <p class="hero-sub"><?= h($profile['subtitle']) ?></p>

        <!-- CTA Buttons -->
        <div class="hero-btns">
          <a href="projects.php" class="btn-primary-custom" id="heroViewProjects">
            <i class="fa-solid fa-rocket"></i> View Projects
          </a>
          <a href="JASPRIT SINGH SANU PORTFOLIO.pdf" download="JASPRIT_SINGH_SANU_PORTFOLIO.pdf" class="btn-secondary-custom" id="heroDownloadResume">
            <i class="fa-solid fa-download"></i> Download Portfolio (PDF)
          </a>
          <a href="contact.php" class="btn-ghost" id="heroContact">
            <i class="fa-solid fa-paper-plane"></i> Contact Me
          </a>
        </div>

        <!-- Social Icons -->
        <div class="social-row">
          <?php if (GITHUB_URL): ?>
          <a href="<?= h(GITHUB_URL) ?>" target="_blank" rel="noopener"
             class="social-icon-btn" id="heroGithub" title="GitHub">
            <i class="fa-brands fa-github"></i>
          </a>
          <?php endif; ?>
          <?php if (LINKEDIN_URL): ?>
          <a href="<?= h(LINKEDIN_URL) ?>" target="_blank" rel="noopener"
             class="social-icon-btn" id="heroLinkedIn" title="LinkedIn">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
          <?php endif; ?>
          <a href="mailto:<?= h(OWNER_EMAIL) ?>"
             class="social-icon-btn" id="heroEmail" title="Email">
            <i class="fa-solid fa-envelope"></i>
          </a>
        </div>
      </div>

      <!-- Right: AI Flow Animation -->
      <div class="col-lg-5">
        <div class="hero-flow">
          <p class="text-center mb-3" style="font-size:0.7rem;letter-spacing:0.15em;color:var(--text-muted);text-transform:uppercase;font-weight:700;">AI Agent Workflow</p>
          <div class="flow-container">
            <div class="flow-node user"><i class="fa-solid fa-user me-2"></i>USER</div>
            <div class="flow-arrow"></div>
            <div class="flow-node agent"><i class="fa-solid fa-robot me-2"></i>AI AGENT</div>
            <div class="flow-arrow"></div>
            <div class="flow-node tools"><i class="fa-solid fa-wrench me-2"></i>TOOLS</div>
            <div class="flow-arrow"></div>
            <div class="flow-node api"><i class="fa-solid fa-plug me-2"></i>API</div>
            <div class="flow-arrow"></div>
            <div class="flow-node auto"><i class="fa-solid fa-gears me-2"></i>AUTOMATION</div>
            <div class="flow-arrow"></div>
            <div class="flow-node action"><i class="fa-solid fa-bolt me-2"></i>ACTION</div>
          </div>

          <!-- Core concept tags -->
          <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
            <?php foreach(['TRIGGER','THINK','ACT','AUTOMATE'] as $tag): ?>
            <span style="font-size:0.68rem;font-weight:700;letter-spacing:0.12em;padding:4px 12px;border-radius:6px;background:rgba(59,130,246,0.1);border:1px solid rgba(59,130,246,0.25);color:var(--blue-lt);">
              <?= $tag ?>
            </span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div><!-- /row -->
  </div><!-- /container -->
</section>

<!-- ============================================================
     STATS BAR
     ============================================================ -->
<section style="background:rgba(10,22,40,0.8);border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:2.5rem 0;">
  <div class="container">
    <div class="row text-center gy-3">
      <?php
      $stats = [
        ['5',  '+', 'Projects Built'],
        ['10', '+', 'Technologies Used'],
        ['3',  '+', 'AI Workflows'],
        ['1',  '',  'Year Learning AI'],
      ];
      foreach ($stats as $s):
      ?>
      <div class="col-6 col-md-3 reveal">
        <div class="stat-card">
          <div class="stat-number">
            <span class="stat-counter" data-target="<?= $s[0] ?>" data-suffix="<?= $s[1] ?>"><?= $s[0] . $s[1] ?></span>
          </div>
          <div class="stat-label"><?= $s[2] ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================================================
     FEATURED PROJECTS PREVIEW
     ============================================================ -->
<section class="section-padding" id="featured-projects">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">PORTFOLIO</span>
      <h2 class="section-title">Featured <span class="gradient-text">Projects</span></h2>
      <p class="section-desc mx-auto">End-to-end ML pipelines, AI automation workflows, dashboards and web systems.</p>
    </div>

    <div class="row g-4">
      <?php foreach (array_slice($projects, 0, 3) as $p): ?>
      <div class="col-lg-4 col-md-6 reveal">
        <div class="project-card <?= h($p['color']) ?>">
          <div class="project-icon <?= h($p['color']) ?>">
            <i class="fa-solid <?= h($p['icon']) ?>"></i>
          </div>
          <span class="project-badge <?= h($p['color']) ?>"><?= h($p['badge']) ?></span>
          <h3 class="project-title"><?= h($p['title']) ?></h3>
          <p class="project-desc"><?= h(substr($p['description'], 0, 120)) ?>…</p>
          <div class="tech-tags">
            <?php foreach (array_slice($p['tech'], 0, 4) as $t): ?>
            <span class="tech-tag"><?= h($t) ?></span>
            <?php endforeach; ?>
          </div>
          <div class="project-links mt-auto">
            <a href="projects.php#<?= h($p['slug']) ?>" class="project-link-btn">
              <i class="fa-solid fa-eye"></i> Details
            </a>
            <?php if ($p['github_url']): ?>
            <a href="<?= h($p['github_url']) ?>" class="project-link-btn" target="_blank" rel="noopener">
              <i class="fa-brands fa-github"></i> GitHub
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-5 reveal">
      <a href="projects.php" class="btn-primary-custom" id="homeViewAllProjects">
        <i class="fa-solid fa-grid-2"></i> View All Projects
      </a>
    </div>
  </div>
</section>

<!-- ============================================================
     WHAT I DO — CAPABILITIES STRIP
     ============================================================ -->
<section style="background:rgba(10,22,40,0.6);border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:80px 0;">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">CAPABILITIES</span>
      <h2 class="section-title">What I <span class="gradient-text">Build</span></h2>
    </div>
    <div class="row g-4">
      <?php
      $caps = [
        ['fa-robot',           'var(--blue)',   'Agentic AI',          'Multi-step AI agents that reason, use tools, integrate APIs, and take autonomous actions to solve problems.'],
        ['fa-network-wired',   'var(--violet)', 'Workflow Automation',  'n8n and Zapier workflows that connect apps, trigger events, and automate repetitive business processes.'],
        ['fa-chart-line',      'var(--cyan)',   'Data Analytics',       'End-to-end pipelines with Python, SQL, Pandas and Power BI dashboards for actionable business insights.'],
        ['fa-code',            'var(--green)',  'Web Development',       'Full-stack PHP/MySQL applications and Python Django projects with clean, responsive interfaces.'],
        ['fa-brain',           'var(--pink)',   'Machine Learning',     'ML models for classification, prediction, and data analysis with EDA, training, and evaluation.'],
        ['fa-plug',            'var(--blue)',   'API Integration',      'REST API design and integration — connecting services, automating data flows, and building smart connectors.'],
      ];
      foreach ($caps as $c):
      ?>
      <div class="col-lg-4 col-md-6 reveal">
        <div class="glass-card p-4 h-100">
          <div style="width:48px;height:48px;border-radius:12px;background:rgba(59,130,246,0.1);display:flex;align-items:center;justify-content:center;margin-bottom:1rem;">
            <i class="fa-solid <?= $c[0] ?>" style="font-size:1.25rem;color:<?= $c[1] ?>;"></i>
          </div>
          <h4 style="font-size:1rem;font-weight:700;margin-bottom:0.5rem;"><?= $c[2] ?></h4>
          <p style="font-size:0.85rem;color:var(--text-secondary);line-height:1.65;margin:0;"><?= $c[3] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================================================
     QUICK CTA
     ============================================================ -->
<section class="section-padding">
  <div class="container">
    <div class="glass-card p-5 text-center reveal" style="background:linear-gradient(135deg,rgba(59,130,246,0.08),rgba(139,92,246,0.08));">
      <h2 class="section-title mb-3">Let's <span class="gradient-text">Work Together</span></h2>
      <p class="section-desc mx-auto mb-4" style="max-width:500px;">
        Open to internships, projects, collaborations, and opportunities in AI automation, data analytics, and web development.
      </p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="contact.php" class="btn-primary-custom" id="homeCtaContact">
          <i class="fa-solid fa-paper-plane"></i> Get In Touch
        </a>
        <a href="resume.php" class="btn-secondary-custom" id="homeCtaResume">
          <i class="fa-solid fa-file-lines"></i> View Resume
        </a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

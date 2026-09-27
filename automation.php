<?php
// automation.php — Automation Lab + Agentic AI page
$pageTitle = 'Automation Lab & Agentic AI | Jasprit Singh Sanu';
$pageDesc  = 'Explore AI automation workflows, agentic AI concepts, n8n pipelines, API integrations and multi-step AI agent systems by Jasprit Singh Sanu.';
require_once 'config.php';
include 'includes/header.php';
include 'includes/navbar.php';

// ---- Automation Workflows Data ----
$workflows = [
  [
    'title' => 'AI Calling Agent',
    'icon'  => 'fa-phone-volume',
    'color' => 'blue',
    'desc'  => 'Automated outbound calling system using n8n, AI logic, and calling APIs for lead engagement.',
    'flow'  => [
      ['TRIGGER',  'trigger', 'fa-bolt',          'New lead enters CRM'],
      ['PROCESS',  'process', 'fa-gears',          'Validate & qualify lead'],
      ['AI LOGIC', 'ai',      'fa-robot',          'AI decides call strategy'],
      ['TOOL',     'tool',    'fa-phone',          'n8n calls telephony API'],
      ['API',      'api',     'fa-plug',           'Calling API executes call'],
      ['ACTION',   'action',  'fa-microphone',     'AI agent handles call'],
      ['OUTPUT',   'output',  'fa-database',       'Log outcome & schedule follow-up'],
    ],
  ],
  [
    'title' => 'Lead Qualification',
    'icon'  => 'fa-filter',
    'color' => 'violet',
    'desc'  => 'Multi-step workflow to score, qualify, and route incoming leads automatically.',
    'flow'  => [
      ['TRIGGER',  'trigger', 'fa-bolt',           'Form submission / webhook'],
      ['PROCESS',  'process', 'fa-gears',           'Extract lead data'],
      ['AI LOGIC', 'ai',      'fa-brain',           'Score lead with AI model'],
      ['TOOL',     'tool',    'fa-filter',          'Route by score threshold'],
      ['API',      'api',     'fa-plug',            'Push to CRM via API'],
      ['ACTION',   'action',  'fa-envelope',        'Send personalised email'],
      ['OUTPUT',   'output',  'fa-chart-bar',       'Update dashboard'],
    ],
  ],
  [
    'title' => 'AI Assistant',
    'icon'  => 'fa-comment-dots',
    'color' => 'cyan',
    'desc'  => 'Intelligent conversational assistant that retrieves data, calls APIs, and takes actions.',
    'flow'  => [
      ['TRIGGER',  'trigger', 'fa-comment',         'User sends message'],
      ['PROCESS',  'process', 'fa-gear',            'Parse intent & context'],
      ['AI LOGIC', 'ai',      'fa-robot',           'LLM reasoning'],
      ['TOOL',     'tool',    'fa-wrench',          'Select tool / function'],
      ['API',      'api',     'fa-plug',            'Call external API'],
      ['ACTION',   'action',  'fa-bolt',            'Execute action or query DB'],
      ['OUTPUT',   'output',  'fa-reply',           'Return structured response'],
    ],
  ],
  [
    'title' => 'API Automation',
    'icon'  => 'fa-network-wired',
    'color' => 'indigo',
    'desc'  => 'Scheduled and event-driven data sync between services via RESTful API integrations.',
    'flow'  => [
      ['TRIGGER',  'trigger', 'fa-clock',           'Cron schedule or webhook'],
      ['PROCESS',  'process', 'fa-code',            'Prepare request payload'],
      ['AI LOGIC', 'ai',      'fa-brain',           'Transform / enrich data'],
      ['TOOL',     'tool',    'fa-network-wired',   'HTTP client makes request'],
      ['API',      'api',     'fa-server',          'External API responds'],
      ['ACTION',   'action',  'fa-floppy-disk',     'Store or forward data'],
      ['OUTPUT',   'output',  'fa-check-circle',    'Confirm & notify'],
    ],
  ],
  [
    'title' => 'Data Processing',
    'icon'  => 'fa-chart-line',
    'color' => 'green',
    'desc'  => 'Automated data ingestion, cleaning, transformation and reporting pipeline.',
    'flow'  => [
      ['TRIGGER',  'trigger', 'fa-file-import',     'Data file uploaded / scheduled'],
      ['PROCESS',  'process', 'fa-broom',           'Clean & validate data'],
      ['AI LOGIC', 'ai',      'fa-magnifying-glass','Anomaly detection & EDA'],
      ['TOOL',     'tool',    'fa-python',          'Pandas / NumPy transforms'],
      ['API',      'api',     'fa-database',        'Load to MySQL / warehouse'],
      ['ACTION',   'action',  'fa-chart-bar',       'Generate Power BI report'],
      ['OUTPUT',   'output',  'fa-bell',            'Alert stakeholders'],
    ],
  ],
  [
    'title' => 'Notification System',
    'icon'  => 'fa-bell',
    'color' => 'orange',
    'desc'  => 'Event-triggered multi-channel notifications via email, SMS, and messaging apps.',
    'flow'  => [
      ['TRIGGER',  'trigger', 'fa-bolt',            'System event / threshold breach'],
      ['PROCESS',  'process', 'fa-gear',            'Identify notification type'],
      ['AI LOGIC', 'ai',      'fa-brain',           'Personalise message with AI'],
      ['TOOL',     'tool',    'fa-envelope',        'Select channel (email/SMS)'],
      ['API',      'api',     'fa-plug',            'Call messaging API'],
      ['ACTION',   'action',  'fa-paper-plane',     'Send notification'],
      ['OUTPUT',   'output',  'fa-check',           'Log delivery status'],
    ],
  ],
];

// ---- Agentic AI Concepts ----
$agentConcepts = [
  ['fa-robot',            'var(--blue)',   'AI Agent',            'Autonomous software that perceives its environment, makes decisions, and takes actions toward a goal.'],
  ['fa-wrench',           'var(--violet)', 'Tool Calling',        'Agents select and invoke specific tools (search, APIs, calculators) to gather information or take action.'],
  ['fa-plug',             'var(--cyan)',   'API Integration',      'Seamless connection to external services — databases, messaging, analytics — through RESTful APIs.'],
  ['fa-diagram-project',  'var(--green)',  'Multi-step Workflows', 'Agents break complex tasks into steps, executing them sequentially or in parallel with state tracking.'],
  ['fa-brain',            'var(--pink)',   'Context & Memory',     'Agents maintain context across turns and store long-term memory for coherent, goal-directed behaviour.'],
  ['fa-scale-balanced',   'var(--blue)',   'Decision Making',      'Reasoning engines evaluate options, weigh trade-offs, and select optimal actions based on objectives.'],
  ['fa-database',         'var(--violet)', 'Data Retrieval',      'Dynamic querying of databases and knowledge bases to ground agent responses in real, current information.'],
  ['fa-person-circle-check','var(--cyan)', 'Human-in-the-Loop',   'Agents escalate critical decisions to humans, ensuring oversight, safety and ethical compliance.'],
];
?>

<!-- Page Header -->
<section class="page-header">
  <div class="page-header-glow"></div>
  <div class="container position-relative" style="z-index:1;">
    <span class="section-label">AI AUTOMATION</span>
    <h1 class="section-title mt-2">Automation <span class="gradient-text">Lab</span></h1>
    <p class="section-desc">Visual workflow designs for AI automation, API integrations and intelligent systems.</p>
  </div>
</section>

<!-- ============================================================
     AUTOMATION WORKFLOWS GRID
     ============================================================ -->
<section class="section-padding">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">WORKFLOWS</span>
      <h2 class="section-title">AI <span class="gradient-text">Workflow Designs</span></h2>
      <p class="section-desc mx-auto">Each workflow shows how I design automation pipelines — from trigger to outcome.</p>
    </div>

    <div class="row g-4">
      <?php foreach ($workflows as $wf): ?>
      <div class="col-lg-4 col-md-6 reveal">
        <div class="workflow-card h-100">
          <!-- Header -->
          <div class="d-flex align-items-center gap-3 mb-2">
            <div class="project-icon <?= h($wf['color']) ?>" style="width:42px;height:42px;min-width:42px;border-radius:10px;font-size:1rem;">
              <i class="fa-solid <?= h($wf['icon']) ?>"></i>
            </div>
            <h3 style="font-size:0.95rem;font-weight:700;margin:0;"><?= h($wf['title']) ?></h3>
          </div>
          <p style="font-size:0.8rem;color:var(--text-secondary);line-height:1.6;margin-bottom:1rem;"><?= h($wf['desc']) ?></p>

          <!-- Flow Nodes -->
          <div class="wf-flow">
            <?php foreach ($wf['flow'] as $fi => $node): ?>
            <div class="wf-flow-node <?= h($node[1]) ?>" style="display:flex;align-items:center;gap:8px;">
              <i class="fa-solid <?= h($node[2]) ?>" style="font-size:0.7rem;width:14px;text-align:center;opacity:0.8;"></i>
              <div>
                <span style="font-size:0.58rem;opacity:0.55;display:block;letter-spacing:0.1em;"><?= h($node[0]) ?></span>
                <span style="font-size:0.75rem;"><?= h($node[3]) ?></span>
              </div>
            </div>
            <?php if ($fi < count($wf['flow']) - 1): ?>
            <div class="wf-connector"></div>
            <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<hr class="divider-custom">

<!-- ============================================================
     AGENTIC AI SECTION
     ============================================================ -->
<section class="section-padding" id="agentic">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">THE NEXT LEVEL</span>
      <h2 class="section-title">From Automation to <span class="gradient-text">Agentic AI</span></h2>
      <p class="section-desc mx-auto">
        Automation executes fixed steps. Agentic AI <em>reasons, plans, adapts</em>, and acts intelligently to achieve goals.
      </p>
    </div>

    <div class="row g-5 align-items-center mb-5">

      <!-- Left: Vertical Agent Flow -->
      <div class="col-lg-5 reveal">
        <div style="background:rgba(5,10,20,0.7);border:1px solid var(--border);border-radius:20px;padding:2rem;">
          <p style="font-size:0.7rem;font-weight:700;letter-spacing:0.15em;color:var(--text-muted);text-transform:uppercase;text-align:center;margin-bottom:1.5rem;">
            <i class="fa-solid fa-robot me-1"></i> Agent Loop
          </p>
          <?php
          $agentLoop = [
            ['fa-user',         'user',    'USER',       'Goal or task input'],
            ['fa-robot',        'agent',   'AGENT',      'Reasoning & planning'],
            ['fa-lightbulb',    'process', 'REASONING',  'Decompose into subtasks'],
            ['fa-wrench',       'tool',    'TOOLS',      'Select & call tools'],
            ['fa-plug',         'api',     'API / DATA', 'Fetch external info'],
            ['fa-database',     'ai',      'DATABASE',   'Store / retrieve memory'],
            ['fa-bolt',         'action',  'ACTION',     'Execute task step'],
            ['fa-flag-checkered','output', 'RESULT',     'Deliver outcome to user'],
          ];
          foreach ($agentLoop as $ai => $step):
          ?>
          <div style="display:flex;align-items:center;gap:12px;padding:8px 12px;border-radius:10px;border:1px solid var(--border);background:rgba(15,28,55,0.7);margin-bottom:4px;">
            <div style="width:32px;height:32px;border-radius:8px;background:rgba(59,130,246,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <i class="fa-solid <?= $step[0] ?>" style="font-size:0.8rem;color:var(--blue-lt);"></i>
            </div>
            <div>
              <div style="font-size:0.65rem;font-weight:700;letter-spacing:0.1em;color:var(--text-muted);text-transform:uppercase;"><?= $step[2] ?></div>
              <div style="font-size:0.8rem;color:var(--text-secondary);"><?= $step[3] ?></div>
            </div>
          </div>
          <?php if ($ai < count($agentLoop) - 1): ?>
          <div style="width:2px;height:10px;background:linear-gradient(180deg,var(--blue),var(--violet));margin-left:28px;opacity:0.4;"></div>
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right: Explanation -->
      <div class="col-lg-7 reveal">
        <h3 style="font-size:1.3rem;font-weight:700;margin-bottom:1rem;">
          What is <span class="text-gradient">Agentic AI</span>?
        </h3>
        <p style="color:var(--text-secondary);line-height:1.8;margin-bottom:1rem;">
          Agentic AI refers to AI systems that act with a degree of autonomy to achieve complex, multi-step goals.
          Unlike traditional automation (which follows fixed scripts), agents <strong style="color:var(--text-primary);">reason</strong>,
          <strong style="color:var(--text-primary);">plan</strong>, and <strong style="color:var(--text-primary);">adapt</strong> dynamically.
        </p>
        <p style="color:var(--text-secondary);line-height:1.8;margin-bottom:1.5rem;">
          I am actively learning and building with agentic AI concepts — studying how agents use tool calling,
          context windows, memory systems, and API integrations to solve real-world problems autonomously.
        </p>

        <!-- Key differences table -->
        <div style="background:rgba(5,10,20,0.6);border:1px solid var(--border);border-radius:12px;overflow:hidden;">
          <div style="display:grid;grid-template-columns:1fr 1fr;border-bottom:1px solid var(--border);">
            <div style="padding:10px 16px;font-size:0.72rem;font-weight:700;letter-spacing:0.1em;color:var(--text-muted);text-transform:uppercase;border-right:1px solid var(--border);">
              Traditional Automation
            </div>
            <div style="padding:10px 16px;font-size:0.72rem;font-weight:700;letter-spacing:0.1em;color:var(--cyan);text-transform:uppercase;">
              Agentic AI
            </div>
          </div>
          <?php
          $compare = [
            ['Fixed, rigid steps',     'Dynamic, adaptive reasoning'],
            ['Pre-defined logic',       'Goal-driven planning'],
            ['No tool selection',       'Tool calling & API use'],
            ['No memory',              'Context & long-term memory'],
            ['Single-step execution',   'Multi-step autonomous loops'],
            ['Manual error handling',   'Self-correcting behaviour'],
          ];
          foreach ($compare as $row):
          ?>
          <div style="display:grid;grid-template-columns:1fr 1fr;border-bottom:1px solid rgba(59,130,246,0.08);">
            <div style="padding:8px 16px;font-size:0.8rem;color:var(--text-muted);border-right:1px solid var(--border);">
              <?= h($row[0]) ?>
            </div>
            <div style="padding:8px 16px;font-size:0.8rem;color:var(--text-secondary);">
              <i class="fa-solid fa-check" style="color:var(--green);margin-right:6px;font-size:0.7rem;"></i><?= h($row[1]) ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Concepts Grid -->
    <div class="text-center mb-4 reveal">
      <h3 class="section-title" style="font-size:1.6rem;">Core <span class="gradient-text">Agentic Concepts</span></h3>
    </div>
    <div class="row g-3">
      <?php foreach ($agentConcepts as $concept): ?>
      <div class="col-lg-3 col-md-6 reveal">
        <div class="agent-flow-card h-100">
          <div class="agent-flow-icon">
            <i class="fa-solid <?= h($concept[0]) ?>" style="color:<?= $concept[1] ?>;"></i>
          </div>
          <div class="agent-flow-title"><?= h($concept[2]) ?></div>
          <div class="agent-flow-desc"><?= h($concept[3]) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Tools & Platforms -->
<section style="background:rgba(10,22,40,0.6);border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:60px 0;">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <span class="section-label">TOOLS</span>
      <h2 class="section-title" style="font-size:1.8rem;">Automation <span class="gradient-text">Tools & Platforms</span></h2>
    </div>
    <div class="row g-3 justify-content-center">
      <?php
      $tools = [
        ['fa-network-wired',   'n8n',             'Visual workflow automation with code flexibility'],
        ['fa-bolt',            'Zapier',           'No-code automation connecting 5000+ apps'],
        ['fa-python',          'Python',           'Scripts, APIs, ML models and data pipelines'],
        ['fa-plug',            'REST APIs',        'HTTP-based integrations for any service'],
        ['fa-database',        'MySQL / SQL',      'Structured data storage and retrieval'],
        ['fa-robot',           'LLM Integration',  'GPT-class models for reasoning and generation'],
        ['fa-chart-bar',       'Power BI',         'Data visualisation and business intelligence'],
        ['fa-code-branch',     'GitHub',           'Version control and project management'],
      ];
      foreach ($tools as $tool):
      ?>
      <div class="col-lg-3 col-md-6 reveal">
        <div class="glass-card p-3 text-center h-100">
          <i class="fa-solid <?= h($tool[0]) ?>" style="font-size:1.5rem;color:var(--blue-lt);margin-bottom:0.6rem;display:block;"></i>
          <div style="font-size:0.88rem;font-weight:700;margin-bottom:0.25rem;"><?= h($tool[1]) ?></div>
          <div style="font-size:0.75rem;color:var(--text-muted);line-height:1.5;"><?= h($tool[2]) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

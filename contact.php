<?php
// contact.php — Contact Form with MySQL storage
$pageTitle = 'Contact | Jasprit Singh Sanu — AI Automation Portfolio';
$pageDesc  = 'Contact Jasprit Singh Sanu for internships, collaborations, AI projects, or inquiries.';
require_once 'config.php';

// ---------- Form Processing ----------
$formSuccess = false;
$formError   = '';
$fieldErrors = [];
$formData    = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF check
    $token = $_POST['csrf_token'] ?? '';
    if (!verifyCsrfToken($token)) {
        $formError = 'Invalid form submission. Please refresh the page and try again.';
    } else {
        // Sanitize inputs
        $name    = trim($_POST['name']    ?? '');
        $email   = trim($_POST['email']   ?? '');
        $message = trim($_POST['message'] ?? '');

        $formData = ['name' => $name, 'email' => $email, 'message' => $message];

        // Validate
        if (strlen($name) < 2 || strlen($name) > 120) {
            $fieldErrors['name'] = 'Name must be between 2 and 120 characters.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $fieldErrors['email'] = 'Please enter a valid email address.';
        }
        if (strlen($message) < 2 || strlen($message) > 5000) {
            $fieldErrors['message'] = 'Please enter a message (at least 2 characters).';
        }

        if (empty($fieldErrors)) {
            $dbSuccess = false;
            $db = getDB();
            if ($db !== null) {
                try {
                    $stmt = $db->prepare(
                        'INSERT INTO contact_messages (name, email, message, ip_address, created_at)
                         VALUES (:name, :email, :message, :ip, NOW())'
                    );
                    $stmt->execute([
                        ':name'    => $name,
                        ':email'   => $email,
                        ':message' => $message,
                        ':ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
                    ]);
                    $dbSuccess = true;
                } catch (PDOException $e) {
                    error_log("Contact form DB error: " . $e->getMessage());
                }
            }

            // Send email notification via PHPMailer
            require_once BASE_PATH . 'Mailer.php';
            $mailer = new Mailer();
            $mailSent = $mailer->sendContactMessage($name, $email, $message, 'codecpp019@gmail.com');

            if ($dbSuccess || $mailSent) {
                $formSuccess = true;
                $formData    = ['name' => '', 'email' => '', 'message' => ''];
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            } else {
                $formError = 'Unable to process your message at this moment. Please reach out directly to ' . OWNER_EMAIL;
            }
        }
    }
}

$csrfToken = generateCsrfToken();
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header">
  <div class="page-header-glow"></div>
  <div class="container position-relative" style="z-index:1;">
    <span class="section-label">REACH OUT</span>
    <h1 class="section-title mt-2">Get In <span class="gradient-text">Touch</span></h1>
    <p class="section-desc">Open to internships, collaborations, projects, and opportunities. Let's connect.</p>
  </div>
</section>

<!-- ============================================================
     CONTACT SECTION
     ============================================================ -->
<section class="section-padding">
  <div class="container">
    <div class="row g-5 justify-content-center">

      <!-- Contact Info Cards -->
      <div class="col-lg-4 reveal">
        <h2 style="font-size:1.25rem;font-weight:700;margin-bottom:1.5rem;">Contact <span class="text-gradient">Information</span></h2>

        <?php
        $contactCards = [
          ['fa-envelope',      'var(--blue)',   'Email',     OWNER_EMAIL,   'mailto:' . OWNER_EMAIL],
          ['fa-phone',         'var(--cyan)',   'Phone',     OWNER_PHONE,   null],
          ['fa-location-dot',  'var(--violet)', 'Location',  OWNER_LOCATION, null],
        ];
        foreach ($contactCards as $cc):
        ?>
        <div class="glass-card p-4 mb-3 d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:11px;background:rgba(59,130,246,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa-solid <?= $cc[0] ?>" style="color:<?= $cc[1] ?>;font-size:1rem;"></i>
          </div>
          <div>
            <p style="font-size:0.7rem;font-weight:700;letter-spacing:0.1em;color:var(--text-muted);text-transform:uppercase;margin-bottom:2px;"><?= h($cc[2]) ?></p>
            <?php if ($cc[4]): ?>
            <a href="<?= h($cc[4]) ?>" style="font-size:0.875rem;color:var(--text-primary);text-decoration:none;"><?= h($cc[3]) ?></a>
            <?php else: ?>
            <p style="font-size:0.875rem;color:var(--text-primary);margin:0;"><?= h($cc[3]) ?></p>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>

        <!-- Social Links -->
        <div class="glass-card p-4">
          <p style="font-size:0.7rem;font-weight:700;letter-spacing:0.1em;color:var(--text-muted);text-transform:uppercase;margin-bottom:1rem;">Social Profiles</p>
          <div class="d-flex gap-3">
            <?php if (GITHUB_URL): ?>
            <a href="<?= h(GITHUB_URL) ?>" target="_blank" rel="noopener" class="social-icon-btn" id="contactGithub" title="GitHub">
              <i class="fa-brands fa-github"></i>
            </a>
            <?php endif; ?>
            <?php if (LINKEDIN_URL): ?>
            <a href="<?= h(LINKEDIN_URL) ?>" target="_blank" rel="noopener" class="social-icon-btn" id="contactLinkedIn" title="LinkedIn">
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
            <?php endif; ?>
            <a href="mailto:<?= h(OWNER_EMAIL) ?>" class="social-icon-btn" id="contactEmail" title="Send Email">
              <i class="fa-solid fa-envelope"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-7 reveal">
        <div class="glass-card p-4 p-md-5">
          <h2 style="font-size:1.25rem;font-weight:700;margin-bottom:0.3rem;">Send a <span class="text-gradient">Message</span></h2>
          <p style="font-size:0.85rem;color:var(--text-muted);margin-bottom:1.75rem;">I usually respond within 24 hours.</p>

          <!-- Success Message -->
          <?php if ($formSuccess): ?>
          <div class="alert-custom alert-success-custom mb-4">
            <i class="fa-solid fa-circle-check"></i>
            <span>Thank you! Your message has been received. I'll get back to you soon.</span>
          </div>
          <?php endif; ?>

          <!-- Error Message -->
          <?php if ($formError): ?>
          <div class="alert-custom alert-error-custom mb-4">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span><?= h($formError) ?></span>
          </div>
          <?php endif; ?>

          <!-- The Form -->
          <form method="POST" action="contact.php" id="contactForm" novalidate>
            <input type="hidden" name="csrf_token" value="<?= h($csrfToken) ?>">

            <!-- Name -->
            <div class="mb-3">
              <label class="form-label-custom" for="name">Full Name <span style="color:var(--red);">*</span></label>
              <input type="text"
                     class="form-control form-control-custom <?= isset($fieldErrors['name']) ? 'is-invalid' : '' ?>"
                     id="name" name="name"
                     placeholder="Jasprit Singh Sanu"
                     value="<?= h($formData['name']) ?>"
                     maxlength="120" required>
              <?php if (isset($fieldErrors['name'])): ?>
              <div class="invalid-feedback" style="color:var(--red);font-size:0.78rem;margin-top:4px;"><?= h($fieldErrors['name']) ?></div>
              <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label class="form-label-custom" for="email">Email Address <span style="color:var(--red);">*</span></label>
              <input type="email"
                     class="form-control form-control-custom <?= isset($fieldErrors['email']) ? 'is-invalid' : '' ?>"
                     id="email" name="email"
                     placeholder="you@example.com"
                     value="<?= h($formData['email']) ?>"
                     maxlength="255" required>
              <?php if (isset($fieldErrors['email'])): ?>
              <div class="invalid-feedback" style="color:var(--red);font-size:0.78rem;margin-top:4px;"><?= h($fieldErrors['email']) ?></div>
              <?php endif; ?>
            </div>

            <!-- Message -->
            <div class="mb-4">
              <label class="form-label-custom" for="message">Message <span style="color:var(--red);">*</span></label>
              <textarea class="form-control form-control-custom <?= isset($fieldErrors['message']) ? 'is-invalid' : '' ?>"
                        id="message" name="message"
                        placeholder="Tell me about your project, opportunity, or just say hello..."
                        rows="6" maxlength="5000" required><?= h($formData['message']) ?></textarea>
              <?php if (isset($fieldErrors['message'])): ?>
              <div class="invalid-feedback" style="color:var(--red);font-size:0.78rem;margin-top:4px;"><?= h($fieldErrors['message']) ?></div>
              <?php endif; ?>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-primary-custom w-100 justify-content-center" id="contactSubmit">
              <i class="fa-solid fa-paper-plane"></i> Send Message
            </button>
          </form>
        </div>
      </div>

    </div><!-- /row -->
  </div>
</section>

<!-- Open To section -->
<section style="background:rgba(10,22,40,0.6);border-top:1px solid var(--border);padding:60px 0;">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <h3 class="section-title" style="font-size:1.6rem;">Open <span class="gradient-text">To</span></h3>
    </div>
    <div class="row g-3 justify-content-center">
      <?php
      $openTo = [
        ['fa-briefcase',   'Internships',        'Looking for AI, data analytics, or web development internships'],
        ['fa-handshake',   'Collaborations',     'Open source, research projects, and joint ventures'],
        ['fa-lightbulb',   'AI Projects',        'Building automation, agentic AI, or data pipeline projects'],
        ['fa-graduation-cap','Learning',          'Connecting with mentors and communities in AI and tech'],
      ];
      foreach ($openTo as $ot):
      ?>
      <div class="col-md-6 col-lg-3 reveal">
        <div class="glass-card p-4 text-center h-100">
          <i class="fa-solid <?= h($ot[0]) ?>" style="font-size:1.5rem;color:var(--blue-lt);margin-bottom:0.6rem;display:block;"></i>
          <div style="font-size:0.9rem;font-weight:700;margin-bottom:0.3rem;"><?= h($ot[1]) ?></div>
          <div style="font-size:0.78rem;color:var(--text-muted);line-height:1.5;"><?= h($ot[2]) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

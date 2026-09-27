/* ============================================================
   JASPRIT SINGH SANU — Portfolio JS
   ============================================================ */

/* ---------- Navbar Scroll Effect ---------- */
(function () {
  const navbar = document.getElementById('mainNavbar');
  if (!navbar) return;
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 40);
  });
})();

/* ---------- Active Nav Link ---------- */
(function () {
  const links = document.querySelectorAll('.nav-link-custom');
  const current = location.pathname.split('/').pop() || 'index.php';
  links.forEach(link => {
    const href = link.getAttribute('href') || '';
    if (href === current || (current === '' && href === 'index.php')) {
      link.classList.add('active');
    }
  });
})();

/* ---------- Scroll Reveal ---------- */
(function () {
  const els = document.querySelectorAll('.reveal');
  if (!els.length) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 80);
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  els.forEach(el => io.observe(el));
})();

/* ---------- Skill Bar Animation ---------- */
(function () {
  const bars = document.querySelectorAll('.skill-bar-fill');
  if (!bars.length) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const bar = e.target;
        bar.style.width = bar.dataset.width + '%';
        io.unobserve(bar);
      }
    });
  }, { threshold: 0.3 });
  bars.forEach(bar => io.observe(bar));
})();

/* ---------- Animated Counter ---------- */
function animateCounter(el) {
  const target = parseInt(el.dataset.target, 10);
  const duration = 1800;
  const step = target / (duration / 16);
  let current = 0;
  const timer = setInterval(() => {
    current += step;
    if (current >= target) {
      current = target;
      clearInterval(timer);
    }
    el.textContent = Math.floor(current) + (el.dataset.suffix || '');
  }, 16);
}

(function () {
  const counters = document.querySelectorAll('.stat-counter');
  if (!counters.length) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        animateCounter(e.target);
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(c => io.observe(c));
})();

/* ---------- Hero Flow Animation ---------- */
(function () {
  const nodes = document.querySelectorAll('.flow-node');
  if (!nodes.length) return;
  let idx = 0;
  setInterval(() => {
    nodes.forEach(n => n.style.boxShadow = '');
    const color = nodes[idx].classList.contains('user')   ? 'rgba(59,130,246,0.6)'  :
                  nodes[idx].classList.contains('agent')  ? 'rgba(139,92,246,0.6)'  :
                  nodes[idx].classList.contains('tools')  ? 'rgba(6,182,212,0.6)'   :
                  nodes[idx].classList.contains('api')    ? 'rgba(99,102,241,0.6)'  :
                  nodes[idx].classList.contains('auto')   ? 'rgba(16,185,129,0.6)'  :
                                                            'rgba(236,72,153,0.6)';
    nodes[idx].style.boxShadow = `0 0 20px ${color}`;
    idx = (idx + 1) % nodes.length;
  }, 600);
})();

/* ---------- Smooth Scroll for anchor links ---------- */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

/* ---------- Contact Form Validation & Submission ---------- */
(function () {
  const form = document.getElementById('contactForm');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    let valid = true;

    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const message = document.getElementById('message');

    [name, email, message].forEach(el => {
      if (el) el.classList.remove('is-invalid');
    });

    if (name && (!name.value.trim() || name.value.trim().length < 2)) {
      name.classList.add('is-invalid');
      valid = false;
    }

    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailRe.test(email.value.trim())) {
      email.classList.add('is-invalid');
      valid = false;
    }

    if (message && (!message.value.trim() || message.value.trim().length < 2)) {
      message.classList.add('is-invalid');
      valid = false;
    }

    if (!valid) {
      e.preventDefault();
      return;
    }

    // Show visual loading state on submit button
    const submitBtn = document.getElementById('contactSubmit');
    if (submitBtn) {
      submitBtn.style.pointerEvents = 'none';
      submitBtn.style.opacity = '0.75';
      submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending Message...';
    }
  });
})();

/* ---------- Workflow Node Hover Highlight ---------- */
document.querySelectorAll('.wf-flow-node').forEach(node => {
  node.addEventListener('mouseenter', function () {
    this.style.transform = 'translateX(6px)';
  });
  node.addEventListener('mouseleave', function () {
    this.style.transform = '';
  });
});

/* ---------- Tooltip init (Bootstrap) ---------- */
(function () {
  const tooltipEls = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  tooltipEls.forEach(el => {
    if (typeof bootstrap !== 'undefined') {
      new bootstrap.Tooltip(el);
    }
  });
})();

/* ---------- Hero Dynamic Typewriter Animation ---------- */
(function () {
  const typedEl = document.getElementById('typedRoleText');
  if (!typedEl) return;

  const roles = [
    'AI AUTOMATION & AGENTIC AI ENTHUSIAST',
    'PYTHON & DATA ANALYTICS DEVELOPER',
    'WORKFLOW AUTOMATION & N8N ENGINEER',
    'POWER BI & DATABASE ANALYST',
    'FULL-STACK PHP & MYSQL DEVELOPER'
  ];

  let roleIdx = 0;
  let charIdx = 0;
  let isDeleting = false;
  let speed = 70;

  function typeEffect() {
    const currentRole = roles[roleIdx];

    if (isDeleting) {
      typedEl.textContent = currentRole.substring(0, charIdx - 1);
      charIdx--;
      speed = 35;
    } else {
      typedEl.textContent = currentRole.substring(0, charIdx + 1);
      charIdx++;
      speed = 70;
    }

    if (!isDeleting && charIdx === currentRole.length) {
      isDeleting = true;
      speed = 2000; // Pause at full string
    } else if (isDeleting && charIdx === 0) {
      isDeleting = false;
      roleIdx = (roleIdx + 1) % roles.length;
      speed = 350; // Pause before next role
    }

    setTimeout(typeEffect, speed);
  }

  typeEffect();
})();

# Jasprit Singh Sanu — AI Portfolio

**Live URL (local):** `http://localhost/portfolio/`

> Dark, futuristic PHP portfolio showcasing AI automation, agentic AI, data analytics, and web development projects.

---

## ⚙️ Tech Stack

| Layer       | Tech                          |
|-------------|-------------------------------|
| Server      | Apache (XAMPP)                |
| Backend     | PHP 8+                        |
| Database    | MySQL (via XAMPP)             |
| Frontend    | HTML5, CSS3, Vanilla JS       |
| UI Library  | Bootstrap 5.3                 |
| Icons       | Font Awesome 6                |
| Fonts       | Google Fonts (Inter, JetBrains Mono) |

---

## 🚀 Installation (Step-by-Step)

### STEP 1 — Start XAMPP

1. Open **XAMPP Control Panel**
2. Start **Apache** and **MySQL**

---

### STEP 2 — Copy the Project Folder

Copy the `portfolio` folder into:

```
C:\xampp\htdocs\
```

Final path: `C:\xampp\htdocs\portfolio\`

---

### STEP 3 — Open phpMyAdmin

Open your browser and go to:

```
http://localhost/phpmyadmin/
```

---

### STEP 4 — Create the Database

1. Click **"New"** in the left sidebar
2. Enter database name: `jasprit_portfolio`
3. Select collation: `utf8mb4_unicode_ci`
4. Click **"Create"**

---

### STEP 5 — Import the SQL Schema

1. Select the `jasprit_portfolio` database
2. Click the **"Import"** tab
3. Click **"Choose File"** → select `database.sql` from the project folder
4. Click **"Go"**

---

### STEP 6 — Configure Database Credentials

Open `config.php` and update if needed:

```php
define('DB_HOST',  'localhost');
define('DB_USER',  'root');
define('DB_PASS',  '');          // default XAMPP = empty
define('DB_NAME',  'jasprit_portfolio');
```

> Default XAMPP credentials: user = `root`, password = *(empty)*

---

### STEP 7 — Open the Portfolio

```
http://localhost/portfolio/
```

---

## 📁 Project Structure

```
portfolio/
├── index.php           — Home page
├── about.php           — About & Skills
├── projects.php        — All 5 projects
├── automation.php      — Automation Lab + Agentic AI
├── resume.php          — Full resume page
├── contact.php         — Contact form (MySQL)
├── config.php          — ⭐ Central configuration
├── functions.php       — Helper functions
├── database.sql        — Database schema
├── .htaccess           — Apache rewrite rules
│
├── data/
│   ├── profile.php     — ⭐ Edit personal info here
│   └── projects.php    — ⭐ Edit project data here
│
├── includes/
│   ├── header.php      — <head> HTML
│   ├── navbar.php      — Navigation bar
│   └── footer.php      — Footer + JS
│
├── assets/
│   ├── css/style.css   — Main stylesheet
│   ├── js/script.js    — Animations & interactions
│   └── images/
│       └── profile/    — Place profile.jpg here
│
├── documents/
│   └── resume.pdf      — ⭐ Place your PDF here
│
└── uploads/            — File uploads directory
```

---

## ✏️ How to Customize

### Change Personal Info
Edit **`config.php`**:
```php
define('OWNER_NAME',    'Your Name');
define('OWNER_EMAIL',   'your@email.com');
define('GITHUB_URL',    'https://github.com/yourusername');
define('LINKEDIN_URL',  'https://linkedin.com/in/yourprofile');
```

### Change About / Skills / Interests
Edit **`data/profile.php`** — all personal details, skills, languages, and certificates.

### Change Projects
Edit **`data/projects.php`** — all 5 projects with descriptions, tech, GitHub URLs, etc.

### Add Profile Photo
Place your photo at:
```
assets/images/profile/profile.jpg
```
Recommended: 400×400 px, square, professional.

### Add Resume PDF
Place your resume at:
```
documents/resume.pdf
```
The download button will automatically appear.

### Change Project GitHub / Live Demo Links
In **`data/projects.php`**, set:
```php
'github_url' => 'https://github.com/yourrepo',
'live_url'   => 'https://yourapp.com',
```
Leave empty `''` to hide the button.

---

## 🔐 Security Features

- PDO with prepared statements
- CSRF token on contact form
- `htmlspecialchars()` on all outputs
- Sensitive files protected via `.htaccess`
- No credentials hardcoded in page files

---

## 🌐 Pages

| URL                             | Page           |
|---------------------------------|----------------|
| `/portfolio/`                   | Home           |
| `/portfolio/about.php`          | About & Skills |
| `/portfolio/projects.php`       | All Projects   |
| `/portfolio/automation.php`     | Automation Lab + Agentic AI |
| `/portfolio/resume.php`         | Resume         |
| `/portfolio/contact.php`        | Contact Form   |

---

## ✅ Checklist

- [x] PHP + XAMPP compatible
- [x] All 5 projects included
- [x] Automation Lab with 6 workflows
- [x] Agentic AI section
- [x] Resume page with PDF download link
- [x] Contact form with MySQL + CSRF
- [x] Responsive (mobile/tablet/desktop)
- [x] Dark AI-themed design
- [x] No npm / Node.js required
- [x] No Composer required
- [x] Clean URLs via .htaccess

---

## 📄 License

Personal portfolio — all rights reserved to **Jasprit Singh Sanu**.

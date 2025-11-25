<!DOCTYPE html>
<html lang="en">

<head>
<title>Admin Interface</title>

<style>

/* ===== GENERAL ===== */
body {
  background-image: url('<?php echo base_url("assets/portfolio_image/emeraldgreen.jpg"); ?>');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  font-size: 16px;
  margin: 0;
  padding-top: 80px; /* Adjusted to match navbar height */
}

.welcome-message {
  text-align: left;
  margin-top: 0;
  margin-left: 0;
  width: auto;
}

/* ===== NAVBAR HEADER ===== */
.header {
  background-color: #fff;
  color: #222;
  font-family: 'Poppins', sans-serif;
  padding: 0;
  text-align: center;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 100;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* ===== TABLE ===== */
.table {
  width: 100%;
  margin: 20px auto;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
}
.table td, .table th {
  word-wrap: break-word;
  white-space: normal;
  padding: 12px;
  vertical-align: middle;
}

/* ===== HERO SECTION ===== */
.hero-section {
  color: white;
  padding: 80px 20px;
  text-align: center;
  min-height: 80vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
  background-size: cover;
  background-position: center;
}

/* ===== NAVBAR TOGGLER ANIMATION ===== */
@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}
.navbar-toggler:hover { animation: pulse 1s infinite; }

/* Sidebar column spacing */
.col-md-4 {
  margin-bottom: 30px;
}

/* Footer */
.footer {
  background-color: #f8f9fa;
  padding: 20px;
  text-align: center;
  font-size: 1em;
  margin-top: 50px;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 991px) {
  .hero-section { min-height: 60vh; padding: 60px 15px; }
  .hero-section h1 { font-size: 2rem; }
}

@media (max-width: 768px) {
  body { font-size: 14px; }
  .navbar-brand { font-size: 1.2rem; }
  .navbar-nav .nav-link { font-size: 0.9rem; }
}

@media (max-width: 576px) {
  .hero-section h1 { font-size: 1.5rem; }
  .footer { font-size: 0.9rem; }
}

</style>
</head>


<body>

<header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/admin_Main'); ?>">
      DigiCrud101
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center me-3">

           <!-- ===== SEARCH INPUT ===== -->
        <li class="nav-item me-2">
          <form class="d-flex" action="<?= base_url('index.php/admin_Main/search'); ?>" method="get">
            <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm btn-primary" type="submit">Go</button>
          </form>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main'); ?>">Home</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_projects'); ?>">Projects</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">
              👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
          </a>
        </li>

        <!-- ===== MENU DROPDOWN ===== -->
        <li class="nav-item dropdown">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
            Menu
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">Settings</a></li>
            <li><a class="dropdown-item text-danger" href="<?= base_url('index.php/AuthLogin'); ?>">Log Out</a></li>
          </ul>
        </li>

      </ul>
    </div>

  </div>
</nav>
</header>



<!-- SECTION: WELCOME MESSAGE -->
<div class="welcome-message">
    <h2>Hello Admin</h2>
    <p class="text-muted">This is the admin interface</p>
</div>



<!-- MAIN CONTAINER -->
<div class="container mt-4">
  <div class="row">

    <!-- LEFT SIDEBAR -->
    <div class="col-md-4 bg-light shadow-sm rounded p-4 text-center">

      <img src="<?php echo base_url('assets/portfolio_image/pic-1.png'); ?>" 
           alt="Profile Image"
           class="rounded-circle border border-3 border-primary mb-3"
           width="150" height="150">

      <h3 class="fw-bold">Christian Fusillero</h3>
      <p class="text-muted">Novice Programmer • Web Developer</p>

      <ul class="nav flex-column mt-4">
        <li class="nav-item"><a class="nav-link active" data-section="home">Home</a></li>
        <li class="nav-item"><a class="nav-link" data-section="about">About</a></li>
        <li class="nav-item"><a class="nav-link" data-section="skills">Skills</a></li>
        <li class="nav-item"><a class="nav-link" data-section="education">Education</a></li>
        <li class="nav-item"><a class="nav-link" data-section="hobbies">Hobbies</a></li>
        <li class="nav-item"><a class="nav-link" data-section="contact">Contact</a></li>
      </ul>

    </div>

    <!-- RIGHT CONTENT -->
    <div class="col-md-8">

      <section id="home" class="portfolio-section p-4 mb-4">
        <h2>Welcome!</h2>
        <p>This is my personal portfolio where I showcase my skills, projects, and experiences.</p>
      </section>

      <section id="about" class="portfolio-section p-4 mb-4">
        <h2>About Me</h2>
        <p>
          I'm Chris, a novice programmer passionate about web development...
        </p>
      </section>

      <section id="skills" class="portfolio-section p-4 mb-4">
        <h2>Skills</h2>
        <p>HTML, CSS, JavaScript, PHP, MySQL, CodeIgniter, Bootstrap</p>
      </section>

      <section id="education" class="portfolio-section p-4 mb-4">
        <h2>Education</h2>
        <p>Currently 4th year BSIT – St. Dominic College of Asia</p>
      </section>

      <section id="hobbies" class="portfolio-section p-4 mb-4">
        <h2>Hobbies</h2>
        <p>Gaming, DJing, music production, reading tech articles...</p>
      </section>

      <section id="contact" class="portfolio-section p-4 mb-4">
        <h2>Contact</h2>
        <p>Email: fusillerochristian@gmail.com</p>
      </section>

    </div>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', () => {

  const navLinks = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('.portfolio-section');

  sections.forEach(s => s.style.display = 'none');
  document.getElementById('home').style.display = 'block';

  navLinks.forEach(link => {
    link.addEventListener('click', function() {

      sections.forEach(s => s.style.display = 'none');
      document.getElementById(this.dataset.section).style.display = 'block';

      navLinks.forEach(a => a.classList.remove('active'));
      this.classList.add('active');
    });
  });

});
</script>

</body>
</html>

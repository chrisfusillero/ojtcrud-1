<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">


  <script src="<?php echo base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>


  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

  
  <script type="text/javascript">
    window.history.forward();
    function noBack() { 
      window.history.forward(); 
    }
  </script>

  
</head>

<title>Admin Interface</title>
<body onload="noBack();" onpageshow="if(event.persisted) noBack();" onunload="">


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


<style>


body {
    background-color: #a80000ff;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0;
    padding-top: 90px;
    font-family: 'Poppins', sans-serif;
}


.profile-container {
    color: #ffffff;
    max-width: 1100px;
    margin: auto;
    text-align: center;
    padding: 20px;
}


.profile-container h1 {
    font-size: 2.5rem;
    font-weight: 600;
}

.profile-container p.subtitle {
    margin-top: -10px;
    color: #666;
    font-size: 1.1rem;
}


.profile-grid {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    gap: 40px;
    margin-top: 40px;
}


.about-box {
    text-align: left;
}


.profile-photo img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #ddd;
}


.details-box {
    text-align: left;
}

.details-box strong {
    font-weight: 600;
}

.social-icons i {
    font-size: 22px;
    margin-right: 15px;
    cursor: pointer;
    transition: 0.3s;
}

.social-icons i:hover {
    opacity: 0.6;
}

.portfolio-section {
    position: relative;
    padding-bottom: 70px; /* gives space for sticky nav */
}

.section-nav {
    position: sticky;
    bottom: 0;
    background: #fff;
    padding: 10px 0;
    margin-top: 30px;
    border-top: 1px solid #ddd;
    z-index: 5;
}



.footer {
  background-color: #f8f9fa;
  padding: 20px;
  text-align: center;
  font-size: 1em;
  margin-top: 50px;
}


@media(max-width: 768px) {
    .profile-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }
    .about-box, .details-box {
        text-align: center;
    }
}

</style>
</head>


<body>

<header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    <a class="navbar-brand fw-bold" style="color: #616161ff;" href="<?= base_url('index.php/admin_Main'); ?>">
      DigiCrud101
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center me-3">

     

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



<div class="profile-container">

    <h1>Profile</h1>
    <p class="subtitle"></p>

    <div class="profile-grid">

        <!-- LEFT -->
         <div class="details-box">
            <h3>Details</h3>

            <p><strong>Name:</strong><br>
            Christian Fusillero</p>

            <p><strong>Age:</strong><br>
            22 years</p>

            <p><strong>Location:</strong><br>
            Cavite, Philippines</p>
        

         
        </div>
        

        <!-- CENTER — PROFILE PHOTO -->
        <div class="profile-photo">
            <img src="<?= base_url('assets/portfolio_image/pic-1.png'); ?>" alt="Profile">
        </div>

        <!-- RIGHT -->
        <div class="about-box">


         <section id="home" class="portfolio-section p-4 mb-4">
        <h2>Welcome!</h2>
        <p>This is my personal portfolio where I showcase my skills, projects, and experiences.</p>

      
        <ul class="nav justify-content-center section-nav" style="background-color: #a80000ff">
            <li class="nav-item"><a class="nav-link active" style="color: #ffffff" data-section="home">Home</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="about">About</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="education">Education</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="hobbies">Hobbies</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="contact">Contact</a></li>
        </ul>
    </section>

        <section id="about" class="portfolio-section p-4 mb-4">
        <h2>About Me</h2>
        <p>I'm Chris, a novice programmer passionate about web development...

        <br>
        </p>

        <ul class="nav justify-content-center section-nav" style="background-color: #a80000ff">
            <li class="nav-item"><a class="nav-link active" style="color: #ffffff" data-section="home">Home</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="about">About</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="education">Education</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="hobbies">Hobbies</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="contact">Contact</a></li>
        </ul>
    </section>

    <section id="skills" class="portfolio-section p-4 mb-4">
        <h2>Skills</h2>
        <p>HTML, CSS, JavaScript, PHP, MySQL, CodeIgniter, Bootstrap

        <br>
        
        </p>

        <ul class="nav justify-content-center section-nav" style="background-color: #a80000ff">
            <li class="nav-item"><a class="nav-link active" style="color: #ffffff" data-section="home">Home</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="about">About</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="education">Education</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="hobbies">Hobbies</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="contact">Contact</a></li>
        </ul>
    </section>

    <section id="education" class="portfolio-section p-4 mb-4">
        <h2>Education</h2>
        <p>Currently 4th year BSIT – St. Dominic College of Asia

        </p>

        <ul class="nav justify-content-center section-nav" style="background-color: #a80000ff">
            <li class="nav-item"><a class="nav-link active" style="color: #ffffff" data-section="home">Home</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="about">About</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="education">Education</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="hobbies">Hobbies</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="contact">Contact</a></li>
        </ul>
    </section>

    <section id="hobbies" class="portfolio-section p-4 mb-4">
        <h2>Hobbies</h2>
        <p>Gaming, DJing, music production, reading articles, listening music,
          browsing the internet
          <br>
          <br>
        </p>

        <ul class="nav justify-content-center section-nav" style="background-color: #a80000ff">
            <li class="nav-item"><a class="nav-link active" style="color: #ffffff" data-section="home">Home</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="about">About</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="education">Education</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="hobbies">Hobbies</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="contact">Contact</a></li>
        </ul>
    </section>

    <section id="contact" class="portfolio-section p-4 mb-4">
        <h2>Contact</h2>
        <p>Email: fusillerochristian@gmail.com 
          <br>
          <br>
        </p>

        <ul class="nav justify-content-center section-nav" style="background-color: #a80000ff">
            <li class="nav-item"><a class="nav-link active" style="color: #ffffff" data-section="home">Home</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="about">About</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="education">Education</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="hobbies">Hobbies</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #ffffff" data-section="contact">Contact</a></li>
        </ul>
    </section>


      </div>

       

    

      

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

const sections = document.querySelectorAll('.portfolio-section');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
    let current = "";

    sections.forEach(sec => {
        const rect = sec.getBoundingClientRect();

        if (rect.top <= 150 && rect.bottom >= 150) {
            current = sec.id;
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.dataset.section === current) {
            link.classList.add('active');
        }
    });
});

document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        const section = document.getElementById(link.dataset.section);
        if (section) {
            section.scrollIntoView({ behavior: "smooth" });
        }
    });
});
</script>

<div class="footer">
<p>&copy; <?php echo date("Y"); ?> Admin Site. All Rights Reserved.</p>
</div>


</body>

</html>
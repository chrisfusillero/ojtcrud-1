<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DigiCrud101</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>
<script type="text/javascript">   
             window.history.forward();
             function noBack() { 
                  window.history.forward(); 
             }
        </script>

<style>

body {
  background-image: url('<?php echo base_url("assets/portfolio_image/symmetry.jpg"); ?>');
  background-size: cover;         
  background-position: center;    
  background-repeat: no-repeat;   
  background-attachment: fixed;   
  font-size: 16px;
  margin: 0;
  padding-top: 70px; 
}

.header {
  background-color: #fff;
  color: #222;
  font-family: 'Poppins', sans-serif; 
  padding: 10px 0;
  text-align: center;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 100;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}


.table {
  width: 100%;
  margin: 20px auto;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
.table td, .table th {
  word-wrap: break-word;
  white-space: normal;
  padding: 12px;
  vertical-align: middle;
}


.hero-section {
  position: relative;
  color: white;
  padding: 80px 20px;
  text-align: center;
  min-height: 80vh;   
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
  background-size: cover;
  background-position: center;
  margin-top: -56px;
}

.navbar-toggler:hover {
  transform: scale(1.1); 
  transition: transform 0.2s ease-in-out; 
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

.navbar-toggler:hover {
  animation: pulse 1s infinite;
}

.col-md-4 {
  margin-bottom: 30px; 
}


.footer {
  background-color: #f8f9fa;
  padding: 20px;
  text-align: center;
  font-size: 1em;
  margin-top: 50px;
}


@media (max-width: 991px) {
  .hero-section {
    min-height: 60vh;
    padding: 60px 15px;
  }
  .hero-section h1 {
    font-size: 2rem;
  }
  .hero-section p {
    font-size: 1rem;
  }
}

@media (max-width: 768px) {
  body {
    font-size: 14px;
  }
  .navbar-brand {
    font-size: 1.2rem;
  }
  .navbar-nav .nav-link {
    font-size: 0.9rem;
  }
  .profile-img {
    width: 120px;
    height: 120px;
  }
  .portfolio-section {
    padding: 15px;
  }
}

@media (max-width: 576px) {
  .hero-section h1 {
    font-size: 1.5rem;
  }
  .hero-section p {
    font-size: 0.9rem;
  }
  .footer {
    font-size: 0.9rem;
  }
}

</style>  
</head>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

 <header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    
    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/admin_Main'); ?>">
      DigiCrud101
    </a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">

        
        <li class="nav-item">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main'); ?>">Home</a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Details</a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_calculator'); ?>">Calculator</a>
        </li>

        
        <li class="nav-item ms-3">
          <span class="navbar-text">
            👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
          </span>
        </li>

       
        <li class="nav-item dropdown">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="<?= base_url('index.php/welcome/settings'); ?>">Settings</a>
            </li>
            <li>
              <a class="dropdown-item text-danger" href="<?= base_url('index.php/AuthLogin'); ?>">
                Log Out
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </div>

  </div>
</nav>

</header>



    

    <br>
    <br>
 
<div class="hero-section text-center p-5 rounded shadow" 
style="background-image: url('<?php echo base_url('assets/portfolio_image/abstract-technology-background.png'); ?>');
background-size: cover; color: white; height: 100vh; display: flex; flex-direction: column; 
justify-content: center; align-items: center; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
  <div class="content">
    <h1 class="display-4">Welcome!!</h1>
    <p class="lead">Everything at one glance, one click</p>
    <br>
  </div>
</div>

</div>


  <br>
  <br>
  <br />
  <br />
  <br />

<div class="container mt-5">
  <div class="row">

    <div class="col-md-4 bg-light shadow-sm rounded p-4 text-center">

      <img src="<?php echo base_url('assets/portfolio_image/pic-1.png'); ?>"
           alt="Profile Image"
           class="rounded-circle border border-3 border-primary mb-3"
           width="150" height="150">


      <h3 class="fw-bold">Christian Fusillero</h3>
      <p class="text-muted">Novice Programmer | Web Developer</p>


      <ul class="nav flex-column mt-4">
        <li class="nav-item"><a href="#home" class="nav-link active" data-section="home">Home</a></li>
        <li class="nav-item"><a href="#about" class="nav-link" data-section="about">About</a></li>
        <li class="nav-item"><a href="#skills" class="nav-link" data-section="skills">Skills</a></li>
        <li class="nav-item"><a href="#education" class="nav-link" data-section="education">Education</a></li>
        <li class="nav-item"><a href="#hobbies" class="nav-link" data-section="hobbies">Hobbies</a></li>
        <li class="nav-item"><a href="#contact" class="nav-link" data-section="contact">Contact</a></li>
      </ul>
    </div>


    <div class="col-md-8 d-flex flex-column justify-content-center">

      <section id="home" class="portfolio-section p-4 mb-5">
        <h2>Welcome!</h2>
        <p>This is my personal portfolio where I showcase my skills, projects, and experiences.</p>
      </section>


      <section id="about" class="portfolio-section p-4 mb-5">
        <h2>About Me</h2>
        <p>
          I'm Chris, a novice programmer passionate about web development.
          Outside programming, I enjoy playing games, making music, and DJing.
        </p>

        <p>
          I started getting interested in programming back in Senior High when I took the ICT strand. Later in college, I chose the Information Technology course to improve, enhance, and discover more programming-related skills. Among all the languages I've learned, I got hooked on HTML, CSS, and PHP because my end goal is to become a web developer. 
          The reason I chose web development is that more and more people today are constantly surfing the internet and visiting websites. That inspired me to create my own websites that are accessible, helpful, and efficient across all browsers, whether it's Google Chrome, Mozilla Firefox, Opera, or Microsoft Edge.
        </p>
      </section>


      <section id="skills" class="portfolio-section p-4 mb-5">
        <h2>Skills</h2>
        <p>HTML</p>
        <p>CSS</p>
        <p>JavaScript</p>
        <p>PHP</p>
        <p>MySQL</p>
        <p>CodeIgniter</p>
        <p>Bootstrap</p>
      </section>


      <section id="education" class="portfolio-section p-4 mb-5">
        <h2>Education</h2>
        <p>Currently at 4th year in Bachelor of Science in Information Technology, St. Dominic College of Asia</p>
      </section>

      <section id="hobbies" class="portfolio-section p-4 mb-5">
        <h2>Hobbies</h2>
        <p>
          Apart from programming, I also have hobbies that I usually do during my free time. One of my hobbies is playing games, though I don't play popular games like Mobile Legends, Call of Duty, or Valorant. 
          I usually play offline games like Grand Theft Auto: San Andreas, Minecraft, and other simulation games. 
          Another hobby I have is DJing and making music. I usually use BandLab for making beats, and Virtual DJ for DJing . 
          I also like to read a bit, especially articles about programming and web development.
        </p>
      </section>


      <section id="contact" class="portfolio-section p-4 mb-5">
        <h2>Contact</h2>
        <p>Email: fusillerochristian@gmail.com</p>
      </section>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('.portfolio-section');

    
    sections.forEach(section => {
      section.style.display = 'none';
    });

    
    document.getElementById('home').style.display = 'block';

    navLinks.forEach(link => {
      link.addEventListener('click', function(event) {
         

       
        const sectionId = this.dataset.section;

        
        sections.forEach(section => {
          section.style.display = 'none';
        });

        
        document.getElementById(sectionId).style.display = 'block';

        
        navLinks.forEach(navLink => {
          navLink.classList.remove('active');
        });
        this.classList.add('active');
      });
    });
  });
</script>


<br />
<br />
<br />
<br />


     






      
</div>

<div class="footer">
<p>&copy; <?php echo date("Y"); ?> Demo Website. All Rights Reserved.</p>
</div>



 
</body>

</html>

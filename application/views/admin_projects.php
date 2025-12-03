<style>

body {
  background-color: #a80000ff;
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


  .project-tile {
  transition: transform 0.25s ease, box-shadow 0.25s ease;
  cursor: pointer;
  border-radius: 12px;
  overflow: hidden;
}

.project-tile:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

.project-tile img {
  height: 160px;
  object-fit: cover;
}

}

</style>  
</head>

<title>Projects</title>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

 


<div class="container py-5">
  <div class="card shadow-lg border-0 p-4" style="max-width: 900px; margin: 0 auto; background-color: white;">
    <div class="text-center mb-4">
      <h3 class="fw-bold" style="color: #000000ff;">Our Projects</h3>
      <p class="text-muted">Click a project to view details</p>
    </div>

    
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-4">
      
      
      <div class="col">
        <a href="<?= base_url('index.php/admin_Main/admin_calculator'); ?>" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm border-0 project-tile">
            <img src="<?= base_url('assets/projects/calculator-1.jpg'); ?>" class="card-img-top" alt="Project 1">
            <div class="card-body text-center">
              <h6 class="fw-semibold">Calculator</h6>
            </div>
          </div>
        </a>
      </div>

     
      <div class="col">
        <a href="<?= base_url('index.php/admin_Main/quizbee'); ?>" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm border-0 project-tile">
            <img src="<?= base_url('assets/projects/quizbee-new.png'); ?>" class="card-img-top" alt="Project 2">
            <div class="card-body text-center">
              <h6 class="fw-semibold">Quiz Bee </h6>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>


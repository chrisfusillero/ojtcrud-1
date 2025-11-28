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


<style>

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  background-image: url('<?php echo base_url("assets/portfolio_image/emeraldgreen.jpg"); ?>');
  background-size: cover;         
  background-position: center;    
  background-repeat: no-repeat;   
  background-attachment: fixed;   
  font-size: 16px;
  margin: 0;
  padding-top: 70px; 
  min-height: 100vh;
  display: flex;
  flex-direction: column;
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

.main-content {
  flex: 1; 
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
  width: 100%;

}


.container-fluid.my-5 {
  flex: 1; 
}



.intro-card {
  text-align: center;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color: white;
  width: 80%; 
  max-width: 600px; 
}

.intro-card h2 {
  font-size: 2.5em;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.intro-card p {
  font-size: 1.1em;
  color: #666;
  margin-bottom: 20px;
}

.intro-card .btn-primary {
  padding: 12px 24px;
  font-size: 1.2em;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.intro-card .btn-primary:hover {
  background-color: #0056b3;
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

  .quiz-box {
    background: #fff;
    border: 1px solid #e3e3e3;
  }

  @media (max-width: 768px) {
    .quiz-box {
      padding: 20px;
    }
  }
}
</style>

</head>

<title>Quiz Bee List</title>

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


            <li class="nav-item me-2">
              <a class="nav-link fw-medium ms-2" href="<?= base_url('index.php/admin_Main'); ?>">Home</a>
            </li>


            <li class="nav-item me-2">
              <a class="nav-link fw-medium ms-2"
                href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a>
            </li>


            <li class="nav-item me-2">
              <a class="nav-link fw-medium ms-2"
                href="<?= base_url('index.php/admin_Main/admin_projects'); ?>">Projects</a>
            </li>


            <li class="nav-item me-2">
              <span class="navbar-text me-2">
                👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
              </span>
            </li>


            <li class="nav-item dropdown">
              <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item"
                    href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">Settings</a>
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

<div class="container-fluid my-5 main-content">
    <h2 class="mb-4">Quiz Groups</h2>

    <a href="<?= base_url('index.php/admin_Main/add_quiz'); ?>" class="btn btn-success mb-3">
        Create Quiz Group
    </a>

    <a href="<?= base_url('index.php/admin_Main/quizbee'); ?>" class="btn btn-secondary mb-3 ms-2">
        Back to Dashboard
    </a>

    <div class="row">
        <?php foreach ($groups as $g): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">

                        <h5 class="card-title fw-bold">
                            <?= htmlentities($g['group_title'] ?? 'Untitled'); ?>
                        </h5>

                        <?php if (!empty($g['description'])): ?>
                            <p class="text-muted">
                                <?= htmlentities($g['description']); ?>
                            </p>
                        <?php endif; ?>

                        <p class="card-text">
                            <small class="text-muted">
                                Questions: <?= $g['question_amount'] ?? 0; ?>
                            </small><br>

                            <small class="text-muted">
                                Created: <?= htmlentities($g['date_created'] ?? 'N/A'); ?>
                            </small>
                        </p>

                      <a href="<?= base_url('index.php/admin_Main/edit_quiz/'.$g['group_id']); ?>" 
                         class="btn btn-primary btn-sm">
                            Manage Questions
                      </a>




                        <a href="<?= base_url('index.php/admin_Main/quiz_questions_list/' . ($g['id'] ?? 0)); ?>" 
                           class="btn btn-outline-secondary btn-sm ms-2">
                            View Questions
                        </a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<footer class="footer">
    <p>&copy; <?= date("Y"); ?> Admin Site. All Rights Reserved.</p>
</footer>



</body>

</html>
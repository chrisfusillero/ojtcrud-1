<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Settings</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
  <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>

  <style>
    body {
      padding-top: 80px;
      background-color: #f8f9fa;
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

  .profile-card {
  width: 100%;              
  max-width: 700px;          
  margin: 0 auto;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 20px;              
}

.profile-header {
  display: flex;
  flex-wrap: wrap;              
  justify-content: space-between;
  align-items: center;
  gap: 15px;                    
}


.profile-avatar {
  width: 60px;               
  height: 60px;
  border-radius: 50%;        
  background-color: #007bff; 
  color: #fff;               
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  font-weight: bold;
  text-transform: uppercase;
}


h5 {
  font-size: 1.1rem;
}
small {
  font-size: 0.85rem;
}

@media (max-width: 576px) {
  body {
    padding-top: 70px; 
  }
  .profile-card {
    padding: 15px;
  }
}
  </style>
</head>

<body>

  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/admin_Main'); ?>">DigiCrud101</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item"><a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main'); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a></li>
            <li class="nav-item"><a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_projects'); ?>">Projects</a></li>

            <li class="nav-item ms-3">
              <span class="navbar-text">
                👤 <strong><?= ($firstname ?? 'Guest') . ' ' . ($lastname ?? ''); ?></strong>
              </span>
            </li>

            <li class="nav-item dropdown">
              <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
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

  <div class="container mt-5">
    <div class="profile-card">
      <div class="profile-header">
        <div class="d-flex align-items-center">
          <div class="profile-avatar">
            <?= strtoupper(substr($firstname ?? 'G', 0, 1)); ?>
          </div>
          <div class="ms-3">
            <h5 class="mb-0"><?= $firstname ?? 'Guest'; ?> <?= $lastname ?? ''; ?></h5>
            <small class="text-muted"><?= htmlspecialchars($email ?? 'No email available', ENT_QUOTES, 'UTF-8'); ?></small>
          </div>
        </div>

       
    </div>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
  <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>

<style>
  body {
    background-image: url('<?php echo base_url("assets/portfolio_image/emerald-2.jpg"); ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-color: #f8f9fa;
    margin: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
  }

  .form-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    min-height: 100vh; 
    padding: 20px;
  }

  .card {
    width: 100%;
    max-width: 600px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    background-color: rgba(255, 255, 255, 0.95);
    padding: 30px;
    transition: all 0.3s ease;
  }

  
  @media (hover: hover) {
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.25);
    }
  }

  @media (max-width: 768px) {
    .card {
      max-width: 90%;
      padding: 25px;
    }
  }

  
  @media (max-width: 576px) {
    .card {
      max-width: 95%;
      padding: 20px;
      border-radius: 10px;
    }

    body {
      background-attachment: scroll; /* smoother on mobile */
    }
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
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_calculator'); ?>">Calculator</a>
        </li>
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
              <a class="dropdown-item" href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">Settings</a>
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

<div class="form-wrapper">
  <div class="container">
    <div class="card p-4">
      <h3 class="text-center mb-4">Edit</h3>

      <form action="<?= base_url('index.php/admin_Main/update/'.urlencode($record['username'])); ?>" method="POST">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="firstname" name="firstname"
                     value="<?= htmlspecialchars($record['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
              <label for="firstname">First Name</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="lastname" name="lastname"
                     value="<?= htmlspecialchars($record['lastname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
              <label for="lastname">Last Name</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="username" name="username"
                     value="<?= htmlspecialchars($record['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
              <label for="username">Username</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="address" name="address"
                     value="<?= htmlspecialchars($record['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
              <label for="address">Address</label>
            </div>
          </div>

          <div class="col-12">
            <div class="form-floating">
              <input type="email" class="form-control" id="email" name="email"
                     value="<?= htmlspecialchars($record['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
              <label for="email">E-mail</label>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-center mt-4 flex-wrap">
          <button type="submit" class="btn btn-success me-2 mb-2">Update</button>
          <a href="<?= base_url('index.php/admin_Main/admin_settings'); ?>" class="btn btn-danger ms-2 mb-2">Cancel</a>
        </div>
      </form> 

      <?php if ($this->session->flashdata('kyre')): ?>
        <?php $alert = $this->session->flashdata('kyre'); ?>
        <div class="alert alert-<?= $alert['type']; ?> alert-dismissible fade show mt-3" role="alert">
          <?= $alert['message']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Admin Profile</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
  <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>

  <style>
    body {
      background-color: #a80000ff;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
    }

    .form-wrapper {
      padding-top: 120px;
      padding-bottom: 40px;
    }

    .card {
      max-width: 600px;
      margin: auto;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.25);
      background-color: rgba(255,255,255,0.95);
    }
  </style>
</head>

<body>

<!-- ================= NAVBAR ================ -->
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
      <ul class="navbar-nav align-items-center">

        <!-- Search -->
        <li class="nav-item me-2">
          <form class="d-flex" action="<?= base_url('index.php/admin_Main/search'); ?>" method="get">
            <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Search">
            <button class="btn btn-sm btn-primary" type="submit">Go</button>
          </form>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('index.php/admin_Main'); ?>">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('index.php/admin_Main/admin_calculator'); ?>">Calculator</a>
        </li>

        <!-- Profile Name -->
        <li class="nav-item ms-3">
          <span class="navbar-text">
            👤 <strong><?= $firstname . ' ' . $lastname; ?></strong>
          </span>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown ms-2">
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



<!-- ================= EDIT FORM ================ -->
<div class="form-wrapper">
  <div class="container">
    <div class="card p-4">
      <h3 class="text-center mb-4">Edit Admin Profile</h3>

      <form action="<?= base_url('index.php/admin_Main/update_admin_profile'); ?>" method="POST">

        <div class="row g-3">

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="firstname" name="firstname"
                     value="<?= $firstname; ?>" required>
              <label for="firstname">First Name</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="lastname" name="lastname"
                     value="<?= $lastname; ?>" required>
              <label for="lastname">Last Name</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="username" name="username"
                     value="<?= $username; ?>" required>
              <label for="username">Username</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="address" name="address"
                     value="<?= $address; ?>">
              <label for="address">Address</label>
            </div>
          </div>

          <div class="col-12">
            <div class="form-floating">
              <input type="email" class="form-control" id="email" name="email"
                     value="<?= $email; ?>">
              <label for="email">Email</label>
            </div>
          </div>

        </div>

        <div class="d-flex justify-content-center mt-4">
          <button type="submit" class="btn btn-success me-2">Update</button>
          <a href="<?= base_url('index.php/admin_Main/admin_settings'); ?>" class="btn btn-danger">Cancel</a>
        </div>

      </form>

    </div>
  </div>
</div>

</body>
</html>

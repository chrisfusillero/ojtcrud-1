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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

 
  <style>
    body {
      padding-top: 80px;
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .header {
      background-color: #fff;
      color: #222;
      padding: 10px 0;
      text-align: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 100;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .card {
      max-width: 700px;
      margin: 20px auto;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border: none;
    }

    
    .profile-pic-wrapper {
      position: relative;
      width: 140px;
      height: 140px;
      margin: 0 auto;
    }

    .profile-pic-wrapper img {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #e0e0e0;
      transition: transform 0.3s ease;
    }

    .profile-pic-wrapper:hover img {
      transform: scale(1.05);
      border-color: #0d6efd;
    }

    .edit-icon {
      position: absolute;
      bottom: 5px;
      right: 5px;
      background-color: #0d6efd;
      border-radius: 50%;
      width: 38px;
      height: 38px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .edit-icon:hover {
      background-color: #0b5ed7;
      transform: scale(1.1);
    }

    @media (max-width: 576px) {
      body { padding-top: 70px; }
      .navbar-brand { font-size: 1.1rem; }
      .profile-pic-wrapper {
        width: 110px;
        height: 110px;
      }
      .profile-pic-wrapper img {
        width: 110px;
        height: 110px;
      }
    }
  </style>
</head>

<body>
<header class="header">
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/welcome'); ?>">Blogspot101</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a class="nav-link fw-medium" href="<?= base_url('index.php/welcome'); ?>">Home</a>
          </li>
          <li class="nav-item ms-3">
            <span class="navbar-text">
              👤 <strong><?= ($firstname ?? 'Guest') . ' ' . ($lastname ?? ''); ?></strong>
            </span>
          </li>
          <li class="nav-item dropdown">
            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">Menu</button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="<?= base_url('index.php/welcome/settings'); ?>">Settings</a></li>
              <li><a class="dropdown-item text-danger" href="<?= base_url('index.php/AuthLogin'); ?>">Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>


<div class="container">
  <div class="card p-4">
    <h3 class="text-center mb-4">Edit Profile</h3>

    <form action="<?= base_url('index.php/Welcome/update/' . urlencode($record['username'])); ?>" 
          method="POST" enctype="multipart/form-data">

  
      <div class="text-center mb-4">
        <div class="profile-pic-wrapper">
          <img id="profilePreview" 
               src="<?= !empty($record['avatar']) ? base_url('assets/avatars/' . $record['avatar']) : base_url('assets/default-avatar.png'); ?>" 
               alt="Profile Picture" 
               class="shadow-sm">
          <label for="avatar" class="edit-icon text-white">
            <i class="bi bi-camera-fill fs-5"></i>
          </label>
        </div>
        <input type="file" name="avatar" id="avatar" accept="image/*" class="d-none" onchange="previewProfilePic(event)">
        <p class="text-muted small mt-2">Tap the camera icon to change your picture</p>
      </div>


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


      <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-success me-2 px-4">Update</button>
        <a href="<?= base_url('index.php/welcome/settings'); ?>" class="btn btn-danger ms-2 px-4">Cancel</a>
      </div>
    </form>
  </div>


  <?php if ($this->session->flashdata('kyre')): ?>
    <?php $alert = $this->session->flashdata('kyre'); ?>
    <div class="alert alert-<?= $alert['type']; ?> alert-dismissible fade show mt-3" role="alert">
      <?= $alert['message']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>
</div>


<script>
function previewProfilePic(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('profilePreview').src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}


</script>
</body>
</html>

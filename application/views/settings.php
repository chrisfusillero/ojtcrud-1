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
  <script type="text/javascript">
    window.history.forward();
    function noBack() {
      window.history.forward();
    }
  </script>

  <style>
    body {
      background-image: url('<?php echo base_url("assets/portfolio_image/skyblue.jpg"); ?>');
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

.profile-avatar img {
  border: 3px solid #fff;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.profile-avatar div {
  font-weight: 600;
  background: linear-gradient(135deg, #6c757d, #adb5bd);
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

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

 
  <header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    
    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/welcome'); ?>">
      Blogspot101
    </a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">

      
        
        <li class="nav-item me-2">
          <a class="nav-link fw-medium ms-2" href="<?= base_url('index.php/welcome'); ?>">Home</a>
        </li>

        
        
        
        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/welcome/settings'); ?>">
              👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
          </a>
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

  <div class="container mt-5">
  <div class="profile-card">
    <div class="profile-header d-flex justify-content-between align-items-center">
      
      <div class="d-flex align-items-center">
        <div class="profile-avatar me-3">
          <?php if (!empty($user['avatar']) && file_exists(FCPATH . 'assets/avatars/' . $user['avatar'])): ?>
            <img src="<?= base_url('assets/avatars/' . $user['avatar']); ?>" 
                 alt="Profile Picture" 
                 class="rounded-circle border shadow-sm"
                 style="width: 70px; height: 70px; object-fit: cover;">
          <?php else: ?>
            <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center shadow-sm" 
                 style="width: 70px; height: 70px; font-size: 28px;">
              <?= strtoupper(substr($firstname ?? 'G', 0, 1)); ?>
            </div>
          <?php endif; ?>
        </div>

        <div>
          <h5 class="mb-0"><?= htmlspecialchars($firstname ?? 'Guest', ENT_QUOTES, 'UTF-8'); ?> 
              <?= htmlspecialchars($lastname ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
          <small class="text-muted"><?= htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?></small>
        </div>
      </div>

      <a href="<?= base_url('index.php/Welcome/edit/' . urlencode($user['username'])); ?>" 
         class="btn btn-primary">Edit Profile</a>
    </div>

    <hr>

    
            <div class="container mt-5 mb-5">
  <h3 class="text-center mb-4 text-dark">📸 Image Gallery</h3>
  <div class="row g-3">
    <?php 
      
      $galleryPath = FCPATH . 'assets/gallery_path/';
      $galleryURL  = base_url('assets/gallery_path/');

    
      $galleryImages = glob($galleryPath . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);

      if (!empty($galleryImages)):
        foreach ($galleryImages as $img):
          $fileName = basename($img); 
    ?>
      <div class="col-6 col-md-4 col-lg-3">
        <div class="gallery-card">
          <img src="<?= $galleryURL . $fileName; ?>" 
               alt="Gallery Image" class="img-fluid rounded shadow-sm gallery-img"
               onclick="openModal(this.src)">
        </div>
      </div>
    <?php 
        endforeach;
      else: 
    ?>
      <p class="text-center text-muted">No images in gallery yet.</p>
    <?php endif; ?>
  </div>
</div>


  </div>
</div>




  




</body> 
</html>




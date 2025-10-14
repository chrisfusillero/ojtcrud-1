

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

.card {
  border-radius: 12px;
  border: none;
}
textarea {
  resize: none;
  border-radius: 12px;
}
.btn-primary {
  border-radius: 20px;
}




}

</style>  

<title>Blogspot101</title>


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

        
        <li class="nav-item">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/welcome'); ?>">Home</a>
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

<div class="hero-section text-center p-5 rounded shadow" 
style="background-image: url('<?php echo base_url('assets/portfolio_image/ict-2.png'); ?>');
background-size: cover; color: white; height: 100vh; display: flex; flex-direction: column; 
justify-content: center; align-items: center; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
  <div class="content">
    <h1 class="display-4">Welcome!!</h1>
    <p class="lead">Everything at one glance, one click</p>
    
  </div>  
</div>



<div class="container mt-5" style="max-width: 600px;">
  <div class="card shadow-sm">
    <div class="card-body">
      <form action="<?= base_url('index.php/welcome/add_post'); ?>" 
        method="post" enctype="multipart/form-data">
        <div class="d-flex align-items-start">
          <img src="<?= base_url('assets/portfolio_image/default-avatar.png'); ?>" 
               alt="Profile" class="rounded-circle me-3" width="45" height="45">
          <textarea name="content" class="form-control" 
                    placeholder="What's on your mind, <?= htmlspecialchars($firstname); ?>?" 
                    rows="3" required></textarea>
        </div>

      
        <div class="mt-3 d-flex justify-content-between align-items-center">
          <div>
            <label class="btn btn-light border px-3 py-1 mb-0">
              📷 Photo
              <input type="file" name="image" id="postImage" 
                     accept="image/*" hidden onchange="previewImage(event)">
            </label>
          </div>
          <button type="submit" class="btn btn-primary px-4 py-1">Post</button>
        </div>

        
        <div class="mt-3 text-center">
          <img id="imagePreview" src="#" alt="Image Preview" 
               class="img-fluid rounded d-none" style="max-height: 250px; object-fit: cover;">
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container mt-4" style="max-width: 600px;">
  <?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
      <div class="card mb-3 shadow-sm">
        <div class="card-body">
          <h6 class="mb-1">
            <strong><?= htmlspecialchars($post['firstname'] . ' ' . $post['lastname']); ?></strong>
            <span class="text-muted" style="font-size: 0.9em;">
              • <?= date('M d, Y h:i ', strtotime($post['created_at'])); ?>
            </span>
          </h6>
          <p class="mt-2"><?= nl2br(htmlspecialchars($post['content'])); ?></p>

          <?php if (!empty($post['image'])): ?>
            <div class="mt-2 text-center">
              <img src="<?= base_url('uploads/posts/' . htmlspecialchars($post['image'])); ?>" 
                   alt="Post Image" class="img-fluid rounded shadow-sm"
                   style="max-height: 350px; object-fit: cover;">
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-center text-muted mt-4">No posts yet. Be the first to share something!</p>
  <?php endif; ?>
</div>




<script>
  function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        imagePreview.src = e.target.result;
        imagePreview.classList.remove('d-none');
      };
      reader.readAsDataURL(file);
    } else {
      imagePreview.src = '#';
      imagePreview.classList.add('d-none');
    }
  }
</script>



  <br>
  <br>
  <br />
  <br />
  <br />




<br />
<br />
<br />
<br />


  
      
</div>






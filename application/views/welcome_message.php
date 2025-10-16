

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
  margin-bottom: 40px !important;

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
  margin-bottom: 40px !important;

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

.gallery-card {
    overflow: hidden;
    border-radius: 12px;
    transition: transform 0.3s ease;
  }
  .gallery-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    cursor: pointer;
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .gallery-img:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  }
  .image-modal {
    display: none;
    position: fixed;
    z-index: 2000;
    padding-top: 60px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.85);
    text-align: center;
  }
  .image-modal img {
    max-width: 80%;
    max-height: 80%;
    border-radius: 12px;
  }
  .close {
    position: absolute;
    top: 20px;
    right: 45px;
    color: #fff;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
  }
  .close:hover {
    color: #000000ff;
  }

  .post-menu-btn {
  background-color: #000000ff !important;
  color: #000000ff;
  border-radius: 50%;
  width: 36px;
  height: 36px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: none;
  transition: background-color 0.2s ease, color 0.2s ease;
}

.post-menu-btn:hover {
  background-color: #000000ff !important;
  color: #000;
}

.dropdown-menu {
  border-radius: 10px;
  min-width: 160px;
  font-size: 0.9rem;
}

.dropdown-item {
  padding: 10px 15px;
  border-radius: 6px;
}

.dropdown-item:hover {
  background-color: #f0f2f5;
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



<div class="container mt-5 mb-5" style="max-width: 600px;">
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
      <?php 
        $isOwner = ($this->session->userdata('user_id') == $post['user_id']);
        $likeCount = $this->Post_model->get_like_count($post['id']);
        $userLiked = $this->Post_model->user_liked_post($post['id'], $this->session->userdata('user_id'));
      ?>
      <div class="card mb-5 shadow-sm">
        <div class="card-body">
          <h6 class="mb-1">
            <strong><?= htmlspecialchars($post['firstname'] . ' ' . $post['lastname']); ?></strong>
            <span class="text-muted" style="font-size: 0.9em;" data-time="<?= htmlspecialchars($post['created_at']); ?>">
              on <?= htmlspecialchars($post['created_at']); ?>
            </span>
          </h6>

          <p class="mt-2"><?= nl2br(htmlspecialchars($post['content'])); ?></p>

          <?php if (!empty($post['image'])): ?>
            <div class="mt-2 text-center">
              <img src="<?= base_url('assets/post_image/' . htmlspecialchars($post['image'])); ?>" 
                   alt="Post Image" class="img-fluid rounded shadow-sm"
                   style="max-height: 350px; object-fit: cover;">
            </div>
          <?php endif; ?>

          <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
              <a href="<?= base_url('index.php/welcome/toggle_like/' . $post['id']); ?>" 
                 class="btn btn-sm <?= $userLiked ? 'btn-success' : 'btn-outline-success'; ?>">
                 👍 <?= $likeCount; ?>
              </a>
            </div>
            <?php if ($isOwner): ?>
             <div class="dropdown text-end">
  <button class="btn btn-dark btn-sm post-menu-btn" type="button" id="postMenu<?= $post['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false" title="Options">
    <i class="bi bi-three-dots-vertical"></i>
  </button>

  <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="postMenu<?= $post['id']; ?>">
    <li>
      <a class="dropdown-item text-primary" href="<?= base_url('index.php/welcome/edit_post/' . $post['id']); ?>">
        ✏️ Edit Post
      </a>
    </li>
    <li>
      <a class="dropdown-item text-danger" href="<?= base_url('index.php/welcome/delete_post/' . $post['id']); ?>" 
         onclick="return confirm('Are you sure you want to delete this post?');">
        🗑️ Delete Post
      </a>
    </li>
  </ul>
</div>



            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-center text-muted mt-4">No posts yet. Be the first to share something!</p>
  <?php endif; ?>
</div>


<div class="container mt-5 mb-5">
  <h3 class="text-center mb-4 text-light">📸 Image Gallery</h3>
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


<div id="imageModal" class="image-modal" onclick="closeModal()">
  <span class="close">&times;</span>
  <img class="modal-content" id="modalImage">
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

    document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll('.text-muted[data-time]').forEach(span => {
    const serverTime = span.getAttribute('data-time');
    const localDate = new Date(serverTime.replace(' ', 'T'));
    const options = {
      month: 'short',
      day: '2-digit',
      year: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
      hour12: true
    };
    span.textContent = 'on ' + localDate.toLocaleString(undefined, options);
  });
});
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






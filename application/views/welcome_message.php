

<style>

body {
  background-image: url('<?php echo base_url("assets/portfolio_image/skyblue.jpg"); ?>');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  margin: 0;
  padding-top: 70px;
  color: #222;
}


.header {
  background-color: #ffffff;
  color: #222;
  padding: 12px 0;
  text-align: center;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 100;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.navbar-toggler {
  transition: transform 0.2s ease-in-out;
}

.navbar-toggler:hover {
  transform: scale(1.1);
  animation: pulse 1s infinite;
}






@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}


.table {
  width: 100%;
  margin: 20px auto;
  border-collapse: collapse;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
  background-color: #fff;
  border-radius: 10px;
  overflow: hidden;
}

.table td, .table th {
  padding: 12px;
  word-wrap: break-word;
  white-space: normal;
  vertical-align: middle;
}

.table th {
  background-color: #f8f9fa;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.9rem;
}


.gallery-card {
  overflow: hidden;
  border-radius: 12px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.25);
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
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
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
  transition: color 0.2s ease;
}

.close:hover {
  color: #000;
}


.post-menu-btn {
  background-color: #000000ff;
  border: none;
  color: black;
  border-radius: 50%;
  width: 15px;
  height: 15px;
  display: flex;
  padding: 2px;
  font-size: 1.1rem;
  justify-content: center;
  align-items: center;
  border: none;
  transition: all 0.2s ease;
}

.post-menu-btn:hover {
  background-color: rgba(0, 0, 0, 0.1);
}

.post-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}

.card {
  position: relative;
  width: 100%;
  max-width: 600px;
  border-radius: 14px;
  border: none;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.post-options {
  position: absolute;
  top: 10px;
  right: 30px;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.2s ease, visibility 0.2s ease;
}

.card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
}

.card:hover .post-options {
  opacity: 1;
  visibility: visible;
}

.reaction-wrapper {
  position: relative;
  display: inline-block;
}

.reaction.active {
  transform: scale(1.4);
  filter: brightness(1.2);
}

.reaction-btn {
  background-color: #f0f2f5;
  border: none;
  border-radius: 20px;
  padding: 6px 14px;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.2s ease;
}

.reaction-btn:hover {
  background-color: #e4e6eb;
}


.reaction-btn.active-like { color: #1877f2; font-weight: bold; }   /* blue like */
.reaction-btn.active-heart { color: #f02849; font-weight: bold; }  /* red love */
.reaction-btn.active-laugh { color: #f7b125; font-weight: bold; }  /* yellow laugh */
.reaction-btn.active-sad { color: #f0a04b; font-weight: bold; }    /* orange sad */

.reactions-bar {
  display: flex;
  gap: 10px;
  position: absolute;
  background: #fff;
  border-radius: 20px;
  padding: 6px 10px;
  top: -50px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  z-index: 1000;
  transform: translateX(-50%) translateY(-10px) scale(0.9);
  pointer-events: none;
  transition: 
    opacity 0.25s ease,
    transform 0.25s ease;
}


.reactions-bar.active {
  opacity: 1;
  pointer-events: auto;
  transform: translateX(-50%) translateY(0) scale(1);
}

.reaction-wrapper:hover .reactions-bar {
  display: flex;
  gap: 10px;
}


.reaction-wrapper:hover .reactions-bar,
.reactions-bar:hover {
  opacity: 1;
  transform: translateX(-50%) translateY(-16px) scale(1);
  pointer-events: auto;
  transition:
    opacity 0.4s ease-in-out 0s,
    transform 0.4s ease-in-out 0s,
    visibility 0s linear 0s;
}

.reaction-wrapper:not(:hover) .reactions-bar {
  transition-delay: 1s; 
}


.reaction {
  font-size: 22px;
  text-decoration: none;
  transition: transform 0.2s ease;
}

.reaction:hover {
  transform: scale(1.3);
}


@media (max-width: 768px) {
  .reactions-bar {
    bottom: 120%;
    gap: 6px;
    padding: 6px 10px;
  }
  .reaction {
    font-size: 1.2rem;
  }
}








@media (max-width: 991px) {
  body {
    font-size: 15px;
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
  .footer {
    font-size: 0.9rem;
  }
}


.footer {
  background-color: #f8f9fa;
  padding: 20px;
  text-align: center;
  font-size: 1em;
  margin-top: 50px;
  box-shadow: 0 -2px 6px rgba(0,0,0,0.05);
}


.card {
  border-radius: 12px;
  border: none;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

textarea {
  resize: none;
  border-radius: 12px;
  padding: 10px;
}




.dots-btn {
  background: none;
  border: none;
  padding: 5px;
  cursor: pointer;
  position: relative;
}

.dots-btn .dots {
  display: inline-block;
  width: 4px;
  height: 4px;
  background-color: #000;
  border-radius: 50%;
  box-shadow: 6px 0 #000, 12px 0 #000; /* three horizontal dots */
  transition: background-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
}


..dots-btn:hover .dots {
  background-color: #007bff;
  box-shadow: 6px 0 #007bff, 12px 0 #007bff;
}

.dots-btn:hover {
  transform: scale(1.1);
}



.reaction-wrapper {
  position: relative;
  display: inline-block;
}

.reaction-btn {
  border: none;
  background: #f8f9fa;
  border-radius: 20px;
  padding: 6px 14px;
  cursor: pointer;
  transition: all 0.2s ease;
  font-weight: 500;
}

.reaction-btn:hover {
  background-color: #e9ecef;
  transform: translateY(-1px);
}


.reactions-bar {
  position: absolute;
  bottom: 120%;
  left: 50%;
  transform: translateX(-50%) translateY(10px) scale(0.95);
  background: #fff;
  border-radius: 30px;
  padding: 6px 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  display: flex;
  gap: 6px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.25s ease;
  z-index: 10;
}


.reaction-wrapper:hover .reactions-bar,
.reactions-bar:hover {
  transform: translateX(-50%) scale(1);
  opacity: 1;
  pointer-events: auto;
}

.reaction {
  font-size: 1.4rem;
  cursor: pointer;
  transition: transform 0.15s ease;
}

.reaction:hover {
  transform: scale(1.4);
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

        
        <li class="nav-item me-2">
          <a class="nav-link fw-medium ms-2" href="<?= base_url('index.php/welcome'); ?>">Home</a>
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

<div class="welcome-message">
  <?php if (!empty($firstname)): ?>
    <h4>👋 Welcome, <?= htmlspecialchars($firstname); ?>!</h4>
    <p class="text-muted mb-0">Feel free to post in this blog</p>
  <?php else: ?>
    <h4>👋 Welcome, Guest!</h4>
    <p class="text-muted mb-0">Please log in to continue.</p>
  <?php endif; ?>
</div>





<div class="container mt-5 mb-5" style="max-width: 600px;">
  <div class="card shadow-sm">
    <div class="card-body">
      <form action="<?= base_url('index.php/welcome/add_post'); ?>" 
            method="post" enctype="multipart/form-data">
            
        <div class="d-flex align-items-start">
          <?php 
            // Determine avatar path (from crud table)
            $avatarPath = !empty($user['avatar']) && file_exists(FCPATH . 'uploads/avatars/' . $user['avatar'])
              ? base_url('uploads/avatars/' . $user['avatar'])
              : base_url('assets/default-avatar.png');
          ?>

          <img src="<?= $avatarPath; ?>" 
               alt="Profile Picture" 
               class="rounded-circle border shadow-sm me-3" 
               style="width: 45px; height: 45px; object-fit: cover;">
          
          <textarea name="content" 
                    class="form-control" 
                    placeholder="What's on your mind, <?= htmlspecialchars($firstname ?? 'User'); ?>?" 
                    rows="3" required></textarea>
        </div>

        <div class="mt-3">
          <input type="file" name="image" accept="image/*" class="form-control">
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary px-4">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="d-flex justify-content-center mt-4 px-2">
  <div class="post-container">
    <?php if (!empty($posts)): ?>
      <?php foreach ($posts as $post): ?>
        <?php 
          $isOwner = ($this->session->userdata('user_id') == $post['user_id']);
          $likeCount = $this->Post_model->get_reaction_counts($post['id']);
          $userLiked = $this->Post_model->user_reaction_type($post['id'], $this->session->userdata('user_id'));
        ?>

        <div class="card mb-5 shadow-sm">
          <div class="card-body">
            <h6 class="mb-1">
              <strong>
    <?= htmlspecialchars(($post['firstname'] ?? 'Unknown') . ' ' . ($post['lastname'] ?? 'User')); ?>
</strong>
              <span class="text-muted" style="font-size: 0.9em;">
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

            
<div class="reaction-wrapper mt-3">

  <!-- Main button showing the user's current reaction -->
  <button type="button" 
          class="reaction-btn <?= $userLiked ? 'active-'.$userLiked : ''; ?>" 
          onclick="toggleReactions(this)">
    <?php
      // Display the icon/text based on current reaction
      switch ($userLiked) {
        case 'heart': echo '❤️ Love'; break;
        case 'laugh': echo '😂 Haha'; break;
        case 'sad':   echo '😢 Sad'; break;
        case 'like':  echo '👍 Like'; break;
        default:      echo '👍 Like'; break;
      }
    ?>
  </button> 


  <div class="reactions-bar shadow-sm">
    <a href="<?= base_url('index.php/welcome/react/'.$post['id'].'/like'); ?>" 
       class="reaction <?= ($userLiked === 'like') ? 'active' : ''; ?>">👍</a>
    <a href="<?= base_url('index.php/welcome/react/'.$post['id'].'/heart'); ?>" 
       class="reaction <?= ($userLiked === 'heart') ? 'active' : ''; ?>">❤️</a>
    <a href="<?= base_url('index.php/welcome/react/'.$post['id'].'/laugh'); ?>" 
       class="reaction <?= ($userLiked === 'laugh') ? 'active' : ''; ?>">😂</a>
    <a href="<?= base_url('index.php/welcome/react/'.$post['id'].'/sad'); ?>" 
       class="reaction <?= ($userLiked === 'sad') ? 'active' : ''; ?>">😢</a>
  </div>
</div>



            <?php if ($isOwner): ?>
  <div class="post-options dropdown">
    <button class="btn post-menu-btn dots-btn" type="button" id="postMenu<?= $post['id']; ?>"
            data-bs-toggle="dropdown" aria-expanded="false" title="Options">
      <span class="dots"></span>
    </button>

    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="postMenu<?= $post['id']; ?>">
      <li>
        <button class="dropdown-item text-primary" onclick="enableInlineEdit(<?= $post['id']; ?>)">
  ✏️ Edit Post
</button>

      </li>
      <li>
        <a class="dropdown-item text-danger" href="<?= base_url('index.php/welcome/delete_post/' . $post['id']); ?>"
           onclick="return confirm('Are you sure you want to delete this post?');">
          🗑️ Delete Post
        </a>
      </li>
    </ul>
  </div>


<!-- ✏️ EDIT POST MODAL -->
  <div class="modal fade" id="editPostModal<?= $post['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">✏️ Edit Post</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <form id="editPostForm<?= $post['id']; ?>" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="post_id" value="<?= $post['id']; ?>">

            <!-- 📝 Content -->
            <div class="mb-3">
              <label for="content<?= $post['id']; ?>" class="form-label fw-semibold">Post Content</label>
              <textarea class="form-control" id="content<?= $post['id']; ?>" name="content" rows="5" required><?= htmlspecialchars($post['content']); ?></textarea>
            </div>

            <!-- 🖼 Current Image -->
            <?php if (!empty($post['image'])): ?>
              <div class="text-center mb-3">
                <p class="text-muted mb-1 fw-semibold">Current Image:</p>
                <img src="<?= base_url('assets/post_image/' . $post['image']); ?>" 
                     class="img-fluid rounded shadow-sm mb-2"
                     id="currentImage<?= $post['id']; ?>">
              </div>
            <?php endif; ?>

            <!-- 📸 Upload New Image -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Change Image (optional)</label>
              <input type="file" name="image" class="form-control" accept="image/*"
                     onchange="previewNewImage(event, <?= $post['id']; ?>)">
              <img id="previewImage<?= $post['id']; ?>" class="img-fluid rounded mt-2 d-none" alt="Preview">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">💾 Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>
          </div>
        </div>  

      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center text-muted mt-4">No posts yet. Be the first to share something!</p>
    <?php endif; ?>
  </div>
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
})
  };
     
    function toggleReactions(button) {
  const wrapper = button.closest('.reaction-wrapper');
  const bar = wrapper.querySelector('.reactions-bar');


  document.querySelectorAll('.reactions-bar').forEach(b => {
    if (b !== bar) b.style.display = 'none';
  });

  // Toggle visibility
  if (bar.style.display === 'flex') {
    bar.style.display = 'none';
  } else {
    bar.style.display = 'flex';
  }
}


document.addEventListener('click', function(event) {
  if (!event.target.closest('.reaction-wrapper')) {
    document.querySelectorAll('.reactions-bar').forEach(bar => {
      bar.style.display = 'none';
    });
  }
});

window.toggleReactions = function(button) {
  const wrapper = button.closest('.reaction-wrapper');
  const bar = wrapper.querySelector('.reactions-bar');

  
  document.querySelectorAll('.reactions-bar').forEach(b => {
    if (b !== bar) b.style.display = 'none';
  });

  
  bar.style.display = (bar.style.display === 'flex') ? 'none' : 'flex';
};

function previewNewImage(event, id) {
    const preview = document.getElementById('previewImage' + id);
    const file = event.target.files[0];
    if (file) {
      preview.src = URL.createObjectURL(file);
      preview.classList.remove('d-none');
    } else {
      preview.classList.add('d-none');
    }
  }
function openModal(src) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    modal.style.display = "block";
    modalImg.src = src;
  }

  function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = "none";
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







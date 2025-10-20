<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Post</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
  <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

  
  <script src="<?php echo base_url('assets/js/jquery-3.7.1.min.js'); ?>"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f5f7fa;
    }

    .edit-container {
      max-width: 650px;
      margin: 60px auto;
      background: #fff;
      padding: 35px 40px;
      border-radius: 15px;
      box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    }

    h4 {
      font-weight: 600;
      color: #333;
    }

    textarea {
      resize: none;
      font-size: 15px;
    }

    .btn-primary {
      background: #007bff;
      border: none;
      transition: 0.3s ease;
    }

    .btn-primary:hover {
      background: #0056b3;
    }

    .btn-secondary {
      background: #6c757d;
      border: none;
      transition: 0.3s ease;
    }

    .btn-secondary:hover {
      background: #565e64;
    }

    .img-preview {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .img-preview:hover {
      transform: scale(1.02);
    }

    .file-input-label {
      display: inline-block;
      margin-top: 5px;
      color: #007bff;
      cursor: pointer;
      font-weight: 500;
      transition: color 0.2s ease;
    }

    .file-input-label:hover {
      color: #0056b3;
    }

    input[type="file"] {
      display: none;
    }

  /
    .modal-img {
      max-width: 100%;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="edit-container">
    <h4 class="text-center mb-4">✏️ Edit Your Post</h4>
    
    <form method="post" action="<?= base_url('index.php/welcome/edit_post/' . $post['id']); ?>" enctype="multipart/form-data">
      
      
      <div class="form-group mb-3">
        <label for="content" class="form-label fw-medium">Post Content</label>
        <textarea name="content" id="content" class="form-control" rows="6" required><?= htmlspecialchars($post['content']); ?></textarea>
      </div>

      
      <?php if (!empty($post['image'])): ?>
        <div class="mb-3 text-center">
          <p class="fw-medium text-muted mb-2">Current Image:</p>
          <img src="<?= base_url('assets/post_image/' . $post['image']); ?>" 
               alt="Current Image" 
               class="img-preview" 
               id="currentImage"
               data-bs-toggle="modal" 
               data-bs-target="#imageModal">
        </div>
      <?php endif; ?>

      <div class="form-group mb-4">
        <label for="image" class="form-label fw-medium">Change Image (optional)</label>
        <label for="image" class="file-input-label">📸 Choose a new image</label>
        <input type="file" name="image" id="image" accept="image/*" onchange="previewNewImage(event)">
        <img id="previewImage" class="img-preview d-none" alt="New Image Preview">
      </div>

      
      <div class="d-flex justify-content-between">
        <a href="<?= base_url('index.php/welcome'); ?>" class="btn btn-secondary">← Back</a>
        <button type="submit" class="btn btn-primary">💾 Update Post</button>
      </div>
    </form>
  </div>


  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-transparent border-0">
        <div class="modal-body text-center">
          <img src="<?= base_url('assets/post_image/' . $post['image']); ?>" alt="Full Image" class="modal-img">
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function previewNewImage(event) {
      const preview = document.getElementById('previewImage');
      const file = event.target.files[0];
      if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
      } else {
        preview.classList.add('d-none');
      }
    }
  </script>

  <?php if ($this->session->flashdata('success')): ?>
  <script>
    iziToast.success({
      title: 'Success',
      message: '<?= $this->session->flashdata('success'); ?>',
      position: 'topRight'
    });
  </script>
  <?php endif; ?>
</body>
</html>

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
  overflow-x: hidden; 
  word-wrap: break-word; 
  hyphens: auto;
}

body {
  background-color: #a80000ff;
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
  table-layout: fixed; 
}

.table th, .table td {
  word-wrap: break-word;
  overflow-wrap: break-word;
  white-space: normal; 
  padding: 12px;
  vertical-align: middle;
}


.table td.answer-col {
  max-width: 250px; 
  white-space: normal;
  overflow-wrap: break-word;
  word-wrap: break-word;
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


.footer {
  background-color: #f8f9fa;
  padding: 20px;
  text-align: center;
  width: 100%;
  word-wrap: break-word;
  overflow-wrap: break-word;
}


.main-content {
  flex: 1;
}


@media (max-width: 991px) {
  .hero-section {
    min-height: 60vh;
    padding: 60px 15px;
  }

  .hero-section h1 {
    font-size: 2rem;
    word-wrap: break-word;
  }

  .hero-section p {
    font-size: 1rem;
    word-wrap: break-word;
  }
}

@media (max-width: 768px) {
  body {
    font-size: 14px;
    overflow-x: hidden;
  }

  .navbar-brand {
    font-size: 1.2rem;
    word-wrap: break-word;
  }

  .navbar-nav .nav-link {
    font-size: 0.9rem;
    word-wrap: break-word;
  }

  .profile-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
  }

  .portfolio-section, .quiz-box {
    padding: 15px;
    word-wrap: break-word;
    overflow-wrap: break-word;
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
    word-wrap: break-word;
  }

  .project-tile img {
    height: 160px;
    object-fit: cover;
    max-width: 100%;
  }
}


.container, .container-fluid {
    max-width: 100%;
    overflow-x: hidden; 
}

.card, .alert, .quiz-box {
    word-wrap: break-word;
    overflow-wrap: break-word;
    width: 100%;
}


</style>


<body onload="noBack();" onpageshow="if(event.persisted) noBack();" onunload="">

<title>Quiz Bee Questions List</title>

<header class="header">
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
      <ul class="navbar-nav align-items-center me-3">


        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main'); ?>">Home</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_projects'); ?>">Projects</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">
              👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
          </a>
        </li>


        
        <li class="nav-item dropdown">
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
</header>

<body>

<div class="container my-5" style="color: #ffffff">
    <h2 class="mb-4"><?= htmlentities(is_object($group) ? $group->group_title : $group['group_title'] ?? 'Untitled Group') ?></h2>
    <p><?= htmlentities(is_object($group) ? $group->description : $group['description'] ?? '') ?></p>

    <a href="<?= base_url('index.php/admin_Main/quiz_list') ?>" class="btn btn-secondary mb-3 ms-2">Back to Quiz List</a>

    <?php if (!empty($questions)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                  <?php foreach ($questions as $i => $q): ?>
                      <tr>
                          <td><?= $i + 1 ?></td>
                          <td><?= htmlentities(is_object($q) ? ($q->question ?? '') : ($q['question'] ?? '')) ?></td>
                          <td><?= htmlentities(is_object($q) ? ($q->question_type ?? '') : ($q['question_type'] ?? '')) ?></td>
                          <td>
                              <?= htmlentities(
                                  is_object($q)
                                      ? (property_exists($q, 'answer') ? $q->answer : '')
                                      : ($q['answer'] ?? '')
                              ) ?>
                          </td>

                          <td>
                              <a href="<?= base_url('index.php/admin_Main/edit_quiz_questions/' . (is_object($q) ? ($q->id ?? 0) : ($q['id'] ?? 0))) ?>" class="btn btn-sm btn-warning">Edit</a>
                              <a href="<?= base_url('index.php/admin_Main/delete_quiz_question/' . (is_object($q) ? ($q->id ?? 0) : ($q['id'] ?? 0)) . '/' . $group_id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this question?')">Delete</a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>

        </table>
    <?php else: ?>
        <p>No questions found in this group.</p>
    <?php endif; ?>
</div>


<div class="footer">
<p>&copy; <?php echo date("Y"); ?> Admin Site. All Rights Reserved.</p>
</div>


</body>

</html>

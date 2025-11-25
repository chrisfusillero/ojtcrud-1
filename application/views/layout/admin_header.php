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

  
</head>
<body onload="noBack();" onpageshow="if(event.persisted) noBack();" onunload="">


<header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/admin_Main'); ?>">
      DigiCrud101
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center me-3">

          
        <li class="nav-item me-2">
          <form class="d-flex" action="<?= base_url('index.php/admin_Main/search'); ?>" method="get">
            <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm btn-primary" type="submit">Go</button>
          </form>
        </li>

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

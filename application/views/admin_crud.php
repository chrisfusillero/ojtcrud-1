<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Details</title>
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
  .table {
  width: 100%;               
  margin: 20px auto;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.table td, .table th {
  word-wrap: break-word;
  white-space: normal;        
  padding: 12px;
  vertical-align: middle;
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

.footer {
  background-color: #e1e1e1;
  padding: 15px;
  text-align: center;
  width: 100%;
  font-size: 1em;
}

body {
  padding-top: 70px;  
}


@media (max-width: 768px) {
  .table td, .table th {
    font-size: 0.85rem;
    padding: 8px;
  }

  .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.8rem;
  }
}


</style>  
</head>
<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

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
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Details</a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_calculator'); ?>">Calculator</a>
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

</header>

  <div class="container mt-5">
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Username</th>
          <th scope="col">Address</th>
            <th scope="col">Role</th>  
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($getUsers as $key => $value): ?>
          <tr>
            <td><?= $value['firstname']; ?></td>
            <td><?= $value['lastname']; ?></td>
            <td><?= $value['username']; ?></td>
            <td><?= $value['address']; ?></td>
            <td><?= $value['user']; ?></td>
            <td class="text-nowrap">
              <button onclick="edit_data(<?= $value['id']; ?>)" class="btn btn-sm btn-success me-1">edit</button>
              <button onclick="deletedata(<?= $value['id']; ?>)" class="btn btn-sm btn-danger">delete</button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>



<br />
<br />




   <script>
        let url = '<?= base_url() ?>';

        function deletedata(id) {

            iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: ' ',
                message: 'are you sure?',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                buttons: [
                    ['<button>Ok</button>', function(instance, toast) {


                        window.location.href = url + 'index.php/Welcome/delete/' + id;

                    }, true], // true to focus
                    ['<button>Close</button>', function(instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                            }
                        }, toast, 'buttonName');
                    }]
                ],
                onOpening: function(instance, toast) {
                    console.info('callback abriu!');
                },
                onClosing: function(instance, toast, closedBy) {
                    console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                }
            });


        }

        function edit_data(id) {
            window.location.href = url + 'index.php/admin_Main/admin_edit_access/' + id;

        }

        function update_data(id) {
            window.location.href = url + 'index.php/admin_Main/admin_update_access/' + id;
        }
    </script>

 </div>
</div>

<br>
<br>
<br>
<br>

<div class="footer">
<p>&copy; <?php echo date("Y"); ?> Demo Website. All Rights Reserved.</p>
</div>
 
</body>

</body>
</html>


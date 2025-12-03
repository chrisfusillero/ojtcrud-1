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
  height: 100%;
  margin: 0;
  font-family: 'Poppins', sans-serif;
  display: flex;
  flex-direction: column;
  background-color: #a80000ff;
  background-size: cover;         
  background-position: center;    
  background-repeat: no-repeat;   
  background-attachment: fixed;   
}

body {
  padding-top: 70px; /* navbar height */
}

.main-content-wrapper {
  flex: 1 0 auto; /* grow and take available space */
}

/* Header / Navbar */
.header {
  background-color: #fff;
  color: #222;
  text-align: center;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 100;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

/* Footer */
.footer {
  background-color: #e1e1e1;
  padding: 15px;
  text-align: center;
  font-size: 1em;
  flex-shrink: 0; /* ensure footer does not shrink */
}

/* Table styling */
.table {
  width: 100%;
  margin: 20px auto;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.table td, .table th {
  word-wrap: break-word;
  white-space: normal;
  padding: 12px;
  vertical-align: middle;
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

<title>Profiles and Info</title>
</head>
<body onload="noBack();" onpageshow="if(event.persisted) noBack();" onunload="">

<header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" style="color: #616161ff;" href="<?= base_url('index.php/admin_Main'); ?>">
      DigiCrud101
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">Menu</button>
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

<!-- Main content wrapper -->
<div class="main-content-wrapper container mt-5">

  <div class="row mb-3">
    <div class="col-md-2">
      <label for="showEntries">Show</label>
      <select id="showEntries" class="form-select">
        <option value="5">5</option>
        <option value="10" selected>10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
    </div>

    <div class="col-md-4">
      <label for="searchInput">Search</label>
      <input type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle" id="userTable">
      <thead class="table-light">
        <tr>
          <th onclick="sortTable(0)" style="cursor:pointer;">First Name</th>
          <th onclick="sortTable(1)" style="cursor:pointer;">Last Name</th>
          <th onclick="sortTable(2)" style="cursor:pointer;">Username</th>
          <th onclick="sortTable(3)" style="cursor:pointer;">Address</th>
          <th onclick="sortTable(4)" style="cursor:pointer;">Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <?php foreach ($getUsers as $key => $value): ?>
        <tr>
          <td><?= $value['firstname']; ?></td>
          <td><?= $value['lastname']; ?></td>
          <td><?= $value['username']; ?></td>
          <td><?= $value['address']; ?></td>
          <td><?= $value['user']; ?></td>
          <td class="text-nowrap">
            <button onclick="edit_data('<?= urlencode($value['username']); ?>')" class="btn btn-sm btn-success me-1">edit</button>
            <button onclick="deletedata(<?= $value['id']; ?>)" class="btn btn-sm btn-danger">delete</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div> <!-- End of main-content-wrapper -->

<!-- Footer -->
<div class="footer">
  <p>&copy; <?php echo date("Y"); ?> Admin Site. All Rights Reserved.</p>
</div>

<script>
let url = '<?= base_url() ?>';

function deletedata(id) {
    iziToast.show({
        theme: 'dark',
        icon: 'icon-person',
        title: ' ',
        message: 'Are you sure you want to delete this record?',
        position: 'center',
        progressBarColor: 'rgb(0, 255, 184)',
        buttons: [
            ['<button>OK</button>', function (instance, toast) {
                window.location.href = url + 'index.php/Welcome/delete/' + id;
            }, true],
            ['<button>Cancel</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOutUp' }, toast);
            }]
        ]
    });
}

function edit_data(id) {
    window.location.href = url + 'index.php/admin_Main/admin_edit_access/' + id;
}

document.getElementById("searchInput").addEventListener("keyup", function () {
  let filter = this.value.toLowerCase();
  let rows = document.querySelectorAll("#userTable tbody tr");

  rows.forEach(row => {
    let text = row.innerText.toLowerCase();
    row.style.display = text.includes(filter) ? "" : "none";
  });
});

const tableBody = document.getElementById("tableBody");
const rows = Array.from(tableBody.querySelectorAll("tr"));
const searchInput = document.getElementById("searchInput");
const showEntries = document.getElementById("showEntries");

let currentSort = { index: null, asc: true };

searchInput.addEventListener("input", filterRows);
showEntries.addEventListener("change", filterRows);

function filterRows() {
  const filter = searchInput.value.toLowerCase();
  const maxRows = parseInt(showEntries.value);

  let filtered = rows.filter(row => row.innerText.toLowerCase().includes(filter));

  tableBody.innerHTML = "";
  filtered.slice(0, maxRows).forEach(row => tableBody.appendChild(row));
}

function sortTable(colIndex) {
  currentSort.asc = (currentSort.index === colIndex) ? !currentSort.asc : true;
  currentSort.index = colIndex;

  rows.sort((a, b) => {
    let x = a.children[colIndex].innerText.toLowerCase();
    let y = b.children[colIndex].innerText.toLowerCase();
    return currentSort.asc ? x.localeCompare(y) : y.localeCompare(x);
  });

  filterRows(); 
}

filterRows();
</script>

</body>
</html>

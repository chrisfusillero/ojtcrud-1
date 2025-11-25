

<style>
  body {
  background-image: url('<?php echo base_url("assets/portfolio_image/emeraldgreen.jpg"); ?>');
  background-size: cover;         
  background-position: center;    
  background-repeat: no-repeat;   
  background-attachment: fixed;   
  font-size: 16px;
  margin: 0;
  padding-top: 70px; 
}



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

<title>Profiles and Info</title>



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
              <button onclick="edit_data('<?= urlencode($value['username']); ?>')" class="btn btn-sm btn-success me-1">edit</button>
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
</script>


 </div>
</div>

<br>
<br>
<br>
<br>


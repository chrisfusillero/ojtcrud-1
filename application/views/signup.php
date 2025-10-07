<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fill Signup Form</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</head>
<body style="background-color: #f8f8f88f ;">
    <br><br><br><br><br>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 500px; background-color: white;">
            <div class="container">
                <h1 class="title text-center mb-4">Enter Information</h1>
                <div class="mb-3"></div>
                <div class="row justify-content-center">
                    <div class="col-sm-4"></div>
                    <div></div>
                    <form action="<?= base_url() ?>index.php/AuthLogin/signup" method="POST">
                        <div class="mb-3">
                            <label for="firstname" class="form-label"></label>
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo set_value('firstname'); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label"></label>
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo set_value('lastname'); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label"></label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label"></label>
                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo set_value('address'); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"></label>
                            <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo set_value('email'); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"></label>
                            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" />
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-success">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="http://localhost/crud/index.php/AuthLogin" class="btn btn-danger ms-2">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


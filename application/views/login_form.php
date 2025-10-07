<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

   <div class="container">
  <title>Login</title>
  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>
<script type="text/javascript">    
             window.history.forward();
             function noBack() { 
                  window.history.forward(); 
             }
        </script>

<style>
        body {
            display: flex;              
            justify-content: center;  
            align-items: center;      
            min-height: 100vh;          
            background-color: #f0f2f5; 
            font-family: sans-serif;   
        }

        .login-form {
            width: 300px; 
            padding: 20px;
            border: 1px solid #ddd; 
            border-radius: 5px;
            background-color: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }


     
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
        }

        button {
            background-color: #007bff; 
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%; 
        }

        button:hover {
            background-color: #0056b3; 
        }
    </style>
</head>

<body style="background-color: #f8f8f88f ;" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

<div class="container d-flex justify-content-center align-items-center">
    <div class="login-form">
        <div class="row justify-content-center">
            <div class="col-sm-12">
        <h2>Login</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('index.php/AuthLogin/login'); ?>" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>

            <div>
            <p>Don't have an account? <a href="<?php echo base_url('index.php/AuthLogin/signup'); ?>">Sign up</a></p>
            </div>
        </form>

        </div>
    </div>
</div>



</body>
</html>


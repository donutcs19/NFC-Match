<?php
session_start();
require_once ('../config/conn.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- <style>
        footer {
            position: fixed ;
            bottom: 0;
            width: 100%;
        }

        body {
  height: 100%;
}

 {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}



    </style> -->
</head>
  <body>
    <?php require_once ("bootstrap/nav.php"); ?>

    <main class="form-signin w-100 m-auto">
  <form action="check_login.php" method="POST">
    
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <?php if (isset($_SESSION['error'])){?>
        <div class="alert alert-danger" role="alert">
            <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
    <?php }?>
</div>

    <?php if (isset($_SESSION['success'])){?>
        <div class="alert alert-success" role="alert">
            <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
    <?php }?>
</div>

    <?php if (isset($_SESSION['warning'])){?>
        <div class="alert alert-danger" role="alert">
            <?php 
            echo $_SESSION['warning'];
            unset($_SESSION['warning']);
            ?>
    <?php }?>
</div>
        

   

    <div class="form-floating">
      <input type="text" class="form-control" name="username"  placeholder="name@example.com" >
      <label for="email">Username</label>
    </div>
    
    <div class="form-floating">
      <input type="password" class="form-control" name="password"  placeholder="Enter your Password" >
      <label for="password">Password</label>
    </div>

   

    
    <button class="w-100 btn btn-lg btn-primary" name="signin" type="submit">Sign In</button>
   
  </form>
</main>

    <?php require_once ("bootstrap/footers.php"); ?>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
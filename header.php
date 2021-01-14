<?php include 'connect.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="bootstrap.min.css">
      <link rel="stylesheet" href="handwork.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Handwork | Welcome</title>
      <style>
     
      
      </style>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light ">
	<div class="container">
  <a class="navbar-brand" href="index.php">Handwork.<span class="ng">ng</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto" style="margin-right: 300px">
         <li class="nav-item">
       <?php if(isset($_SESSION['id'])) { ?>
       <a href="add-artsans.php" class="btn btn-primary"><i class="fas fa-user-plus">Add A New user</i></a>
       <?php } ?>
      </li>  
          <li class="nav-item">
       <?php if(isset($_SESSION['id'])) { ?>
       <a href="dashboard.php" class="nav-link">Dashboard</a>
       <?php } ?>
      </li> 
        <?php if(isset($_SESSION['id'])) { ?>
      <li class="nav-item">
        <a href="profile.php" class="nav-link"><i class="fas fa-user-circle"></i>Profile</a>
      </li>
        <?php } else { ?>
      <li class="nav-item">
        <a href="signup.php" class="nav-link"><i class="fas fa-user-plus">Sign Up</i></a>
      </li>
      <?php }
        if(isset($_SESSION['id'])) { ?>
         <li class="nav-item">
          <a class="nav-link" href="?functions=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
         <?php } else { ?>
        <li class="nav-item">
          <a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i>Login</a>
        </li>
        <?php } ?>
      </ul>
  </div>
</div>
</nav>
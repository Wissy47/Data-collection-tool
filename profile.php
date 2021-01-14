<?php 
include 'header.php';
$adminEmail = $_SESSION['user']['user_email'];
$artisans = queryResult_for_artisan($adminEmail);
?>
<div class="wraped">
    <div class="container clear-top main">
<div class="wrapper">
<div class="table">
    <div class="" style="text-align:center;">
 
        <div class="col-12 col-md-8 col-lg-9"> 
  <div class="card">
  	<div class="card-header">
      <span class="mr-5">ACCOUNT DETAILS</span> <a href="#" class="ml-5">edit</a>
    </div>
	 	<h5 class="card-title text-center"><?php  echo ucfirst($_SESSION['user']['first_name']) .  "  " .  ucfirst($_SESSION['user']['last_name']); ?></h5> 
	 	<p class="card-text text-center"><?php echo $_SESSION['user']['user_email']; ?></p>
      <span>Number of Artisans you have added<a href="dashboard.php" class="card-link text-center"><?php echo ' ' .count($artisans); ?></a></span>
	  	<a href="#" class="card-link text-center">CHANGE PASSWORD</a>
   </div><?php
 
                
?>
</div>
    </div>
</div>
</div> 
    </div>
</div>
<?php
    include 'footer.php';
?>
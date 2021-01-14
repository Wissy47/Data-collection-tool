<?php
include 'header.php';

if(isset($_SESSION['id'])){
	return;
}
    $email=$pass='';
    $error = array();
if(isset($_POST['loginbt'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    if(empty($email)){
        $error[] = "Email field can't be empty";
    }
    if(empty($pass)){
        $error[] =  "Password field can't be empty";
    }
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $result = queryResult($email);
    $row = mysqli_fetch_assoc($result);  		
    if(!empty($_POST['email'])){
	 	if ( mysqli_num_rows($result) < 1) {
  		 	$error[] = "Incorect email address";
  		 }
        if(!empty($_POST['password']) && !empty($_POST['email']) && mysqli_num_rows($result) == 1){
	 	     if(password_verify($password, $row['pass']) === false){
			     $error[] = "Incorect password";
	 	     }
	   }
    }
    if(!array_filter($error)){
		$_SESSION['user'] = $row;
		$_SESSION['id'] = $row['id'];
        echo '<script>window.location.assign("/index.php")</script>';
		exit;

	}
} ?><div class="wraped">
    <div class="container clear-top main">
<div class="wrapper">
<div class="table">
    <div class="table-cell">
   <form action="" method="post">
    <div class="alert-danger empty alert" role="alert"><?php foreach( $error as $err ){ echo '<li>' . $err . '</li>'; } ?></div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
      </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="Password" name="password"  value="<?php echo $pass; ?>">
  </div>
  <button type="submit" name="loginbt" class="btn btn-primary">Sign-in</button>
        </form>
    </div>
</div>
</div> 
     </div></div>
<?php
    include 'footer.php';
?>
<?php 
include 'header.php';
if(isset($_SESSION['id'])){
	return;
}
$email = $pass = $firstname = $lastname = '';
  $error = array();
if(isset($_POST['regsubmit'])){
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
    if(empty($email)){
        $error[] = "Email field can't be empty";
    }
    if(empty($pass)){
        $error[] =  "Password field can't be empty";
    }
    if(empty($firstname)){
        $error[] = "Firstname field can't be empty";
    }
    if(empty($lastname)){
        $error[] =  "Lastname field can't be empty";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Please enter a valid email address";
    }
    if (!preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[\d])\S*$/', $pass)) {
   	    $error[] = "password must be a minimum of 6 characters containing at least a number";
   }
    
         $email = mysqli_real_escape_string($conn, $_POST['email']);
 		 $password = mysqli_real_escape_string($conn, $_POST['password']);
	     $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
	     $surname = mysqli_real_escape_string($conn, $_POST['lastname']);
    
    if (!empty($email) && !empty($password)) {
	       $result = queryResult($email);
	       if(mysqli_num_rows($result) > 0 ) {
	      	$error[] = "This email address already exist";
	        }
	 }
    if(!array_filter($error)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users(first_name, last_name, user_email, pass ) VALUES (  '$firstName', '$surname', '$email', '$password')";
	      	
 		  	if(mysqli_query($conn, $query)){
 		  	//$_SESSION['id'] = mysqli_insert_id($conn);
echo '<script>window.location.assign("/index.php")</script>';header('location: index.php');
                exit;
            }
        }
} ?><div class="wraped">
    <div class="container clear-top main">
<div class="wrapper">
<div class="table">
    <div class="table-cell">
   <form method="post" action="">
       <div class="alert-danger alert empty" role="alert"><?php foreach( $error as $err ){ echo '<li>' . $err . '</li>'; } ?></div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
      </div>
       <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="firtname" name="firstname" value="<?php echo $firstname; ?>">
      </div>
       <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
      </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo $pass; ?>">
  </div>
  <button type="submit" name="regsubmit"class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
</div>
    </div></div>

<?php
    include 'footer.php';
?>
<?php 
include 'header.php';

if(!isset($_SESSION['id'])){
	header('location: login.php');
}
?><div class="wraped">
    <div class="container clear-top main">
<div class="wrapper">
<div class="table">
    <div class="table-cell" style="text-align:center;">
        <h3 class="sucessmsg">Successful</h3>
        <a href="add-artsans.php" class="btn btn-primary">Add A New User</a> <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
        
    </div>
</div>
</div> 
    </div>
</div>
<?php
    include 'footer.php';
?>
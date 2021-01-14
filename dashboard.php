<?php 
include 'header.php';

if(!isset($_SESSION['id'])){
	header('location: login.php');
    exit;
    return;
}

$adminEmail = $_SESSION['user']['user_email'];

if (isset($_GET['id'])) {
   $query = "DELETE FROM artisans WHERE id =" . $_GET['id'];
   if(mysqli_query($conn, $query)){
        echo '<script>alert("Deleted Successfully");</script>';
   }
}

$artisans = queryResult_for_artisan($adminEmail);
 if( count($artisans) == 0 ){
     $msg = 'You have not added any Artisan <a href="add-artsans.php">Click here</a> to start adding';
 }else{
    $msg = '';
 }
$sn = 1;

?><div class="wraped">
<div class="container clear-top main">
  <div class="row">
  
      <div class="col-md-12"> 
          <div style="overflow-x: auto;">
          <table>
              <tr>
                  <th>S/N</th>
                  <th>First Name</th>
                  <th>Surname</th>
                  <th>Phone No</th>
                  <th>Address</th>
                  <th>State</th>
                  <th>Time added</th>
                  <th>Service/Trade</th>

              </tr>
               
                    <?php
                   foreach($artisans as $artisan){ ?>
             <tr id="<?php echo $artisan['id']; ?>">
                  <?php
                  echo '<td>' . $sn .'</td>';
                  $sn++;
                  echo '<td>' . $artisan['first_name'] . '</td>';
                  echo '<td>' . $artisan['last_name'] . '</td>';
                  echo '<td>' . $artisan['phonenum'] . '</td>';
                  echo '<td>' . $artisan['address'] .' '. $artisan['town'] .' '.$artisan['lga'] .  '</td>';
                  echo '<td>' . $artisan['state'] . '</td>';
                  echo '<td>' . $artisan['created_at'] . '</td>';
                  echo '<td>' . $artisan['services'] . '</td>';
                    ?>
                   <td><form action="" method="POST" id="artisanDelete" name="artisanDelete">
		<input type="hidden" name="artisan_delete" value="<?php echo $artisan['id']; ?>">
		<button type="submit" name="delete" class="btn btn-danger" id="delete" style="margin-bottom: 0px;">Delete</button>
	          </form>
                    </td>
                </tr>
                  
             <?php }
              
              ?>

          </table>
      </div>
         <div style="text-align: center; color: darkgrey; margin-top: 100px; margin-bottom: 100px;" class="empty"><?php echo $msg; ?></div>
      </div>
    </div>

    </div> </div>
<?php
    include 'footer.php';
?>
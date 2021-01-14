<?php 
include 'header.php';


?><div class="wraped">
    <div class="container clear-top main">
<div class="wrapper">
<div class="table">
    <div class="table-cell" style="text-align:center;">
        <h1><a class="navbar-brand" href="index.php">Handwork.<span class="ng">ng</span></a></h1>
         <?php if(isset($_SESSION['id'])) { 
    echo 'Hello'.' '. ucfirst($_SESSION['user']['first_name']);
        }
    else{
        echo 'Please <a href="login.php">log-in</a> to gain full access';
    }
        ?>
        
    </div>
</div>
</div> 
</div>
</div>

<?php
    include 'footer.php';
?>
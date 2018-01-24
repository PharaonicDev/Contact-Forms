<link rel="stylesheet" href="form_style.css">
<?php 
/* welcome.php */

//$_SESSION variables become available on this page
session_start(); 
?>
<div class="body content">
<div class="welcome">
<div class="alert alert-success"><?php= $_SESSION['message'] ?></div>
    <img src="<?php $_SESSION['avatar'] ?>"><br />
    Welcome <span class="user"><?php $_SESSION['username'] ?></span>
    <?php
    $mysql = new mysqli("127.0.0.1", "accounts");
    $sql = "SELECT username, avatar FROM users";
    //$result = mysqli_result object
    $result = $mysql->query( $sql ); 
    ?>
    <div id='registered'>
    <span>All registered users:</span>
    <?php
    //returns associative array of fetched row
    while( $row = $result->fetch_assoc() ){ 
        echo "<div class='userlist'><span>".$row['username']."</span><br />";
        echo "<img src='".$row['avatar']."'></div>";
    }
?>  
</div>
</div>
</div>

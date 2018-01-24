<?php 
//record session for user
 session_start();
 $_SESSION['message'] = '';
 //connect to database
 $mysql = new mysqli('localhost', 'root' , '','accounts');
 // make sure if form is submit
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // MATCH PASSWORD
  if($_POST['password'] == $_POST['confirmpassword']){
  
    $username    = $mysql->real_escape_string($_POST['username']);
    $email       = $mysql->real_escape_string($_POST['email']);
    $password    =md5($_POST['password']); //md5 for hash password
    $avatar_path = $mysql->real_escape_string('images/'.$_FILES['avatar']['name']);
   //make sure file type is image
    if(preg_match("!image!", $_FILES['avatar']['type'])){

      //copy images to images /folder
      if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){

       $_SESSION['username'] =  $username;
       $_SESSION['avatar'] = $avatar_path;
       $sql = "INSERT INTO users (username, email, password,avatar)"."VALUES('$usernmae','$email','$password', '$avatar_path')";

     //if the query is succesful,redirect to welcome.php page, done!

       if($mysql->query($sql) === true ){
         $_SESSION['message'] = 'registerion is sucessfull Add $username to the database ';
     
       header("location:welcome.php");
       } else{
        $_SESSION['message'] == "user coud not added to database";
       } 

      }
     else{
      $_SESSION['message'] == 'file uplode failed';
     }
    }
    else{
      $_SESSION['message'] == 'please only upload Gif, jpG, or png images';
    }
   }else {
    $_SESSION['message'] == 'password donot match ';
   }

  }
// Finally, destroy the session.
session_destroy();
?>

<link rel="stylesheet" href="form_style.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="message"><?php  $_SESSION['message'] = '';?></div>
      <div class="alert alert-error"></div>
      <input type="text" value="<?php $username?>" placeholder="User Name" name="username" required />
      <input type="email" value="<?php $email ?>" placeholder="Email" name="email" required />
      <input type="password"  value="<?php $password ?>" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" value="<?php $password ?>" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
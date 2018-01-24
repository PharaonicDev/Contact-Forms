
<?php include('form_process.php'); ?>
<link rel="stylesheet" type="text/css" href="contact_form_style.css">
<div id="form-main">
  <div id="form-div">
   <h3>Contact US</h3>
   
    <form class="form" id="form1" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      
      <p class="name">
        <input name="name" value=" <?php echo $name;  ?>" type="text" class="validate[custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
        <span class="error"><?php echo $name_error?></span>
      </p>
      
      <p class="email">
        <input name="email" value=" <?php echo $email;  ?>" type="text" class="validate[custom[email]] feedback-input" id="email" placeholder="Email" />
          <span class="error"><?php echo $email_error?></span>
      </p>

      <p class="phone">
        <input name="phone" value=" <?php echo $phone;  ?>" type="text" class="validate[custom[phone]] feedback-input" id="phone" placeholder="phone" />
          <span class="error"><?php echo $phone_error?></span>
      </p>
      
      <p class="website">
        <input name="url"  value=" <?php echo $url;  ?>" type="text" class="validate[custom[website]] feedback-input" id="website" placeholder="website" />
          <span class="error"><?php echo $url_error?></span>
      </p>
      <p class="text">
        <textarea name="text" value=" <?php echo $message;  ?>" class="validate[length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
          <span class="error"><?php echo $message_body?></span>
      </p>
      
      
      <div class="submit">
        <input name ="submit" type="submit" value="SEND" id="button-blue"/>
        <div class="ease"></div>
      </div>
      <span class="success"> <?php echo $success;?></span>
    </form>
  </div>
<?php
  require 'connect.php';

  $email = trim($_POST['email']);
  $feedback = trim($_POST['feedback']);
  if($email != "" && $feedback != ""){
    $my_mail = "makhmet.kb@gmail.com";
    $subject="?=utf-8?B?".base64_encode("Feedback from Diamond WS")."?=";
    $headers="From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

    mail($my_mail,$subject,$feedback,$headers);

    $err_div = "
    <div class='alert alert-danger alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      Sent. <a href='catalog.php'>Go to Catalog</a>
    </div>
    ";
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    $page_title='Feedback';
    require 'blocks/head.php';
    ?>
  </head>
  <body>
    <?php
    $log_active='active';
    $log_icon='<i class="fas fa-sign-in-alt"></i> ';
    require 'blocks/header.php';
    ?>
    <main>
      <div class="container">
        <div class="jumbotron jumbotron-fluid title-custom">
          <div class="container text-center">
            <h2 class="">Feedback</h1>
            <p> <i> <b>Diamond</b> </i> Wedding Salon</p>
          </div>
          <form action="feedback.php" method="post">
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="email" name="email" value="<?=$_COOKIE['email']?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Write your message here</label>
              <textarea name="feedback" class="form-control" required></textarea>
            </div>
            <?=$err_div?>
            <button type="submit" class="btn btn-custom"> Send </button>
          </form>
        </div>
      </div>
    </main>
    <?php
    require 'blocks/footer.php';
    ?>
  </body>
</html>

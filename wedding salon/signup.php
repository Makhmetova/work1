<?php
  require 'connect.php';

  $username = trim($_POST['user']);
  $email = trim($_POST['email']);
  $password = trim($_POST['passwd']);

  $sss = "select * from users where email = '$email'";
  $result = mysqli_query($con, $sss);
  $num1 = mysqli_num_rows($result);

  $sss = "select * from users where username = '$username'";
  $result = mysqli_query($con, $sss);
  $num2 = mysqli_num_rows($result);

  if($num1 == 1 || $num2 == 1 ){
    if($email == ""){}
      else {
      $err_div = "
      <div class='alert alert-danger alert-dismissible fade show'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        This user is already exist.
      </div>
      ";
    }
  }
  else{
    $passwd = hash('sha256', $password . $username);
    $reg = "insert into users (username, email, passwd) values ('$username', '$email', '$passwd')";
    mysqli_query($con, $reg);
      header('location:signin.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    $page_title='Registration';
    require 'blocks/head.php';
    ?>
  </head>
  <body>
    <?php
    $reg_active='active';
    $reg_icon='<i class="fas fa-user-plus"></i> ';
    require 'blocks/header.php';
    ?>
    <main>
      <div class="container">
        <div class="jumbotron jumbotron-fluid title-custom">
          <div class="container text-center">
            <h2 class="">Registration</h1>
            <p> <i> <b>Diamond</b> </i> Wedding Salon</p>
          </div>
          <form action="signup.php" method="post">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="user" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="passwd" class="form-control" required>
            </div>
            <?=$err_div?>
            <button type="submit" class="btn btn-custom"> Sign up </button>
          </form>
        </div>
      </div>
    </main>
    <?php
    require 'blocks/footer.php';
    ?>
  </body>
</html>

<?php
  require 'connect.php';

  $email = trim($_POST['email']);
  $password = trim($_POST['passwd']);
  if($email != ""){
    $sss = "select * from users where email = '$email'";
    $result = mysqli_query($con, $sss);
    $row = mysqli_fetch_row($result);

    $username = $row[1];
    $passwd = hash('sha256', $password . $username);

    $sss = "select * from users where email = '$email' && passwd = '$passwd'";
    $result = mysqli_query($con, $sss);
    $num = mysqli_num_rows($result);

    if($num == 1){
      setcookie('email',$email,time()+3600*24*30,"/");
      header('location:catalog.php');
    }
    else{
      $err_div = "
      <div class='alert alert-danger alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      Invalid e-mail or password!
      </div>
      ";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    if ($_COOKIE['email'] == '') {
      $page_title='Log in';
    }
    elseif ($_COOKIE['email'] == 'makhmet.kb@gmail.com') {
      $page_title='Admin';
    }
    else {
      $page_title='User';
    }

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
          <?php if($_COOKIE['email'] == ''): ?>
          <div class="container text-center">
            <h2 class="">Log in</h1>
            <p> <i> <b>Diamond</b> </i> Wedding Salon</p>
          </div>
          <form action="signin.php" method="post">
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="passwd" class="form-control" required>
            </div>
            <?=$err_div?>
            <button type="submit" class="btn btn-custom"> Log in </button>
          </form>
          <?php elseif ($_COOKIE['email'] == 'makhmet.kb@gmail.com'): ?>
            <div class="container">
              <h2 class="text-center">Admin page</h2>
              <div class="row">
              <h3>Users</h3>
                <div class="col-md-8 mt-3 mb-5">
                  <?php
                  $sql = "select * from users";
                  $query = mysqli_query($con, $sql);
                  echo "
                  <table class='table'>
                  <thead>
                  <tr>
                  <th>Username</th>
                  <th>E-mail</th>
                  </tr>
                  </thead>
                  <tbody>
                  ";
                  while($row = mysqli_fetch_assoc($query)) {
                    $u_name = $row['username'];
                    $u_mail = $row['email'];
                    echo "
                    <tr>
                    <td>$u_name</td>
                    <td>$u_mail</td>
                    </tr>
                    ";
                  }
                  echo "
                  </tbody>
                  </table>
                  ";
                  ?>
                </div>
                <div class="col-md-8 mt-3 mb-">
                <h3>Add new product</h3>
                  <form action="signin.php" method="post">
                    <div class="form-group">
                      <label for="">ID:</label>
                      <input type="number" name="p_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="p_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea name="p_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Designer: </label>
                      <select name="p_designer" class="form-control">
                        <option value="Justin Alexander">Justin Alexander</option>
                        <option value="Demetrios">Demetrios</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="p_type">Type: </label>
                      <select name="p_type" class="form-control">
                        <option value="Dress">Dress</option>
                        <option value="Accessory">Accessory</option>
                      </select>
                    </div>
                    <h5>We need at least 2 photos</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Photo 1</label>
                          <input type="file" name="photo_FF">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Photo 2</label>
                          <input type="file" name="photo_FB">
                        </div>
                      </div>
                    </div>
                    <?=$err_div?>
                    <button type="submit" class="btn btn-custom"> Log in </button>
                  </form>
                </div>
              </div>
              </div>
          <?php else: ?>
            <div class="container text-center">
              <h2 class="">User Page</h2>
              <h3>Your comments</h3>
              <div class="col-md-8 mt-3 mb-5">
                <?php
                $cookie_email = $_COOKIE['email'];
                $sql = "select * from comments where email = '$cookie_email'";
                $query = mysqli_query($con, $sql);
                echo "
                <table class='table'>
                <thead>
                <tr>
                <th>Product ID</th>
                <th>Comment</th>
                </tr>
                </thead>
                <tbody>
                ";
                while($row = mysqli_fetch_assoc($query)) {
                  $p_id = $row['p_id'];
                  $u_comment = $row['comment'];
                  echo "
                  <tr>
                  <td>$p_id</td>
                  <td>$u_comment</td>
                  </tr>
                  ";
                }
                echo "
                </tbody>
                </table>
                ";
                ?>
            </div>
        <?php endif; ?>
        </div>
      </div>
    </main>
    <?php
    require 'blocks/footer.php';
    ?>
  </body>
</html>

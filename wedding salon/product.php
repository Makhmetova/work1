<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    $id = $_GET['id'];

    $page_title="$id - Diamond";
    require 'blocks/head.php';
    ?>
  </head>
  <body>
    <?php
    $catalog_active='active';
    $catalog_icon='<i class="fas fa-shopping-basket"></i> ';
    require 'blocks/header.php';
    ?>
    <main>
      <?php
      require 'connect.php';
      $sql = "select * from products where id = '$id'";
      $query = mysqli_query($con, $sql);
      $row = mysqli_fetch_row($query);

      $p_name = $row[1];
      $p_id = $row[0];
      $p_description = $row[2];
      $p_designer = $row[3];
      $p_type = $row[4];
      ?>
      <div class="container">
        <div class="jumbotron jumbotron-fluid title-custom">
          <h5><a href="catalog.php"><i class="fas fa-arrow-left"></i> Back</a></h5>
          <div class="container text-center">
            <h2 class=""><?=$p_id.' '.$p_name?>
            </h2>
              <p> <i> <b>Diamond</b> </i> Wedding Salon</p>
            </div>
            <div class="row">
              <?php
              echo "
              <div class='col-sm-12 col-md-6 col-lg-6 my-2'>
                  <img class='card-img-top' src='img/catalog/$p_id/".$p_id."_FF.jpg' alt='Card image'>
              </div>

              <div class='col-sm-12 col-md-6 col-lg-6 my-2'>
                  <img class='card-img-top' src='img/catalog/$p_id/".$p_id."_FB.jpg' alt='Card image'>
              </div>
              ";
              ?>
            </div>
            <div class="row">
              <div class='col-sm-12 col-md-6 col-lg-7 my-2'>
                <p><b><i class='far fa-address-card'></i> Designer:</b> <?=$p_designer?></p>
                <p><b>Type:</b> <?=$p_type?></p>
                <p><?=$p_description?></p>
              </div>

              <div class='col-sm-12 col-md-6 col-lg-5 my-2'>
                <p><b><i class="fas fa-comment-dots"></i> Comments:</b></p>
                <form action='product.php?id=<?=$id?>' method='post'>
                  <div class='form-group'>
                    <label for=''>E-mail</label>
                    <input type='email' name='email' value='<?=$_COOKIE['email']?>' class='form-control' required>
                  </div>
                  <div class='form-group'>
                    <label for=''>Write your message here</label>
                    <textarea name='comment' class='form-control' required></textarea>
                  </div>
                  <button type='submit' class='btn btn-custom'> Add comment </button>
                </form>
                <?php
                if($_POST['email'] != '' && $_POST['comment'] != ''){
                  $email = trim($_POST['email']);
                  $comment = trim($_POST['comment']);

                  $reg = "insert into comments (p_id, email, comment) values ('$id', '$email', '$comment')";
                  mysqli_query($con, $reg);
                }

                $sql = "select * from comments where p_id = '$id' order by id desc";
                $query = mysqli_query($con, $sql);

                while($row = mysqli_fetch_assoc($query)) {
                  $u_email = $row["email"];
                  $u_comment = $row["comment"];
                  echo "
                  <div class='d1-custom mt-2 p-2'>
                  <h6>$u_email</h6>
                  <p>$u_comment</p>
                  </div>
                  ";
                }
                ?>
              </div>
            </div>
        </div>
      </div>
    </main>
    <?php
    require 'blocks/footer.php';
    ?>
  </body>
</html>

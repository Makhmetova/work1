<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    $page_title='Welcome!';
    require 'blocks/head.php';
    ?>
  </head>
  <body>
    <?php
    $index_active='active';
    $index_icon='<i class="far fa-gem"></i> ';
    require 'blocks/header.php';
    ?>
    <main>
      <div class="jumbotron jumbotron-fluid title-custom">
        <div class="container text-center">
          <h1 class="">Diamond</h1>
          <p>Wedding Salon</p>
          <img src="img/main/3.jpg" alt="">
        </div>
      </div>
      <div class="jumbotron jumbotron-fluid d1-custom">
        <div class="container text-center">
          <h1 class="">Shop</h1>
          <div class="row">
            <?php
            require 'connect.php';

            $sql = "select id from products";
            $query = mysqli_query($con, $sql);

            $i = 0;
            while($row = mysqli_fetch_assoc($query)) {
              $p_id = $row["id"];
              echo "
              <div class='col-md-4 my-2'>
                <div class='card card-custom' style='width:100%'>
                  <img class='card-img-top' src='img/catalog/$p_id/".$p_id."_FF.jpg' alt='Card image'>
                  <div class='card-body'>
                    <h4 class='card-title'>$p_id</h4>
                    <a href='#' class='btn btn-custom'>More Info</a>
                  </div>
                </div>
              </div>
              ";
              $i++;
              if ($i == 3) break;
            }
            ?>
          </div>
          <a href="catalog.php">Show more</a>
        </div>
      </div>
      <div class="jumbotron jumbotron-fluid d2-custom">
        <div class="container">
          <h1 class="text-center mb-5">Designers</h1>
          <div class="row">
            <div class="col-md-6">
              <div class="card" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title">Justin Alexander</h4>
                  <p class="card-text">Execlusive collection of wedding dresses of <i>Justin Alexander</i> create two talented designers Tony Mentel and Jose Dias.</p>
                  <a href="des_j.php" class="btn btn-custom">See More</a>
                </div>
                <img class="card-img-top" src="img/main/j_profile.jpg" alt="Card image">
              </div>
            </div>
            <div class="col-md-6">
              <div class="card" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title">Demetrios</h4>
                  <p class="card-text">Demetrios style is recognizable around the world - expensive, exclusively, natural fabrics and exquisite décor: flowers, lace, sewing, Swarovski crystals and semiprecious stones.</p>
                  <a href="des_d.php" class="btn btn-custom">See More</a>
                </div>
                <img class="card-img-bottom" src="img/main/d_profile.jpg" alt="Card image">
              </div>
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

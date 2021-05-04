<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    $page_title='Demetrios';
    require 'blocks/head.php';
    ?>
  </head>
  <body>
    <?php
    $des_active='active';
    $des_icon='<i class="far fa-address-card"></i> ';
    require 'blocks/header.php';
    ?>
    <main>
      <div class="container text-center title-custom">
        <h1 class="">Demetrios</h1>
        <p> <i> <b>Diamond</b> </i> Wedding Salon</p>
        <div class="row">
          <div class="col-md-6">
            <img src="img/designers/d/profile_1.jpg" alt="">
          </div>
          <div class="col-md-6">
            <img src="img/designers/d/profile_2.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="container mt-3 des-info">
        <p>
          Demetrios - successfully competing brand in the wedding fashion market for over 20 years.
          During this time, he gained fame as one of the most sought-after brands, as his collections are rich in a variety of models and original ways of finishing.
          Demetrios style is recognizable around the world - expensive, exclusively, natural fabrics and exquisite décor:
          flowers, lace, sewing, Swarovski crystals and semiprecious stones. Fashion critics compare Demetrios with literary genius.
          His collections are reminiscent of sensual poems and beautifully composed verses.
          His dresses are light and weightless, the leitmotif of wedding dresses is impeccable style and luxury.
          The brand earned love and admiration thanks to the unique design of the corsets, ideally sitting on the brides figure.
          Demetrios is an internationally recognized leader in the fashion and wedding industry.
        </p>
      </div>
    </div>
    <div class="jumbotron jumbotron-fluid d2-custom">
      <div class="container text-center">
        <h1 class="">Demetrios Collection</h1>
        <div class="row">
          <?php
          require 'connect.php';

          $sql = "select id from products where designer = 'Demetrios'";
          $query = mysqli_query($con, $sql);

          $i = 0;
          while($row = mysqli_fetch_assoc($query)) {
            $p_id = $row["id"];
            echo "
            <div class='col-md-4 my-2'>
              <div class='card' style='width:100%'>
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
    </main>
    <?php
    require 'blocks/footer.php';
    ?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    $page_title='Justin Alexander';
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
        <h1>Justin Alexander</h1>
        <p> <i> <b>Diamond</b> </i> Wedding Salon</p>
        <div class="row">
          <div class="col-md-6">
            <img src="img/designers/j/profile_1.jpg" alt="">
          </div>
          <div class="col-md-6">
            <img src="img/designers/j/profile_2.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="container mt-3 des-info">
        <p>
          Execlusive collection of wedding dresses of Justin Alexander create two talented designers Tony Mentel and Jose Dias.
          Thanks to an extraordinary look at the image of the modern bride and the use of extremely expensive materials.
          Since 1990, the brand has repeatedly won the Debi Award
        </p>
        <p>
          Annually collections of wedding dresses Justin Alexander are presented at the best exhibitions of Milan, Paris, London, Madrid.
        </p>
        <p>
          Justin Alexander brand features Victorian-style corsets embellished with luxurious and noble details.
          Individual fabrics and luxurious lace are created for each collection.
          Many celebrities shone in dresses from Tony Mentel and José Dias:
        </p>
        <p>
          <ul class="list-unstyled">
            <li>Cameron Dias</li>
            <li>Eva Longoria</li>
            <li>Sandra Bullock</li>
            <li>Tyra Banks</li>
            <li>Paula Abdul</li>
            <li>Jennifer Holliday</li>
            <li>Cindy Crawford</li>
          </ul>
        </p>
        <p>
          Tony Mentel was the designer of evening dresses for the famous model Claudia Slate,
          Barbara Becker (wife of tennis player Boris Becker), German TV presenters F. Louis and Jenny Elvers.
        </p>
        <p>
          He was a designer of dresses and video clips suits for Jennifer Lopez.
          Among the famous personalities who wore wedding dresses T. Mentela, Cora Schumacher
          (bride of Ralph Schumacher, Formula I) and Shelley Gori, world champion in sailing.
        </p>
      </div>
    </div>
    <div class="jumbotron jumbotron-fluid d2-custom">
      <div class="container text-center">
        <h1 class="">Justin Alexander Collection</h1>
        <div class="row">
          <?php
          require 'connect.php';

          $sql = "select id from products where designer = 'Justin Alexander'";
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

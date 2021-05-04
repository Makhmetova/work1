<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    $page_title='Catalog';
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
      <div class="container">
        <div class="jumbotron jumbotron-fluid title-custom">
          <div class="container text-center">
            <h2 class="">Catalog</h2>
              <p> <i> <b>Diamond</b> </i> Wedding Salon</p>
            </div>
            <div class="">
              <h5>
                <form class="" method="post">
                  <label for="p_type">Show only: </label>
                  <select name="p_type">
                    <option value="">All</option>
                    <option value="dress">Dresses</option>
                    <option value="accessory">Accessories</option>
                  </select>
                  <input class="btn btn-custom" type="submit" value="Filter">
                </form>
              </h5>
            </div>
            <div class="row">
              <?php
              require 'connect.php';
              $p_type = $_POST['p_type'];
              if ($p_type == '') {
                $sql = "select id from products";
              }
              else {
                $sql = "select id from products where type = '$p_type'";
              }
              $query = mysqli_query($con, $sql);

              while($row = mysqli_fetch_assoc($query)) {
                $p_id = $row["id"];
                echo "
                <div class='col-sm-12 col-md-6 col-lg-4 my-2'>
                  <div class='card card-custom' style='width:100%'>
                    <img class='card-img-top' src='img/catalog/$p_id/".$p_id."_FF.jpg' alt='Card image'>
                    <div class='card-body'>
                      <h4 class='card-title'>$p_id</h4>
                      <a href='product.php?id=$p_id' class='btn btn-custom'>More Info</a>
                    </div>
                  </div>
                </div>
                ";
              }
              ?>
            </div>
        </div>
      </div>
    </main>
    <?php
    require 'blocks/footer.php';
    ?>
  </body>
</html>

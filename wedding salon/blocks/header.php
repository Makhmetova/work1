<header>
  <nav class="navbar navbar-expand-md navbar-light navbar-custom">
    <a class="navbar-brand" href="index.php"> <img src="img/logo.gif" alt="" style="width:60px;"> <i>Diamond</i> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link <?=$index_active?>" href="index.php"><?=$index_icon?>Main</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$catalog_active?>" href="catalog.php"><?=$catalog_icon?>Catalog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?=$des_active?>" href="#" id="navbardrop" data-toggle="dropdown">
            <?=$des_icon?>Designers
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="des_j.php">Justin Alexander</a>
            <a class="dropdown-item" href="des_d.php">Demetrios</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$feed_active?>" href="feedback.php"><?=$feed_icon?>Feedback</a>
        </li>
      </ul>
    </div>
    <div class="justify-content-end collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav nav-pills">
        <?php if($_COOKIE['email'] == ''): ?>
        <li class="nav-item">
          <a class="nav-link <?=$reg_active?>" href="signup.php"><?=$reg_icon?>Sign up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$log_active?>" href="signin.php"><?=$log_icon?>Log in</a>
        </li>
        <?php else: ?>
			<li class="nav-item">
			  <a class="nav-link <?=$log_active?>" href="signin.php"><?=$_COOKIE['email']?></a>
			</li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>

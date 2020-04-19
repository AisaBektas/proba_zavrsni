<?php
//ne koristim
include('bootstrap.php');
include('style.css');

?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<nav class="navbar navbar-expand-sm fixed-top"><!--promijenila boju navbar koristeci navbar klasu-->
  <a class=" navbar-brand ml-4 font-weight-bold" href="index.php">&nbsp;Beksef<br>Slastice</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon color d-flex justify-content-center align-items-center"><i class="fas fa-bars coloricon"></i></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <!-- Links -->
  <ul class="navbar-nav d-flex ml-auto"> <!--d-flex i ml-auto da se pomjere na desnu stranu, text-color,navbarcolor, logo i color ubacila svoj css  -->
    <li class="nav-item active">
      <a class="nav-link rounded-pill font-weight-bold" href="#">Profil</a>
    </li>
    <li class="nav-item">
    <a class="nav-link rounded-pill font-weight-bold" href="prijavaadmina.php">Log out</a>
    </li>
  </ul>
			</div>  
</nav>	
</body>
</html>
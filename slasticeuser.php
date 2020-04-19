<?php
include('database.php');
include('bootstrap.php');
include('styleuser.css');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="pozadinauser">
<div class="w3-container">
<nav class="navbar navbar-expand-sm fixed-top"><!--promijenila boju navbar koristeci navbar klasu-->
  <a class="navbar-brand ml-4 font-weight-bold" id="hoverheader" href="indexuser.php">&nbsp;Beksef<br>Slastice</a>
  
  <button onclick="myFunction('Demo1')" class="navbar-toggler w3-btn" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon colordark d-flex justify-content-center align-items-center"><i class="fas fa-bars bojaicon"></i></span>
  </button>
  <div class="collapse navbar-collapse" id="Demo1" class="w3-container w3-hide">
  <!-- Links -->
  <ul class="navbar-nav d-flex ml-auto"> <!--d-flex i ml-auto da se pomjere na desnu stranu, text-color,navbarcolor, logo i color ubacila svoj css  -->
    <li class="nav-item active">
      <a class="nav-link rounded-pill font-weight-bold" href="#"></a>
    </li>
    <li class="nav-item">
    <a class="nav-link rounded-pill font-weight-bold" href="#onamauser">Torte i kolači</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link rounded-pill font-weight-bold" href="#menuuser">Palačinke i peciva</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link rounded-pill font-weight-bold" href="#contactuser">Pića</a>
    </li>
  </ul>
      </div>  
</div>
</nav>
  

</div>
<!-- <div id="navbaruser">
    <?php//include('headeruser.php');?>
</div> -->
<?php include('torteikolaci.php');?>
	<!--ekstra navbar -->
	<!-- <div class="container-fluid mb-2">
			<div class="row color mt-4 pt-0 pb-1 pl-0 pr-0">
				<div class="col-12"></div>
			</div>
		</div>
				
					<ul class="nav mt-0 pt-4 pb-4 justify-content-center">
  <li class="nav-item">
    <a class="nav-link active textsize font-weight-bold" href="torteikolaci.html">Torte i kolači</a>
  </li>
  <li class="nav-item">
    <a class="nav-link textsize font-weight-bold" href="palacinkeipeciva.html">Palačinke i peciva</a>
  </li>
  <li class="nav-item">
    <a class="nav-link textsize font-weight-bold" href="pica.html">Pića</a>
  </li>
</ul>
				
		<div id="onama" class="container-fluid">
			<div class="row color pt-3 pb-3 pl-0 pr-0">
				<div class="col-12"></div>
			</div>
		</div> -->
		<?php //include('footeruser.php'); ?>
		<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</body>
</html>
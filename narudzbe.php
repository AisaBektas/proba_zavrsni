<?php
include ('database.php');
include ('bootstrap.php');
include ('style.css');
include ('carousel.css');
$result = $connection->query("SELECT title, ingredients, price, picture, id FROM pecivaipalacinke ORDER BY created_at");
$errors = array('greska'=>'');
$name = $surname = $address = $contact_phone = $orders = '';

//radi kako treba i koristim ga

if (isset($_POST['submitorder'])){

		
$name = $_POST['name'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$contact_phone = $_POST['contact_phone'];
$orders = $_POST['orders'];
//create sql
$sql = "INSERT INTO narudzbe(name, surname, address, contact_phone, orders) VALUES('$name', '$surname', '$address', '$contact_phone', '$orders')";
// save to db and check

if(mysqli_query($connection, $sql)){ 
    $errors['greska'] = 'Uspješno poslana narudžba!<br>Očekujte poziv za preuzimanje narudžbe!';
//success
$name = $surname = $address = $contact_phone = $orders = '';

}
else{
    //error
    echo 'query error:'.mysqli_error($connection);
}
//echo 'form is valid';


}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="pozadina">
<div class="w3-container">
<nav  id="nav" class="navbar navbar-expand-sm fixed-top"><!--promijenila boju navbar koristeci navbar klasu-->
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
    <a class="nav-link rounded-pill font-weight-bold" href="#" data-target="torteslide">Torte i kolači</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link rounded-pill font-weight-bold" href="#" data-target="pecivaslide">Palačinke i peciva</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link rounded-pill font-weight-bold" href="#" data-target="picaslide">Pića</a>
    </li>
  </ul>
      </div>  
</div>
</nav>
  

</div>
    <!-- <nav class="navbar navbar-expand-sm px-0">
    <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill d-none d-md-block" href="index.php">&nbsp;Beksef<br>Slastice</a>
      
        <div class="row mx-auto text-center">
          <div class="col-md-12">
      <a class="text-decoration-none" href="index.php"><h1 class="font-weight-bold" id="navbarpregleda">Beksef Slastice</h1>  </a>  
</div>
</div>
</div>

      <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill d-none d-md-block" href="index.php">&nbsp;Beksef<br>Slastice</a>
    
    
</nav> -->

<div class="row text-center mt-5 pt-5">
<div class="col-md-12">
       <button type="button" name="torteikolaci" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#dodaj">Narudžba</button>
       <div class="modal fade" id="dodaj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog" role="document">
            <div class="modal-content text-color">
              <div class="modal-header">
                <h5 class="modal-title font-weight-bold fontmenu">Narudžba</h5>
              </div>
         <div class="modal-body font-weight-bold text-left">
         
<form class="needs-validation" novalidate method="post">
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom02">Ime</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="ime"  name="name" value="<?php echo htmlspecialchars($name) ?>"
        required>
      <div class="valid-feedback">
      Prihvaćeno!
      </div>
      <div class="invalid-feedback">
        Unesite vaše ime.
      </div>
    </div>
</div>

    <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustomUsername">Prezime</label>
      <div class="input-group">
        
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="prezime"
          aria-describedby="inputGroupPrepend" required name="surname" value="<?php echo htmlspecialchars($surname) ?>">
        
          <div class="valid-feedback">
      Prihvaćeno!
      </div>
      <div class="invalid-feedback">
          Unesite vaše prezime.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustomUsername">Adresa</label>
      <div class="input-group">
        
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="adresa"
          aria-describedby="inputGroupPrepend" required name="address" value="<?php echo htmlspecialchars($address) ?>">
        
          <div class="valid-feedback">
      Prihvaćeno!
      </div>
      <div class="invalid-feedback">
          Unesite vašu adresu.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustomUsername">Kontakt telefon</label>
      <div class="input-group">
        
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="kontakt telefon"
          aria-describedby="inputGroupPrepend" required name="contact_phone" value="<?php echo htmlspecialchars($contact_phone) ?>">
        
          <div class="valid-feedback">
      Prihvaćeno!
      </div>
      <div class="invalid-feedback">
          Unesite vaš kontakt telefon.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom03">Narudžba</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="narudžba" required name="orders" value="<?php echo htmlspecialchars($orders) ?>" >
      <div class="valid-feedback">
      Prihvaćeno!
      </div>
      <div class="invalid-feedback">
        Unesite vašu narudžbu.
      </div>
    </div>
  </div>

  <div class="modal-footer dodaj">
  <input class="btn btn-primary btn-sm dodaj hover" type="submit" name="submitorder" value="Snimi">
 
  </div>
</form>
</div>
</div>
</div>
</div>

<div class="greska text-center font-weight-bold"><?php echo  $errors['greska'];?></div>
</div>
</div>



<div id="content">

	<!-- <h4 class="center gray-text">Torte i kolači!</h4> -->
    <div class="container-fluid glavnidio pl-5 pr-5 pb-5" id="odvojeno"> 
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                
            <?php 
                   $i = 0;
                   foreach($result as $row){
                       $actives = '';
                       if($i == 0){
                           $actives = 'active';
                       }
                       
                ?>
   
            
   
                <div  class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 <?php echo $actives; ?>">
               
					<div class="card textcard bojatekstakartice font-italic color pt-4">
                   
                    	<img id="velicina_slika_user" class="img-fluid mx-auto d-block rounded-pill shadow" src="<?php echo $row['picture']?>" alt="cokotorta">
                        
    				<div class="card-body velicina_kartice_user">
				  		
                          <h5 class="text-center  font-weight-bold"><?= $row['title']?></h5>
                          <p class="card-text">Ponuda:</p>
                        <!-- <p class="card-text"><?//= $row['ingredients']?></p> -->
                          <ul>
                         
                          <?php foreach(explode(',',$row['ingredients']) as $ing):?>
								<li>
									<?php echo htmlspecialchars($ing);?>
								</li>
								<?php endforeach;?>
							</ul>
                         
					</div>
					<div class="card-footer">
				  		<p class="text-right font-weight-bold"><?= $row['price']?></p> <!-- shorthand for <?php //echo $row['price']?>-->
                    </div>
                    
                    </div>
                   
                    
                </div>	
                <?php $i++; } ?>
                

    
</div>
<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>          
                
			
			

        </div>
        
    </div> 
    </div> 
                    </div>        
<!-- <nav id="nav">
<ul>
    <li><a href="#" data-target="homeproba">index</a></li>
    <li><a href="#" data-target="aboutproba">About</a></li>
</nav> -->
</div>
<script src="https://kit.fontawesome.com/98d1cb884c.js" crossorigin="anonymous"></script>
<script>
 
  (function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
if (form.checkValidity() === true){
    swal("Snimljeno!",{
        buttons: false,
        
});
}
form.classList.add('was-validated');

}, false);
});
}, false);
})();
$(document).ready(function(){
    var trigger = $('#nav ul li a'),
        container = $('#content');

        trigger.on('click', function(){
            var $this = $(this),
                target = $this.data('target');

        container.load(target + '.php');

        return false;

        });
});
  	/*
    Carousel
*/
$('#carousel-example').on('slide.bs.carousel', function (e) {
    
    
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;
 
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});

function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>
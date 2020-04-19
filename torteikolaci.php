<?php
//radi pod uslovom da ima min 8 kolaca
include('database.php');
include('bootstrap.php');
include('styleuser.css');
include('carousel.css');
//write query for all pizzas

//make query and get result
$result = $connection->query("SELECT title, ingredients, price, picture, id FROM torteikolaci ORDER BY created_at DESC");

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
<style>
 
</style>
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
    <a class="nav-link rounded-pill font-weight-bold fontslova" href="torteikolaci.php">Torte i kolači</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link rounded-pill font-weight-bold fontslova" href="palacinkeipeciva.php">Palačinke i peciva</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link rounded-pill font-weight-bold fontslova" href="picauser.php">Pića</a>
    </li>
  </ul>
      </div>  
</div>
</nav>
  

</div>
<div class="pt-4 pb-3">
<div class="row text-center mt-5 pt-5 mb-2">
<div class="col-md-12">
       <button type="button" name="torteikolaci" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#dodaj">Narudžba</button>
       <div class="modal fade" id="dodaj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog" role="document">
            <div class="modal-content text-color">
              <div class="modal-header">
                <h5 class="modal-title font-weight-bold fontslova">Narudžba</h5>
              </div>
         <div class="modal-body font-weight-bold text-left">
         
<form class="needs-validation" novalidate method="post">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label class="bojateksta" for="validationCustom02">Ime</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="ime"  name="name" value="<?php echo htmlspecialchars($name) ?>"
        required>
      <div class="valid-feedback">
      Prihvaćeno!
      </div>
      <div class="invalid-feedback">
        Unesite vaše ime.
      </div>
    </div>


  
    <div class="col-md-4 mb-3">
      <label class="bojateksta" for="validationCustomUsername">Prezime</label>
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
  
    <div class="col-md-4 mb-3">
      <label class="bojateksta" for="validationCustomUsername">Kontakt telefon</label>
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
      <label class="bojateksta" for="validationCustomUsername">Adresa</label>
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
      <label class="bojateksta" for="validationCustom03">Narudžba</label>
      <textarea type="text" class="form-control" id="validationCustom03" placeholder="narudžba..." required name="orders" value="<?php echo htmlspecialchars($orders) ?>"></textarea>
      <div class="valid-feedback">
      Prihvaćeno!
      </div>
      <div class="invalid-feedback">
        Unesite vašu narudžbu.
      </div>
      <h5 class="bojateksta font-weight-bold text-right">Plaćanje po preuzimanju!</h5>
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

<div class="potvrda text-center font-weight-bold"><?php echo  $errors['greska'];?></div>
</div>
</div>
</div>


	<!-- <h4 class="center gray-text">Torte i kolači!</h4> -->
    <div class="container-fluid glavnidio pl-5 pr-5 mb-4 mt-3"> 
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
                          <p class="card-text d-none d-sm-block">Osnovni sastojci:</p>
                        <!-- <p class="card-text"><?//= $row['ingredients']?></p> -->
                          <ul class=" d-none d-sm-block">
                         
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
    
</body>
	
</html>
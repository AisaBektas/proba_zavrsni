
<?php
//radi pod uslovom da ima min 8 kolaca
include('database.php');
include('bootstrap.php');
include('styleuser.css');
include('carousel.css');
//write query for all pizzas

$result = $connection->query("SELECT title, ingredients, price, picture, id FROM pecivaipalacinke ORDER BY created_at");

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    #odvojeno{
    margin-top: 160px;
}
</style>
</head>
<body class="pozadinauser">
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
    <a class="nav-link rounded-pill font-weight-bold" href="#" data-target="picauser">Pića</a>
    </li>
  </ul>
      </div>  
</div>
</nav>
  

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

<!-- <nav id="nav">
<ul>
    <li><a href="#" data-target="homeproba">index</a></li>
    <li><a href="#" data-target="aboutproba">About</a></li>
</nav> -->
</div>

<script>
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




	

	
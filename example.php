<?php
include('database.php');
include('bootstrap.php');
include('styleuser.css');
include('carousel.css');
//make query and get result
$resultcake = $connection->query("SELECT title, ingredients, price, picture, id FROM torteikolaci ORDER BY created_at");
$result = $connection->query("SELECT title, ingredients, price, picture, id FROM pecivaipalacinke ORDER BY created_at");

?>
<!DOCTYPE html>
<html>
    <head>
</head>
<body>

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
</p>
<div class="row">
    
<div class="container-fluid glavnidio pl-5 pr-5 pb-5" id="odvojeno"> 
    <div class="collapse multi-collapse" id="multiCollapseExample1">
        <!-- <h4 class="center gray-text">Torte i kolači!</h4> -->

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
  <div class="col">
  <div class="container-fluid glavnidio pl-5 pr-5 pb-5" id="odvojeno">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
     
	<!-- <h4 class="center gray-text">Torte i kolači!</h4> -->
     
        <div id="carousel-examplesecond" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                
            <?php 
                   $i = 0;
                   foreach($resultcake as $row){
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
                          <p class="card-text">Osnovni sastojci:</p>
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
<a class="carousel-control-prev" href="#carousel-examplesecond" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-examplesecond" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>          
                
			
			

        </div>
        
    </div> 
    </div>
  </div>
</div>
<script>
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
$('#carousel-examplesecond').on('slide.bs.carousel', function (e) {
    
    
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
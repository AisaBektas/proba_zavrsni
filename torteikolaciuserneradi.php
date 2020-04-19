<?php
//radi pod uslovom da ima min 8 kolaca
include('database.php');
include('bootstrap.php');
include('styleuser.css');
include('carousel.css');

//write query for all pizzas

//make query and get result
$result = $connection->query("SELECT title, ingredients, price, picture, id FROM torteikolaci ORDER BY created_at");





?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
</head>
<body>

	<!-- <h4 class="center gray-text">Torte i kolači!</h4> -->
    <div class="container-fluid glavnidio  mt-5 pt-5 pl-5 pr-5"> 
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto pt-4" role="listbox">
                
            <?php 
                   $i = 0;
                   foreach($result as $row){
                       $actives = '';
                       if($i == 0){
                           $actives = 'active';
                       }
                       
                ?>
   
            
   
                <div  class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 <?php echo $actives; ?>">
               
					<div class="card bojatekstakartice font-italic color pt-4">
                   
                    	<img id="velicina_slika_user" class="img-fluid mx-auto d-block rounded-pill shadow" src="<?php echo $row['picture']?>" alt="cokotorta">
                        
    				<div class="card-body velicina_kartice_user">
				  		
                          <h5 class="text-center"><?= $row['title']?></h5>
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
    </script>
    
</body>
	
</html>
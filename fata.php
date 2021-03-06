<?php
//ne koristim ovaj file
include('bootstrap.php');
include('style.css');
include('database.php');

$msg = $title = $ingredients = $price = $picture = '';
$errors = array('title'=>'', 'ingredients'=>'', 'price'=>'', 'picture'=>'');

if (isset($_POST['submit'])){

		
		
		$title = mysqli_real_escape_string($connection, $_POST['title']);
        $ingredients = mysqli_real_escape_string($connection, $_POST['ingredients']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);
        $picture = mysqli_real_escape_string($connection, $_POST['picture']);
        $path = "images/".$picture;
		//create sql
		$sql = "INSERT INTO torteikolaci(title, ingredients, price, picture) VALUES('$title', '$ingredients', '$price', '$path')";
    // save to db and check
  
		if(mysqli_query($connection, $sql)){ 
      //success
         
     
        
      $msg = '<div class="alert alert-success" role="alert">Uspjesno sacuvano.</div>';
      
      }
		else{
			//error
			echo 'query error:'.mysqli_error($connection);
		}
		//echo 'form is valid';
		
	
	

}

?>
<!DOCTYPE html>
<head> 
</head>
<body>

		
	<!-- <div id="menu" class="container-fluid pt-4"> -->
		<div class="row text-center pb-3 pt-4">
				
			<div class="col-md-4 col-sm-6 col-12 pb-4">
        <h1 class="text-color font-weight-bold fontmenu">Torte i kolači</h1>
        <img src="images/kolacizlog_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="kolacimenu">
                   
     <h3 class="mt-4"><button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#dodaj">Dodaj</button></h3>
     <a href="kolaci.php"><h3 class="mt-4"><button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#">Pregled</button></h3></a>
     <!-- <h3><a href="#" class="text-decoration-none text-color rounded-pill hover pl-4 pr-4">Ukloni</a></h3> -->
     <!-- <h3><a href="#" class="text-decoration-none text-color rounded-pill hover pl-4 pr-4">Pregled</a></h3> -->
     <!-- <br><button type="button" class="btn mt-4" data-toggle="modal" data-target="#exampleModal">Dodaj</button> -->

               <!-- Modal -->
    <div class="modal fade" id="dodaj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content text-color">
          <div class="modal-header">
            <h5 class="modal-title text-color font-weight-bold fontmenu">Torte i kolači</h5>
                     
     </div>
     <div class="modal-body font-weight-bold text-left">
     <div class="greska text-center pb-4"><?php echo  $msg; ?></div>      
     <form method="POST" action="">
        <div class="form-group">
        <label for="slika">Slika</label>
     <div class="custom-file">
     
       <input name="picture" data-toggle="popover" data-placement="bottom" title="popover on bottom"
  data-content="Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum." value="<?php echo htmlspecialchars($picture) ?>" type="file" class="custom-file-input" id="slika">
       <div class="greska"><?php echo $errors['picture']; ?></div>
       <label class="custom-file-label" for="slika">Izeberi sliku</label>
     </div>
     </div>
       <!-- <label for="slika">Slika</label> -->
       <!-- <input type="file" class="form-control-file" id="slika"> -->
       <!-- </div> -->

     <!-- <label for="slika">Slika</label> -->
     <!-- <input type="file" class="form-control" id="slika" placeholder="Slika"> -->
     <!-- </div> -->
     <div class="form-group">
     <label for="naslov">Naslov</label>
     <input required name="title" required value="<?php echo htmlspecialchars($title) ?>" type="text" class="form-control" id="naslov" placeholder="Naziv torte/kolača">
     <div class="greska"><?php echo $errors['title']; ?></div>
     </div>
     <div class="form-group">
     <label for="sastojci">Sastojci (max 7):</label>
     <input required name="ingredients" required value="<?php echo htmlspecialchars($ingredients) ?>" type="text" class="form-control" id="sastojci" placeholder="Sastojci">
     <div class="greska"><?php echo $errors['ingredients']; ?></div>
     </div>
     <div class="form-group">
     <label for="cijena">Cijena</label>
     <input required name="price" required value="<?php echo htmlspecialchars($price) ?>" type="text" class="form-control" id="cijena" placeholder="Cijena">
     <div class="greska"><?php echo $errors['price']; ?></div>
     </div>
                              
                            
             
           </div>
           <div class="modal-footer">
             
            <button type="button" onclick="close()" class="btn dodaj hover btn-secondary" data-dismiss="modal" name="close">Zatvori</button> 
            <input type="submit" name="submit" value="Snimi" class="btn dodaj hover" id="buttonForSubmitingTorte">
             <!-- <button type="button"  name="submit" value="submit" class="btn btn-primary">Snimi</button> -->
           </div>
           </form>
         </div>

       
        
       </div>
       
     </div>
			</div>
                <div class="col-md-4 col-sm-6 col-12 pb-4">
                    <h1 class="text-color font-weight-bold fontmenu">Pića</h1> 
                    <img src="images/caj12_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="picamenu">
                    <h3 class="mt-4"><button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#dodaj">Dodaj</button></h3>
                    <a href="kolaci.php"><h3 class="mt-4"><button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#">Pregled</button></h3></a>
                    <!-- <h3 class="pt-4"><a href="#" class="text-decoration-none rounded-pill text-color hover pl-4 pr-4">Dodaj</a></h3> -->
                    <!-- <h3><a href="#" class="text-decoration-none text-color rounded-pill hover pl-4 pr-4">Ukloni</a></h3> -->
                    <!-- <h3><a href="#" class="text-decoration-none text-color rounded-pill hover pl-4 pr-4">Pregled</a></h3> -->
               </div>
                    
			<div class="col-md-4 col-sm-6 col-12 pb-4">
                    <h1 class="text-color font-weight-bold fontmenu">Palačinke i peciva</h1>
                    <img src="images/Palacinkathebest_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="palacinkemenu">
                    <h3 class="mt-4"><button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#dodaj">Dodaj</button></h3>
                    <a href="kolaci.php"><h3 class="mt-4"><button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal" data-target="#">Pregled</button></h3></a>
                    <!-- <h3 class="pt-4"><a href="#" class="text-decoration-none rounded-pill text-color hover pl-4 pr-4">Dodaj</a></h3> -->
                    <!-- <h3><a href="#" class="text-decoration-none text-color rounded-pill hover pl-4 pr-4">Ukloni</a></h3> -->
                    <!-- <h3><a href="#" class="text-decoration-none text-color rounded-pill hover pl-4 pr-4">Pregled</a></h3> -->
			</div>
				
				
		</div>
	<!-- </div> -->
  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

function close(){
  
        $("#slika, #naslov, #sastojci, #cijena").val("");

  
}

</script>
</body>

</html>
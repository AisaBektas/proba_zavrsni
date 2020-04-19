<?php
//radi ali ga ne koristim
include('database.php');
include('style.css');
include('bootstrap.php');
// $result = $connection->query("SELECT title, ingredients, price, picture, id FROM torteikolaci ORDER BY created_at");
$sql = 'SELECT title, ingredients, price, picture, id FROM torteikolaci ORDER BY created_at';

//make query and get result
$result = mysqli_query($connection, $sql);

//fetch the resulting rows as an array
$torteikolaci = mysqli_fetch_all($result, MYSQLI_ASSOC);
//free result from memory
mysqli_free_result($result);



if(isset($_POST['delete'])){
	$id_to_delete = mysqli_real_escape_string($connection, $_POST['id_to_delete']);
	$sql = "DELETE FROM torteikolaci WHERE id = $id_to_delete";
	
	if(mysqli_query($connection, $sql)){
        //success
       
        echo '<span class="greska">Slastica je obrisana!</span>';    
		//  header('Location: pregled.php');
    }
    else{
		//failure
		echo 'query error:'.mysqli_error($connection);
	}
}
	//check GET request id parameters
if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($connection, $_GET['id']);
	//make sql
	$sql = "SELECT *  FROM torteikolaci WHERE id = $id";
	
	//get the query result
	$result = mysqli_query($connection, $sql);
	
	//fetch result in array format
	$cake = mysqli_fetch_assoc($results);
	mysqli_free_result($results);
	mysqli_close($connection);
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <style>
        .card-footer{
           
            color: #ffe6e6;
            border-top: double 3px #ffe6e6;
            border-bottom: double 3px #ffe6e6;
        }
        </style>
</head>
<body class="pozadina">
    <nav class="navbar" id="navbarpregleda">
    <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill" href="index.php">&nbsp;Beksef<br>Slastice</a>
        <h1 class="m-auto">Torte i kolači</h1>
    <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill d-none d-sm-block" href="index.php">&nbsp;Beksef<br>Slastice</a>
    </nav>
    <!-- <?php
    // include('header.php');?> -->
<div class="container pt-4">
    <div class="row">
        
        <?php foreach($torteikolaci as $torta): ?>
            
        <div class="col-md-4 pb-4">
            
           
                <div class="card rounded font-italic pt-4" id="okvirkarticeupregledu">
               
                    <img id="velicina_slika" class="img-fluid mx-auto d-block rounded-pill shadow okvirslike" src="<?php echo ($torta['picture']);?>" alt="cokotorta">
                    
                <div class="card-body velicina_kartice">
                      
                      <h5 class="text-center font-weight-bold"><?php echo htmlspecialchars($torta['title']);?></h5>
                      <p class="card-text">Osnovni sastojci:</p>
                      <ul>
                            <?php foreach(explode(',',$torta['ingredients']) as $ing):?>
                            <li>
                                <?php echo htmlspecialchars($ing);?>
                            </li>
                            <?php endforeach;?>
                        </ul>
                     
                </div>
                <div class="card-footer">
                      <p class="text-right font-weight-bold"><?php echo htmlspecialchars($torta['price']);?></p>
                      
                </div>
                <!-- delete form -->
		<form action="pregled.php" method="POST" class="text-center mt-3">
			<input type="hidden" name="id_to_delete" value="<?php echo $torta['id']?>">
			<input type="submit" name="delete" value="Delete" class="btn px-5 text-uppercase font-weight-bold" id="delete">
				   </form>
                
                </div>
                
                </div>
            
<?php endforeach; ?>  

        
    </div>
</div>
<div class="container text-right">

<a href="#navbarpregleda"><i class="fas fa-sort-up iconzapocetak"></i></a>
</div>

<script src="https://kit.fontawesome.com/98d1cb884c.js" crossorigin="anonymous"></script>
</body>
</html>
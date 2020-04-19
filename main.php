<?php
//ne koristim
include('database.php');
$title = $ingredients = $price = $picture = '';
$errors = array('title'=>'', 'ingredients'=>'', 'price'=>'', 'picture'=>'');

if (isset($_POST['submit'])){
	if(empty($_POST['title'])){
		$errors['title'] =  'Unesite naziv torte/kolača! <br />';
	}
	else{
		$title = $_POST['title'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
			$errors['title'] = 'Naslov može sadržavati samo slova!';
		}
	}
	
	if(empty($_POST['ingredients'])){
		$errors['ingredients'] = 'Potrebno je unijeti barem jedan sastojak! <br />';
	}	
	else{
		$ingredients = $_POST['ingredients'];
		if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
			$errors['ingredients'] = 'Sastojci trebaju biti lista sa zarezima!';
		}
		
		}
		
	
    if(empty($_POST['price'])){
		$errors['price'] = 'Potrebno je unijeti cijenu sa oznakom valute! <br />';
	}
	else{
		$price = $_POST['price'];
		}
		
		if(empty($_POST['picture'])){
		$errors['picture'] = 'Potrebno je unijeti sliku torte ili kolača! <br />';
	}
	else{
        
		$picture = $_POST['picture'];
		$path = "images/".$picture;
			if(!preg_match('/.jpg$/', $path)){
			$errors['picture'] = 'Slika može biti samo u .jpg ekstenziji!';
		}
	
	}
	if(array_filter($errors)){
		//echo 'errors in the form';
	}
	else{
		
		$title = mysqli_real_escape_string($connection, $_POST['title']);
        $ingredients = mysqli_real_escape_string($connection, $_POST['ingredients']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);
        $picture = mysqli_real_escape_string($connection, $_POST['picture']);
       
		//create sql
		$sql = "INSERT INTO torteikolaci(title, ingredients, price, picture) VALUES('$title', '$ingredients', '$price', '$path')";
		// save to db and check
		if(mysqli_query($connection, $sql)){
			//success
			header('Location: indextorte.php');
			
		}else{
			//error
			echo 'query error:'.mysqli_error($connection);
		}
		//echo 'form is valid';
		
	}
	

}

?>
<!DOCTYPE html>
<html>


		
	<section class="container grey-text">
		<h4 class="center">Add a Pizza</h4>
		<form class="white" action="main.php" method="POST">
		<label>Naslov:</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title']; ?></div>
		<label>Sastojci:</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <label>Cijena:</label>
			<input type="text" name="price" value="<?php echo htmlspecialchars($price) ?>">
            <div class="red-text"><?php echo $errors['price']; ?></div>
            <label>Slika:</label>
			<input type="file" name="picture" value="<?php echo htmlspecialchars($picture) ?>">
            <div class="red-text"><?php echo $errors['picture']; ?></div>
			<div class="center">
			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
		
	
	
</html>
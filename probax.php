<?php
include('database.php');

//write query for all pizzas
$sql = 'SELECT title, ingredients, price, picture, id FROM pica ORDER BY created_at';

//make query and get result
$result = mysqli_query($connection, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);
//close connection
mysqli_close($connection);

//explode(',', $pizzas[0]['ingredients']);
if(isset($_POST['delete'])){
	$id_to_delete = mysqli_real_escape_string($connection, $_POST['id_to_delete']);
	$sql = "DELETE FROM pica WHERE id = $id_to_delete";
	
	if(mysqli_query($connection, $sql)){
		//success
		header('Location: index.php');
	}{
		//failure
		echo 'query error:'.mysqli_error($connection);
	}
}
	//check GET request id parameters
if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($connection, $_GET['id']);
	//make sql
	$sql = "SELECT *  FROM pica WHERE id = $id";
	
	//get the query result
	$result = mysqli_query($connection, $sql);
	
	//fetch result in array format
	$pizza = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	mysqli_close($conn);
	
}

?>
<!DOCTYPE html>
<html>


	<h4 class="center gray-text">Pizzas!</h4>
	<div class="container">
		<div class="row">
			<?php foreach($pizzas as $pizza): ?>
				<div class="col s6 m3">
					<div class="card z-depth-0">
						<img src="images/pizza-free_150x150.png" class="pizza">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']);?></h6>
							<ul>
								<?php foreach(explode(',',$pizza['ingredients']) as $ing):?>
								<li>
									<?php echo htmlspecialchars($ing);?>
								</li>
								<?php endforeach;?>
							</ul>
						</div>
						<div class="card-action right-align  ">
							<a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>">More info</a>
						</div>
					</div>
				</div>
			
			 
			
			<?php endforeach; ?>
			
			<?php /*if(count($pizzas) >=3):?>
			<p>there are 3 or more pizzas</p>
			<?php  else:?>
			<p>there are less than 3 pizzas</p>
			<?php endif;  */?>
		</div>
	</div>
    <div class="container center grey-text">
		<?php if($pizza): ?>
		<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
		<p>Created by: <?php echo htmlspecialchars($pizza['price']);?></p>
		
		<h5>Ingredients:</h5>
		<p><?php echo htmlspecialchars($pizza['ingredients']);?></p>
		//delete forms
		<form action="probax.php" method="POST">
			<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
			<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
				   </form>
		<?php else: ?>
		<h5>It does not exist!</h5>
		<?php endif; ?>
		<div></div>
	
	</div>
	
		
	
</html>
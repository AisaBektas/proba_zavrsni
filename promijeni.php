<?php
include('database.php');

$sql="SELECT * FROM adminlogin";
$result = mysqli_query($connection, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<p>";
        echo $row['username'];
        echo "<br>"; 
        echo $row['password'];
        echo "</p>"; 
    }
}
else{
    echo "There are no comments!";
}
if(isset($_POST['promijeni'])){
    $username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "UPDATE adminlogin SET username = '$username', password = '$password'";
	
	if(mysqli_query($connection, $sql)){
        //success
        $errors['greska'] = 'Podaci su promijenjeni!'; 
        $sql = 'SELECT username, password, id FROM adminlogin';
        $result = mysqli_query($connection, $sql);   
		$adminlogin = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else{
		//failure
		echo 'query error:'.mysqli_error($connection);
	}
}
?>
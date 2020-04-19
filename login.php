<?php
//ne radi kako treba
session_start();
unset($_SESSION['login']);
 include ('database.php'); //connection with database
 //include('bootstrap.php');
include ('style.css'); //connection with my own css file
$username = $password = '';
$errors = array('username'=>'', 'password'=>'', 'greska'=>'');

if (isset($_POST['login'])){
    if(empty($_POST['username'])){
        $errors['username'] =  'Potrebno je unijeti ime! <br />';
    }
    else {
        $username = $_POST['username'];
        //  if(($_POST['username'] != $username)){
            //  $errors['username'] = 'Ime nije validno!';
        //  }	
            }
    
    if(empty($_POST['password'])){
        $errors['password'] =  'Potrebno je unijeti lozinku! <br />';
    }
    else{
       $password = $_POST['password'];
    //    if(($_POST['password'] != $password)){
        //    $errors['password'] = 'Lozinka nije validna';
    //    }
    
    if(count($errors) >= 1){
        $errors['greska'] = 'Greska';
    }
}
}

            
           

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font css-->
    <link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet">
</head>
<body class="pozadina">
    <div class="container-fluid pozadina d-flex justify-content-center align-items-center">
      
                <!-- form start -->
                <!-- Default form login -->
<form class="border border-light okvir loginform" method="POST">


<p class="h1 mb-4 text-center bojateksta" id="font">Beksef <br> Slastice</p>
<!-- <p class="h3 mb-4 text-center">Admin</p> -->
<div class="greska text-center"><?php echo  $errors['greska'];?></div>

<!-- Username -->
<label for="admin" class="font-weight-bold bojateksta">Ime</label>
<div class="greska"><?php echo $errors['username']; ?></div>
<input type="username" name="username" class="form-control mb-4"  placeholder="Ime" value="<?php echo htmlspecialchars($username) ?>">


<!-- Password -->
<label for="password" class="font-weight-bold bojateksta">Lozinka</label>
<div class="greska"><?php echo $errors['password']; ?></div>
<input type="password" name="password" class="form-control mb-4" placeholder="Lozinka" value="<?php echo htmlspecialchars($password) ?>">


<!-- Sign in button -->
<button class="mt-5 btn btn-success btn-block font-weight-bold" type="submit" name="login">Prijava</button>

<?php


	
if (isset($_POST['login'])){

    $ime=$_POST['username'];
    $lozinka=$_POST['password'];

    $adminlogin=mysqli_query($connection, 'select * from adminlogin');
    $adminlogin_item=mysqli_fetch_assoc($adminlogin);

    $username=$adminlogin_item['username'];
    $password=$adminlogin_item['password'];

    if($ime==$username && $lozinka==$password){

    // $_SESSION["login"] = $username;
    header('location: index.php');

}

}   

           
            
				?>
</form>
            </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </html>
<?php
include('database.php');
include('bootstrap.php');
include('style.css');
$pid=$_GET['pid'];
    $sql="SELECT * FROM narudzbe WHERE id='$pid'";
    $rs=$connection->query($sql);
    while($row=$rs->fetch_assoc())
    {
?>

<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        print();
       
    </script>
</head>
<body>
    <h3 class="text-center fontmenu">Beksef Slastice</h3>
 

    <div class="col-12 mt-3">
            
            
           
                <div class="card rounded pt-4" id="okvirkarticeupregledu">
                    
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <h5 class="font-weight-bold">Ime:</h5>
                        </div>  
                        <div class="col-12 col-md-10">
                             <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['name']);?></h5>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-md-2">
                            <h5 class="font-weight-bold">Prezime:</h5>
                            </div>  
                        <div class="col-12 col-md-10">
                            <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['surname']);?></h5>
                            </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-md-2"> 
                            <h5 class="font-weight-bold">Adresa:</h5>
                            </div>  
                        <div class="col-12 col-md-10">
                      <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['address']);?></h5>
                      </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-md-2">
                      <h5 class="font-weight-bold">Telefon:</h5>
                      </div>  
                        <div class="col-12 col-md-10">
                      <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['contact_phone']);?></h5>

                      </div>
                     </div>
                     
                </div>
                <div class="card-footer boja_footer">
                <div class="row">
                        <div class="col-12 col-md-2">
                <h5 class="font-weight-bold">Narudžba:</h5>
                </div>  
                        <div class="col-12 col-md-8">
                      <p class="text-left font-weight-bold"><?php echo htmlspecialchars($row['orders']);?></p>
                      </div>
                      <div class="col-12 col-md-2">
                          <h5 class="font-weight-bold">Cijena:</h5>
                        
                    </div>
                     </div>
                      </div>
</div>
</div>
<?php
    }
?>
</body>
</html>
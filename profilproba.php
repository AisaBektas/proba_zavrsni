<?php 
include('database.php');
// include('bootstrap.php');
?>
<!DOCTYPE html>
<html>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $.get("text.txt", function(data, status){
                $("#test").html(data);
                alert(status);
            });
        });
        // $("input").keyup(function(){
        //     var name = $("input").val();
        //     $.post("suggestion.php", {
        //         suggestion: name
        //     }, function(data, status){
        //         $("#test").html(data);
        //     });
        // });
    });
</script>
</head>
<body>
<div class="container" id="test">
<?php
 ?>
</div>
<!-- <input type="text" name=""> -->
<button>Click me to get data</button>
</body>
</html>
</html>
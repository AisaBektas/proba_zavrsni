
<?php

// include_path('database.php');
// include('bootstrap.php');
// include('style.css');



?>
<!DOCTYPE html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var trigger = $('#nav ul li a'),
        container = $('#content');

        trigger.on('click', function(){
            var $this = $(this),
                target = $this.data('target');

        container.load(target + '.php');

        return false;

        });
});

</script>
</head>
<body class="pozadina">
<nav id="nav">
<ul>
    <li><a href="#" data-target="homeproba">index</a></li>
    <li><a href="#" data-target="aboutproba">About</a></li>
</nav>
<div id="content">
 
</div>
</body>
</html>




	

	
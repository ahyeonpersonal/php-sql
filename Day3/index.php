<?php
    include 'header.php';
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        
        
        <section>
            <div class="someMainContent">
                <h1>Hi there!</h1>
            </div>
        </section>
        <?php
            $x = 5; //GLOBAL
            
            function something(){
                $y=10; //LOCAL
                echo $GLOBALS['x']; 
                //1. to call 'global' on in local function need to say $GLOBALS[ ];
                //2. i don't need to put $ in front of x
            }
        
            something();
        ?>

	</body>
</html>


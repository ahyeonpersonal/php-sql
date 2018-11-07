<?php
    ////////important///////////
    session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
       
        <!--make the website to remember we are logged in access session-->
        <ul>
           <li><a href="index.php">HOME</a></li>
           <li><a href="contact.php">CONTACT</a></li>
       </ul>
        
        <?php
            
            echo $_SESSION['username'];
        ?>
	</body>
</html>


 

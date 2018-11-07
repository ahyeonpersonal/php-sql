<?php
  //When I type echo $_SESSION['username'] in 'contact.php' page, it displays erros
  // It's because, webpae can't remeber $_SESSION['username], so I need to put this in every page
  
  session_start();

?>


<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
    <ul>
      <li><a href="index.php>HOME</a><li>
      <li><a href="contact.php>CONTACT</a></li>
    </ul>
    
    
    
    <?php
      $_SESSION['username']="diny1209";
      echo $_SESSION['username'];
      
      
      //if Username is NOT set, echo 'you are not lgged in'
      if(!isset(!$_SESSION['username'])){
        echo "You are not logged in";
      }else{
        echo "You are logged in";
      }
    ?>
    
    </body>
</html>
    

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
    <?php
      //setcookie("cookiename","data-information", time()+expiered time);
      setcookie("name","Dini", time()+86400); //expired tmr
      
      $_SESSION['name'] = "12"; //unless data(user name is same as 'name', no one can get saved data when using session)
    ?>
  </body>
</html>

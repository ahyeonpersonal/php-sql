<?php
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <?php
            
            $sql = "SELECT * FROM  users;";
            /*$sql; = "SELECT * FROM  users WHERE user_First='Dini;";*/
            $result = mysqli_query($conn, $sql);
            
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                //if $resultCheck >0 : no error to connect database
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['user_uid']."<br>";
                }
            }

            

            
        ?>
	</body>
</html>
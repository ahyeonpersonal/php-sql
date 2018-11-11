
<!-- Delete dbh.inc.php insteadn, linked it to signup.inc.php -->
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
    <form action="includes/signup.inc.php" method="POST"> <!--action: connect to signup.inc.php -->
      <input type="text" name="first" placeholder="Firstname" /><br/>
            <input type="text" name="last" placeholder="Lastname" /><br/>
            <input type="text" name="email" placeholder="E-mail" /><br/>
            <input type="text" name="uid" placeholder="Username" /><br/>
            <input type="password" name="pwd" placeholder="Password" /><br/>
            <button type="submit" name="submit">Sign up</button>
    </form>
        <?php
            $data = "admin";
            //Created a template
            $sql = "SELECT * FROM  users WHERE user_uid=?;";
            //Create a prepared statement
            $stmp = mysqli_stmt_init($conn);
            //Prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement failed";
            } else {
                //Bind parametrs to the placeholder
                mysqli_stmt_bind_param($stmt. "s",$data);
                //The letter 's' means that the parameter will be a string data type
                //s = string , i=integar, b=BLOB, d=double
                
                //Runparameters inside database
                mysqli_stmt_execute($stmt);
                $result = mysqli_Stmt_get_result($stmt);

                while ($row = mysqli_fetch_Assoc($result)){
                    echo $row['user_uid']."<br>";
                }
            }
            
            
            while($row = mysli_fetch_assoc($result)){
                echo $row['user_uid']."<br>";
            }
            
        ?>
	</body>
</html>

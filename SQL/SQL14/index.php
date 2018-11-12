<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        
        <?php
            //salt = password protection
            /*
            echo "test123";
            echo "<br>";
            echo password_hash("test123",PASSWORD_DEFAULT);
            */

            $input = "test123";
            $hashedPwdInDb = password_hash("test123",PASSWORD_DEFAULT);

            echo password_verify($input, $hashedPwdInDb);

            /*
                you won't be able to see the pw once we de-hased it becuase,
                it is designed to be as safe as possible. This means that even you
                as the website owner whould not be able to read other user's pw
            */
        ?>

	</body>
</html>

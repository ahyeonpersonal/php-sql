<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <nav>
            <a href="index.php" alt="logo">DINI</a>
        </nav>
        <ul>
            <li><a href="index.php">Home</li>
            <li><a href="#">Porfolio</li>
            <li><a href="#">About Me</li>
            <li><a href="#">Contact</li>
        </ul>
        <div>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Username / Email.." />
                <input type="text" name="pwd" placeholder="Password..." />
                <button type="submit" name="login-submit" >Login</button> 
            </form>
            <a href="signup.php">Signup</a>
            <form action="includes/login.inc.php" method="post" >
                <button type="submit" name="logout-submit">Logout</button>
            </form>
        </div>
	</body>
</html>

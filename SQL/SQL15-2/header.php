<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="description" content="This is an example of a meta description. This will often show up in search results">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
		<title></title>
	</head>
	<body>
        <header>
            <nav>
                <a href="#" alt="logo">LOGO</a>
            </nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">About Me</a></li>
                <li><a href="#">Contact</a></li>
            </ul> 
            <div>
                <form action="includes/login.inc.php" method="post"> 
                <!--any sensitive data, user 'POST' method / GET : you can see everything in url-->
                    <input type="text" name="mailuid" placeholder="Username / Email..." />
                    <input type="text" name="pwd" placeholder="Password..." />
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Signup</a>
                <form action="includes/logout.inc.php" method="post">
                    <button type="Submit" name="logout-submit">Logout</button>
                </form>
            </div>
        </header>
	</body>
</html>
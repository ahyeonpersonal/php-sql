<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <h2>Sign up</h2>
        
        <form action="includes/signup.inc.php" method="POST"> <!-- POST : safe way to save pw -->
            <input type="text" name="first" placeholder="Firstname" /><br/>
            <input type="text" name="last" placeholder="Lastname" /><br/>
            <input type="text" name="email" placeholder="E-mail" /><br/>
            <input type="text" name="uid" placeholder="Username" /><br/>
            <input type="password" name="pwd" placeholder="Password" /><br/>
            
            <button type="submit" name="submit">Sign up</button>
        </form>
        
	</body>
</html>

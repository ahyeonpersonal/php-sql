<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <form>
            <?php
                //First Name
                if(isset($_GET['first'])){
                    $first=$_GET['first'];
                    echo '<input type="text" name="first" placeholder="Firstname" value="'.$first.'" /><br/>';
                }else{
                    echo '<input type="text" name="first" placeholder="Firstname"><br/>';
                }

                //Last Name
                if(isset($_GET['last'])){
                    $last=$_GET['last'];
                    echo '<input type="text" name="last" placeholder="Lastname" value="'.$last.'" /> <br/>';
                }else{
                    echo '<input type="text" name="last" placeholder="Lastname"><br/>';
                }
            ?>

            <input type="text" name="email" placeholder="E-mail" /><br/>

            <?php
                if(isset($_GET['uid'])){
                    $uid=$_GET['uid'];
                    echo '<input type="text" name="uid" placeholder="User ID" value="'.$uid.'"/><br>';
                }else{
                    echo '<input type="text" name="uid" placeholder="User ID" /><br>';
                }
            ?>
            
            <input type="text" name="pwd" placeholder="Password" /><br/>
            
            <button type="submit" name="submit">Signup</button>
        </form>
    </body>
</html>

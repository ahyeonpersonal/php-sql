
<!-- Delete dbh.inc.php insteadn, linked it to signup.inc.php -->
<!DOCTYPE HTML>
<html lang="en">
	<link rel="stylesheet" href="style.css">
    <head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <h2>Sign up</h2>
        
        <form action="includes/signup.inc.php" method="POST"> <!-- POST : safe way to save pw -->
            <?php
                
               
                if(isset($_GET['first'])){
                    $first=$_GET['first'];
                    echo'<input type="text" name="first" placeholder="Firstname" value="'.$first.'"/>'; //we can't directly use String in php so we need to divide it using '. .'
                }else{
                    echo '<input type="tex" name="first" placeholder="Firstname">';
                }

                if(isset($_GET['last'])){
                    $last=$_GET['last'];
                    echo'<input type="text" name="last" placeholder="Lastname" value="'.$last.'"/>';
                }else{
                    echo '<input type="tex" name="last" placeholder="Lasttname">';
                }

            ?>    
                <input type="text" name="email" placeholder="E-mail" /><br/>

            <?php
                if(isset($_GET['uid'])){
                    $uid=$_GET['uid'];
                    echo'<input type="text" name="uid" placeholder="User ID" value="'.$uid.'"/>';
                }else{
                    echo '<input type="text" name="uid" placeholder="Usdr ID">';
                }

            ?>  
            
            <input type="password" name="pwd" placeholder="Password" /><br/>
            
            <button type="submit" name="submit">Sign up</button>
        </form>
        
        
        <?php
            /*
            //// Error 1: With this manner, when user input the wrong email or whatever, 
            //// user need to fill all the from from the first, which is bad UI
            //// so we update Error 1 (= Error 2)

            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if(strpos($fullUrl,"signup=empty")== true){
                echo "<p class='error'>You did not fill in all fields!</p>";
                exit(); //if it happens we don't need to proceed next else if
            } 
            else if(strpos($fullUrl,"signup=char")== true){
                echo "<p class='error'>You used invalid characters!</p>";
                exit(); //if it happens we don't need to proceed next else if
            }
            else if(strpos($fullUrl,"signup=email")== true){
                echo "<p class='error'>You used invalid email!</p>";
                exit(); //if it happens we don't need to proceed next else if
            }
            else if(strpos($fullUrl,"signup=success")== true){
                echo "<p class='success'>You have been signed up!</p>";
                exit(); //if it happens we don't need to proceed next else if
            }
            */

            
            /// Error2
            if (!isset($_GET['signup'])){
                exit();
            }
            else{
                $signupCheck = $_GET['signup'];

                if ($signupCheck=="empty"){
                    echo "<p class='error>You did not fill in all fields!</p>";
                    exit();
                }
                else if($signupCheck=="char"){
                    echo"<p class='error'>You used invalid characters!!</p>";
                    exit();
                }
                else if($signupCheck=="email"){
                    echo"<p class='error'>You used invalid e-mail!</p>";
                    exit();
                }
                else if($signupCheck=="success"){
                    echo"<p class='error'>You have been signed up!</p>";
                    exit();
                }
            }

        ?>
	</body>
</html>

<?php
    require "header.php";
?>

<main>
    <div>
        <section>
            <h1>signup</h1>
            <?php
                //if we get Location: --- error? , we will notify the error msg
                if(isset($_GET['error'])){
                    //depend on what error, we will notify different error
                    if($_GET['error']=='emptyfields'){
                        echo '<p class="signuperror">Fill in all fields!</p>';
                    }else if($_GET['error']=='invaliduidmail'){
                        echo '<p class="signuperror">Invalid username and e-mail!</p>';
                    }else if($_GET['error']=='invaliduid'){
                        echo '<p class="signuperror">Invalid username!</p>';
                    }else if($_GET['error']=='invalidmail'){
                        echo '<p class="signuperror">Invalid E-mail!</p>';
                    }else if($_GET['error']=='passwordcheck'){
                        echo '<p class="signuperror">Your passwords do not match!</p>';
                    }else if($_GET['error']=='usertaken'){
                        echo '<p class="signuperror">Username is already taken!</p>';
                    }
                }else if($_GET['signup']=='success'){
                    echo '<p>Signup successful!</p>'
                }
            ?>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username" />
                <input type="text" name ="mail" plaeholder="E-mail" />
                <input type="text" name="pwd" placeholder="Password" />
                <input type="text" name="pwd-repeat" placeholder="Repeat password" />
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>

<?php
    require "footer.php";
?> 

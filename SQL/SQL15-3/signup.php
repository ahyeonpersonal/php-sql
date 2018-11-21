<?php
    require "header.php";
?>

<main>
    <div>
        <section>
            <h1>signup</h1>
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

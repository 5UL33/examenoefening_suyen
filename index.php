<?php

include $_SERVER['DOCUMENT_ROOT']. '/examenoefening_suyen/code/database.php';
$db = new Database();
$db->create_gebruiker();
//var_dump($db);
?>
<html

<body>
<form action="code/login.php" method="post">
    <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>
        <label for="ww"><b>Wachtwoord</b></label>
        <input type="password" placeholder="Wachtwoord" name="wachtwoord" required>
        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>
    <!--    <div class="container" style="background-color:#f1f1f1">-->
    <!--        <button type="button" class="cancelbtn">Cancel</button>-->
    <!--        <span class="psw">Forgot <a href="#">password?</a></span>-->
    <!--    </div>-->
</form>

</body>
</html>
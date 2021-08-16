
<?php
    include_once('functions_db.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="script.js"></script>
    <style>
    body {
        font-family: 'Segoe UI', Verdana, sans-serif;
    }
    button {
        padding: 2px;
        margin: 2px;
    }
</style>
</head>

<body>

<h3>Registration Form</h3>

<?php
    $errors = "";
    if(isset($_POST['regbtn'])) {
        $name = (isset($_POST["login"])) ? $_POST["login"] : "";
        $pass1 = (isset($_POST["pass1"])) ? $_POST["pass1"] : "";
        $pass2 = (isset($_POST["pass2"])) ? $_POST["pass2"] : "";
        $email = (isset($_POST["email"])) ? $_POST["email"] : "";
        if($name == '' || $pass1 == '' || $pass2 == '' || $email == '') {
            $errors .= "<p><span style='color:red;'>Fill All Required Fields!</span></p>";
        }
        
        if(strlen($name) < 3 || strlen($name) > 30) {
            $errors .= "<p><span style='color:red;'>Login Length Must Be Between 3 And 30!</span></p>";
        }

        if(strlen($pass1) < 3 || strlen($pass1) > 50) {
            $errors .= "<p><span style='color:red;'>Password Length Must Be Between 3 And 50!</span></p>";
        }

        if(strlen($email) < 3 || strlen($email) > 30) {
            $errors .= "<p><span style='color:red;'>Email Length Must Be Between 3 And 100!</span></p>";
        }
        if ($pass1 != $pass2) {
            $errors .= "<p style='color:red;'>Passwords do not equal</p>";
        }

        if (empty($errors)) {
            if (register($name, $pass1, $email)) {
                echo "<h3 style='color:green;'>New User $name Added!</h3>";
            }
        }
    }

    if(!isset($_POST['regbtn']) || !empty($errors)) {
?>

<form action="registration.php" method="post">
    <div>
        <label for="login">Login:</label>
        <input type="text" name="login" maxlength="30" oninput="checkUserExists(this.value)">
    </div>
    <div>
        <label for="pass1">Password:</label>
        <input type="password" name="pass1" maxlength="30">
    </div>
    <div>
        <label for="pass2">Confirm Password:</label>
        <input type="password" name="pass2" maxlength="30">
    </div>
    <div>
        <label for="email">Email address:</label>
        <input type="email" name="email" maxlength="100">
    </div>
    <div id="errors"><?php echo $errors; ?></div>
    <button type="submit" name="regbtn">Register</button>
</form>

<?php
    }
?>

</body>
</html>

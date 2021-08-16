
<?php
include_once("functions_db.php");

$login = (isset($_POST["login"])) ? $_POST["login"] : "";

$result = "";

if ($login) {
    if(userExist($login)) {
        $result = "<p style='color:red;'>Such Login Exists!</p>";
    }
}

echo $result;
?>

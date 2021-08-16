
<?php
include_once("functions_db.php");

$login = (isset($_POST["login"])) ? $_POST["login"] : "";

$result = array("error" => "");

if ($login) {
    if(userExist($login)) {
        $result["error"] = "<p style='color:red;'>Such Login Exists!</p>";
    }
}

echo json_encode($result);
?>

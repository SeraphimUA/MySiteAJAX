

<?php
    function dbConnect() {
        $database = @new mysqli("localhost", "root", "", "mysite");
        if ($database->connect_error) {
            echo "DB Error<br />".$database->connect_error;
            return null;
        }
        return $database;
    }

    function userExist($name) {
        $database = dbConnect();
        $sql = sprintf("SELECT username from users WHERE username = '%s'", $database->real_escape_string($name));
        $result = $database->query($sql);
        if (($result == true) && ($result->num_rows > 0)) {
            return true;
        }
        return false;
    }

    function register($name, $pass, $email) {
        //data validation block
        $name=trim(htmlspecialchars($name));
        $pass=trim(htmlspecialchars($pass));
        $email=trim(htmlspecialchars($email));

        if(userExist($name)) {
            echo "<h3><span style='color:red;'>Such Login Name Is Already Used!</span></h3>";
            return false;
        }

        $database = dbConnect();

        $sql = sprintf("INSERT INTO users(username, pass, email) VALUES ('%s', '%s', '%s')",
            $database->real_escape_string($name),
            $database->real_escape_string(md5($pass)),
            $database->real_escape_string($email)
        );

        if ($database->query($sql) !== TRUE) {
            echo "Error: ".$sql."<br />".$database->error;
            return false;
        }
        return true;
    }
?>

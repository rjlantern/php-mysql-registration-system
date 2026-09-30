<?php

    include "database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="main.css">
  <title>PHP Form</title>
</head>
<body>
<div class="container">
    <div class="form_area">
        <p class="title">WELCOME TO KINDER</p>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="form_group">
                <label class="sub_title">Name</label>
                <input placeholder="Enter your full name" class="form_style" type="text" name="username">
            </div>
            <div class="form_group">
                <label class="sub_title">Password</label>
                <input placeholder="Enter your password" id="password" class="form_style" type="password" name="password">
            </div>
            <div>
                <input class="btn" type="submit" value="REGISTER">
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        echo "<script>alert('Enter the username');</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Enter your Password');</script>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {

            $sql = "INSERT INTO users (user, password)
            VALUES ('$username', '$hash')";

            mysqli_query($connect, $sql);

            echo "<script>alert('Registered Successfully...');</script>";

        } catch (mysqli_sql_exception $e) {

            echo "<script>alert('Username already exists!');</script>";

        }
    }
    }

    mysqli_close($connect);

?>
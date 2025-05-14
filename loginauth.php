<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db1";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim(htmlspecialchars($_POST["email"]));
        $password = trim(htmlspecialchars($_POST["pass_word"]));

        if (empty($username) || empty($password)) {
            echo "Both username and password are required.";
            exit();
        }


        $stmt = mysqli_prepare($conn, "SELECT * FROM applicants WHERE email=? AND pass_word=?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "Login successful!";
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid username or password";
            echo '<a href="login.php" class="other-page-btn">TRY AGAIN</a>';
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
    ?>
</body>

</html>
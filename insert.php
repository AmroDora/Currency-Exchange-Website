<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $link = mysqli_connect("localhost", "root", "", "db1");
    // Check connection
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    // Escape user inputs for security
    $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $pass_word = mysqli_real_escape_string($link, $_REQUEST['pass_word']);
    $city = mysqli_real_escape_string($link, $_REQUEST['city']);
    $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
    // Attempt insert query execution
    $sql = "INSERT INTO applicants (first_name, last_name, email,pass_word,city,gender) VALUES
    ('$first_name', '$last_name', '$email','$pass_word', '$city', '$gender')";
    if (mysqli_query($link, $sql)) {
        echo "Records added successfully.";
        header("Location: index.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    // Close connection
    mysqli_close($link);
    ?>
</body>

</html>
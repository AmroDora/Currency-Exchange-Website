<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Applicant</title>
    <style>
        form {
            width: 20%;
            margin-top: 420px;
            margin-left: 70px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: x-large;
            color: white;
            text-align: right;
        }

        body {
            background-image: url('update.png');
            background-size: cover;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        input[type="text" i] {
            padding-block: 10px;
            padding-inline: 15px;
            border-radius: 14px;


        }

        input[type="password" i] {
            padding-block: 10px;
            padding-inline: 15px;
            border-radius: 14px;

        }

        input[type="email" i] {
            padding-block: 10px;
            padding-inline: 15px;
            border-radius: 14px;

        }

        input[type="submit" i] {
            padding-block: 15px;
            padding-inline: 18px;
            border-radius: 5px;
            background-color: green;
            font-size: medium;
            color: white;
            margin-top: 40px;
        }

        div {
            align-items: center;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>

    <?php
    $receivedVariable = isset($_GET['id']) ? urldecode($_GET['id']) : '';
    ?>
    <style>
        p {
            color: white;
        }
    </style>
    <?php


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $link = mysqli_connect("localhost", "root", "", "db1");


        // Check connection
        if (!$link) {
            die("Error: " . mysqli_connect_error());
        }

        // Get values from the form

        $applicant_id = isset($_POST['id']) ? $_POST['id'] : '';
        $new_first_name = isset($_POST['first_name']) ? mysqli_real_escape_string($link, $_POST['first_name']) : '';
        $new_last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($link, $_POST['last_name']) : '';
        $new_email = isset($_POST['email']) ? mysqli_real_escape_string($link, $_POST['email']) : '';
        $new_pass_word = isset($_POST['pass_word']) ? mysqli_real_escape_string($link, $_POST['pass_word']) : '';
        $new_city = isset($_POST['city']) ? mysqli_real_escape_string($link, $_POST['city']) : '';
        $new_gender = isset($_POST['gender']) ? mysqli_real_escape_string($link, $_POST['gender']) : '';


        // Update the record in the database
        $sql = "UPDATE applicants SET 
                first_name = '$new_first_name', 
                last_name = '$new_last_name', 
                email = '$new_email', 
                pass_word = '$new_pass_word', 
                city = '$new_city', 
                gender = '$new_gender' 
                WHERE id = $applicant_id";

        if (mysqli_query($link, $sql)) {
            echo "Record updated successfully.";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        // Close the database connection
        mysqli_close($link);
    }
    ?>


    <p style="width: 20%;">
        <input style="border-radius: 25px; font-size: 25px; margin-left:42px; margin-top: 30px;" onclick="window.location.href='index.php'" type="submit" value="Back"> </input>
    </p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <input type="hidden" name="id" value="<?php echo htmlspecialchars($receivedVariable); ?>">
        <div>
            <label for="id">Applicant ID:</label>
            <label style="margin-right: 145px; background-color: grey; padding: 10px; border-radius: 14px;" for="id"><?php echo $receivedVariable; ?> </label>
        </div>

        <div>
            <label for="first_name">New First Name:</label>
            <input type="text" name="first_name">
        </div>

        <div><label for="last_name">New Last Name:</label>
            <input type="text" name="last_name">
        </div>

        <div><label for="email">New Email:</label>
            <input type="email" name="email">
        </div>

        <div><label for="pass_word">New Password:</label>
            <input type="password" name="pass_word">
        </div>

        <div><label for="city">New City:</label>
            <input type="text" name="city">
        </div>

        <div><label for="gender">New Gender:</label>
            <select style="padding: 10px; font-size: large; margin-right: 80px; border-radius: 14px;" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>

            </select>
        </div>

        <input style="font-size: 25px; font-weight: bold;" type="submit" value="Update">

    </form>


</body>

</html>
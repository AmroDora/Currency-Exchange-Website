<!DOCTYPE html>
<html lang="en">
<head>

    <title>Delete Applicant</title>
</head>
<body>

<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $link = mysqli_connect("localhost", "root", "", "db1");

        // Check connection
        if (!$link) {
            die("Error: " . mysqli_connect_error());
        }

        // Get the applicant ID to be deleted
        $applicant_id = $_POST['id'];

        // Delete the record from the database
        $sql = "DELETE FROM applicants WHERE id = $applicant_id";

        if (mysqli_query($link, $sql)) {          
            echo "Record deleted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        // Close the database connection
        mysqli_close($link);
    }
?>

<h2>Delete Applicant</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="id">Applicant ID:</label>
    <input type="text" name="id" required>

    <button type="submit" id="refreshButton">Delete</button>
</form>



</body>
</html>
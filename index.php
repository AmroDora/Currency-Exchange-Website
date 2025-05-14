<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants CRUD</title>
    <style>
        body {
            background-image: url('CRUD.avif');
            background-size: cover;
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: white;
            border: 1px solid #27ae60; 
            border-radius: 5px;
            background-color: gray;
            padding: 10px;
          
        }

        table {
            width: 80%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            color: darkgreen;
            background-color: lightgray;
        }

        th, td {
            padding: 8px;
            border: 1px solid #27ae60; 
        }

        th {
            background-color: #27ae60; 
            color: white;
        }

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #3498db; 
            color: white;
            padding: 8px 15px; 
            border: none;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9; 
        }

        input[name="delete"] {
            background-color: #e74c3c; 
            padding: 8px 15px; 
            border-radius: 5px;
        }

        input[name="delete"]:hover {
            background-color: #c0392b; 
        }
        .buttons{
            display: flex;
            width: 0px;
        }

        .add-button {
            background-color: #2ecc71;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: large;
        }

        .add-button:hover {
            background-color: #27ae60; 
        }
        .search-bar {
            display: flex;
            width: 80%;
            text-align: center;
            justify-content: space-between;
            align-items: center;
        }

        .search-button {
            background-color: #3498db; 
            color: white;
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            margin-left: 5px;
            border-radius: 5px;
        }

        .search-button:hover {
            background-color: #2980b9; 
        }
        .sbar{
            border: 1px solid #27ae60; 
            border-radius: 5px;
            background-color: gray;
            padding: 10px;
        }
        .divclass{
            width: 80%;
            text-align: left;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    Search Bar 
<div class="search-bar">
    <h2>Applicants</h2>
    <form class="sbar" method="get" action="">
        <label style="color: white;" for="search">Search by ID:</label>
        <input type="text" id="search" name="search">
        <input type="submit" class="search-button" value="Search">
    </form>
</div>


<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$displayMainTable = true;

// Search
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    $search_id = $_GET["search"];
    $search_sql = "SELECT * FROM applicants WHERE id = $search_id";
    $search_result = $conn->query($search_sql);

    if ($search_result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table style='margin-bottom: 20px;' border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th><th>City</th><th>Gender</th><th>Action</th></tr>";
        while ($row = $search_result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['pass_word']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['gender']}</td>
                    <td>
                        <form class='buttons'method='post' action=''>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='submit' name='update' value='Update'>
                            <input type='submit' name='delete' value='Delete'>
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='padding: 15px;color:white;font-size:x-large; border-radius:5px;background-color: #2ecc71;'>No matching records found.</p>";
    }
}

// Create
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["pass_word"];
    $city = $_POST["city"];
    $gender = $_POST["gender"];

    $sql = "INSERT INTO applicants (first_name, last_name, email, pass_word, city, gender) 
            VALUES ('$first_name', '$last_name', '$email', '$password', '$city', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read
$sql = "SELECT * FROM applicants";
$result = $conn->query($sql);


echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th><th>City</th><th>Gender</th><th>Action</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['pass_word']}</td>
            <td>{$row['city']}</td>
            <td>{$row['gender']}</td>
            <td>
                <form class='buttons' method='post' action=''>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='submit' name='update' value='Update'>
                    <input type='submit' name='delete' value='Delete'>
                </form>
            </td>
          </tr>";
}

echo "</table>";

// Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    header("Location: update.php?id=$id");
    exit(); // Ensure script execution stops after the header is sent
}

// Delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];
    $delete_sql = "DELETE FROM applicants WHERE id = $id";
    if ($conn->query($delete_sql) === TRUE) {
        echo"Record deleted successfully";
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}




$conn->close();
ob_end_flush();
?>
<div class="divclass">
<button class="add-button" onclick="window.location.href='Create.php'">Add Participant</button>
</div>
</body>
</html>

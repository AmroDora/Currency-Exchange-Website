<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $link=mysqli_connect("localhost","root","","db1");
    if($link){
        echo "Connection OK <br>";
    }
    else{
        die("Error: <br>" . mysqli_connect_error());
    }

    $sql="CREATE TABLE applicants(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE,
        pass_word VARCHAR(70) NOT NULL ,
        city VARCHAR(100),
        gender VARCHAR(10)
        )";
    
        if(mysqli_query($link, $sql)){
        echo "Table created successfully.";
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
   

    mysqli_close($link);


?>


</body>
</html>
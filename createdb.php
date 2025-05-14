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
    $link=mysqli_connect("localhost","root","");

    if($link){
        echo "Connection Established<br>";
    }
    else{
        die("Error: Could not connect" . mysqli_connect_error());
    }

    $sql="CREATE DATABASE db1";

    mysqli_query($link,$sql);

    if(mysqli_query($link,$sql)){
        echo "Database Created<br>";
    }
    else{
        echo "Database not Created<br>". mysqli_error($link);
    }



    mysqli_close($link);


    ?>
</body>
</html>
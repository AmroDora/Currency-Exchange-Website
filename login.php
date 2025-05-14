<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
            background-image: url('login.png');
            background-size: cover;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        form{
            margin-top: 450px;
            margin-left: 1000px;
            
        }
        input[name="submit" i] {
            background-color: black;
            border-radius: 14px;
            padding-block: 14px;
            padding-inline: 10px;
            color: white;
            font-size: medium;
            font-weight: bold;
            width: 200px;
        }
        input[name="back" i] {
            background-color: green;
            border-radius: 25px;
            padding-block: 14px;
            padding-inline: 10px;
            color: white;
            font-size: 25px;
            font-weight: bold;
            width: 200px;
            margin-left:42px; 
            margin-top: 30px;
        }
        input[type="email" i]{
            padding-block: 15px;
            padding-inline: 20px;
            border-radius: 5px;
            background-color: lightgrey;
            color: white;
            font-size: medium;
            width: 300px;
            
        }
        input[type="password" i]{
            padding-block: 15px;
            padding-inline: 20px;
            border-radius: 5px;
            background-color: lightgrey;
            color: white;
            font-size: medium;
            width: 300px;
        }
        p{
            width: 200px;
            height: 10px;
        }
        label{
            font-size: x-large;
        }
        input[name="back"]:hover {
            background-color: #27ae60; 
        }
        input[name="submit"]:hover {
            background-color: darkslategray; 
        }
    </style>
</head>

<body>
    <input type="submit" onclick="window.location.href='homepage.php'" name="back" value="Back">
    <form action="loginauth.php" method="post">
        <p>
        <div><label for="email">EMAIL</label></div>
        <input type="email" id="email" name="email" required><br>
        </p>
        <p>
        <div><label for="pass_word">PASSWORD</label></div>
        <input type="password" id="pass_word" name="pass_word" required><br>
        </p>
        <input type="submit" name="submit" value="Login">
        
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            margin-top: 420px;
            margin-left: 70px;
        }

        label {
            font-size: large;
            color: white;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        body {
            background-image: url('signup.jpg');
            background-size: cover;
            
        }

        input[type="text" i] {
            padding-block: 15px;
            padding-inline: 20px;
            border-radius: 5px;

        }
        input[type="password" i] {
            padding-block: 15px;
            padding-inline: 20px;
            border-radius: 5px;

        }
        input[type="submit" i] {
            padding-block: 15px;
            padding-inline: 18px;
            border-radius: 5px;
            background-color: green;
            font-size: medium;
            color: white;

        }
        input[name="submit"]:hover {
            background-color: #27ae60; 
        }
        
    </style>
</head>

<body>
    

    <input style="border-radius: 25px; font-size: 25px; margin-left:42px; margin-top: 30px;" onclick="window.location.href='homepage.php'" type="submit" name="submit" value="Back"> </input>

    <form action="insert.php" method="post">
        <p>
        <div><label for="firstName">First Name:</label> <label style="margin-left: 155px;" for="lastName">Last Name: </label></div>
        <input type="text" name="first_name" id="firstName">

        <input style="margin-left: 30px;" type="text" name="last_name" id="lastName">
        </p>
        <p>
        <div><label for="emailAddress">Email Address:</label></div>
        <input style="width: 250px;" type="text" name="email" id="emailAddress">
        </p>
        <p>
        <div> <label for="pass_word">Password:</label></div>
        <input type="password" name="pass_word" id="pass_word">
        </p>
        <p>
        <div> <label for="city">City:</label></div>
        <input type="text" name="city" id="city">
        </p>
        <p>
            <label for="gender">Male:</label>
            <input type="radio" name="gender" value='Male' id="gender">
            <label for="gender">Female:</label>
            <input type="radio" name="gender" value='Female' id="gender">

        </p>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>
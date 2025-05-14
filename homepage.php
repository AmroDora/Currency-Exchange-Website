<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-image: url('homepage.jpg');
            background-size: cover;

        }

        .topbuttons:hover {
            background-color: #27ae60;
        }

        .buttons {
            margin-top: 50px;
            position: absolute;
            right: 70px;
            display: flex;
            width: 50%;
            justify-content: flex-end;

        }

        .topbuttons {
            background-color: green;
            border-radius: 14px;
            padding-block: 14px;
            padding-inline: 10px;
            color: white;
            font-size: medium;
            font-weight: bold;
            width: 10%;
            margin-right: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            justify-content: space-around;
            display: flex;
            margin: 0;
            margin-top: 500px;
            width: 65%;
            text-align: center;

        }

        select {
            border: 0;
            background-color: transparent;
            padding: 10px;
            font-size: 50px;
            border-radius: 14px;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
        }

        .inputcontainer {

            background-color: lightgrey;
            display: flex;
            align-items: center;
            padding: 30px 100px;
            border-radius: 500px 500px;
            border-left: solid 5px;
            border-right: solid 5px;
        }

        input[name="convert" i] {
            padding: 30px 80px;
            font-size: 50px;
            border-radius: 500px 500px;
            font-weight: bold;
        }

        #amount {
            padding: 50px;
            background-color: transparent;
            border: 0;
            font-size: 50px;
            width: 320px;
        }

        #arrow {
            font-size: 70px;

        }
    </style>
</head>

<body>

    <div class="buttons">
        <input class="topbuttons" type="submit" onclick="window.location.href='login.php'" name="login" value="LOGIN">
        <input class="topbuttons" type="submit" onclick="window.location.href='Create.php'" name="signup" value="SIGNUP">
    </div>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="container">
            <div class="inputcontainer">
                <input placeholder="Enter Amount" type="text" id="amount" name="amount" required><br>


                <select name="currency1">
                    <option value="USD">USD ($)</option>
                    <option value="EURO">EURO (€)</option>
                    <option value="GBP">GBP (£)</option>
                    <option value="TRY">TRY (₺)</option>
                    <option value="ILS">ILS (₪)</option>
                </select>
                <i id="arrow" class='bx bxs-chevrons-right'></i>


                <select name="currency2">
                    <option value="USD ($)">USD ($)</option>
                    <option value="EURO (€)">EURO (€)</option>
                    <option value="GBP (£)">GBP (£)</option>
                    <option value="TRY (₺)">TRY (₺)</option>
                    <option value="ILS (₪)">ILS (₪)</option>
                </select>
            </div>
            <input type="submit" name="convert" value="Convert">
        </div>
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $numbers = $_POST['amount'];
        $currency1 = $_POST['currency1'];
        $currency2 = $_POST['currency2'];

        if ($currency1 == 'USD') {
            switch ($currency2) {
                case 'USD ($)':
                    $numbers = $numbers * 1;
                    break;
                case 'EURO (€)':
                    $numbers = $numbers * 0.91;
                    break;
                case 'GBP (£)':
                    $numbers = $numbers * 0.79;
                    break;
                case 'TRY (₺)':
                    $numbers = $numbers * 29.29;
                    break;
                case 'ILS (₪)':
                    $numbers = $numbers * 3.62;
                    break;
                default:
                    # code...
                    break;
            }
        }
        if ($currency1 == 'EURO') {
            switch ($currency2) {
                case 'USD ($)':
                    $numbers = $numbers * 1.1;
                    break;
                case 'EURO (€)':
                    $numbers = $numbers * 1;
                    break;
                case 'GBP (£)':
                    $numbers = $numbers * 0.87;
                    break;
                case 'TRY (₺)':
                    $numbers = $numbers * 32.27;
                    break;
                case 'ILS (₪)':
                    $numbers = $numbers * 4;
                    break;
                default:
                    # code...
                    break;
            }
        }
        if ($currency1 == 'GBP') {
            switch ($currency2) {
                case 'USD ($)':
                    $numbers = $numbers * 1.27;
                    break;
                case 'EURO (€)':
                    $numbers = $numbers * 1.15;
                    break;
                case 'GBP (£)':
                    $numbers = $numbers * 1;
                    break;
                case 'TRY (₺)':
                    $numbers = $numbers * 37.18;
                    break;
                case 'ILS (₪)':
                    $numbers = $numbers * 4.6;
                    break;
                default:
                    # code...
                    break;
            }
        }
        if ($currency1 == 'TRY') {
            switch ($currency2) {
                case 'USD ($)':
                    $numbers = $numbers * 0.034;
                    break;
                case 'EURO (€)':
                    $numbers = $numbers * 0.031;
                    break;
                case 'GBP (£)':
                    $numbers = $numbers * 0.027;
                    break;
                case 'TRY (₺)':
                    $numbers = $numbers * 1;
                    break;
                case 'ILS (₪)':
                    $numbers = $numbers * 0.12;
                    break;
                default:
                    # code...
                    break;
            }
        }
        if ($currency1 == 'ILS') {
            switch ($currency2) {
                case 'USD ($)':
                    $numbers = $numbers * 0.28;
                    break;
                case 'EURO (€)':
                    $numbers = $numbers * 0.25;
                    break;
                case 'GBP (£)':
                    $numbers = $numbers * 0.22;
                    break;
                case 'TRY (₺)':
                    $numbers = $numbers * 8.12;
                    break;
                case 'ILS (₪)':
                    $numbers = $numbers * 1;
                    break;
                default:
                    # code...
                    break;
            }
        }

        echo " <div style='font-weight:bold; padding:20px; border-radius:500px 500px; font-size: 50px; width:20%; margin:auto; text-align:center; margin-top:20px; background-color: grey; '>$numbers $currency2</div>";
    }
    ?>
</body>

</html>
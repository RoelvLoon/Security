<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    //https://86604.ict-lab.nl/basis2/security/index.php
    
    session_start();
    $token = uniqid();
    $_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="password.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form</title>
</head>
<body class="p-0">
    <div class="navbar navbar-expand-lg navbar-light bg-info sticky-top" >
        <a type="submit" href="login.php" name="submit" class="ms-5 navbar-brand float-end text-white">Inloggen</a>
    </div>
    <div class="p-4">
        <form method="post" action="verwerk.php" class="form-group">
            <div class="alert alert-info text-center" role="alert">
                Alle input velden moeten ingevuld worden!
            </div>
            <div class="form-group p-2">
                <lable for="email">Email:</lable>
                <input placeholder="12345@glr.nl" class="form-control" type="text" name="email" id="email"></input>
            </div>
            <div class="form-group p-2">
                <lable for="iban">IBAN:</lable>
                <input placeholder="NL00BANK0000000000" class="form-control" type="text" name="iban" id="iban"></input>
            </div>
            <div class="form-group p-2">
                <lable for="postcode">Postcode:</lable>
                <input placeholder="0000XX" class="form-control" type="text" name="postcode" id="postcode"></input>
            </div>
            <div class="form-group p-2">
                <lable for="telnum">Telefoonnummer:</lable>
                <input placeholder="06XXXXXXXX" class="form-control" type="number" name="telnum" id="telnum"></input>
            </div>
            <div class="form-group p-2">
                <lable for="stunum">Studentnummer:</lable>
                <input class="form-control" type="number" name="stunum" id="stunum"></input>
            </div>
            <div class="form-group p-2">
                <lable for="leeftijd">Leeftijd:</lable>
                <input class="form-control" type="number" name="leeftijd" id="leeftijd"></input>
            </div>
            <div class="form-group p-2">
                <lable for="password">Wachtwoord:</lable>
                <input class="form-control" type="password" name="password" id="password" onkeyup='check();'></input>
            </div>
            <div class="form-group p-2">
                <lable for="passwordcheck">Wachtwoord herhalen:</lable>
                <input class="form-control" type="password" name="passwordcheck" id="passwordcheck" onkeyup='check();'></input>
                <p class="mt-3" id="message"></p>
            </div>
            <div  class="form-group p-2">
                <button type="submit" name="submit" class="btn btn-primary mb-2 btn-info">Versturen</button>
            </div>
            <input type="hidden" name="csrf_token" value="<?=$token?>">
        </from>
    </div>
</body>
</html>
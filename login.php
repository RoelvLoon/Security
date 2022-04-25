<?php

include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="password.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="p-4 d-flex justify-content-center text-center">
    <form method="post" action="verwerklogin.php" class="form-group w-25">
        <div class="form-group p-2">
            <h1 class="text-info" >Hier kunt u inloggen</h1>
        </div>
        <div class="form-group p-2">
            <lable for="email">Email:</lable>
            <input class="form-control text-center" type="text" name="email" id="email"  onkeyup='off();'></input>
        </div>
        <div class="form-group p-2">
            <lable for="Wachtwoord">Wachtwoord:</lable>
            <input class="form-control text-center" type="password" name="Wachtwoord" id="Wachtwoord"  onkeyup='off();'></input>
        </div>
        <div  class="form-group p-2">
            <a type="submit" href="index.php" name="submit" class="btn btn-primary mb-2 btn-danger">Terug</a>
            <button type="submit" name="submit" id="button" class="btn btn-primary mb-2 btn-info">Login</button>
        </div>
    </from>
</body>
</html>
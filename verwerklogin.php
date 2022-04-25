<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="navbar navbar-expand-lg navbar-light bg-info sticky-top" >
    <a type="submit" href="index.php" name="submit" class="ms-5 navbar-brand float-end text-white">Home</a>
</div>
<?php

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

include("config.php");

if(isset($_POST['submit']))
{
    $emailinput = $_POST['email'];
    $wachtwoordinput = sha1($_POST['Wachtwoord']);

    if( strlen($_POST['email']) == 0 && strlen($_POST['email']) == 0){
        header("location:login.php");
    }else
    {
        $sql = ("SELECT id, email, iban, postcode, telnum, stunum, wachtwoord FROM  `data` WHERE email = '$emailinput' AND wachtwoord = '$wachtwoordinput'");
        $result = $pdo->query($sql);

        while ($rows = $result->fetch()){
            $id = $rows['id'];
            $email = $rows['email'];
            $iban = $rows['iban'];
            $postcode = $rows['postcode'];
            $telnum = $rows['telnum'];
            $stunum = $rows['stunum'];
            $wachtwoord = $rows['wachtwoord'];
        }
        
        if($emailinput == $email && $wachtwoordinput == $wachtwoord){
            echo "<h1 class='text-center text-success'>U bent ingelogd!</h1>";
            echo "<table class='table text-center'>";
                echo "<tr>";
                    echo "<td>" . $id . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" . $email . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" . $iban . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" . $postcode . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" . $telnum . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" . $stunum . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" . $wachtwoord . "</td>";
                echo "</tr>";
            echo "</table>";
        } else
        {
            echo "<h1 class='text-center text-danger'>Gegevens kloppen niet!</h1>";
        }
    }
}
?>
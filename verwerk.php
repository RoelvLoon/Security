<?php
    include("config.php");
    session_start();

    function uuidv4()
    {
        $id = openssl_random_pseudo_bytes(16);

        $id[6] = chr(ord($id[6]) & 0x0f | 0x40);
        $id[8] = chr(ord($id[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s' , str_split(bin2hex($id), 4));
    }

    // De CSRF_token check
    if (isset($_SESSION["token"]) && $_SESSION["token"] == $_POST["csrf_token"])
    {
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $iban = $_POST['iban'];
            $postcode = $_POST['postcode'];
            $telnum = $_POST['telnum'];
            $stunum = $_POST['stunum'];
            $leeftijd = $_POST['leeftijd'];
            $wachtwoord = $_POST['password'];
            $wachtwoord2 = $_POST['passwordcheck'];

            // Alle RegEx's
            $emailcheck = "/[1-9][0-9]{4}@glr\.nl/";
            $ibancheck = "/NL[1-9][0-9][A-Z]{4}[0-9]{10}/";
            $postcodecheck = "/[1-9][0-9]{3}[A-Z]{2}/";
            $telnumcheck = "/06[0-9]{8}/";
            $stunumcheck = "/[1-9][0-9]{4}/";
            $leeftijdcheck = "/[0-9]{2}/";
            $wachtwoordcheck = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";

            // De email check
            if(preg_match($emailcheck, $email))
            {
                
            } else 
            {
                $fouten++;

                echo "<h4 class='mt-5'>Email klopt niet." . "</h4><br>";
            }
            // De IBAN check
            if(preg_match($ibancheck, $iban))
            {
                
            } else
            {
                $fouten++;

                echo "<h4>IBAN klopt niet." . "</h4><br>";
            }
            // De postcode check
            if(preg_match($postcodecheck, $postcode))
            {
                
            } else
            {
                $fouten++;

                echo "<h4>Postcode klopt niet." . "</h4><br>";
            }
            // De telefoon nummer check
            if(preg_match($telnumcheck, $telnum))
            {
                
            } else
            {
                $fouten++;

                echo "<h4>Telefoon nummer klopt niet." . "</h4><br>";
            }
            // De studentnummer check
            if(preg_match($stunumcheck, $stunum))
            {
                
            } else
            {
                $fouten++;

                echo "<h4>Studentennummer klopt niet." . "</h4><br>";
            }
            // De leeftijd check
            if(preg_match($leeftijdcheck, $leeftijd))
            {
                
            } else
            {
                $fouten++;

                echo "<h4>Leeftijd klopt niet." . "</h4><br>";
            }

            // De wachtwoord check
            if(preg_match($wachtwoordcheck, $wachtwoord))
            {
                if( $wachtwoord !== $wachtwoord2)
                {
                    $fouten++;

                    echo "<h4>Wachtwoord komt niet overeen." . "</h4><br>";
                }
                
            } else
            {
                $fouten++;

                echo "<h4>Wachtwoord voldoet niet aan de eisen." . "</h4><br>";
            }
        }
        // Fouten check
        if($fouten >= 1)
        {
            echo "<h1 class='p-1'>Aantal fouten: " . $fouten . "</h1>
            <a href='index.php' class='btn btn-primary mb-2 ms-2 btn-info'>Terug</a>";
        } else
        {
            // Als er 0 fouten zijn word het prepared naar de DB gestuurd
            $data = [
                'id' => uuidv4(),
                'email' => $email,
                'iban' => $iban,
                'postcode' => $postcode,
                'telnum' => $telnum,
                'stunum' => $stunum,
                'leeftijd' => $leeftijd,
                'wachtwoord' => sha1($wachtwoord),
            ];
            $sql = "INSERT INTO `data` (id, email, iban, postcode, telnum, stunum, leeftijd, wachtwoord)
            VALUES (:id, :email, :iban, :postcode, :telnum, :stunum, :leeftijd, :wachtwoord)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute($data);

            echo "<h1 class='p-4'>Data is verzonden naar Database</h1>
            <a href='index.php' class='btn btn-primary mb-2 ms-2 btn-info'>Terug</a>";
			
			unset($_SESSION["token"]);
        }
    } else
    {
        // Zonder CSRF_token word de gebruiker terug gestuurd naar index.php
        header("location: index.php");
    }
?>
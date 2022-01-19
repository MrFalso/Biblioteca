<?php
    include("creazione_codice.php");
    $user = $_GET["user"];
    $pass = $_GET["pass"];
    $eta = $_GET["eta"];
    $res = $_GET["res"];
    $file = fopen("csv/utenti.csv", "a+");
    $trov = false;

    $codice = CreaCodice($user, $pass);

    if ($file != false) {
        while (($data = fgetcsv($file, 1000, ",")) != false) {
            $vet = explode(";", $data[0]);
            if ($user == $vet[1] and $pass == $vet[2]) {
                $trov = true;
            }
        }
    }

    if ($trov) {
        echo "
            <script>
                alert('Utente esistente');
                window.location = 'index.php';
            </script>
        ";
    } else {
        fwrite($file, "\n");
        fwrite($file, $codice);
        fwrite($file, ";");
        fwrite($file, $user);
        fwrite($file, ";");
        fwrite($file, $pass);
        fwrite($file, ";");
        fwrite($file, $eta);
        fwrite($file, ";");
        fwrite($file, $res);
        echo "
            <script>
                alert('Registrazione completata con successo');
                window.location = 'index.php';
            </script>
        ";
    }

    fclose($file);
?>
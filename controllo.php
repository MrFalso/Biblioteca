
<?php
    include("creazione_codice.php");
    session_start();
    $trov = false;

    function ContLibri($user, $pass){
        $cont = 0;
        $handle = fopen("csv/prenotazioni.csv", "r");
        if ($handle!= false) {
            while (($d = fgetcsv($handle, 1000, ",")) != false) {
                $v = explode(";", $d[0]);
                if ($v[1] == CreaCodice($user, $pass)) {
                    $cont++;
                }
            }
        }
        fclose($handle);
        return $cont;
    }

    if ($_GET["tipo"] == "Accedi") {
        if (isset($_GET['user']) and isset($_GET['pass'])) {
            $_SESSION['user'] = $_GET['user'];
            $_SESSION['pass']  = $_GET['pass'];
            $_SESSION['n_libri'] = ContLibri($_GET['user'], $_GET['pass']);

            echo "<script>console.log(".$_SESSION['n_libri'].")</script>";
            
            $file = fopen("csv/utenti.csv", "r");
    
            if ($file != false) {
                while (($data = fgetcsv($file, 1000, ",")) != false) {
                    $vet = explode(";", $data[0]);
    
                    if ($_SESSION['user'] == $vet[1] and $_SESSION['pass'] == $vet[2]) {
                        $trov = true;
                        $_SESSION['codice'] = $vet[0];
                    }
                }
    
                if ($trov) {
                    echo "
                    <script>
                        window.location = 'libri.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        window.alert('Username o Password errati');
                        window.location = 'index.php';
                    </script>
                    ";
                }
            } else {
                echo "<h1>[ ERRORE ]: file non aperto correttamente </h1>";
            }
        }
    } else {
        echo "
        <script>
            window.location = 'registrazione.php';
        </script>
        ";
    }

    fclose($file);
?>
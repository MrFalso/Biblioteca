<?php
    session_start();
    $_SESSION["cod_libro"] = $_GET["cod_libro"];
    $trov = false;
    
    function SetDate() {
        $d = date("d");
        $m = (int)date("m");
        $y = date("y");
        $m = $m + 1;
        return $d."-".$m."-".$y;
    }

    $file = fopen("csv/prenotazioni.csv", "a+");

    if ($file != false) {
        while (($data = fgetcsv($file, 1000, ",")) != false) {
            $vet = explode(";", $data[0]);

            if ($vet[0] == $_SESSION["cod_libro"] and $vet[1] == $_SESSION["codice"]) {
                $trov = true;
            }
        }
    }

    if ($trov) {
        echo "
            <script>
                alert('Libro già prenotato');
                window.location = 'libri.php';
            </script>
        ";
    } else {
        if ($_SESSION["n_libri"] < 5) {
            $_SESSION["n_libri"]++;
            fwrite($file, "\n");
            fwrite($file, $_SESSION["cod_libro"]);
            fwrite($file, ";");
            fwrite($file, $_SESSION["codice"]);
            fwrite($file, ";");
            fwrite($file, date("d-m-y"));
            fwrite($file, ";");
            fwrite($file, SetDate());
            echo "
                <script>
                    alert('Libro prenotato');
                    window.location = 'libri.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Numero massimo di prenotazioni raggiunte');
                    window.location = 'libri.php';
                </script>
            "; 
        }
    }

    fclose($file);
?>
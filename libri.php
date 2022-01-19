<!DOCTYPE html>
<html lang="it">
<head>
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .fantasy {
            display: grid;
            grid-template-columns: auto auto auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 1450px;
        }
        
        .grid {
            display: grid;
            grid-template-columns: auto auto auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 250px;
        }

        .grid2 {
            display: grid;
            grid-template-columns: auto auto auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 1450px;
        }

        header {
            width: 100%;
            height: 80px;
            background-color: #1d3557;
        }

        p {
            font-size: 20px;
            color: #f1faee;
        }

        .tipo {
            display: flex;
            justify-content: center;
        }

        .child {
            /*margin-top: 1000px;*/
        } 

        .image {
            box-shadow: 2px 6px 41px -18px #000000;
        }

    </style>
</head>
<body>
    <?php
        session_start();
        echo "<script>console.log(".$_SESSION['n_libri'].");</script>";
        $file = fopen("csv/libri.csv", "r");
        $i = 0;

        echo "
        <header>
        <a href=libri.php><img src=img/logo.png width=120px style=padding: 10px;></a>
            <table border=0 align=right cellspacing=2 height=100% width=300px>
                <tr align=center>
                    <td rowspan=2><img src=img/online.png width=20 height=20></td>
                    <td rowspan=2 align=center><p>".$_SESSION['user']."</p></td>
                    <td><a href=carrello.php> <img src=img/carrello.png width=50></a></td>
                </tr>
            </table>
        </header>
        <br><br>
        ";


        echo "
        <div class=tipo>
        <form action=libri.php method=get>
            <select name=tipologia>
                <option>Fantasy</option>
                <option>Romantico</option>
                <option>Comico</option>
                <option>Horror</option>
                <option>Biografia</option>
            </select>
            <input type=submit value=cerca>
        </form>
        </div>
        <br><br>
        ";

        if (isset($_GET["tipologia"])) {
            if ($_GET['tipologia'] == 'fantasy')
                echo"<div class=fantasy>";
            else
                echo"<div class=grid>";

            if ($file != false) {
                while (($data = fgetcsv($file, 1000, ",")) != false) {
                    $vet = explode(";", $data[0]);

                    if ($_GET["tipologia"] == $vet[3]) {
                    echo "
                    <form action=prenotazione.php method=get>
                    
                        <table border=0 style=text-align:center; cellspacing=10>
                        <tr height=100px>
                            <th><h2>".$vet[2]."</h2></th>
                        </tr>
                            <tr>
                                <td><img src=img/".$vet[1]." width=300 height=300 class=image></td>
                            </tr>
                            <tr>
                                <td>".$vet[5]."</td>
                            </tr>
                            <td><input type=submit value=prenota class=btn></td>
                            </tr>
                        </table>
                        <input type=hidden name=cod_libro value=".$vet[0].">
                    </form>
                        ";
                    }

                }
            }
    
            echo "</div>";
        } else {
            echo"
            <div class=grid2>
            ";

            while (($data = fgetcsv($file, 1000, ",")) != false) {
                $vet = explode(";", $data[0]);
                echo "
                <div class=child>
                <form action=prenotazione.php method=get>
                    <table border=0 style=text-align:center; cellspacing=10>
                        <tr height=100px>
                            <th><h2>".$vet[2]."</h2></th>
                        </tr>
                        <tr>
                            <td><img src=img/".$vet[1]." width=300 height=300 class=image></td>
                        </tr>
                        <tr>
                            <td>".$vet[5]."</td>
                        </tr>
                        <td><input type=submit value=prenota class=btn></td>
                        </tr>
                    </table>
                    <input type=hidden name=cod_libro value=".$vet[0].">
                </form>
                </div>
                    ";
            }

            echo "</div>";
        }

        echo "</div>";

        fclose($file);

    ?>
</body>
</html>
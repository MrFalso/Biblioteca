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
            margin-top: 530px;
        }
        
        .grid {
            display: grid;
            grid-template-columns: auto auto auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .grid2 {
            display: grid;
            grid-template-columns: auto auto auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 1550px;
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
            text-align: center;
            justify-content: center;
            height: 100px;
        }

        .child {
            /*margin-top: 1000px;*/
        } 

        .image {
            box-shadow: 2px 6px 41px -18px #000000;
        }

        .exit {
            font-size: 15px;
        }

        .exit:hover {
            color: red;
        }

        .btn {
            background-color: #13aa52;
            border: 1px solid #13aa52;
            border-radius: 4px;
            box-shadow: rgba(0, 0, 0, .1) 0 2px 4px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-family: "Akzidenz Grotesk BQ Medium", -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 16px;
            font-weight: 400;
            outline: none;
            outline: 0;
            padding: 10px 25px;
            text-align: center;
            transform: translateY(0);
            transition: transform 150ms, box-shadow 150ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }
          
        .btn:hover {
          box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
          transform: translateY(-2px);
        }
        
        @media (min-width: 768px) {
          .btn {
            padding: 10px 30px;
          }
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
                    <td rowspan=2 align=center width=120px><p>".strtoupper($_SESSION['user'])."</p><a href=exit.php ><p class=exit>Sign Out</p></a></td>
                    <td><a href=carrello.php> <img src=img/carrello.png width=50></a></td>
                </tr>
            </table>
        </header>
        <br>
        ";


        echo "
        <div class=tipo>
        <h2>Scegli la tipologia:</h2>
        
        <form action=libri.php method=get>
        <br>
            <select name=tipologia>
                <option>Fantasy</option>
                <option>Romantico</option>
                <option>Comico</option>
                <option>Horror</option>
                <option>Biografia</option>
                <option>Giallo</option>
            </select>
            <input type=submit value=cerca>
        </form>
        </div>
        <br><br>
        ";

        if (isset($_GET["tipologia"])) {
            if ($_GET['tipologia'] == 'Fantasy') {
                 echo"<div class=fantasy>";
                 echo "<script>console.log('fantasy');</script>";
            } else {
                echo "<script>console.log('grid');</script>";
                echo"<div class=grid>"; 
            }
            
            if ($file != false) {
                while (($data = fgetcsv($file, 1000, ",")) != false) {
                    $vet = explode(";", $data[0]);

                    if ($_GET["tipologia"] == $vet[3]) {
                    echo "
                    <form action=prenotazione.php method=get>
                    
                        <table border=0 style=text-align:center; cellspacing=10>
                        <tr height=100px>
                            <th><h3>".$vet[2]."</h3></th>
                        </tr>
                            <tr>
                                <td><img src=img/".$vet[1]." width=200 height=300 class=image></td>
                            </tr>
                            <tr>
                                <td>".$vet[5]."</td>
                            </tr>
                            <td><input type=submit value=Prenota class=btn></td>
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
                            <th><h3>".$vet[2]."</h3></th>
                        </tr>
                        <tr>
                            <td><img src=img/".$vet[1]." width=200 height=300 class=image></td>
                        </tr>
                        <tr>
                            <td>".$vet[5]."</td>
                        </tr>
                        <td><input type=submit value=Prenota class=btn></td>
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
<html>
<head>
    <title>Carrello</title>
    <style>
         * {
            margin: 0;
            padding: 0;
        }

        header {
            width: 100%;
            height: 80px;
            background-color: #1d3557;
        }

        .user {
            font-size: 20px;
            color: #f1faee;
        }

        .tabella {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .tabella thead tr {
            background-color: #1d3557;
            color: #ffffff;
            text-align: left;
        }

        .tabella th,.tabella td {
            padding: 12px 15px;
        }   

        .tabella tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .tabella tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .tabella tbody tr:last-of-type {
            border-bottom: 2px solid #1d3557;
        }

        .exit {
            font-size: 15px;
            color: #FFFFFF;
            text-decoration: none;
        }

        .exit:hover {
            color: red;
        }

        .home {
            margin-top: 300px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<?php
    session_start();

    $file = fopen("csv/prenotazioni.csv", "r");
    echo "
    <header>
    <a href=libri.php><img src=img/logo.png width=120px style=padding: 10px;></a>
        <table border=0 align=right cellspacing=2 height=100% width=300px>
            <tr align=center>
                <td rowspan=2><img src=img/online.png width=20 height=20></td>
                <td rowspan=2 align=center><p class=user>".strtoupper($_SESSION['user'])."</p><a href=exit.php><p class=exit>Sign Out</p></a></td>
                <td><a href=carrello.php> <img src=img/carrello.png width=50></a></td>
            </tr>
        </table>
    </header>
    <br><br>
    ";

    echo "<table class=tabella border=1 width=70%>
        <thead>
            <tr align=center>
                <th align=center><h3>Codice libro</h3></th>
                <th align=center><h3>Data prenotazione</h3></th>
                <th align=center><h3>Data riporto</h3></th>
            </tr>
        </thead>
        <tbody>
    ";


    if ($file != false) {
        while (($data = fgetcsv($file, 1000, ",")) != false) {
            $vet = explode(";", $data[0]);
        
            if ($_SESSION["codice"] == $vet[1]) {
                echo "
                    <tr align=center>
                        <td><p>".$vet[0]."</p></td>
                        <td><p>".$vet[2]."</p></td>
                        <td><p>".$vet[3]."</p></td>
                    </tr>
                    
                ";
            }
        }
    }
    echo "</table>";
    fclose($file);

    echo "
        <table class=home>
            <tr>
                <td>
                    <a href=libri.php><img src=img/home.png width=100 height=100></a>
                </td>
            </tr>
        </table>
    ";
?>
</body>
</html>
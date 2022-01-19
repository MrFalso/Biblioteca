<?php
    function CreaCodice($user, $pass) {
        return strtoupper($pass[0].$pass[2].$user[0].$user[2]);
    }
?>
<?php

#Datenbank Connect Objekt erzeugen
$mysqli = new mysqli("127.0.0.1", "db_zaehlerstand", "123456", "db_zaehlerstand");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}



?>
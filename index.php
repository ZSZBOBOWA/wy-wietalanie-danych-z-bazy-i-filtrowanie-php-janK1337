<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// a
if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
} 
?>
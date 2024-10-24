<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>storna</title>
</head>
<body>
    <?php 

    $zapytanie = "SELECT * FROM uczniowie";
    $wynik = mysqli_query($conn, $zapytanie);

    if(mysqli_num_rows($wynik) > 0) {
        echo "<table border='1'>
        <tr>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Wiek</th>
        </tr>";
        
        while($row = mysqli_fetch_assoc($wynik)) {
           echo "<tr>
            <td> ". $row['imie'] . "</td>" .
            "<td> ". $row['nazwisko'] . "</td>".
            "<td> ". $row['wiek'] . "</td>";
        }

        echo "</table>";

    } else {
        echo "Brak wyników";
    }
    mysqli_close($conn);
    ?>

<form method="POST" action="index.php">
    Wpisz nazwisko: <input type="text" name="nazwisko">
    <input type="submit" value="Filtruj">
</form>

</body>
</html>
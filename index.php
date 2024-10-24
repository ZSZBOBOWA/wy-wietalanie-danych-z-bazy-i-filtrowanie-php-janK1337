<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>odczyt</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $polaczenie = mysqli_connect("localhost", "root", "", "szkola");

    if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['ocena'])) {
        $zapytanie = "INSERT INTO matematyka (Imie, Nazwisko, Ocena) VALUES (
            '" . $_POST['imie'] . "',
            '" . $_POST['nazwisko'] . "',
            '" . $_POST['ocena'] . "')";
        mysqli_query($polaczenie, $zapytanie);
    }
    ?>

    <form method="POST">
        <input type="text" name="imie" placeholder="Imie" required><br>
        <input type="text" name="nazwisko" placeholder="Nazwisko" required><br>
        <input type="number" name="ocena" placeholder="Ocena" min="0" max="6" required><br>
        <input type="submit" value="Dodaj">
    </form><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Ocena</th>
        </tr>

        <?php
        $wyswietl = $_POST['wyswietl'];
        if(isset($_POST['wyswietl']) && $wyswietl == 1) {
            $zapytanie = "SELECT * FROM matematyka WHERE Nazwisko = '".$_POST['nazwisko']."'";
            $wyswietl = 2;
        } else {
            $zapytanie = "SELECT * FROM matematyka";
            $wyswietl = 1;
        }


        $wynik = mysqli_query($polaczenie, $zapytanie);
        while ($uczen = mysqli_fetch_assoc($wynik)) {
            echo "<tr><td>". $uczen['ID']."</td>
                    <td>" . $uczen['Imie'] . "</td>
                    <td>" . $uczen['Nazwisko'] . "</td>
                    <td>" . $uczen['Ocena'] . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <form method="POST">

   
    <?php 
    if($wyswietl == 1) {
    ?>
     <input type="submit" value="wyswietl">
    <input type="text" name="nazwisko">
   <?php } else { 
    echo "<input type='text' name='wyswietl' value=".$wyswietl." style='display: none;'><br>";
   }
    
    ?>
    
     
        
    </form>

    
</body>

</html>
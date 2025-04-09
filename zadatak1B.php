<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadatak 1</title>
</head>
<body>
    
    <form method="POST" action="">
    <label for="brojevi">Odaberite broj</label>
        <input type="number" id="brojevi" name="brojevi" min="1">
        <button type="submit" name="varijanta" value="1">Varijanta 1</button>
        <button type="submit" name="varijanta" value="2">Varijanta 2</button>
        <button type="submit" name="varijanta" value="3">Varijanta 3</button>
    </form>
</body>
</html>


<?php
function ispisZnakova($brojevi, $varijanta) {
    if ($varijanta == 1) {
        // prva
        for ($i = $brojevi; $i >= 1; $i--) {
            echo $i . "<br>";
        }

    } elseif ($varijanta == 2) {
        // druga
        for ($i = $brojevi; $i >= 1; $i--) {
            for ($j = $i; $j >= 1; $j--) {
                echo $j;
            }
            echo "<br>";
        }

    } elseif ($varijanta == 3) {
        // treca
        for ($i = $brojevi; $i >= 1; $i--) {
            for ($j = $i; $j >= 1; $j--) {
                echo $j;
            }
            echo "<br>";
        }

        
        for ($i = 2; $i <= $brojevi; $i++) {
            for ($j = $i; $j >= 1; $j--) {
                echo $j;
            }
            echo "<br>";
        }
    }
}


// forma provjera
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brojevi = (int)$_POST['brojevi'];
        $varijanta = (int)$_POST['varijanta'];
         ispisZnakova($brojevi, $varijanta);
}
?>



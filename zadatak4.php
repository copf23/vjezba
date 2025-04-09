<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popis pjesama</title>
</head>
<body>



<form method="POST">
    <label for="album">Odaberite album:</label>
    <select name="id_albuma" id="album">
        <?php
        include 'ff_2025-02-19.php';

        function import() {
            global $FranzFerdinand;
            return $FranzFerdinand;
        }

        $albumi = import();
        $albumNaziv = $_POST['id_albuma'] ?? '';

        foreach ($albumi as $id => $album) {
            $naslov = $album['album_naslov'];
            $selected = ($albumNaziv == $id) ? 'selected' : '';
            echo "<option value=\"$id\" $selected>$naslov</option>";
        }
        ?>
    </select>
    <button type="submit" name="prikazi">PRIKAŽI</button>
</form>

<?php
// Funkcija iz zadatka 3 (bez trajanja)
function ispisPjesama($albumi, $idAlbuma) {
   
    foreach ($albumi[$idAlbuma]['pjesme_albuma'] as $pjesma => $trajanje) {
        echo "<li>$pjesma</li>";
    }
    echo "</ol>";
}

// Ispis pjesama ako je korisnik nešto odabrao
if (isset($_POST['prikazi'])) {
    $idAlbuma = $_POST['id_albuma'];

    if (isset($albumi[$idAlbuma])) {
        echo "<h3>Pjesme albuma: {$albumi[$idAlbuma]['album_naslov']}</h3>";
        ispisPjesama($albumi, $idAlbuma);
    } 
}
?>

</body>
</html>

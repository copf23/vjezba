<?php
include 'ff_2025-02-19.php';
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Albumi</title>
</head>
<body>

<h2>Varijanta 1</h2>
<?php
foreach ($FranzFerdinand as $album) {
    echo $album['album_naslov'] . "<br>";
}
?>

<h2>Varijanta 2</h2>
<?php
foreach ($FranzFerdinand as $album) {
    $godina = date("Y", strtotime($album['datum_izdanja']));
    $broj_pjesama = count($album['pjesme_albuma']);
    echo $album['album_naslov'] . " ($godina) ($broj_pjesama)<br>";
}
?>

<h2>Varijanta 3</h2>
<?php
foreach ($FranzFerdinand as $album) {
    $broj_pjesama = count($album['pjesme_albuma']);
    if ($broj_pjesama >= 15) {
        $godina = date("Y", strtotime($album['datum_izdanja']));
        echo $album['album_naslov'] . " ($godina) ($broj_pjesama)<br>";
    }
}
?>

</body>
</html>

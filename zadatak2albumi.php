<p>Varijanta 1</p>
<?php
include 'albumi.php'; 

foreach ($Jamiroquai as $nazivAlbuma => $pjesme) {
    echo $nazivAlbuma . " (" . count($pjesme) . " pjesama)<br>";
}
?>
<p>Varijanta 2</p>

<?php


foreach ($Jamiroquai as $nazivAlbuma => $pjesme) {
    if (count($pjesme) > 10) {
        echo $nazivAlbuma . " (" . count($pjesme) . " pjesama)<br>";
    }
}
?>

<p>Varijanta 3</p>
<?php
foreach ($Jamiroquai3 as $naslovAlbuma => $podaci) {
    $godina = $podaci['godina_izdanja'];
    $brojPjesama = count($podaci['pjesme']);

    echo "$naslovAlbuma $godina ($brojPjesama)<br>";
}
?>


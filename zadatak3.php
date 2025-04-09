<?php
include 'ff_2025-02-19.php';



function import() {
    global $FranzFerdinand;
    return $FranzFerdinand; 
}


function ispisPjesama($popisAlbuma) {
    echo "<ol>"; 
    foreach ($popisAlbuma as $album) {
        $godina = date("Y", strtotime($album['datum_izdanja'])); 
        foreach ($album['pjesme_albuma'] as $pjesma => $trajanje) {
        echo "<li>$pjesma ({$album['album_naslov']}) $godina.</li>";
        }
    }
    echo "</ol>"; 
}

$albumi = import(); 
ispisPjesama($albumi); 

?>

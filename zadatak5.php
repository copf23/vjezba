<?php
function sl_datum($pocetni, $zavrsni) {
  
    $timestamp_pocetak = strtotime($pocetni);
    $timestamp_kraj = strtotime($zavrsni);

    $slucajni_timestamp = rand($timestamp_pocetak, $timestamp_kraj);

   
    return date("j.n.Y.", $slucajni_timestamp);
}
echo sl_datum("2023-06-01", "2024-06-26");
?>

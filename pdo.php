<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=k2_25_02_19', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    
    $db->query("set names utf8");
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    exit;
}
?>
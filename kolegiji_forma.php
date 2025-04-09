<?php
include("template_zaglavlje_administracijsko.html");
include("pdo.php");

$isvu = "";
$naziv = "";
$eng_naziv = "";
$ects = "";
$ciljevi = "";
$sadrzaj = "";
$aktivan = 0;

// dohvaćanje podataka
if (isset($_GET["id"])) {
    $rezultat = $db->query("SELECT * FROM kolegiji WHERE id_kolegija = " . $_GET["id"]);
    $red = $rezultat->fetch();

    $isvu = $red["sifra_studomat"];
    $naziv = $red["naziv_na_hrvastkom"];
    $eng_naziv = $red["naziv_na_engleskom"];
    $ects = $red["ects_bodovi"];
    $ciljevi = $red["kolegij_ciljevi"];
    $sadrzaj = $red["kolegij_sadrzaj"];
    $aktivan = $red["kolegij_aktivan"];
}

// slanje forme
if (isset($_POST["submit"])) {
    $isvu = $_POST["isvu_sifra"];
    $naziv = $_POST["naziv_kolegija"];
    $eng_naziv = $_POST["eng_naziv"];
    $ects = $_POST["ects"];
    $ciljevi = $_POST["ciljevi"];
    $sadrzaj = $_POST["sadrzaj"];
    $aktivan = isset($_POST["aktivan"]) ? 1 : 0;

    if (isset($_GET["id"])) {
        
        $upit = $db->query("
            UPDATE kolegiji SET 
            sifra_studomat = '$isvu',
            naziv_na_hrvastkom = '$naziv',
            naziv_na_engleskom = '$eng_naziv',
            ects_bodovi = '$ects',
            kolegij_aktivan = $aktivan,
            kolegij_ciljevi = '$ciljevi',
            kolegij_sadrzaj = '$sadrzaj'
            WHERE id_kolegija = " . $_GET["id"]
        );
    } else {
        
        $upit = $db->query("
            INSERT INTO kolegiji 
            (sifra_studomat, naziv_na_hrvastkom, naziv_na_engleskom, ects_bodovi, kolegij_aktivan, kolegij_ciljevi, kolegij_sadrzaj)
            VALUES 
            ('$isvu', '$naziv', '$eng_naziv', '$ects', $aktivan, '$ciljevi', '$sadrzaj')
        ");
    }

    // vraćanje na popis kolegija
    header("Location: admin.php");
    exit;
}
?>

<div class="row">
    <div class="medium-12 large-12 columns">
        <form method="post" action="">
            ISVU šifra: 
            <input type="text" name="isvu_sifra" value="<?= $isvu ?>"><br>

            Naziv kolegija: 
            <input type="text" name="naziv_kolegija" value="<?= $naziv ?>"><br>

            Engleski naziv: 
            <input type="text" name="eng_naziv" value="<?= $eng_naziv ?>"><br>

            ECTS: 
            <input type="text" name="ects" value="<?= $ects ?>"><br>

            <input type="checkbox" name="aktivan" <?= $aktivan ? "checked" : "" ?>> Aktivan<br>

            Ciljevi kolegija: <br>
            <textarea name="ciljevi" rows="10"><?= $ciljevi ?></textarea><br>

            Sadržaj kolegija: <br>
            <textarea name="sadrzaj" rows="10"><?= $sadrzaj ?></textarea><br>

            <input type="submit" name="submit" value="Dalje" class="button">
        </form>
    </div>
</div>

<?php include("template_podnozje.html"); ?>
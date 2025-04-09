<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");


if (!isset($_GET['id'])) {
    echo "Nije odabran kolegij.";
    exit;
}

$id = intval($_GET['id']);
$stmt = $db->prepare("SELECT * FROM kolegiji WHERE id_kolegija = ? AND kolegij_aktivan = 1");
$stmt->execute([$id]);
$course = $stmt->fetch(PDO::FETCH_ASSOC);

// Provjera postoji li kolegij u bazi
if (!$course) {
    echo "Kolegij ne postoji";
    exit;
}
?>

<div class="row">
    <div class="medium-12 large-12 columns">

         <div class="row medium-10 large-8 columns">
            <h2><?php echo htmlspecialchars($course['naziv_na_hrvastkom']); ?></h2>
        </div>

          <div class="row medium-10 large-8 columns">
            <strong>Engleski naziv kolegija:</strong><br>
            <?php echo nl2br(htmlspecialchars($course['naziv_na_engleskom'] ?? 'Nema engleskog naziva')); ?>
        </div>

          <div class="row medium-10 large-8 columns">
            <strong>ISVU šifra:</strong><br>
            <?php echo nl2br(htmlspecialchars($course['sifra_studomat'])); ?>
        </div>

         <div class="row medium-10 large-8 columns">
            <strong>ECTS bodovi:</strong><br>
            <?php echo nl2br(htmlspecialchars($course['ects_bodovi'])); ?>
        </div>

          <div class="row medium-10 large-8 columns">
            <strong>Ciljevi kolegija:</strong><br>
            <?php echo nl2br(strip_tags($course['kolegij_ciljevi'], '<p><ul><li><ol><br><strong><em>')); ?>
        </div>

        <div class="row medium-10 large-8 columns">
            <strong>Sadržaj kolegija:</strong><br>
            <?php echo nl2br(strip_tags($course['kolegij_sadrzaj'], '<p><ul><li><ol><br><strong><em>')); ?>
        </div>

      <div class="row medium-10 large-8 columns" style="text-align:center">
            <a href="index.php">&lt;&lt; povratak </a>
        </div>
     </div>
</div>

<?php
include("template_podnozje.html");
?>
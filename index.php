<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");


$stmt = $db->prepare("SELECT * FROM kolegiji WHERE kolegij_aktivan = 1 ORDER BY naziv_na_hrvastkom ASC");
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="row medium-10 large-8 columns">
    <h2>Kolegiji</h2>
</div>

<ul>
    <?php foreach ($courses as $course): ?>
        <li>
            <a href="kolegij.php?id=<?php echo $course['id_kolegija']; ?>">
                <?php echo $course['naziv_na_hrvastkom']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include("template_podnozje.html"); ?>

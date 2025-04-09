<?php
session_start();
include("template_zaglavlje_administracijsko.html");

if (!isset($_SESSION['admin'])) {
    header("Location: prijava.php");
    exit;
}

include("pdo.php");

// brisanje kolegija
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stmt = $db->prepare("DELETE FROM kolegiji WHERE id_kolegija = ?");
    $stmt->execute([$_GET['id']]);
    header("Location: admin.php");
    exit;
}

// dohvaćanje kolegija
$stmt = $db->prepare("SELECT * FROM kolegiji ORDER BY naziv_na_hrvastkom ASC");
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<a href="kolegiji_forma.php" style="margin-left: 10px;">Novi kolegij</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Naslov</th>
        <th>Opis</th>
        <th>Aktivan</th>
        <th>Akcije</th>
    </tr>
    <?php foreach ($courses as $course): ?>
    <tr>
        <td><?php echo $course['id_kolegija']; ?></td>
        <td><?php echo $course['naziv_na_hrvastkom']; ?></td>
        <td><?php echo $course['kolegij_sadrzaj']; ?></td>
        <td><?php echo $course['kolegij_aktivan'] ? "Da" : "Ne"; ?></td>
        <td>
            <a href="kolegiji_forma.php?id=<?php echo $course['id_kolegija']; ?>">uredi</a>
            | 
            <a href="admin.php?id=<?php echo $course['id_kolegija']; ?>" 
               onclick="return confirm('Želite li sigurno obrisati ovaj kolegij');">
                pobriši
            </a>   
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="odjava.php">Odjava</a>

<?php 
include("template_podnozje.html");
 ?>

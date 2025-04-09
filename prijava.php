<?php
session_start(); 
require_once "pdo.php"; 
include("template_zaglavlje_administracijsko.html"); 

$error = ""; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    
    $stmt = $db->prepare("SELECT * FROM admin WHERE korisnickoime = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

   
    if ($admin && $admin['zaporka'] === $password) {
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Neispravni podaci!";
    }
}
?>


<div class="row">
    <div class="medium-12 large-12 columns">
        <h4>Prijava</h4>
        
        <form method="post" action="">
            <label for="username">Korisničko ime:</label>
            <input type="text" name="username" required><br>

            <label for="password">Lozinka:</label>
            <input type="password" name="password" required><br>
            <input type="submit" name="submit" value="Prijava" class="button">
        </form>
    </div>
</div>


<?php 

include("template_podnozje.html");

?>



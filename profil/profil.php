<?php
// Connexion à la base de données

$host = "localhost";
$username = "root";
$password = "";
$dbname = "site_residences";
$port = 3307; // N'oublie pas ton port personnalisé

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Vérifier l'ID passé dans l'URL
if (!isset($_GET['id'])) {
    die("Aucun utilisateur trouvé.");
}

$id = intval($_GET['id']); // Sécurisation simple

// Requête pour récupérer l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE id = $id";
$result = $conn->query($sql);

// Vérifier s'il existe
if ($result->num_rows == 0) {
    die("Utilisateur introuvable.");
}

$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil de <?php echo $user['nom']; ?></title>
</head>
<body>

<h2>Profil de <?php echo $user['nom'] . " " . $user['prenom']; ?></h2>
<a href="/testphp/cours/essaie/essaie2.php" 
   style="padding:10px 20px; background:#0d6efd; color:white; border-radius:5px; text-decoration:none;">
    Voir mes informations & hôtels
</a>


</body>
</html>

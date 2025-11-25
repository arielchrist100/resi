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


// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $commune = $_POST['commune'];
    $lieu = $_POST['lieu'];

    // Upload de la photo
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = "uploads/" . time() . "_" . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    }

    // Insertion dans la base
// 1. On prépare la requête avec la variable $conn 
$req = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, email, contact, commune, lieu_preference, photo) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($req) {
    // 2. On lie les variables aux points d'interrogation
    // "sssssss" signifie que les 7 paramètres sont de type String (texte)
    // Si 'contact' est un chiffre pur, on pourrait mettre 'i', mais 's' fonctionne toujours.
    $req->bind_param("sssssss", $nom, $prenom, $email, $contact, $commune, $lieu, $photo);

    // 3. On exécute la requête (sans paramètres ici !)
    if ($req->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'exécution : " . $req->error;
    }
    
    // 4. On ferme la requête
    $req->close();
} else {
    echo "Erreur de préparation de la requête : " . $conn->error;
}

// Après l'insertion, récupérer l'ID du dernier enregistrement
$id = $conn->insert_id;

session_start();
$_SESSION['user_id'] = $id;


// Redirection vers le profil
header("Location: profil.php?id=" . $id);
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>

<h2>Formulaire d'inscription</h2>

<form method="POST" enctype="multipart/form-data">
    Nom : <input type="text" name="nom" required><br><br>
    Prénom : <input type="text" name="prenom" required><br><br>
    Email : <input type="email" name="email" required><br><br>
    Contact : <input type="text" name="contact" required><br><br>
    Commune : <input type="text" name="commune" required><br><br>
    Lieu de préférence : <input type="text" name="lieu" required><br><br>
    Photo d'identité : <input type="file" name="photo" required><br><br>

    <button type="submit">S'inscrire</button>
</form>

</body>
</html>

<?php
// Connexion à la base de données
$host = "localhost";
$user = "root";
$pass = "";
$db = "site_residences";
$port = 3307; // Assurez-vous que le port est correct pour votre configuration
$conn = new mysqli($host, $user, $pass, $db , $port);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL avec GROUP_CONCAT pour regrouper les images par résidence
$sql = "SELECT r.id, r.nom, r.description, r.prix,
               GROUP_CONCAT(ri.image_url SEPARATOR '|') AS images
        FROM residences r
        LEFT JOIN residence_image ri ON r.id = ri.residence_id
        GROUP BY r.id";

$result = $conn->query($sql);

// Affichage des résultats
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:20px;'>";
        echo "<h2>{$row['nom']}</h2>";
        echo "<p>{$row['description']}</p>";
        echo "<p><strong>Prix:</strong> {$row['prix']} F CFA</p>";

        // Affichage des images
        $images = explode('|', $row['images']);
        foreach ($images as $img) {
            if (!empty($img)) {
                echo "<img src='{$img}' style='width:150px; height:auto; margin:5px; border:1px solid #ddd;'>";
            }
        }

        echo "</div>";
    }
} else {
    echo "<p>Aucune résidence trouvée.</p>";
}

$conn->close();
?>

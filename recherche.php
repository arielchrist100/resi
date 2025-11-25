<?php
// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "site_residences";
$port = 3307; // ton port

$conn = new mysqli($host, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Gestion des recherches
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$destination = isset($_GET['destination']) ? $conn->real_escape_string($_GET['destination']) : '';
$arrivee = isset($_GET['arrivee']) ? $_GET['arrivee'] : '';
$depart = isset($_GET['depart']) ? $_GET['depart'] : '';
$voyageurs = isset($_GET['voyageurs']) ? intval($_GET['voyageurs']) : 1;

// Requête principale pour afficher les hôtels
if (!empty($search)) {
    $sql = "SELECT * FROM residences WHERE nom LIKE '%$search%' OR description LIKE '%$search%'";
} elseif (!empty($destination)) {
    $sql = "SELECT * FROM residences WHERE destination LIKE '%$destination%'";
} else {
    $sql = "SELECT * FROM residences";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de la recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Résultats de la recherche</h1>

    <?php
    if ($result && $result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '  <a href="hotel.php?id=' . $row['id'] . '">';
            echo '      <img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['nom'] . '">';
            echo '  </a>';
            echo '  <div class="card-body">';
            echo '      <h5 class="card-title">' . $row['nom'] . '</h5>';
            echo '      <p class="card-text">' . $row['description'] . '</p>';
            echo '      <form method="POST" action="like.php">';
            echo '          <input type="hidden" name="hotel_id" value="' . $row['id'] . '">';
            echo '          <button type="submit" class="btn btn-danger">❤️ Like (' . $row['likes'] . ')</button>';
            echo '      </form>';
            echo '  </div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<p style='color:red;'>Aucun résultat trouvé.</p>";
    }

    // Affichage des critères de recherche
    if (!empty($destination) || !empty($arrivee) || !empty($depart)) {
        echo "<p>Vous avez recherché : " . htmlspecialchars($destination) . 
             ", du " . htmlspecialchars($arrivee) . 
             " au " . htmlspecialchars($depart) . 
             ", pour " . $voyageurs . " voyageur(s).</p>";
    }

    // Enregistrement de la recherche
    if (!empty($destination) && !empty($arrivee) && !empty($depart)) {
        $stmt = $conn->prepare("INSERT INTO recherches (destination, date_arrivee, date_depart, voyageurs) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $destination, $arrivee, $depart, $voyageurs);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Recherche enregistrée avec succès.</p>";
        } else {
            echo "<p style='color:red;'>Erreur enregistrement : " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</div>
</body>
</html>

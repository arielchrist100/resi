<?php
// Connexion SQL
$host = "localhost";
$username = "root";
$password = "";
$dbname = "site_residences";
$port = 3307; // N'oublie pas ton port personnalisé

$conn = new mysqli($host, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Erreur de connexion SQL : " . $conn->connect_error);
}

// Vérifier les données envoyées
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $hotel_id   = intval($_POST["hotel_id"]);
    $start_date = $_POST["start_date"];
    $end_date   = $_POST["end_date"];
    $voyageurs  = intval($_POST["voyageurs"]);

    // Récupérer le prix de l'hôtel
    $q = $conn->query("SELECT prix FROM residences WHERE id=$hotel_id");
    $hotel = $q->fetch_assoc();
    $prix_nuit = intval($hotel["prix"]);

    // Calculs
    $nb_nuits = (strtotime($end_date) - strtotime($start_date)) / 86400;
    if ($nb_nuits <= 0) {
        die("Dates invalides !");
    }

    $sous_total   = $prix_nuit * $nb_nuits;
    $frais_service = intval($sous_total * 0.10);  // 10%
    $taxes         = intval($sous_total * 0.08);  // 8%
    $total         = $sous_total + $frais_service + $taxes;

    // Sauvegarde SQL
    $stmt = $conn->prepare("
        INSERT INTO reservations 
        (hotel_id, start_date, end_date, voyageurs, prix_nuit, nb_nuits, sous_total, frais_service, taxes, total) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("issiiiiiii", 
        $hotel_id, $start_date, $end_date, $voyageurs,
        $prix_nuit, $nb_nuits, $sous_total, $frais_service, $taxes, $total
    );

    if ($stmt->execute()) {
        $saved = true;
    } else {
        die("Erreur SQL : " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation réservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 p-4 bg-white shadow rounded">

    <?php if (!empty($saved)) : ?>
        <h2 class="text-success">Votre réservation est enregistrée !</h2>
        <hr>
        <h4>Détails :</h4>

        <p><strong>Prix par nuit :</strong> <?= number_format($prix_nuit, 0, ',', ' ') ?> F</p>
        <p><strong>Nombre de nuits :</strong> <?= $nb_nuits ?></p>
        <p><strong>Sous-total :</strong> <?= number_format($sous_total, 0, ',', ' ') ?> F</p>
        <p><strong>Frais de service :</strong> <?= number_format($frais_service, 0, ',', ' ') ?> F</p>
        <p><strong>Taxes :</strong> <?= number_format($taxes, 0, ',', ' ') ?> F</p>

        <h3>Total : <?= number_format($total, 0, ',', ' ') ?> F</h3>
        <a href="index.php" class="btn btn-primary mt-3">Retour</a>
    <?php else : ?>
        <p class="text-danger">Erreur lors de la réservation.</p>
    <?php endif; ?>

</div>


</body>
</html>

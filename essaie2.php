
<?php
session_start();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Résidences</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.7-dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background: linear-gradient(90deg, #0d6efd 60%, #6c757d 100%);
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff !important;
            letter-spacing: 1px;
        }
        .search-bar {
            min-width: 350px;
        }

        .icon-btn {
            color: #fff;
            font-size: 1.4rem;
            margin-left: 18px;
            transition: color 0.2s;
        }
        .icon-btn:hover {
            color: #ffc107;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="essaie2.php">   Rési </a>



        <div class="d-flex align-items-center">
            <a href="/testphp/cours/essaie/profil/inscription.php" class="icon-btn" title="Profil"><i class="bi bi-person-circle"></i></a>
            <a href="serviceClient.php" class="icon-btn" title="serviceClient"><i class="bi bi-chat-dots-fill"></i> </a>
        </div>
    </div>
</nav>


<!-- Barre de recherche sticky -->
<div class="search-bar-wrapper sticky-top bg-white shadow-sm py-3">
    <div class="container">
        <form method="GET" action="recherche.php">
            <div class="row g-3 align-items-end">

                <!-- Destination -->
                <div class="col-md-3">
                    <label for="destination" class="form-label">Destination</label>
                    <input type="text" class="form-control" id="destination" name="destination" placeholder="Rechercher une destination" required>
                </div>

                <!-- Date d'arrivée -->
                <div class="col-md-2">
                    <label for="arrivee" class="form-label">Arrivée</label>
                    <input type="date" class="form-control" id="arrivee" name="arrivee" required>
                </div>

                <!-- Date de départ -->
                <div class="col-md-2">
                    <label for="depart" class="form-label">Départ</label>
                    <input type="date" class="form-control" id="depart" name="depart" required>
                </div>

                <!-- Voyageurs -->
                <div class="col-md-2">
                    <label for="voyageurs" class="form-label">Voyageurs</label>
                    <input type="number" class="form-control" id="voyageurs" name="voyageurs" min="1" placeholder="Nombre" required>
                </div>

                <!-- Bouton Rechercher -->
                <div class="col-md-3 d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Rechercher</button>
                </div>

            </div>
        </form>
    </div>
</div>





<!-- Contenu principal -->
<div class="container mt-5">
    <h1 class="my-4">Nos Résidences</h1>
    <div class="row">


    
<div class="hotel-grid row">
<?php
// Connexion DB
$conn = new mysqli("localhost", "root", "", "site_residences", 3307);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$search = '';
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

if (!empty($search)) {
    $stmt = $conn->prepare("SELECT * FROM residences WHERE nom LIKE ? OR description LIKE ?");
    $like = "%$search%";
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM residences");
}

if (!$result || $result->num_rows == 0) {
    echo "<p style='color:red;'>Aucune résidence trouvée.</p>";
} else {
    while ($row = $result->fetch_assoc()) {
        $image = !empty($row['image']) ? $row['image'] : 'images/default.jpg';
  echo '<div class="col-md-4 col-sm-6 mb-4">';
echo '  <div class="card h-100 shadow-sm border-0">';
echo '    <a href="hotel.php?id=' . $row['id'] . '">';
echo '      <img src="' . $image . '" class="card-img-top" alt="' . $row['nom'] . '">';
echo '    </a>';
echo '    <div class="card-body">';
echo '      <h5 class="card-title">' . $row['nom'] . '</h5>';
echo '      <p class="card-text">' . substr(strip_tags($row['description']), 0, 100) . '...</p>';
echo '    </div>';
echo '    <div class="card-footer bg-white border-top-0">';
echo '      <form method="POST" action="like.php" class="d-flex justify-content-between align-items-center">';
echo '          <input type="hidden" name="hotel_id" value="' . $row['id'] . '">';
echo '          <button type="submit" class="btn btn-sm btn-outline-danger">❤️ Like (' . $row['likes'] . ')</button>';
echo '          <a href="hotel.php?id=' . $row['id'] . '" class="btn btn-sm btn-primary">Voir</a>';
echo '      </form>';
echo '    </div>';
echo '  </div>';
echo '</div>';

    }
}
?>
</div>
</div>

<style>
.hotel-card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
    background: #fff;
}

.hotel-card:hover {
    transform: translateY(-5px);
}

.hotel-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.hotel-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.hotel-description {
    font-size: 0.95rem;
    color: #555;
}

.like-button {
    background: none;
    border: none;
    color: #e74c3c;
    font-size: 1rem;
    cursor: pointer;
}

.like-button:hover {
    color: #c0392b;
}
</style>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

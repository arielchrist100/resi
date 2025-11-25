    <?php
    require 'hedear.php';

    // Connexion à la base de données
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "site_residences"; // remplace par le vrai nom
    $port = 3307;

    $conn = new mysqli($host, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Vérification de l'ID
    if (!isset($_GET['id'])) {
        die("ID de l'hôtel manquant.");
    }

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM residences WHERE id = $id";
    $result = $conn->query($sql);

    if (!$result || $result->num_rows == 0) {
        die("Hôtel introuvable.");
    }

    $hotel = $result->fetch_assoc();

    // Récupérer les images liées à cet hôtel
$image_sql = "SELECT image_url FROM residence_image WHERE residence_id = $id";
$image_result = $conn->query($image_sql);

$images = [];
if ($image_result && $image_result->num_rows > 0) {
    while ($row = $image_result->fetch_assoc()) {
        $images[] = $row['image_url'];
    }
}


    ?>

    <!-- Styles -->
    <link rel="stylesheet" href="bootstrap-5.3.7-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <div class="container mt-5">
        <div class="row">
            <!-- Colonne principale -->
            <div class="col-md-8">
                <h1><?= htmlspecialchars($hotel['nom']) ?></h1>

                    <!-- Carrousel (si galerie multiple) -->
                    
                    
    <?php if (!empty($images)): ?>
 
    <div class="row g-2 mb-4">

<div class="container my-5">
  <div class="p-3 p-md-4 border rounded shadow-sm bg-white">
    <div class="row g-3">
      
      <!-- Colonne principale -->
      <div class="col-md-5">
        <a href="<?= htmlspecialchars($images[0]) ?>" data-lightbox="hotel-gallery">
          <img src="<?= htmlspecialchars($images[0]) ?>" 
               class="img-fluid rounded w-100" 
               style="object-fit: cover; aspect-ratio: 4/3; max-height: 400px;" 
               alt="Image principale">
        </a>
      </div>

      <!-- Colonne secondaire avec 5 images -->
      <div class="col-md-7 d-flex flex-column justify-content-between">
        <?php foreach (array_slice($images, 1, 5) as $img): ?>
          <a href="<?= htmlspecialchars($img) ?>" data-lightbox="hotel-gallery">
            <img src="<?= htmlspecialchars($img) ?>" 
                 class="img-fluid rounded w-100 mb-2" 
                 style="object-fit: cover; aspect-ratio: 16/9; max-height: 120px;" 
                 alt="Image secondaire">
          </a>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>

    <?php else: ?>
    <p>Aucune image disponible pour cet hôtel.</p>
    <?php endif; ?>

       
<!-- Colonne de réservation fixe à droite -->
<div class="col-md-4">
    <div style="position: fixed; top: 80px; right: 0; width: 350px; z-index: 1050;" class="bg-white border p-4 shadow rounded">
        <h3><?= number_format($hotel['prix'], 0, ',', ' ') ?> F / nuit</h3>
        <form action="https://www.pay.moneyfusion.net/reservation-hotel-yasmine-2_1762900111787/" method="POST" id="reservation-form">
            <input type="hidden" name="hotel_id" value="<?= $hotel['id'] ?>">
            
            <div class="mb-3">
                <label for="start_date" class="form-label">Arrivée</label>
                <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Départ</label>
                <input type="date" class="form-control" name="end_date" required>
            </div>
            <div class="mb-3">
                <label for="voyageurs" class="form-label">Voyageurs</label>
                <input type="number" class="form-control" name="voyageurs" min="1" value="1" required>
            </div>

            <div id="price-details" class="p-3 mb-3 border rounded bg-light">
                <p>Prix par nuit : <strong><?= number_format($hotel['prix'], 0, ',', ' ') ?> F</strong></p>
                <p>Nombre de nuits : <span id="nb-nuits">0</span></p>
                <p>Sous-total : <span id="sous-total">0 F</span></p>
                <p>Frais de service : <span id="frais-service">0 F</span></p>
                <p>Taxes : <span id="taxes">0 F</span></p>
                <hr>
                <h5>Total : <span id="total">0 F</span></h5>
            </div>

            <button type="submit" class="btn btn-danger w-100">Réserver</button>
            <small class="text-muted d-block text-center mt-2">Aucun montant ne sera débité pour le moment</small>
        </form>
    </div>
</div>


             <!-- Badge -->
<div class="d-flex justify-content-center">
    <div class="card px-3 py-2 shadow-sm border-0 mb-3 w-auto" style="max-width: 400px;">
        <div class="d-flex align-items-center justify-content-start flex-wrap gap-2">
            <span class="badge bg-danger p-1 px-2" style="font-size: 13px;">❤️ Coup de cœur</span>
            <span class="fw-semibold" style="font-size: 14px;">Apprécié sur Rs Babi</span>
            <span class="text-warning fw-bold" style="font-size: 16px;">
                <i class="bi bi-star-fill"></i> 4,9
            </span>
            <span class="text-muted" style="font-size: 12px;">(Avis)</span>
        </div>
    </div>
</div>


 


<!-- Description -->



<div class="container">
    <div class="row">
        <div class="col-md-5"> <!-- Moins large et aligné à gauche -->
            <h2 class="mb-4">Détails de la Résidence</h2>
            <table class="table table-bordered table-sm text-center align-middle mb-4">
                <thead class="table-primary">
                    <tr>
                        <th>Équipements</th>
                        <th>Disponibilité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $equipements = [
                        'studio' => ['label' => 'Studio', 'icon' => 'bi-house-door-fill'],
                        'chambre_salon' => ['label' => 'Chambre + Salon', 'icon' => 'bi-house-fill'],
                        'deux_chambres_salon' => ['label' => '2 Chambres + Salon', 'icon' => 'bi-door-open-fill'],
                        'wifi' => ['label' => 'Wifi', 'icon' => 'bi-wifi'],
                        'salle_de_bain' => ['label' => 'Salle de Bain', 'icon' => 'bi-droplet-fill'],
                        'cuisine' => ['label' => 'Cuisine', 'icon' => 'bi-cup-straw'],
                        'lit' => ['label' => 'Lit', 'icon' => 'bi-hospital-fill'],
                        'tele' => ['label' => 'Télé', 'icon' => 'bi-tv-fill'],
                    ];

                    foreach ($equipements as $cle => $info):
                        $disponible = isset($hotel[$cle]) && $hotel[$cle]; // <- Correction ici
                    ?>
                        <tr>
                            <td class="text-start">
                                <i class="bi <?= $info['icon'] ?> me-2"></i><?= $info['label'] ?>
                            </td>
                            <td>
                                <?php if ($disponible): ?>
                                    <i class="bi bi-check-lg text-success fs-5"></i>
                                <?php else: ?>
                                    <i class="bi bi-x-lg text-danger fs-5"></i>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php

$proprietaire = [
    'photo' => 'od.jpg',
    'nom' => 'Jean Dupont',
    'anciennete' => '2021',
    'bio' => 'Passionné par l’accueil et l’hôtellerie de qualité. Je propose un lieu calme et agréable.',
    'avantages' => [
        'Hôtel avec piscine haut standing',
        'Salle de sport équipée',
        'Proche des attractions locales'
    ]
];




?>


<?php
// DESCRIPTION 
$conn = new mysqli('localhost', 'root', '', 'site_residences', 3307);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// ID de la résidence que tu veux afficher (ex : récupéré par URL ?id=...)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT description FROM residences WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $description = nl2br(htmlspecialchars($row['description']));
} else {
    $description = "Aucune description trouvée.";
}

$stmt->close();
$conn->close();
?>

<div class="description-box">
    <h4>Description de la résidence</h4>
    <p><?= $description ?></p>
</div>

<style>
.description-box {
  background-color: #f2f7fb;
  border-left: 5px solid #007BFF;
  padding: 15px 20px;
  border-radius: 10px;
  margin-top: 20px;
  font-family: 'Segoe UI', sans-serif;
  font-size: 16px;
  color: #333;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  line-height: 1.6;
}
</style>


<div class="container my-5">
    <div class="p-4 bg-light rounded shadow-sm">
        <div class="row align-items-center">
            <!-- Photo de profil -->
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <img src="<?= htmlspecialchars($proprietaire['photo']) ?>" alt="Photo du propriétaire" class="rounded-circle shadow" style="width: 120px; height: 120px; object-fit: cover;">
            </div>

            <!-- Infos sur le propriétaire -->
            <div class="col-md-9">
                <h4 class="fw-bold mb-1"><?= htmlspecialchars($proprietaire['nom']) ?></h4>
                <p class="text-muted mb-2">Sur la plateforme depuis <?= htmlspecialchars($proprietaire['anciennete']) ?></p>
                <p><?= nl2br(htmlspecialchars($proprietaire['bio'])) ?></p>

                <!-- Avantages listés -->
                <div class="row mt-3">
                    <?php foreach ($proprietaire['avantages'] as $avantage): ?>
                        <div class="col-12 col-md-4 mb-2">
                            <div class="d-flex align-items-center gap-2 bg-white p-2 rounded shadow-sm">
                                <i class="bi bi-star-fill text-warning"></i>
                                <span><?= htmlspecialchars($avantage) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php


// Sécuriser la récupération de l'ID
// Connexion sécurisée

// Connexion à la base avec port personnalisé

// Vérification de la connexion
// Requête SQL directe (pas prepared, mais OK si pas de données externes)

// Connexion à la base de données
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'site_residences', 3307);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Requête pour récupérer les avis
$sql = "SELECT * FROM avis";
$req = $conn->query($sql);

// Vérifier si la requête a fonctionné
if (!$req) {
    die("Erreur dans la requête SQL : " . $conn->error);
}

// Boucle sur les résultats
while ($avis = $req->fetch_assoc()):
    $nom = htmlspecialchars($avis['nom']);
    $photo = htmlspecialchars($avis['photo']);
    $commentaire = nl2br(htmlspecialchars($avis['commentaire']));
    $etoiles = intval($avis['etoiles']);

    $diff = time() - strtotime($avis['date_avis']);
    if ($diff < 60) $temps = "il y a moins d'une minute";
    elseif ($diff < 3600) $temps = "il y a " . floor($diff / 60) . " min";
    elseif ($diff < 86400) $temps = "il y a " . floor($diff / 3600) . " h";
    else $temps = "il y a " . floor($diff / 86400) . " jours";
?>

<!-- Affichage HTML de chaque avis -->
<div style="display: flex; gap: 1rem; margin-bottom: 1.5rem; background: #f8f9fa; padding: 1rem; border-radius: 10px;">
    <img src="<?= $photo ?>" alt="<?= $nom ?>" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
    <div>
        <strong><?= $nom ?></strong> • <small style="color: gray;"><?= $temps ?></small><br>
        <div style="color: #FFD700;">
            <?php for ($i = 0; $i < $etoiles; $i++) echo "★"; ?>
            <?php for ($i = $etoiles; $i < 5; $i++) echo "☆"; ?>
        </div>
        <p><?= $commentaire ?></p>
    </div>
</div>

<?php endwhile; ?>

<?php
// Libération des ressources
$req->free();
$conn->close();
?>



<style>

    .description-box {
  background-color: #f2f7fb;      /* Bleu très clair */
  border-left: 5px solid #007BFF; /* Bordure bleu accent */
  padding: 15px 20px;
  border-radius: 10px;
  margin-top: 20px;
  font-family: 'Segoe UI', sans-serif;
  font-size: 16px;
  color: #333;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  line-height: 1.6;
  transition: background-color 0.3s ease;
}

.description-box:hover {
  background-color: #e0efff;
}

</style>











            <!-- Localisation -->
<?php if (!empty($hotel['ville'])): ?>
<div class="mb-4">
    <h4>Localisation</h4>
    <div style="width: 100%; max-width: 500px; height: 300px; border-radius: 8px; overflow: hidden;">
        <?= str_replace(['width="600"', 'height="450"'], ['width="100%"', 'height="100%"'], $hotel['ville']) ?>
    </div>
</div>
<?php endif; ?>


<script>
$(document).ready(function () {
    const prixNuit = <?= $hotel['prix'] ?>;

    function calculerPrix() {
        let start = new Date($('input[name="start_date"]').val());
        let end = new Date($('input[name="end_date"]').val());

        if (start && end && end > start) {
            let nbNuits = Math.ceil((end - start) / (1000 * 3600 * 24));
            let sousTotal = nbNuits * prixNuit;
            let fraisService = sousTotal * 0.10;
            let taxes = sousTotal * 0.08;
            let total = sousTotal + fraisService + taxes;

            $('#nb-nuits').text(nbNuits);
            $('#sous-total').text(sousTotal.toFixed(2) + ' F');
            $('#frais-service').text(fraisService.toFixed(2) + ' F');
            $('#taxes').text(taxes.toFixed(2) + ' F');
            $('#total').text(total.toFixed(2) + ' F');
        } else {
            $('#nb-nuits').text(0);
            $('#sous-total').text('0 F');
            $('#frais-service').text('0 F');
            $('#taxes').text('0 F');
            $('#total').text('0 F');
        }
    }

    $('input[name="start_date"], input[name="end_date"]').on('change', calculerPrix);
});

</script>



<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'site_residenceS', 3307);
if ($conn->connect_error) {
    die("Erreur connexion : " . $conn->connect_error);
}

$residence_id_actuelle = 1;

$sql = "SELECT id, nom, image FROM residences WHERE id != ? ORDER BY RAND() LIMIT 6";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $residence_id_actuelle);
$stmt->execute();
$result = $stmt->get_result();
?>

<h3>Hôtels similaires</h3>
<div class="similar-hotels-container">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="hotel-card">
            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['nom']) ?>">
            <h5><?= htmlspecialchars($row['nom']) ?></h5>
        </div>
    <?php endwhile; ?>
</div>

<?php
$stmt->close();
$conn->close();
?>




<style>

.similar-hotels-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 30px;
}

.hotel-card {
    width: 220px;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    text-align: center;
}

.hotel-card:hover {
    transform: translateY(-5px);
}

.hotel-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.hotel-card h5 {
    margin: 12px 0;
    font-size: 16px;
    color: #333;
}


</style>






<footer class="footer">
  <div class="footer-container">
    
    <!-- LOGO -->
    <div class="footer-column">
      <h4><img src="logo.png" alt="Logo Luna Résidences" style="height: 40px;"> Luna Résidences</h4>
      <p>Des résidences haut standing pour un confort optimal à Abidjan.</p>
    </div>

    <!-- DESTINATIONS -->
    <div class="footer-column">
      <h4>Visitez nos Résidences</h4>
      <ul>
        <li><a href="yopougon.html">Yopougon Maroc</a></li>
        <li><a href="cocody.html">Cocody</a></li>
        <li><a href="marcory.html">Marcory</a></li>
        <li><a href="plateau.html">Plateau</a></li>
        <li><a href="abobo.html">Abobo</a></li>
        <li><a href="angre.html">Angré</a></li>
      </ul>
    </div>

    <!-- ASSISTANCE -->
    <div class="footer-column">
      <h4>Assistance & Aide</h4>
      <ul>
        <li><a href="contact.html">Nous contacter</a></li>
        <li><a href="faq.html">FAQ</a></li>
        <li><a href="reservations.html">Vos réservations</a></li>
        <li><a href="evaluer.html">Évaluer une résidence</a></li>
      </ul>
    </div>

    <!-- INFOS LÉGALES -->
    <div class="footer-column">
      <h4>À propos</h4>
      <ul>
        <li><a href="qui-sommes-nous.html">Qui sommes-nous ?</a></li>
        <li><a href="emplois.html">Emplois</a></li>
        <li><a href="politique.html">Politique de confidentialité</a></li>
        <li><a href="conditions.html">Conditions d'utilisation</a></li>
        <li><a href="accessibilite.html">Accessibilité</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 Luna Résidences - Tous droits réservés</p>
  </div>
</footer>



<style>
.footer {
  background-color: #1a1a1a;
  color: #f0f0f0;
  padding: 40px 20px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 1200px;
  margin: auto;
}

.footer-column {
  flex: 1 1 200px;
  margin: 10px 20px;
}

.footer-column h4 {
  margin-bottom: 15px;
  font-size: 18px;
  color: #ffffff;
  border-left: 4px solid #ff5e5e;
  padding-left: 8px;
}

.footer-column ul {
  list-style: none;
  padding: 0;
}

.footer-column ul li {
  margin-bottom: 10px;
}

.footer-column ul li a {
  color: #ccc;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-column ul li a:hover {
  color: #ffffff;
}

.footer-bottom {
  text-align: center;
  border-top: 1px solid #333;
  padding-top: 15px;
  margin-top: 30px;
  font-size: 14px;
  color: #aaa;
}
</style>





<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

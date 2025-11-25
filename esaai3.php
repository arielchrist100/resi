<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Propriétés de l'Hôtel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Styles personnalisés */
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #007bff;
            margin-bottom: 15px;
        }
        .hotel-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .hotel-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.3);
        }
        .hotel-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        /* Dessins ou éléments créatifs peuvent être ajoutés ici */
        /* Exemple: un petit badge ou icône */
        .badge-year {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff6f61;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Gestion des Propriétés</h1>
    
    <!-- Section pour la photo de profil -->
    <div class="text-center mb-5">
        <img src="URL_DE_VOTRE_PHOTO_DE_PROFIL" alt="Photo de profil" class="profile-img" />
        <h2>Propriétaire</h2>
        <p class="lead">Informations sur le propriétaire ou un message personnalisé</p>
    </div>
    
    <!-- Grid pour les hôtels -->
    <div class="row g-4">
        <!-- Exemple de carte pour chaque hôtel -->
        <div class="col-md-4">
            <div class="hotel-card bg-white p-3">
                <div class="position-relative">
                    <img src="URL_IMAGE_HOTEL_1" class="hotel-image" alt="Hotel 1" />
                    <div class="badge-year">Année: 2024</div>
                </div>
                <h3 class="mt-3">Hotel avec Piscine</h3>
                <p>Description simple: Hôtel haut standing avec piscine, salle de sport, etc.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="hotel-card bg-white p-3">
                <div class="position-relative">
                    <img src="URL_IMAGE_HOTEL_2" class="hotel-image" alt="Hotel 2" />
                    <div class="badge-year">Année: 2023</div>
                </div>
                <h3>Hotel de Luxe</h3>
                <p>Description simple: Hôtel avec salle de sport, restaurant, vue panoramique.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="hotel-card bg-white p-3">
                <div class="position-relative">
                    <img src="URL_IMAGE_HOTEL_3" class="hotel-image" alt="Hotel 3" />
                    <div class="badge-year">Année: 2022</div>
                </div>
                <h3>Hotel Familial</h3>
                <p>Description simple: Hôtel avec piscine, espace enfants, proximité plage.</p>
            </div>
        </div>
        <!-- Ajoutez d'autres hôtels si besoin -->
    </div>
</div>

<!-- Bootstrap JS (optionnel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

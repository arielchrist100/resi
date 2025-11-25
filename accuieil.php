<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

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
    
<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container-fluid">
        <!-- Site Name -->
        <a class="navbar-brand" href="accuieil.php">MonSite</a>
        <!-- Search Bar -->
        <form class="d-flex mx-auto search-bar" role="search">
            <input class="form-control me-2" type="search" placeholder="Rechercher..." aria-label="Search">
            <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <!-- Icons -->
        <div class="d-flex align-items-center">
            <a href="/testphp/registre/inscription.php" class="icon-btn" title="Profil"><i class="bi bi-person-circle"></i></a>
            <a href="#" class="icon-btn" title="Paramètres"><i class="bi bi-gear-fill"></i></a>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <div class="row">

            <!-- Exemple de carte d'hôtel -->
            <div class="col-md-4 mb-4">
                <a href="hotel1.php?id=1">
        <img src="hotel4.jpg" class="card-img-top" alt="Hôtel 1">
    </a>

                    <div class="card-body">
                        <h5 class="card-title">Hôtel Paradis</h5>
                        <p class="card-text">Un hôtel de rêve au bord de la mer.</p>

                        <!-- Bouton Like -->
                        <form method="POST" action="like.php">
                            <input type="hidden" name="hotel_id" value="1">
                            <button type="submit" class="btn btn-danger">
                                ❤️ Like (<span>10</span>)
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tu peux copier-coller ce bloc pour afficher d'autres hôtels -->

        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap JS (optionnel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
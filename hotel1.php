<?php require 'hedear.php'; ?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-5.3.7-dist/css/bootstrap.min.css">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Lightbox CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row">
        <!-- Colonne gauche : Contenu complet -->
        <div class="col-md-8">
            <!-- Carrousel -->
            <h1>Hôtel Yasmine Yopougon Maroc</h1>

            <div id="hotelCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Ajoute tes items ici -->
                </div>
            </div>

            <!-- Badge Coup de cœur -->
            <div class="card p-4 shadow-lg border-0 mb-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <span class="badge bg-danger fs-6 p-2">❤️ Coup de cœur voyageurs</span>
                    </div>
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <h5 class="mb-0 fw-bold">des logements préférés des voyageurs sur Rs Babi</h5>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <span class="fs-4 fw-bold text-warning"><i class="bi bi-star-fill"></i> 4,92</span>
                            <span class="text-muted">(26 commentaires)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Galerie d'images -->
            <div class="row mb-4">
                <div class="col-md-6 mb-4">
                    <a href="hotel4.jpg" data-lightbox="hotels" data-title="Grande Image">
                        <img src="hotel4.jpg" class="img-fluid w-100 h-100" alt="Grande Image" style="object-fit: cover; height: 100%;">
                    </a>
                </div>
                <div class="col-md-3 d-flex flex-column gap-4">
                    <a href="hotel2.jpg" data-lightbox="hotels" data-title="Image 1">
                        <img src="hotel2.jpg" class="img-fluid" alt="Image 1">
                    </a>
                    <a href="hotel3.jpg" data-lightbox="hotels" data-title="Image 2">
                        <img src="hotel3.jpg" class="img-fluid" alt="Image 2">
                    </a>
                </div>
                <div class="col-md-3 d-flex flex-column gap-4">
                    <a href="hotel4.jpeg" data-lightbox="hotels" data-title="Image 3">
                        <img src="hotel4.jpeg" class="img-fluid" alt="Image 3">
                    </a>
                    <a href="hotel3.jpg" data-lightbox="hotels" data-title="Image 4">
                        <img src="hotel3.jpg" class="img-fluid" alt="Image 4">
                    </a>
                </div>
            </div>

            <!-- Détails de l'hôtel -->
            <h2 class="mb-4">Détails de l'Hôtel</h2>
            <table class="table table-bordered table-hover text-center align-middle mb-4">
                <thead class="table-primary">
                    <tr>
                        <th>Équipements</th>
                        <th>Disponibilité</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="bi bi-house-door-fill me-2"></i>Studio</td>
                        <td><i class="bi bi-check-lg text-success fs-4"></i></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-house-fill me-2"></i>Chambre + Salon</td>
                        <td><i class="bi bi-x-lg text-danger fs-4"></i></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-door-open-fill me-2"></i>2 Chambres + Salon</td>
                        <td><i class="bi bi-check-lg text-success fs-4"></i></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-wifi me-2"></i>Wifi</td>
                        <td><i class="bi bi-check-lg text-success fs-4"></i></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-droplet-fill me-2"></i>Salle de Bain</td>
                        <td><i class="bi bi-check-lg text-success fs-4"></i></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-cup-straw me-2"></i>Cuisine</td>
                        <td><i class="bi bi-x-lg text-danger fs-4"></i></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-hospital-fill me-2"></i>Lit</td>
                        <td><i class="bi bi-check-lg text-success fs-4"></i></td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-tv-fill me-2"></i>Télé</td>
                        <td><i class="bi bi-check-lg text-success fs-4"></i></td>
                    </tr>
                </tbody>
            </table>

            <!-- Description -->
            <div class="mb-4">
                <h2>Description de la résidence</h2>
                <p>Située dans un quartier paisible, cette résidence offre un séjour confortable avec wifi, cuisine équipée et bien plus.</p>
            </div>

            <!-- Localisation -->
            <div class="mb-4">
                <h3>Localisation de la résidence</h3>
                <p><strong>HÔTEL RÉSIDENCE YASMINE 2 MAROC</strong></p>
                <p>Adresse : Abidjan, Côte d'Ivoire</p>
                <div class="ratio ratio-4x3">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3775.906695581017!2d-4.1004899252565865!3d5.346421594632247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ebb65a62e665%3A0xf8ade1c44acbe11!2sH%C3%94TEL%20R%C3%89SIDENCE%20YASMINE%202%20ANANERAIE!5e1!3m2!1sfr!2sci!4v1750775813217!5m2!1sfr!2sci" 
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Colonne droite : Formulaire de réservation sticky -->
        <div class="col-md-4">
            <div class="position-sticky" style="top: 80px;">
                <h3>20 000 F par nuit</h3>
                <form action="enregistrer_reservation.php" method="POST" id="reservation-form">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Arrivée</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Départ</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="voyageurs" class="form-label">Voyageurs</label>
                        <input type="number" class="form-control" id="voyageurs" name="voyageurs" min="1" value="1" required>
                    </div>
                    <!-- Conteneur de calcul -->
                    <div id="price-details" class="p-3 mb-3 border rounded bg-light">
                        <p>Prix par nuit : <strong>20 000 F</strong></p>
                        <p>Nombre de nuits : <span id="nb-nuits">0</span></p>
                        <p>Sous-total : <span id="sous-total">0,00 F</span></p>
                        <p>Frais de service : <span id="frais-service">0,00 F</span></p>
                        <p>Taxes : <span id="taxes">0,00 F</span></p>
                        <hr>
                        <h5>Total : <span id="total">0,00 F</span></h5>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Réserver</button>
                    <small class="text-muted d-block text-center mt-2">Aucun montant ne vous sera débité pour le moment</small>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Calcul prix JS -->
<script>
    $(document).ready(function () {
        const prixNuit = 20000;

        function calculerPrix() {
            let start = new Date($('#start_date').val());
            let end = new Date($('#end_date').val());

            if ($('#start_date').val() && $('#end_date').val() && end > start) {
                let timeDiff = end - start;
                let nbNuits = Math.ceil(timeDiff / (1000 * 3600 * 24));

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
                $('#sous-total').text('0,00 F');
                $('#frais-service').text('0,00 F');
                $('#taxes').text('0,00 F');
                $('#total').text('0,00 F');
            }
        }

        $('#start_date, #end_date').on('change', calculerPrix);
    });
</script>

<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

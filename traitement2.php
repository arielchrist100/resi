<?php
// Récupérer les données du formulaire
$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$date_naissance = htmlspecialchars($_POST["date_naissance"]);
$email = htmlspecialchars($_POST["email"]);
$telephone = htmlspecialchars($_POST["telephone"]);
$quartier = htmlspecialchars($_POST["quartier"]);

// Sauvegarder dans un fichier
$fichier = fopen("inscriptions.txt", "a+"); // a+ = on ajoute à la fin du fichier
$ligne = "$nom | $prenom | $date_naissance | $email | $telephone | $quartier\n";
fwrite($fichier, $ligne);
fclose($fichier);

// Message pour l'utilisateur
echo "<h1>Vous vous êtes bien inscrit $prenom</h1>";
echo "<p>Merci pour votre inscription.</p>";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Page PHP avec Bootstrap</title>

    <!-- Lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.7-dist/css/bootstrap.min.css">

    <!-- Ton fichier CSS personnalisé -->
    <link rel="stylesheet" href="css/main.css">
</head>

<body>


<a href="commande.php" class="btn btn-success">
    Continuer / Commander une résidence
</a>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
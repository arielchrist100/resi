

<?php
// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $date_naissance = htmlspecialchars($_POST["date_naissance"]);
    $email = htmlspecialchars($_POST["email"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $quartier = htmlspecialchars($_POST["quartier"]);

    // Ici, tu peux ajouter une sauvegarde en base de données si tu le souhaites

    echo "<h2>Inscription réussie !</h2>";
    echo "Nom : $nom <br>";
    echo "Prénom : $prenom <br>";
    echo "Date de naissance : $date_naissance <br>";
    echo "Email : $email <br>";
    echo "Téléphone : $telephone <br>";
    echo "Quartier : $quartier <br>";
} else {
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>
    <form method="POST" action="traitement2.php">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Prénom :</label><br>
        <input type="text" name="prenom" required><br><br>

        <label>Date de naissance :</label><br>
        <input type="date" name="date_naissance" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label>Numéro de téléphone :</label><br>
        <input type="text" name="telephone" required><br><br>

        <label>Quartier :</label><br>
        <input type="text" name="quartier" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>

<?php
}
?>

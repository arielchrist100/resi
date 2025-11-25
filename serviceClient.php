<?php
// serviceClient.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Service Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            font-family: Arial, sans-serif;
        }

        .service-container {
            max-width: 450px;
            margin: 120px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .service-container h1 {
            font-size: 25px;
            margin-bottom: 15px;
            color: #333;
        }

        .service-container p {
            color: #666;
            margin-bottom: 30px;
        }

        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #25D366;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            font-size: 18px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .whatsapp-btn:hover {
            background: #1ebe5d;
            color: white;
        }

        .whatsapp-btn i {
            font-size: 22px;
            margin-right: 10px;
        }
    </style>

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

<div class="service-container">
    <h1>Service Client</h1>
    <p>Besoin d'aide ? Notre équipe est disponible pour vous assister.</p>

    <a target="_blank" 
       href="https://wa.me/2250546149391?text=Bonjour%20j%E2%80%99ai%20besoin%20d%E2%80%99assistance%20!"
       class="whatsapp-btn">
        <i class="bi bi-whatsapp"></i> Contactez-nous sur WhatsApp
    </a>
</div>

</body>
</html>

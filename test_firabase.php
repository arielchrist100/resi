<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

try {
    $factory = (new Factory)->withServiceAccount(__DIR__ . '/firebase_service.json');
    $auth = $factory->createAuth();
    echo "Firebase PHP fonctionne ✅";
} catch (\Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

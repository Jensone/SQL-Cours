<?php

$host = "localhost:3307";
$dbname = "boutique";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname", // Adresse de la BDD
        $username, // Nom d'utilisateur
        $password // Mot de passe
    );
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,  // Mode d'erreur
        PDO::ERRMODE_EXCEPTION // Mode d'erreur d'exception
    );
} catch (PDOException $e) {
    echo $e->getMessage();
}

function getItems($pdo, string $table) 
{
    $query = "SELECT * FROM $table"; // On écrit la requête SQL
    $stmt = $pdo->prepare($query); // Préparation de la requête (statement)
    $stmt->execute(); // On exécute la requête
    $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC); // On retourne un tableau associatif
    return $commandes;
}

$commandes = getItems($pdo, "commandes");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Liste des Commandes</h1>

        <ul class="space-y-4">
            <?php foreach ($commandes as $commande): ?>
                <li class="flex justify-between items-center p-4 bg-white rounded-lg shadow-lg">
                    <div class="text-xl font-medium"><?= $commande['ref'] ?></div>
                    <button 
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                        data-modal-toggle="commandeModal<?= $commande['id'] ?>"
                    >
                        Détails
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-toggle');
                toggleModal(modalId);
            });
        });
    </script>
</body>
</html>

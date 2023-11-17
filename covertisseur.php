<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $apiKey = "0791779246fff1da37a89c4c";
    $currency = $_POST['currency'];
    $amount = $_POST['amount'];

    // URL de l'API pour obtenir le taux de change
    $url = "https://v6.exchangerate-api.com/v6/0791779246fff1da37a89c4c/latest/USD";

    // Utilisez file_get_contents ou cURL pour récupérer les données de l'API
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Vérifier si la requête a été réussie
    if ($data && isset($data['rates'][$currency])) {
        $rate = $data['rates'][$currency];
        $convertedAmount = $rate * $amount;

        // Afficher le résultat
        echo "Montant converti: {$convertedAmount} {$currency}";
    } else {
        // Gérer l'erreur
        echo "Erreur lors de la récupération des taux de change ou devise non trouvée.";
    }
}
?>

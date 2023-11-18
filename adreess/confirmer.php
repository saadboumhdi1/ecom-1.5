<?php
session_start();


if (!isset($_SESSION['nombre_adresses'])) {
    header("Location: index.php");
    exit();
}

// Récupérez les données des adresses depuis la session (ou depuis la base de données si déjà enregistrées)
$addresses = [];
for ($i = 1; $i <= $_SESSION['nombre_adresses']; $i++) {
    $address = [
        'street' => $_POST["street_$i"],
        'street_nb' => $_POST["street_nb_$i"],
        'type' => $_POST["type_$i"],
        'city' => $_POST["city_$i"],
        'zipcode' => $_POST["zipcode_$i"],
    ];
    $addresses[] = $address;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Confirmation finale</title>
</head>
<body>
    <div class="container">
        <h2>Confirmation finale</h2>
        <p>Merci, vos adresses ont été enregistrées avec succès !</p>

        <h3>Adresses enregistrées :</h3>
        <div class="grid-container">
            <?php foreach ($addresses as $index => $address) : ?>
                <div class="address-card">
                    <strong>Adresse <?php echo $index + 1; ?>:</strong>
                    <p><?php echo $address['street'] . ' ' . $address['street_nb']; ?></p>
                    <p>Type: <?php echo $address['type']; ?></p>
                    <p>Ville: <?php echo $address['city']; ?></p>
                    <p>Code postal: <?php echo $address['zipcode']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

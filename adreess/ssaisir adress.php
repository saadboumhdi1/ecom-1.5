<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=location;charset=utf8", "root", "");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Enregistrez chaque adresse dans la base de données
        for ($i = 1; $i <= $_SESSION['nombre_adresses']; $i++) {
            $street = $_POST["street_$i"];
            $street_nb = $_POST["street_nb_$i"];
            $type = $_POST["type_$i"];
            $city = $_POST["city_$i"];
            $zipcode = $_POST["zipcode_$i"];

            $query = $bdd->prepare("INSERT INTO adresses (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");
            $query->execute([$street, $street_nb, $type, $city, $zipcode]);
        }

        // Redirigez vers une page de confirmation après l'enregistrement des adresses
        header("Location: confirmerphp");
        exit();
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Saisie des adresses</title>
</head>
<body>
    <div class="container">
        <h2>Saisie des adresses</h2>
        <form id="addressForm" action="saisie_adresses.php" method="post">
            <div id="addressFieldsContainer"></div>

            <button type="button" onclick="addAddressField()">Ajouter une adresse</button>
            <button type="submit">Continuer</button>
        </form>

        <script>
            function addAddressField() {
                var container = document.getElementById('addressFieldsContainer');
                var index = container.children.length + 1;

                var addressDiv = document.createElement('div');
                addressDiv.innerHTML = `
                    <h3>Adresse ${index}</h3>
                    <label for="street_${index}">Rue :</label>
                    <input type="text" name="street_${index}" maxlength="50" required>

                    <label for="street_nb_${index}">Numéro :</label>
                    <input type="number" name="street_nb_${index}" required>

                    <label for="type_${index}">Type :</label>
                    <select name="type_${index}">
                        <option value="livraison">Livraison</option>
                        <option value="facturation">Facturation</option>
                        <option value="autre">Autre</option>
                    </select>

                    <label for="city_${index}">Ville :</label>
                    <select name="city_${index}">
                        <option value="Montreal">Montreal</option>
                        <option value="Laval">Laval</option>
                        <!-- Ajoutez d'autres options ici -->
                    </select>

                    <label for="zipcode_${index}">Code postal :</label>
                    <input type="text" name="zipcode_${index}" maxlength="6" required>
                `;

                container.appendChild(addressDiv);
            }
        </script>
    </div>
</body>
</html>

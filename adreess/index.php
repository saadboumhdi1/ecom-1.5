
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nombre d'adresses</title>
</head>
<body>
    <div class="container">
        <h2>Combien d'adresses souhaitez-vous saisir ?</h2>
        <form id="addressForm">
            <input type="number" id="numAddresses" required>
            <button type="button" onclick="showAddressFields()">Continuer</button>
        </form>
    </div>

    <script>
        function showAddressFields() {
            // Récupérer le nombre d'adresses saisi par l'utilisateur
            var numAddresses = document.getElementById('numAddresses').value;

            // Créer les champs d'adresse dynamiquement
            var form = document.getElementById('addressForm');
            for (var i = 1; i <= numAddresses; i++) {
                var addressDiv = document.createElement('div');
                addressDiv.innerHTML = `
                    <h3>Adresse ${i}</h3>
                    <label for="street_${i}">Rue :</label>
                    <input type="text" name="street_${i}" maxlength="50" required>

                    <label for="street_nb_${i}">Numéro :</label>
                    <input type="number" name="street_nb_${i}" required>

                    <label for="type_${i}">Type :</label>
                    <select name="type_${i}">
                        <option value="livraison">Livraison</option>
                        <option value="facturation">Facturation</option>
                        <option value="autre">Autre</option>
                    </select>

                    <label for="city_${i}">Ville :</label>
                    <select name="city_${i}">
                        <option value="Montreal">Montreal</option>
                        <option value="Laval">Laval</option>
                        <!-- Ajoutez d'autres options ici -->
                    </select>

                    <label for="zipcode_${i}">Code postal :</label>
                    <input type="text" name="zipcode_${i}" maxlength="6" required>
                `;
                form.appendChild(addressDiv);
            }
        }
    </script>
</body>
</html>


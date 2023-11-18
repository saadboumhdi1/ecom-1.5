<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body class="text-center">

    <main class="form-signin">
        <form action="connexion.php" method="post" onsubmit="return validateForm()">
            <img class="mb-4" src="logo.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Nom d'utilisateur" required>
                <label for="floatingInput">Nom d'utilisateur</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required>
                <label for="floatingPassword">Mot de passe</label>
            </div>

            <div id="error-message" class="alert alert-danger visually-hidden" role="alert"></div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
            <p class="mt-3 mb-3 text-muted">&copy; 2023</p>
        </form>

        <script>
            function validateForm() {
                var username = document.forms["myForm"]["username"].value;
                var password = document.forms["myForm"]["password"].value;

                if (username === "" || password === "") {
                    document.getElementById("error-message").innerText = "Veuillez remplir tous les champs.";
                    document.getElementById("error-message").classList.remove("visually-hidden");
                    return false;
                }

                // Autres validations possibles ici...

                return true;
            }
        </script>
    </main>

</body>
</html>

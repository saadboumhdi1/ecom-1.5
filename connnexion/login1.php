<?php
session_start();

function connectUser($username, $password)
{
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=cloud;charset=utf8", "root", "");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE username = :username");
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if (connectUser($username, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

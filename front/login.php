<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images/scientia.png">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.js/"></script>
</head>

<body>
<?php require 'header.php'; ?>
    <?php
    require_once '../back/user.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $user = getUser($_POST['email'], $_POST['password']);
            if ($user != null) {
                header('Location: index.php');
                die();
            } else {
                echo '<script type ="text/JavaScript">';
                echo 'alert("Utilisateur ou mot de passe incorrect.")';
                echo '</script>';
            }
        }
    }

    ?>
    <div id="div2">
        <p class="titlelogin">Connexion</p>
        <form action="login.php" method="post" class="loginform">
            <input type="email" name="email" placeholder="E-mail" <?php if (isset($_SESSION["email"])) {
                                                                        echo 'value="' . $_SESSION["email"] . '"';
                                                                    } ?> /><br><br>
            <input type="password" name="password" placeholder="Mot de passe" /><br>
            <br>
            <input type="submit" name="login" class="btnlogin" value="Se connecter" />
            <br><br>
            <a href="register.php" class="inscription">S'inscrire</a>
        </form>
    </div>

    <?php
    require 'footer.php';
    ?>
</body>

</html>
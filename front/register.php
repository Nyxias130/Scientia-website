<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Inscription</title>
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
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['lname']) && isset($_POST['fname'])) {
            $user = getUser($_POST['email'], $_POST['password']);
            if ($user == null) {
                addUser($_POST['email'], $_POST['username'], $_POST['password'], $_POST['fname'], $_POST['lname'], 1);
                $user = getUser($_POST['email'], $_POST['password']);
                if ($user != null) {
                    header('Location: index.php');
                    die();
                } else {
                    header('Location: register.php');
                    die();
                }
            }
        } else {
            header('Location: register.php');
            die();
        }
    }
    ?>
    <div id="div2">
        <p class="regtitle">Inscription</p>
        <form action="register.php" method="post" class="registerform">
            <input type="text" name="fname" required placeholder="Prénom" /><br><br>
            <input type="text" name="lname" required placeholder="Nom de famille" /><br><br>
            <input type="text" name="username" required placeholder="Nom d'utilisateur *" /><br><br>
            <input type="email" name="email" required placeholder="E-mail *" /><br><br>
            <input type="password" name="password" required placeholder="Mot de passe *" /><br><br>
            <input type="submit" name="login" class="btnregister" value="S'inscrire" />
            <br><br>
        </form>
    </div>
    <?php
    require 'footer.php';
    ?>
</body>

</html>
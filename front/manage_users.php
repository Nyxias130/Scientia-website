<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Gestion des Utilisateurs</title>
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
  <div class="row align-items-center">
    <div class="col">
      <div class="d-flex justify-content-center  ">
        <div class="row gx-5">

          <div class="col text-center">
            <div class="p-3  bg-light rounded-4 listeUtilisateursSize"> <span class="fs-5 fw-semibold m-3">LISTE DES
                UTILISATEURS</span>

              <?php
              require_once '../back/user.php';

              if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['id']) && isset($_POST['delete'])) {
                  deleteUser($_POST['id']);
                }
              }

              $users = getUsersList();

              foreach ($users as $user) {
                echo
                  '<div class="row justify-content-around customCategorie ">
                      <div class="col-4 p-3 ">' . $user['username'] . '
                      <form action="manage_users.php" method="post">
                      <div class="col"><img src="images/iconeUtilisateur.png" width="40px" alt="ICONE"></div>
                      <input type="hidden" name="id" value="' . $user['id'] . '">
                      <div class="col"><button type="submit" name="delete" class="butClose"><img src="images/iconClose.png" width="44"
                          height="47" alt=""></button></div>        
                      </form>
                      </div>
                    </div>';
              }
              ?>
            
            <br><br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php
  require 'footer.php';
  ?>
</body>

</html>
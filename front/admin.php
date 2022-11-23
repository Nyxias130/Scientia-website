<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Panel Administration</title>
  <link rel="icon" type="image/x-icon" href="images/scientia.png">
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.js/"></script>
</head>

<body>
  <?php require 'header.php'; ?>
  <div class="d-flex justify-content-center panelAdministration ">
    <div class="row gx-5">
      <div class="col-5 ">
        <div class="p-3  bg-light rounded-4 panelAdministrationSize  ">
          <h5 class="text-center"><span class="fs-5 fw-semibold m-3">PANEL ADMINISTRATION</span></h5>
          <ul class="panelAdministrationList">
            <li class="NoList"><a href="manage_users.php"> Gestion des utilisateurs</a></li>
            <li class="NoList"><a href="manage_category.php"> Gestion des catégories</a></li>
          </ul>
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
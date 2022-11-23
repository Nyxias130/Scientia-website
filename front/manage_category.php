<!DOCTYPE html>
<html lang="fr">
<?php require_once('../back/category.php'); ?>

<head>
  <title>Liste des catégories</title>
  <link rel="icon" type="image/x-icon" href="images/scientia.png">
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/bootstrap.js/"></script>
</head>

<body>
  <?php
  require 'header.php';
  require_once '../back/category.php';

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id']) && isset($_POST['delete'])) {
      deleteCategory($_POST['id']);
    }
    if (isset($_POST['text']) && isset($_POST['add'])) {
      addCategory($_POST['text']);
    }
  }
  ?>

  <div class="row align-items-center mt-5">
    <div class="col">
      <div class="col text-center">
      <div class="p-3  bg-light rounded-4"> <span class="fs-5 fw-semibold">LISTE DES CATEGORIES</span> 
      <form action="manage_category.php" method="post">
          <input type="textarea" name="text">
          <button type="submit" name="add" class="butAjouter mb-4">AJOUTER</button>
      </form>
          <div class="row justify-content-around customCategorie ">
            <?php
            $Categories = getCategoriesList();
            foreach ($Categories as $cat) {
              echo '<div class="col-8 p-3">' . $cat["title"] . '</div>
              <form action="manage_category.php" method="post">
              <input type="hidden" name="id" value="' . $cat['id'] . '">
              <div class="col"><button type="submit" name="delete" class="butClose"><img src="images/iconClose.png" width="44"
              height="47" alt=""></button></div></form>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  </div>
  </div>
  <?php
  require 'footer.php';
  ?>
</body>

</html>
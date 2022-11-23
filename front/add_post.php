<!DOCTYPE html>
<html lang="fr">
<?php
require_once('../back/post.php');
require_once('../back/category.php');
?>

<head>
  <title>Ajouter un post</title>
  <link rel="icon" type="image/x-icon" href="images/scientia.png">
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/bootstrap.js/"></script>
</head>
<?php

if (!isset($_SESSION["email"])) {
  header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['validate'])) {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_POST['embed'])) {
      addPost($_POST['title'], $_POST['content'], $_POST['embed'], 1, $_POST['category']);
      header('Location: index.php');
    }
  } else {
    header('Location: index.php');
  }
}
?>

<body>
  <?php require 'header.php'; ?>
  <div class="row gx-5">
    <div class="col text-center">

      <div class="p-3  bgAjouterUneCategorie rounded-4 "> <span class="fs-5 fw-semibold ">CREER UN POST</span>
        <div class="form-group textAreaAjouterCategorie creerPostFrexWrap">

          <form action="add_post.php" method="post">
            <textarea type="text" rows="1" cols="75" class="labelNomCategorie" placeholder="Titre"
              name="title"></textarea> </br>
            <textarea class="labelNomCategorie" rows="7" cols="75" class="contentarea" type="text" name="content"
              placeholder="Contenu" name="Contenus"></textarea> </br>
            <label>Selection de la catégorie : </label>
            <select name="category">
              <?php
              $categories = getCategoriesList();
              foreach ($categories as $category) {
                echo '<option value="' . $category["id"] . '">' . $category["title"] . '</option>';
              }
              ?>
            </select></br></br>
            <label class="labelNomCategorie">Fichier : </label>
            <input type="file" name="embed" accept="image/*">
        </div>
        <div class="row text-center">
          <div class="col"><button class="butAnnuler mb-4" type="submit" name="cancel">ANNULER</button></div>
          <div class="col"><button class="butAjouter mb-4" type="submit" name="validate">VALIDER</button></div>
        </div>
        </form>
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
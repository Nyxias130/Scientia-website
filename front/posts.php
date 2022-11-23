<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Affichage d'une fiche</title>
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
  require '../back/post.php';
  require '../back/comment.php';
  require_once '../back/user.php';
  if (!isset($_SESSION["email"])) {
    header('Location: login.php');
  }

  if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id'])) {
      $post = getPost($_GET['id'])[0];
    }
    if (isset($_GET['add']) && isset($_GET['id']) && isset($_GET['text']) && isset($_SESSION["id"])) {
      addComment($_GET['text'], $_GET['id'], $_SESSION["id"]);
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])) {
      $post = getPost($_POST['id'])[0];
    }
    if (isset($_POST['delete']) && isset($_POST['id']) && isset($_POST['idComment'])) {
      deleteComment($_POST['idComment']);
    }
  }
  ?>
  <div class="p-3  bgAjouterUneCategorie rounded-4 ">
    <div class="form-group textAreaAjouterCategorie creerPostFrexWrap">
      <div class="row">
        <div class="col">
          <br>
          <span class="d-inline-block fs-5 fw-semibold">
            <?php echo $post['title'] ?>
          </span><br>
          <div class="col-2"><img src="data:image/png;base64, <?php echo base64_encode($post['embed']) ?>"
              alt="IMAGE DU POST"></div>
        </div>
        <div class="form-control" id="exampleFormControlTextarea1" rows="4">
          <?php echo $post['content'] ?>
        </div>
      </div>
      <div class="col"><button class="butRetour mb-4" type="submit"><a href="index.php">RETOUR</a></button></div>
    </div>
  </div>
  <div class="col text-center">
    <div class="p-3  bg-light rounded-4 commMargin">
      <div class="commHead">
        <span class="commHeadTitle">Commentaires</span>
        <form action="posts.php" method="get">
          <input type="textarea" name="text">
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
          <button type="submit" name="add" class="butAjouter mb-4 butAjouterComm ">AJOUTER</button>
        </form>
        <br>
        <?php
        $comments = getCommentsListByPostId($_GET['id']);
        foreach ($comments as $comment) {
          $user = getUserById($comment["user"])[0];
          if (isset($_SESSION["rights"]) && $_SESSION["rights"] > 1) {
            echo '<div class="col-8 p-3">' . $user["username"] . '
            <div class="col-8 p-3">' . $comment["content"] . '</div>
            </div>';
          } else {
            echo '<div class="col-8 p-3">' . $user["username"] . '
            <div class="col-8 p-3">' . $comment["content"] . '</div></div>';
          }
        }
        ?>
        <br><br>
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
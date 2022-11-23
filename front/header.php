<nav class="navbar navbar-expand-lg">
  <div class="collapse navbar-collapse" id="navbarNav">
    <a class="navbar-brand" href="index.php"><img src="images/scientia.png" alt=""></a>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_post.php">Créer un post</a>
      </li>
      <?php
      require '../back/user.php';
      if (isset($_GET['cleanSession'])) {
        session_unset();
        header('Location: login.php');
      }

      if (isset($_SESSION['email'])) {
        if (isset($_SESSION["rights"]) && $_SESSION["rights"] > 1) {
          echo '<li class="nav-item">
                  <a class="nav-link" href="admin.php">Admin</a>
                </li>';
        }
        echo '<a href="login.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Bonjour, ' . $_SESSION['username'] . '
          </a><a href="?cleanSession" class="btn btn-primary btn-lg" role="button" aria-disabled="true"><img src="images/logout.png" height="20" alt="logout" title="Se déconnecter"></a>';
      } else {
        echo '<a href="login.php" class="btn btn-submit" role="button" aria-disabled="true">Se connecter</a>';
      }
      ?>
    </ul>
</nav>
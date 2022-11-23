<!DOCTYPE html>
<html lang="fr">
<?php require_once('../back/category.php'); ?>

<head>
    <title>Home not connected user</title>
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
    require_once '../back/user.php';
    require '../back/post.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['id']) && isset($_POST['refuse'])) {
            refusePost($_POST['id']);
        } else if (isset($_POST['id']) && isset($_POST['validate'])) {
            validatePost($_POST['id']);
        } else if (isset($_POST['id']) && isset($_POST['delete'])) {
            deletePost($_POST['id']);
        }
    }
    ?>

    <div class="custom-container panelAdministration ">

        <div class="row gx-5">
            <div class="col">
                <h3>Derniers posts</h3>
                <br>

                <?php
                $posts = getPostsList();

                function getValidation($validation)
                {
                    if ($validation == 0)
                        return 'style="color:red;">Refusé';
                    else if ($validation == 2) {
                        return 'style="color:green;">Validé';
                    } else {
                        return 'style="color:grey;">Indéfini';
                    }
                }

                foreach ($posts as $post) {
                    if (isset($_SESSION['rights']) && $_SESSION['rights'] > 1) {
                        echo '
                        <div class="p-3  bgListeFicghesAValider rounded-4 mb-4">
                            <div class="row">
                                <div class="col-2"><img src="data:image/png;base64,' . base64_encode($post["embed"]) . '" width="200" alt="IMAGE DU POST"></div>
                                <div class="col">
                                    <span class="d-inline-block fs-5 fw-semibold">' . $post["title"] . '</span> <br>
                                    <span class="d-inline-block p-2 mr-3">' . $post["content"] . '</span>
                                </div>
                                <div class="col-3">
                                    <span class="counter" data-target="0"' . getValidation($post["validation"]) . '</span><br>
                                    <span class="counter" data-target="0">' . $post["date"] . '</span><br>
                                    <button class="butLookPostWord mb-4" type="submit"><a href="posts.php?id=' . $post["id"] . '">VOIR LE POST</a></button>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="id" value="' . $post['id'] . '">
                                        <button type="submit" name="refuse">Refuser</button>
                                        <button type="submit" name="validate">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>';
                    } else {
                        echo '
                                <div class="p-3  bgListeFicghesAValider rounded-4 mb-4">
                                    <div class="row">
                                        <div class="col-2"><img src="data:image/png;base64,' . base64_encode($post["embed"]) . '" width="200" alt="IMAGE DU POST"></div>
                                        <div class="col">
                                            <span class="d-inline-block fs-5 fw-semibold">' . $post["title"] . '</span> <br>
                                            <span class="d-inline-block p-2 mr-3">' . $post["content"] . '</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="counter" data-target="0">' . $post["date"] . '<br>
                                            <button class="butLookPostWord mb-4" type="submit"><a href="posts.php?id=' . $post["id"] . '">VOIR LE POST</a></button>
                                        </div>
                                    </div>
                                </div>';
                    }
                }

                ?>

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
<?php
require_once 'db.php';
function addLike($content, $post, $user)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("INSERT INTO likes (id, content, post, user) VALUES (null,'" . $content . "','" . $post . "','" . $user . "')");
        $stmt->execute();
    }
}

function deleteLike($id)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("DELETE FROM likes WHERE id = '" . $id . "'");
        $stmt->execute();
        return true;
    }
}
<?php
require_once 'db.php';
function getCommentsList()
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT * FROM comments");
    $stmt->execute();
    $comments = $stmt->fetchAll();
    return $comments;

}

function addComment($content, $post, $user)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("INSERT INTO comments (id, content, post, user) VALUES (null,'" . $content . "','" . $post . "','" . $user . "')");
        $stmt->execute();
    }
}

function deleteComment($id)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("DELETE FROM comments WHERE id = '" . $id . "'");
        $stmt->execute();
        return true;
    }
}

function editComment($id, $content)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("UPDATE comments SET content = '" . $content . "'  WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}

function getCommentsListByPostId($postId)
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE post = " . $postId);
    $stmt->execute();
    $comments = $stmt->fetchAll();
    return $comments;

}
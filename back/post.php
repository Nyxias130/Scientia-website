<?php
require_once 'db.php';
function getPostsList()
{
    $pdo = $GLOBALS['pdo'];
    if (isset($_SESSION['rights']) && $_SESSION['rights'] > 1) {
        $stmt = $pdo->prepare("SELECT * FROM posts");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE validation > 1");
    }
    $stmt->execute();
    $posts = $stmt->fetchAll();
    return $posts;
}

function getPost($id)
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = " . $id);
    $stmt->execute();
    $posts = $stmt->fetchAll();
    return $posts;
}

function addPost($title, $content, $embed, $validation, $category)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("INSERT INTO posts (id, title, content, embed, validation, category) VALUES (null,'" . $title . "','" . $content . "'," . decbin($embed) . ",'" . $validation . "','" . $category . "')");
        $stmt->execute();
    }
}

function deletePost($id)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}

function editPost($id, $title, $content, $embed, $validation, $category)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("UPDATE posts SET title = '" . $title . "', content = '" . $content . "', embed = " . decbin($embed) . ", validation = '" . $validation . "',
    category = '" . $category . "'  WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}

function validatePost($id)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("UPDATE posts SET validation = " . 2 . " WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}

function refusePost($id)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("UPDATE posts SET validation = " . 0 . " WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}
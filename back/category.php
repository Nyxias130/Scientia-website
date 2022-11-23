<?php
require_once 'db.php';
function getCategoriesList()
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT * FROM categories");
    $stmt->execute();
    $categories = $stmt->fetchAll();
    return $categories;

}

function addCategory($title)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("INSERT INTO categories (id, title) VALUES (null,'" . $title . "')");
        $stmt->execute();
    }
}

function deleteCategory($id)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}

function editCategory($id, $title)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("UPDATE categories SET title = '" . $title . "'  WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}
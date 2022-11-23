<?php
require_once 'db.php';
function getUsersList()
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute( /*['limit' => $limit]*/);
    $users = $stmt->fetchAll();
    return $users;
}

function getUserById($id)
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = " . $id);
    $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
}

function getUser($email, $password)
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->query("SELECT * FROM users WHERE email = '" . $email . "'");
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($res == null)
        return null;
    $encrypted = hash("sha512", "scientiahash" . $password);
    if ($res['password'] != $encrypted)
        return null;

    $_SESSION['id'] = $res['id'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['email'] = $res['email'];
    $_SESSION['password'] = $res['password'];
    $_SESSION['first_name'] = $res['first_name'];
    $_SESSION['last_name'] = $res['last_name'];
    $_SESSION['rights'] = $res['rights'];

    return $res;
}

function addUser($email, $username, $password, $firstName, $lastName, $rights)
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("INSERT INTO users (id, email, username, password, first_name, last_name, rights) VALUES (null,'" . $email . "','" . $username . "','" . hash("sha512", "scientiahash" . $password) . "','" . $firstName . "','" . $lastName . "','" . $rights . "')");
    $stmt->execute();
}

function deleteUser($id)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS["pdo"];
        $stmt = $pdo->prepare("DELETE FROM comments WHERE user = '" . $id . "'");
        $stmt->execute();
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = '" . $id . "'");
        $stmt->execute();
    }
}

function editUser($id, $email, $username, $password, $firstName, $lastName, $rights)
{
    if (isset($_SESSION['email'])) {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->prepare(
            "UPDATE users SET email = '" . $email . "', username = '" . $username . "', password = '" . hash("sha512", "scientiahash" . $password) . "', first_name = '" . $firstName . "',
    last_name = '" . $lastName . "', rights = '" . $rights . "'  WHERE id = '" . $id . "'"
        );
        $stmt->execute();
    }
}
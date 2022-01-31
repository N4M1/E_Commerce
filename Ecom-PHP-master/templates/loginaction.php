<?php

function my_session_start() {
    session_start();

    if (!empty($_SESSION['deleted_time']) && $_SESSION['deleted_time'] < time() - 180) {
        session_destroy();
        session_start();
    }
}

function my_session_regenerate_id() {

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    $newid = session_create_id('myprefix-');

    $_SESSION['deleted_time'] = time();
    session_commit();
    ini_set('session.use_strict_mode', 0);
    session_id($newid);
    session_start();
}

ini_set('session.use_strict_mode', 1);

my_session_start();
my_session_regenerate_id();


$tokenId = session_id();
var_dump($tokenId);

if (!isset($_POST['username']))
{
    $_POST['username'] = '';
}
    try {

        $bdd = new PDO("mysql:host=localhost;dbname=straplands;charset=utf8", 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $bdd->prepare("SELECT username, password, id_user FROM users WHERE username = :username");

        $req->bindValue(':username', $_POST['username'], PDO::PARAM_STR);

        $req->execute();

        $users = $req->fetchAll();

        if(empty($users))
        {
            throw new Exception('Mauvais pseudo');
        }

        if(!password_verify($_POST['password'], $users[0]["password"]))
        {
            throw new Exception('Mauvais mot de passe');
        }

        $userId = $users[0]['id_user'];

        $req = $bdd->prepare("INSERT INTO token (id_user, id_token) VALUES(?,?)");
        $req->execute(array($userId, $tokenId));

        $_SESSION['logged_in'] = true;
        header('Location: accueil.php');
    } catch (EXCEPTION $e) {

        $error = $e->getMessage();
        header("Location: login.php?error=$error");
    }

$_POST = array();
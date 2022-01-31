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
//var_dump($tokenId);

if (!isset($_POST['username']))
{
    $_POST['username'] = '';
}

if (!isset($_POST['email']))
{
    $_POST['email'] = '';
}

if (!isset($_POST['password']))
{
    $_POST['password'] = '';
}

if($_POST['username'] != '' && $_POST['username'] != '' && $_POST['username'] != '')
{

    try {
        if($_POST['password'] != $_POST['password_confirm'])
        {
            throw new Exception('Les mots de passe ne correspondent pas');
        }

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $bdd = new PDO("mysql:host=localhost;dbname=straplands;charset=utf8", 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $bdd->prepare("INSERT INTO users (username, email, password) VALUES(?,?,?)");
        $req->execute(array($_POST['username'], $_POST['email'], $password));

        $userId = $bdd->lastInsertId();

        $req = $bdd->prepare("INSERT INTO token (id_user, id_token) VALUES(?,?)");
        $req->execute(array($userId, $tokenId));

        $_SESSION['logged_in'] = true;
        header('Location: accueil.php');
    } catch (EXCEPTION $e) {

        $error = $e->getMessage();
        header("Location: register.php?error=$error");
    }
}

$_POST = array();



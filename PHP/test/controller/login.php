<?php 

//$config = include __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_POST['nickname']) || empty($_POST['nickname']) || !isset($_POST['password'])) {
        $error = true;
    }
    try {
        $user = findUserByNickname($_POST['nickname']);
    } catch (Exception $e) {
        $error = true;
    }
    
    if ($user && $_POST['password'] == $user['password']) {
        //Fonction loginUser
        loginUser($user);
        //Fonction loginUser
        $success = true;
    } else {
        $error = true;
    }
}


include __DIR__ . '/../view/formLogin.html.php';

if (session_status() === PHP_SESSION_ACTIVE) {
    session_write_close();
}

?>
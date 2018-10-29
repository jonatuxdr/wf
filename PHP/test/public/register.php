<?php
$config = include __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/user.php';
$errors = [];
/*
 * $errors = [
 * 'nickname' => (value)
 * 'password1' => (value)
 * 'password2' => (value)
 * ];
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // To check if a key exist
    if (! isset($_POST['nickname'])) {
        $errors['nickname'] = [
            'A nickname must be provided'
        ];
        // echo $errors['nickname'];
    }

    if (! isset($_POST['password1'])) {
        // Pourquoi remettre la valeur en array ???????????
        $errors['password1'] = [
            'A password must be provided'
        ];
        // echo "<br>";
        // echo $errors['password1'];
    }

     if (! isset($_POST['password2'])) {
        $errors['password2'] = [
            'A confirmation password must be provided'
        ];
        // echo "<br>";
        // echo $errors['password2'];
    }

    // En haut on regarde si il y a

    if (empty($_POST['nickname'])) {
        if (! isset($errors['nickname'])) {
            $errors['nickname'] = [];
        }
        ;
        $errors['nickname'][] = 'Please, provide a nickname with at least 1 character';
    }

    if (empty($_POST['password1'])) {
        if (! isset($errors['password1'])) {
            $errors['password1'] = [];
        }
        ;
        $errors['password1'][] = 'Please, provide a password with at least 1 character';
    }

    if (empty($_POST['password2'])) {
        if (! isset($errors['password2'])) {
            $errors['password2'] = [];
        }
        ;
        $errors['password2'][] = 'Please, provide a confirmation password with at least 1 character';
    }

    if ($_POST['password1'] !== $_POST['password2']) {
        if (! isset($errors['password2'])) {
            $errors['password2'] = [];
        }
        ;
        $errors['password2'][] = 'Please, first field must be equal with the second fields !';
    }

    if (empty($errors)) {
        createUser($_POST['nickname'], $_POST['password1']);
        $success = true;
    }

    /*
     * var_dump($_POST); //Specific for the message body variable
     * die;
     */
}

require __DIR__ . '/../view/form.html.php';

?>
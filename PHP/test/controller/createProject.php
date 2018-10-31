<?php
require __DIR__ . '/../view/header.php';
require __DIR__ . '/../model/project.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "Il rentre bien dans la condition";

    if (! isset($_POST['title']) || empty($_POST['title']) || ! isset($_POST['description']) || empty($_POST['description']) || ! isset($_POST['pubDate']) || empty($_POST['pubDate']) || ! isset($_POST['image']) || empty($_POST['image']) || ! isset($_POST['status']) || empty($_POST['status'])) {

        echo 'test';

        if (! isset($_POST['title'])) {
            $errors['title'] = [
                'A title must be provided'
            ];
            // echo $errors['nickname'];
        }

        if (! isset($_POST['description'])) {
            $errors['description'] = [
                'A description must be provided'
            ];
            // echo $errors['nickname'];
        }

        if (! isset($_POST['pubDate'])) {
            $errors['pubDate'] = [
                'A publishing Date must be provided and be validate'
            ];
            // echo $errors['nickname'];
        }

        $image = null;
        if (!empty($_FILES['image'])) {
            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                $errors['image'][] = '<li>Please, provide a correct file</li>';
            } else if (substr($_FILES['image']['type'], 0, 6) !== 'image/') {
                $errors['image'][] = '<li>Please, provide an image</li>';
            } else {
                $image = 'img/' . uniqid();
                $destination = $config['public_path'] . '/' . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            }
        }

        if (! isset($_POST['status'])) {
            $errors['status'] = [
                'A status must be provided and in the good format'
            ];
            // echo $errors['nickname'];
        }

        if (empty($_POST['title'])) {
            if (! isset($errors['nickname'])) {
                $errors['title'] = [];
            }
            ;
            $errors['title'][] = 'Please, provide a title with at least 1 character';
        }

        if (empty($_POST['description'])) {
            if (! isset($errors['description'])) {
                $errors['description'] = [];
            }
            ;
            $errors['description'][] = 'Please, provide a description with at least 1 character';
        }

        if (empty($_POST['pubDate'])) {
            if (! isset($errors['pubDate'])) {
                $errors['pubDate'] = [];
            }
            ;
            $errors['pubDate'][] = 'Please, provide a valid publication date with at least 1 character';
        }
        if (! empty($_POST['pubDate']) && preg_match('/(0[1-9]|1[0-9]|3[01])\/(0[1-9]|1[012])\/(2[0-9][0-9][0-9]|1[6-9][0-9][0-9])/', $_POST['pubDate'])) {
            $errors['pubDate'] = [];
            $errors['pubDate'][] = 'Please, provide a valid publication date';
        }

        // var_dump(getAllProjects());
        foreach (getAllProjects() as $project) {

            if ($project['title'] === ($_POST['title'])) {
                $errors['title'][] = "Ce titre a deja ete choisi !";
            }
        }
    }

   
    if (empty($errors)) {
        echo 'Empty $errors';
        try {
            echo 'try';
            createProject($_POST['title'], $_POST['description'], $_POST['image'], $_POST['pubDate'], $_POST['status']);
        } catch (Exception $e) {
            echo 'catch';
            var_dump($e);
            $error = true;
        }
    }

    // var_dump(getAllProjects($_POST[2]));

    /*
     * if ($project && $_POST['title'] == $project['title']) {
     * //Fonction loginUser
     * createProject($project);
     * //Fonction loginUser
     * $success = true;
     * } else {
     * $error = true;
     * }
     */
}

// createProject($)

require __DIR__ . '/../view/formProject.html.php';

?>
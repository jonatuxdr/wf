<?php 
require __DIR__ . '/../view/header.php';
require __DIR__ . '/../model/project.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    echo "Il rentre bien dans la condition";
    
    if (!isset($_POST['title']) || empty($_POST['title']) || 
        !isset($_POST['description']) || empty($_POST['description']) || 
        !isset($_POST['pubDate']) || empty($_POST['pubDate']) || 
        !isset($_POST['image']) || empty($_POST['image']) || 
        !isset($_POST['status']) || empty($_POST['status'])) {
        $error = true;
        echo "Il rentre bien dans la condition" . $error;
        
        
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
        
        if (!isset($_POST['pubDate'])) {
            $errors['pubDate'] = [
                'A publishing Date must be provided and be validate'
            ];
            // echo $errors['nickname'];
        }
        
        if (! isset($_POST['image']) && substr($_POST['image'], -4) == '.jpg' || '.png') {
            $errors['image'] = [
                'An image must be provided and in the good format JPG/PNG'
            ];
            // echo $errors['nickname'];
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
        if (!empty($_POST['pubDate'])&& preg_match('/(0[1-9]|1[0-9]|3[01])\/(0[1-9]|1[012])\/(2[0-9][0-9][0-9]|1[6-9][0-9][0-9])/', $_POST['pubDate'])) {
                $errors['pubDate'] = [];
            $errors['pubDate'][] = 'Please, provide a valid publication date';
        }
        
        
        var_dump(getAllProjects());
        foreach (getAllProjects() as $project) {
            
            if ($project['title'] === ($_POST['title'])) {
                $errorTitle = "Ce titre a deja ete choisi !";
            }
        }
        
        
        if (empty($errorTitle)) {
            try {
                $newProject = createProject($_POST['title'], $_POST['description'], $_POST['pubDate'], $_POST['image'], $_POST['status']) ;
            } catch (Exception $e) {
                $error = true;
            }
        }
    }
        //var_dump(getAllProjects($_POST[2]));
    
    
    /*if ($project && $_POST['title'] == $project['title']) {
        //Fonction loginUser
        createProject($project);
        //Fonction loginUser
        $success = true;
    } else {
        $error = true;
    }*/
}

//createProject($)

require __DIR__ . '/../view/formProject.html.php';




?>
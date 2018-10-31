<?php 

require __DIR__ . '/connection.php'; //HERE IS THE RIGHT PLACE !!!!!!!!!!!!

// CRUD - READ
function getAllProjects() {
    //Now we create a query
    //@var is a PDO object $connection
    
    //Special in POO
    /**
     * @var PDO $connection
     */
    //Special in POO
    
    global $connection;
    $statement = 'SELECT p.*, s.label FROM Project AS p INNER JOIN Status AS s ON p.statusId = s.id';
    $projects = $connection->query($statement)->fetchAll();
    
    
    //var_dump($projects);
    //container ???????????????????
    //query is coming from the PDO connection in the $connection
    //$projects return an array OR returns false
    
    //If query have an error we will throw an exception
    if ($projects === false) {
        throw new Exception($connection->errorCode());
        //errorCode() see the errorCode to debug it !
    }
    
    foreach ($projects as $key => $project){
        $statement = 'SELECT c.label FROM Category as c INNER JOIN projectCategory as pc ON c.id = pc.categoryId WHERE pc.projectId = '. $project['id'];
        $categories = $connection->query($statement)->fetchAll();
        if ($categories === false) {
            throw new Exception($connection->errorCode());
        }
        //
        $project['categories'] = $categories;
        //
        $projects[$key] = $project;
    }
    
    return $projects;
}

//CRUD CREATE
function createProject(string $title, string $description, string $image, string $pubDate, string $status) {
    global $connection;
    
    $preparedQuery = $connection->prepare('INSERT INTO project (title, description, image, pubDate, statusId) VALUE (:title, :description, :image, :pubDate, :status)');
    
    $date = null;
    if ($pubDate) {
        $date = (new DateTime())->format('Y-m-d H:i:s');
    }
    
    $preparedQuery->bindValue('title', $title);
    $preparedQuery->bindValue('description', $description);
    $preparedQuery->bindValue('image', $image);
    $preparedQuery->bindValue('pubDate', $date);
    $preparedQuery->bindValue('status', $status);
    $result = $preparedQuery->execute();
    
    if ($result === false) {
        throw new RuntimeException(print_r($preparedQuery->errorInfo(), true));
    }

    $projectId = $connection->lastInsertId();
    
    return $projectId;

}

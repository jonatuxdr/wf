<?php 

require __DIR__ . '/connection.php'; //HERE IS THE RIGHT PLACE !!!!!!!!!!!!

function getAllProjects() {
    //Now we create a query
    //@var is a PDO object $connection
    
    //Special in POO
    /**
     * @var PDO $connection
     */
    //Special in POO
    
    global $connection;
    $statement = 'SELECT * FROM Project';
    $projects = $connection->query($statement);
    
    //var_dump($projects);
    //container ???????????????????
    //query is coming from the PDO connection in the $connection
    //$projects return an array OR returns false
    
    //If query have an error we will throw an exception
    if ($projects === false) {
        throw new Exception($connection->errorCode());
        //errorCode() see the errorCode to debug it !
    }
    return $projects;
}
<?php 

//C'est beaucoup mieux avec SYMPHONY !!!!!

try {

    $DB = $config['DB'];
    //$config => in another folder, because we want all the config in the same place

    //Initialize a connnection
    $connection = new PDO('mysql:host=' . $DB['host'] . ';dbname=' . $DB['name'], // dns => database namespace
        $DB['user'], //username
        $DB['password'] //password
    );
    // 3 param : 1 string to where (what host), user, password
    //There is exit the connection and die the connection (die is not so better, why ??????????)
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}


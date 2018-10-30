<?php 

//The model part

//Load configuration, require does not accept to return something
//$config = include __DIR__ . '/../config/config.php';
//Load configuration, require does not accept to return something

//Require the connection
//require __DIR__ . '/../model/connection.php'; // <= ????????????????????? HERE IT NOT THE RIGHT PLACE !!!!!!!!!
//Require the connection

//Initilize the connection and getAllProjects()
require_once  __DIR__ . '/../model/project.php';

try {
    $projects = getAllProjects();
    //from return $projects from project.php
} catch (Exception $e) {
    echo 'An error occured with code : ' . $e->getMessage();
    exit;
}


//The view part


require __DIR__ . '/../view/homepage.php';

//var_dump($projects->fetchAll());

//fetchAll() => get all the result an transform as an array !!!!!!!!!!

//Easy Maintenance : MVC
//include __DIR__ . '/../model/articles.php';
//include __DIR__ . '/../view/article_list.php';
//Easy Maintenance : MVC

//-------------------------------RESUME------------------------------

// go in config and return config
// require project.php
    // require connection.php
        //create a connection
    // define getAllProjects() function
// call getAllProjects
    // send a query
    // return the result

//--------------------------------RESUME-----------------------------
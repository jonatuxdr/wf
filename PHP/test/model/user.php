<?php
require_once __DIR__ . '/connection.php';

// En dessous c'est ... : = php documentation element, @return = annotation
/**
 * Create a new user (short description)
 *
 * This function create a new entry in the database and return the id of the inserted element (long description)
 *
 * @param string $nickname
 *            The new entry nickname
 * @param string $password
 *            The new entry password
 *            
 * @return int
 */
function createUser(string $nickname, string $password, int $roleId = 1): int
{
    /**
     *
     * @var PDO $connection informing IDE that $connection comes from the PDO and then we can use the methods on $connection
     */
    global $connection;

    $query = 'INSERT INTO user(nickname, `password`, roleId) VALUE ("' . $nickname . '", "' . $password . '", "' . $roleId . '")';
    $result = $connection->exec($query);

    var_dump($query);
    var_dump($result);

    if (! $result) {
        throw new RuntimeException(print_r($connection->errorCode(), true));
    }

    return $connection->lastInsertId();

    /*
     * $sql = "INSERT INTO user (nickname, password) VALUES (?,?)";
     * $stmt= $connection->prepare("SELECT * FROM user WHERE nickname = '".$nickname."'");
     * //prepare :
     * //execute :
     * //bindParam :
     * $stmt->bindParam(':nickname', $nickname);
     * $stmt->execute([$nickname, $password]);
     */
}

// ? array => return an array or null
function findUserByNickname(string $nickname): ?array
{
    /**
     * @var PDO $connection
     */
    global $connection;

    // This is a better way to do if we have inputs in our SQL query !!!! This will avoid an SQL injection like DROP DATABASE
    $preparedQuery = $connection->prepare('SELECT * FROM user WHERE nickname = :name');
    $preparedQuery->bindValue('name', $nickname);
    $result = $preparedQuery->execute();

    //$query = 'SELECT * FROM user WHERE nickname = "' . $nickname . '" ';
    // ou alors je peux mettre $query = sprintf('SELECT * FROM user WHERE nickname ="%s", $nickname ');    
    //$result = $connection->query($query);

    if ($result === false) {
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    $result = $preparedQuery->fetch();
    //$result = $result->fetch();
    if ($result) {
        return $result;
        var_dump($result);
    }
    return null;
}

/**
 * Log the user with session
 * 
 * Will store the user information in the session superglobal. Return true on success, false on failure.
 * 
 * @param array $user
 * @return bool
 */
function loginUser(array $user) : bool {
    //It's done before the controller execution !!!!!!!
    
    /*if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }*/
    $_SESSION['user'] = $user;
    //var_dump($user);
    return true;
}

/**
 * Get current user
 * 
 * Return the current logged user if exist in the session. If not, return null
 * 
 * @return array|NULL
 */

function getCurrentUser() : ?array {
    /*if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }*/
    return $_SESSION['user'] ?? null;
}

/**
 * Logout
 * 
 * Remove the session storage. Return true on success, false on failure
 * 
 * @return bool
 */

//PHP_SESSION_ACTIVE => it's a constant, accessible in the all application, define is use to define a constant and in this constant PHP_SESSION_ACTIVE = 2 !!!
function logout() : bool {
    /*if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }*/
    $_SESSION =[];
    session_destroy();
    
    return true;
}


?>
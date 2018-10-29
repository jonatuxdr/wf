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
    global $connection;

    $query = 'SELECT * FROM user WHERE nickname = "' . $nickname . '" ';
    // ou alors je peux mettre $query = sprintf('SELECT * FROM user WHERE nickname ="%s", $nickname ');    
    $result = $connection->query($query);

    if ($result === false) {
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    $result = $result->fetch();
    if ($result) {
        return $result;
        var_dump($result);
    }
    return null;
}

?>
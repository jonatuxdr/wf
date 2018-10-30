<?php 

//$config = include __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/user.php';

logout();
session_write_close();

//send specific header to the client


header('Location: /');
// header = is composed of header key(Location:) + header value(/), with each header we have a constraint, each header must be sent to the client before an output
//Do never put space after <?php tag,j PHP file is not made for output ! Why you NEVER close <?php tag !!!!!!!!!!!!!!

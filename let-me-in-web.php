
<?php
/**
 * Ceci est un crip php qui permet à un user de s'authentifier depuis un formulaire web
 */

include('Classes/Database.php');
include('Classes/Logger.php');
//connexion à la bd
$database = new Ecodev\Database('localhost', 'root', 'root');
$database->connect('authentificate');
$username= $_POST['username'];
$password= $_POST['passwd'];
$user = $database->selectOne('SELECT * FROM user where username = "' . $username . '" AND passwd = "' . $password.'"');
if (isset($user) && $user['username']==$username && $user['passwd']==$password ) {
	Header("Location: succes.html");
	exit();
}
	session_destroy(void);
	Header("Location: echec.html");
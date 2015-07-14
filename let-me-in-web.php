
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
$hachedPassword = md5($password);
$user = $database->selectOne('SELECT * FROM user where username = "' . $username . '" AND passwd = "' . $hachedPassword.'"LIMIT 1 ');
if (!empty($user)){
	Header("Location: succes.html");
	exit();
}
	session_destroy(void);
	Header("Location: echec.html");
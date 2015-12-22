<?
error_log("REGISTRATION: " . var_export($_POST,true));

extract($_POST);

/*if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "EMAIL_INVALID";
	exit();	
}*/

if($password != $passwordConfirm) {
	echo "PASSWORD_MISMATCH";
	exit();
}

$db = new mysqli("localhost", "t4torg_app", "n45aB35T", "t4torg_app");
if($db->connect_errno) {
	echo "DB_CONNECT";
	exit();
}

$existing = $db->query("SELECT username FROM users WHERE username=$username");
if($existing->num_rows > 0) {
	echo "USERNAME_EXISTS";
	exit();
}

$db->query("INSERT INTO users (first_name, last_name, username, password) values ('$firstName', '$lastName', '$username', 
md5('$password'))");
echo "REGISTER_OK " . md5($password);
?>

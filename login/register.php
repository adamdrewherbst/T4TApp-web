<?
error_log("REGISTRATION: " . var_export($_POST,true));

extract($_POST);

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "EMAIL_INVALID";
	exit();	
}

if($password != $passwordConfirm) {
	echo "PASSWORD_MISMATCH";
	exit();
}

$db = new mysqli("localhost", "t4torg_app", "n45aB35T", "t4torg_app");
if($db->connect_errno) {
	echo "DB_CONNECT";
	exit();
}

$db->query("INSERT INTO users (first_name, last_name, email, password) values ('$firstName', '$lastName', '$email', md5('$password'))");
echo "REGISTER_OK " . md5($password);
?>

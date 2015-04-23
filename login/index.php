<?

extract($_POST);
$db = new mysqli("localhost", "t4torg_app", "n45aB35T", "t4torg_app");
if($db->connect_errno) {
	echo "DB_CONNECT";
	exit();
}

$result = $db->query("SELECT * FROM users WHERE email='$email'");
if(!$result || $result->num_rows == 0) {
	echo "NO_SUCH_USER";
	exit();
}

$row = $result->fetch_assoc();
if($row['password'] != md5($password)) {
	echo "INVALID_PASSWORD";
	exit();
}

error_log("Login result: " . var_export($row, true));
echo "LOGIN_OK " . $row['password'];

?>

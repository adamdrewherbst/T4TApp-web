<?

$user = $_SERVER["HTTP_FROM"];
$rootNode = $_SERVER["HTTP_X_ROOTNODENAME"];
$node = $_SERVER["HTTP_X_NODENAME"];

//save the uploaded node file
$in = fopen("php://input", "r");
$filename = "../${node}.node";
$out = fopen($filename, "w");
while($data = fread($in, 1024))
	fwrite($out, $data);
	
fclose($out);
fclose($in);

error_log("saved model $node");

echo "MODEL_SAVED";

?>

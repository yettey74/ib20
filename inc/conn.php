<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1001');
define('DB_DATABASE', 'indianbrasserie');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$db){
	die("Database Selection failed".mysqli_error($db));
}

?>

<?php
/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'inin4813_golith');
define('DB_PASSWORD', 'ITman123');
define('DB_DATABASE', 'inin4813_ib');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$db){
	die("Database Selection failed".mysqli_error($db));
}
*/
?>
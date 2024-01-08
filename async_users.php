<?
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

header('Content-Type: application/json');




$json_array = json_decode(file_get_contents('php://input'), true);
if ($json_array) $_POST = $json_array;



$servername = "localhost";
$username = "testassemq";
$password = "aB0eS0iD0d";
$dbname = "testassemq";

$async = ($_POST['async'] == 1) ? true : false;

$login = ($_COOKIE['login']) ? $_COOKIE['login'] : false;

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);
// Проверяем соединение
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
	$list_array[]=$row;
}

if ($async) {
    echo json_encode($list_array);
}
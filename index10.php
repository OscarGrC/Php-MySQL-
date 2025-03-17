<?php
require_once 'setup.php';
$host = 'localhost';
$user = 'root';
$password = '1234';
$database = 'mirandabbdd';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

$rooms = [];
if ($result->num_rows > 0) {
    $rooms = $result->fetch_all(MYSQLI_ASSOC);
}
$conn->close();
echo $blade->run("rooms", ["rooms" => $rooms]);
?>

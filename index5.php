<?php

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

if ($result->num_rows > 0) {
    
    $rooms = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No se encontraron habitaciones.";
    $rooms = [];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Habitaciones</title>
</head>
<body>
    <h1>Lista de Habitaciones</h1>
    <ol>
        <?php
        if (!empty($rooms)) {
            foreach ($rooms as $room) {
                echo "<li>";
                echo "<strong>ID:</strong> " . htmlspecialchars($room['id']) . "<br>";
                echo "<strong>Number:</strong> " . htmlspecialchars($room['number']) . "<br>";
                echo "<strong>Price:</strong> $" . htmlspecialchars($room['price']) . "<br>";
                echo "<strong>Discount:</strong> " . htmlspecialchars($room['offert_price']) . "%<br>";
                echo "</li><br>";
            }
        }
        ?>
    </ol>
</body>
</html>

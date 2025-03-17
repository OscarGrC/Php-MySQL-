<?php
$jsonFile = 'data/rooms.json';
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $rooms = json_decode($jsonData, true);
} else {
    echo "El archivo JSON no existe.";
    exit;
}
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
        foreach ($rooms as $room) {
            echo "<li>";
            echo "<strong>Name:</strong> " . htmlspecialchars($room['id']) . "<br>";
            echo "<strong>Number:</strong> " . htmlspecialchars($room['number']) . "<br>";
            echo "<strong>Price:</strong> $" . htmlspecialchars($room['price']) . "<br>";
            echo "<strong>Discount:</strong> " . htmlspecialchars($room['offert_price']) . "%<br>";
            echo "</li><br>";
        }
        ?>
    </ol>
</body>
</html>

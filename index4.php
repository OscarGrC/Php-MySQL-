<?php
$jsonFile = 'data/rooms.json';
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $rooms = json_decode($jsonData, true);
} else {
    echo "El archivo JSON no existe.";
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "Por favor, proporciona un parámetro de id en la URL.";
    exit;
}

$foundRoom = null;
foreach ($rooms as $room) {
    if ($room['id'] == $id) {
        $foundRoom = $room;
        break;
}}

if ($foundRoom === null) {
    echo "No se encontró una habitación con el ID: $id.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Habitación</title>
</head>
<body>
    <h1>Detalles de la Habitación</h1>
    
    <p><strong>ID:</strong> <?php echo htmlspecialchars($foundRoom['id']); ?></p>
    <p><strong>Number:</strong> <?php echo htmlspecialchars($foundRoom['number']); ?></p>
    <p><strong>Price:</strong> $<?php echo htmlspecialchars($foundRoom['price']); ?></p>
    <p><strong>Offert Price:</strong> $<?php echo htmlspecialchars($foundRoom['offert_price']); ?></p>

</body>
</html>

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
    <title>Mostrar habitaciones</title>
</head>
<body>
    <h1>Lista de Habitaciones</h1>

    <pre>
        <?php
        print_r($rooms);
        ?>
    </pre>
</body>
</html>

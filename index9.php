<?php
$host = 'localhost';
$user = 'root';
$password = '1234';
$database = 'mirandabbdd';
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $offert_price = $_POST['offert_price'];
    $amenities = '[1,2,3,4,5,6]';
    $offert = 0;
    $status = 1;
    $cancelation = 'this is cancelation poli';
    $description = 'this is room description';
    $photos = '["/assets/img/room1a.jpg", "/assets/img/room1b.jpg", "/assets/img/room1c.jpg"]';

    $stmt = $conn->prepare("INSERT INTO rooms (number, type, amenities, price, offert_price, offert, status, cancelation, description, photos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssddiisss", $number, $type, $amenities, $price, $offert_price, $offert, $status, $cancelation, $description, $photos);

    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;
        header("Location: index6.php?id=" . $last_id);
        exit();
    } else {
        echo "Error al insertar la habitación: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Habitación</title>
</head>
<body>
    <h1>Agregar Nueva Habitación</h1>
    <form method="POST">
        <label for="number">Number:</label>
        <input type="text" name="number" required><br>

        <label for="type">Type:</label>
        <input type="text" name="type" required><br>

        <label for="price">Price:</label>
        <input type="number" name="price" required><br>

        <label for="offert_price">Offert Price:</label>
        <input type="number" name="offert_price" required><br>

        <button type="submit">Guardar Habitación</button>
    </form>
</body>
</html>
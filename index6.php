<?php
$host = "localhost"; 
$user = "root"; 
$password = "1234";
$database = "mirandabbdd";


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id === null) {
    echo "Por favor, proporciona un parámetro de id en la URL.";
    exit;
}

$sql = "SELECT id, number, price, offert_price FROM rooms WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No se encontró una habitación con el ID: $id.";
    exit;
}

$room = $result->fetch_assoc();
$stmt->close();
$conn->close();
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
    
    <p><strong>ID:</strong> <?php echo htmlspecialchars($room['id']); ?></p>
    <p><strong>Number:</strong> <?php echo htmlspecialchars($room['number']); ?></p>
    <p><strong>Price:</strong> $<?php echo htmlspecialchars($room['price']); ?></p>
    <p><strong>Offert Price:</strong> $<?php echo htmlspecialchars($room['offert_price']); ?></p>

</body>
</html>

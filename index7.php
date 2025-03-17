<?php
$host = 'localhost';
$user = 'root';
$password = '1234';
$database = 'mirandabbdd';
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : "";

if (!empty($search)) {
    $sql = "SELECT * FROM rooms WHERE number LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$search%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);
}


$rooms = $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];

if (!empty($search)) {
    $stmt->close();
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

   
    <form>
        <input type="text" name="search" placeholder="Buscar por número" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Buscar</button>
    </form>

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
        } else {
            echo "<p>No se encontraron habitaciones.</p>";
        }
        ?>
    </ol>
</body>
</html>

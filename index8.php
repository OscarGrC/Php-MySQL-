<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $offert_price = $_POST['offert_price'];

    // Mensaje de confirmación sin guardar en la base de datos
    $message = "Habitación creada 😉 <br>
                <strong>Number:</strong> $number <br>
                <strong>Type:</strong> $type <br>
                <strong>Price:</strong> $$price <br>
                <strong>Offert Price:</strong> $$offert_price";
}
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

    <?php
    // Mostrar mensaje si el formulario fue enviado
    if (isset($message)) {
        echo "<h2>$message</h2>";
    }
    ?>
</body>
</html>

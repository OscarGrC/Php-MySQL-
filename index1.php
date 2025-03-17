<?php
$rooms = [
    [
        'ID' => 1,
        'Name' => 'Suite Ejecutiva',
        'Number' => 101,
        'Price' => 200,
        'Discount' => 10
    ],
    [
        'ID' => 2,
        'Name' => 'Habitación Doble',
        'Number' => 102,
        'Price' => 150,
        'Discount' => 5
    ],
    [
        'ID' => 3,
        'Name' => 'Habitación Individual',
        'Number' => 103,
        'Price' => 100,
        'Discount' => 0
    ]
];
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

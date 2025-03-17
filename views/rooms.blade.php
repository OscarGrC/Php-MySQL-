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
        @foreach ($rooms as $room)
            <li>
                <strong>ID:</strong> {{ $room['id'] }} <br>
                <strong>Number:</strong> {{ $room['number'] }} <br>
                <strong>Price:</strong> ${{ $room['price'] }} <br>
                <strong>Discount:</strong> {{ $room['offert_price'] }}% <br>
            </li><br>
        @endforeach
    </ol>
</body>
</html>

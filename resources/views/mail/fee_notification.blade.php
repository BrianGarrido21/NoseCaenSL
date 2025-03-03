<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificación de Cuota</title>
</head>
<body>
    <h2>Estimado {{ $fee->user->name }},</h2>
    <p>Adjunto encontrará el recibo de su cuota correspondiente.</p>

    <p><strong>Concepto:</strong> {{ $fee->concept }}</p>
    <p><strong>Importe:</strong> {{ number_format($fee->import, 2) }}€</p>
    <p><strong>Fecha de Vencimiento:</strong> {{ $fee->due_date }}</p>
    <p><strong>Estado:</strong> {{ $fee->is_paid ? 'Pagado' : 'Pendiente' }}</p>

    <p>Si tiene alguna consulta, no dude en contactarnos.</p>
    <p>Atentamente,<br>El equipo de NosecaenSL</p>
</body>
</html>

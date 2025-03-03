<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuota Nº {{ $fee->id }}</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 40px; 
            color: #333;
        }
        .container { 
            width: 100%; 
            padding: 20px; 
            border: 1px solid #ddd; 
            border-radius: 10px; 
        }
        .header { 
            text-align: center; 
            border-bottom: 2px solid #007bff; 
            padding-bottom: 15px; 
            margin-bottom: 20px; 
        }
        .header img { 
            max-width: 150px; 
            margin-bottom: 10px; 
        }
        .header h1 { 
            margin: 0; 
            font-size: 22px; 
            color: #007bff; 
        }
        .details-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        .details-table th, .details-table td { 
            padding: 10px; 
            border: 1px solid #ddd; 
            text-align: left; 
        }
        .details-table th { 
            background-color: #f8f9fa; 
            font-weight: bold; 
        }
        .status { 
            font-weight: bold; 
            padding: 5px 10px; 
            border-radius: 5px; 
            text-align: center; 
            display: inline-block;
        }
        .paid { background-color: #28a745; color: white; }
        .unpaid { background-color: #dc3545; color: white; }
        .footer { 
            text-align: center; 
            margin-top: 30px; 
            font-size: 12px; 
            color: #777; 
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Encabezado -->
        <div class="header">
            <h1>Recibo de Cuota</h1>
            <p>Fecha de Emisión: {{ now()->format('d/m/Y') }}</p>
        </div>

        <!-- Información de la cuota -->
        <table class="details-table">
            <tr>
                <th>Número de Cuota</th>
                <td>{{ $fee->id }}</td>
            </tr>
            <tr>
                <th>Concepto</th>
                <td>{{ $fee->concept }}</td>
            </tr>
            <tr>
                <th>Nombre del Cliente</th>
                <td>{{ $fee->user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $fee->user->email }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $fee->user->phone }}</td>
            </tr>
            <tr>
                <th>Fecha de Vencimiento</th>
                <td>{{ $fee->due_date }}</td>
            </tr>
            <tr>
                <th>Importe</th>
                <td><strong>{{ number_format($fee->import, 2) . " ". strtoupper($fee->currency_iso)}}</strong></td>
            </tr>
            <tr>
                <th>Estado</th>
                <td>
                    <span class="status {{ $fee->is_paid ? 'paid' : 'unpaid' }}">
                        {{ $fee->is_paid ? 'Pagado' : 'No Pagado' }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Notas</th>
                <td>{{ $fee->notes ?? 'N/A' }}</td>
            </tr>
        </table>

        <!-- Pie de página -->
        <div class="footer">
            <p>Este documento es generado automáticamente y no requiere firma.</p>
        </div>
    </div>

</body>
</html>

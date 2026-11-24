<!DOCTYPE html>
<html>
<head>
    <title>Plant Inventory Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #166534;
        }

        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #dcfce7;
        }

        .print-button {
            background: #15803d;
            color: white;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>

    <button class="print-button" onclick="window.print()">Print / Save as PDF</button>

    <h1>Plant Nursery Inventory Report</h1>
    <p>Plant Inventory Records</p>
    <p>Date Generated: {{ date('F d, Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Plant Name</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Description</th>
                <th>Stock Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($plants as $plant)
                <tr>
                    <td>{{ $plant->plant_name }}</td>
                    <td>{{ $plant->category }}</td>
                    <td>₱{{ number_format($plant->unit_price, 2) }}</td>
                    <td>{{ $plant->description }}</td>
                    <td>{{ $plant->stock_status == 'in_stock' ? 'In Stock' : 'Out of Stock' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No plant records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>

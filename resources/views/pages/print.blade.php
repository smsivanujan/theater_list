<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Operations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 210mm;
            /* A4 paper width */
            height: 297mm;
            /* A4 paper height */
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-top: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .header h2 {
            font-size: 20px;
            text-align: center;
            border: 2px solid black;
            border-radius: 25px;
            display: inline-block;
            padding: 10px 20px;
        }

        .info {
            margin: 40px;
            line-height: 1.8;
            display: flex;
            justify-content: space-between;
        }

        .table-container {
            margin: 20px 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin: 40px;
            line-height: 1.8;
        }

        .signature {
            text-align: right;
            flex: 1;
        }

        .date-time {
            text-align: left;
            flex: 1;
        }

        /* Print styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
                width: 210mm;
                height: 297mm;
                overflow: hidden;
            }

            .header,
            .info,
            .table-container,
            .signature-section {
                page-break-inside: avoid;
            }

            @page {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Teaching Hospital Jaffna</h1>
        <h2>List Of Operation</h2>
    </div>
    <div class="info">
        <div>
            Name of the Consultant: {{ $consultant }} <br>
            Date: {{ $surgeryDate }}
        </div>
        <div>
            {{ $category }}
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Ward</th>
                    <th>BHT</th>
                    <th>Diagnosis</th>
                    <th>Type of Surgery</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($operationList as $index => $operation)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $operation->patientName }}</td>
                    <td>{{ $operation->age }}</td>
                    <td>{{ $operation->patientSex }}</td>
                    <td>{{ $operation->ward }}</td>
                    <td>{{ $operation->BHTClinicFileNo }}</td>
                    <td>{{ $operation->diagnosis }}</td>
                    <td>{{ $operation->surgery_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="signature-section">
        <div class="date-time">
            Date: {{ \Carbon\Carbon::now()->format('Y-m-d') }}<br>
            Time: {{ \Carbon\Carbon::now()->format('h:i:s a') }}
        </div>
        <div class="signature">
            --------------------------------------
            <br>
            Signature of House Surgeon
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
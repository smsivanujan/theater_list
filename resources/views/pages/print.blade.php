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
            height: 297mm;
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
            margin-top: 40px;
            margin-left: 40px;
            line-height: 1.8;
        }
        .table-container {
            margin: 20px 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature {
            text-align: right;
            margin-right: 40px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Teaching Hospital Jaffna</h1>
        <h2>List Of Operation</h2>
    </div>
    <div class="info">
        Name of the Consultant: <br>
        Date: <br>
        Time: <br>
        Local Anaesthesia:
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
                <!-- Dynamic rows go here -->
            </tbody>
        </table>
    </div>
    <div class="signature">
        Signature of House Surgeon:
    </div>
</body>
</html>

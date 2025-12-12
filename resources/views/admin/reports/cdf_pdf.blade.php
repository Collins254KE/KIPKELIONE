<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CDF Applications Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>High School CDF Applications Report</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Serial</th>
                <th>Gender</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Status</th>
                <th>Award</th>
                <th>Submitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
                <tr>
                    <td>{{ $app->full_name }}</td>
                    <td>{{ $app->serial_number ?? 'N/A' }}</td>
                    <td>{{ $app->gender ?? 'N/A' }}</td>
                    <td>{{ $app->father_name ?? 'N/A' }}</td>
                    <td>{{ $app->mother_name ?? 'N/A' }}</td>
                    <td>{{ ucfirst($app->status) }}</td>
                    <td>{{ $app->award_amount ?? 'N/A' }}</td>
                    <td>{{ $app->created_at?->format('d M Y H:i') ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Applications: {{ $applications->count() }}</p>
</body>
</html>

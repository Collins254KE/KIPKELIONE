<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kipkelion East NG-CDF High School CDF Applications Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
        }

        .header img.logo {
            max-width: 120px;
            height: auto;
            display: block;
            margin: 0 auto 10px auto;
        }

        .header .qr-container {
            position: absolute;
            top: 0;
            right: 0;
            text-align: center;
            width: 100px;
        }

        .header .qr-container img.qr {
            width: 80px;
            height: 80px;
        }

        .header .qr-container div {
            font-size: 8px;
            margin-top: 2px;
        }

        .report-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #2E86C1;
            margin-bottom: 20px;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        h2 { color: #117A65; }
        h3 { color: #D35400; }

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

        .summary-table {
            width: 50%;
            margin: 0 auto 20px auto;
        }

        .summary-table th, .summary-table td {
            text-align: center;
        }

        tbody tr:nth-child(odd) { background-color: #f9f9f9; }
        tbody tr:nth-child(even) { background-color: #ffffff; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" class="logo" alt="Main logo">
        @if(isset($qrTemp))
            <div class="qr-container">
                <img src="{{ $qrTemp }}" class="qr" alt="Scan QR code for online report">
                <div>Scan to view report</div>
            </div>
        @endif
    </div>

    <h1 class="report-title">
        Kipkelion East NG-CDF <br>High School CDF Applications Report
    </h1>

    @php
        $total = $applications->count();

        $maleCount = $applications->filter(function ($app) {
            return in_array(strtolower(trim($app->gender ?? '')), ['male', 'm']);
        })->count();

        $femaleCount = $applications->filter(function ($app) {
            return in_array(strtolower(trim($app->gender ?? '')), ['female', 'f']);
        })->count();

        $malePercent = $total ? round(($maleCount / $total) * 100, 1) : 0;
        $femalePercent = $total ? round(($femaleCount / $total) * 100, 1) : 0;

        $wardCounts = $applications->groupBy('birth_ward')->map->count();
        $schoolCounts = $applications->groupBy('school_name')->map->count();
    @endphp

    <h3>Summary</h3>
    <table class="summary-table">
        <tr>
            <th>Gender</th>
            <th>Count</th>
            <th>Percentage</th>
        </tr>
        <tr>
            <td>Male</td>
            <td>{{ $maleCount }}</td>
            <td>{{ $malePercent }}%</td>
        </tr>
        <tr>
            <td>Female</td>
            <td>{{ $femaleCount }}</td>
            <td>{{ $femalePercent }}%</td>
        </tr>
    </table>

    <h3>Applications by Ward</h3>
    <table class="summary-table">
        <tr>
            <th>Ward</th>
            <th>Count</th>
            <th>Percentage</th>
        </tr>
        @foreach($wardCounts as $ward => $count)
            <tr>
                <td>{{ $ward ?? 'N/A' }}</td>
                <td>{{ $count }}</td>
                <td>{{ $total ? round(($count / $total) * 100, 1) : 0 }}%</td>
            </tr>
        @endforeach
    </table>

    <h3>Applications by School</h3>
    <table class="summary-table">
        <tr>
            <th>School</th>
            <th>Count</th>
            <th>Percentage</th>
        </tr>
        @foreach($schoolCounts as $school => $count)
            <tr>
                <td>{{ $school ?? 'N/A' }}</td>
                <td>{{ $count }}</td>
                <td>{{ $total ? round(($count / $total) * 100, 1) : 0 }}%</td>
            </tr>
        @endforeach
    </table>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Serial</th>
                <th>Admission No</th>
                <th>Gender</th>
                <th>School</th>
                <th>Ward</th>
                <th>Status</th>
                <th>Award</th>
                <th>Submitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $index => $app)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $app->full_name ?? 'N/A' }}</td>
                    <td>{{ $app->serial_number ?? 'N/A' }}</td>
                    <td>{{ $app->admission_no ?? 'N/A' }}</td>
                    <td>{{ ucfirst($app->gender ?? 'N/A') }}</td>
                    <td>{{ $app->school_name ?? 'N/A' }}</td>
                    <td>{{ $app->birth_ward ?? 'N/A' }}</td>
                    <td>{{ ucfirst($app->status ?? 'N/A') }}</td>
                    <td>{{ $app->award_amount ? 'KSh ' . number_format($app->award_amount) : '-' }}</td>
                    <td>{{ $app->created_at?->format('d M Y H:i') ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Applications: {{ $total }}</p>
</body>
</html>

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

        .header .qr-container img {
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
            text-transform: uppercase;
        }

        h3 {
            text-align: center;
            color: #D35400;
            margin-bottom: 10px;
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
            text-align: center;
        }

        .summary-table {
            width: 60%;
            margin: 0 auto 20px auto;
        }

        .summary-table td {
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
            <img src="{{ $qrDataUri }}" alt="QR Code">
            <div>Scan to view report</div>
        </div>
    @endif
</div>

<h1 class="report-title">
    Kipkelion East NG-CDF <br>
    High School CDF Applications Report
</h1>

@php
    $total = $applications->count();

    $maleCount = $applications->filter(fn($a) =>
        in_array(strtolower(trim($a->gender ?? '')), ['male','m'])
    )->count();

    $femaleCount = $applications->filter(fn($a) =>
        in_array(strtolower(trim($a->gender ?? '')), ['female','f'])
    )->count();

    $malePercent   = $total ? round(($maleCount / $total) * 100, 1) : 0;
    $femalePercent = $total ? round(($femaleCount / $total) * 100, 1) : 0;

    $wardCounts   = $applications->groupBy('birth_ward')->map->count();
    $schoolCounts = $applications->groupBy('school_name')->map->count();

    $totalAwards = $applications->sum('award_amount');

    $wardAwards = $applications->groupBy('birth_ward')->map(fn($g) => $g->sum('award_amount'));
    $schoolAwards = $applications->groupBy('school_name')->map(fn($g) => $g->sum('award_amount'));
@endphp

<h3>Gender Summary</h3>
<table class="summary-table">
    <tr>
        <th>Gender</th>
        <th>Applications</th>
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

<h3>Total Awards Summary</h3>
<table class="summary-table">
    <tr>
        <th>Total Applications</th>
        <th>Total Award Amount (KSh)</th>
    </tr>
    <tr>
        <td>{{ $total }}</td>
        <td><strong>{{ number_format($totalAwards, 2) }}</strong></td>
    </tr>
</table>

<h3>Applications & Awards by Ward</h3>
<table class="summary-table">
    <tr>
        <th>Ward</th>
        <th>Applications</th>
        <th>%</th>
        <th>Total Award (KSh)</th>
    </tr>
    @foreach($wardCounts as $ward => $count)
        <tr>
            <td>{{ $ward ?? 'N/A' }}</td>
            <td>{{ $count }}</td>
            <td>{{ round(($count / $total) * 100, 1) }}%</td>
            <td>{{ number_format($wardAwards[$ward] ?? 0, 2) }}</td>
        </tr>
    @endforeach
</table>

<h3>Applications & Awards by School</h3>
<table class="summary-table">
    <tr>
        <th>School</th>
        <th>Applications</th>
        <th>%</th>
        <th>Total Award (KSh)</th>
    </tr>
    @foreach($schoolCounts as $school => $count)
        <tr>
            <td>{{ $school ?? 'N/A' }}</td>
            <td>{{ $count }}</td>
            <td>{{ round(($count / $total) * 100, 1) }}%</td>
            <td>{{ number_format($schoolAwards[$school] ?? 0, 2) }}</td>
        </tr>
    @endforeach
</table>

<h3>Detailed Applications List</h3>
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
            <th>Award (KSh)</th>
            <th>Submitted</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $i => $app)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $app->full_name }}</td>
                <td>{{ $app->serial_number }}</td>
                <td>{{ $app->admission_no }}</td>
                <td>{{ ucfirst($app->gender) }}</td>
                <td>{{ $app->school_name }}</td>
                <td>{{ $app->birth_ward }}</td>
                <td>{{ ucfirst($app->status) }}</td>
                <td>{{ $app->award_amount ? number_format($app->award_amount, 2) : '-' }}</td>
                <td>{{ $app->created_at?->format('d M Y H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total Applications:</strong> {{ $total }}</p>

</body>
</html>

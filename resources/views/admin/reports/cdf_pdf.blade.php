<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>High School CDF Applications Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header img {
            max-width: 120px;
            height: auto;
            display: block;
            margin: 0 auto 10px auto;
        }
        h2, h3 {
            text-align: center;
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
        }
        .summary-table {
            width: 50%;
            margin: 0 auto 20px auto;
        }
        .summary-table th, .summary-table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Organization Logo">
    </div>

    <h2>High School CDF Applications Report</h2>

    @php
        $total = $applications->count();
        $maleCount = $applications->where('gender', 'male')->count();
        $femaleCount = $applications->where('gender', 'female')->count();
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

    {{-- Detailed Table --}}
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Serial</th>
                <th>Admission No</th>
                <th>Gender</th>
                <th>PWD</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>School</th>
                <th>Ward</th>
                <th>Location</th>
                <th>Sub-location</th>
                <th>Status</th>
                <th>Award</th>
                <th>Submitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
                <tr>
                    <td>{{ $app->full_name ?? 'N/A' }}</td>
                    <td>{{ $app->serial_number ?? 'N/A' }}</td>
                    <td>{{ $app->admission_no ?? 'N/A' }}</td>
                    <td>{{ ucfirst($app->gender ?? 'N/A') }}</td>
                    <td>{{ $app->pwd ?? 'N/A' }}</td>
                    <td>{{ $app->father_name ?? 'N/A' }}</td>
                    <td>{{ $app->mother_name ?? 'N/A' }}</td>
                    <td>{{ $app->school_name ?? 'N/A' }}</td>
                    <td>{{ $app->birth_ward ?? 'N/A' }}</td>
                    <td>{{ $app->birth_location ?? 'N/A' }}</td>
                    <td>{{ $app->birth_sublocation ?? 'N/A' }}</td>
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

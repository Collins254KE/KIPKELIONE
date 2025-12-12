@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">CDF Applications Analysis</h3>

    <div class="row mb-4">
        <div class="col-md-4">
            <h5>Status Distribution</h5>
            <canvas id="statusChart"></canvas>
        </div>
        <div class="col-md-4">
            <h5>Gender Distribution</h5>
            <canvas id="genderChart"></canvas>
        </div>
        <div class="col-md-4">
            <h5>PWD Distribution</h5>
            <canvas id="pwdChart"></canvas>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <h5>Ward Distribution</h5>
            <canvas id="wardChart"></canvas>
        </div>
        <div class="col-md-6">
            <h5>School Distribution</h5>
            <canvas id="schoolChart"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartOptions = { responsive: true, plugins: { legend: { position: 'top' } } };

    // Status
    new Chart(document.getElementById('statusChart'), {
        type: 'pie',
        data: {
            labels: {!! json_encode($statusCounts->keys()) !!},
            datasets: [{ data: {!! json_encode($statusCounts->values()) !!}, backgroundColor: ['#f0ad4e','#5cb85c','#d9534f'] }]
        },
        options: chartOptions
    });

    // Gender
    new Chart(document.getElementById('genderChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($genderCounts->keys()) !!},
            datasets: [{ data: {!! json_encode($genderCounts->values()) !!}, backgroundColor: ['#007bff','#ff6384'] }]
        },
        options: chartOptions
    });

    // PWD
    new Chart(document.getElementById('pwdChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($pwdCounts->keys()) !!},
            datasets: [{ data: {!! json_encode($pwdCounts->values()) !!}, backgroundColor: ['#28a745','#6c757d'] }]
        },
        options: chartOptions
    });

    // Ward
    new Chart(document.getElementById('wardChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($wardCounts->keys()) !!},
            datasets: [{ label: 'Applications per Ward', data: {!! json_encode($wardCounts->values()) !!}, backgroundColor: '#17a2b8' }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // School
    new Chart(document.getElementById('schoolChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($schoolCounts->keys()) !!},
            datasets: [{ label: 'Applications per School', data: {!! json_encode($schoolCounts->values()) !!}, backgroundColor: '#ffc107' }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });
</script>
@endsection

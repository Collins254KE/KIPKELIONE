@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">CDF Applications Analysis</h3>

    <div class="row">
        <div class="col-md-6">
            <h5>Status Distribution</h5>
            <canvas id="statusChart"></canvas>
        </div>
        <div class="col-md-6">
            <h5>Gender Distribution</h5>
            <canvas id="genderChart"></canvas>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Status Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($statusCounts->keys()) !!},
            datasets: [{
                label: 'Applications by Status',
                data: {!! json_encode($statusCounts->values()) !!},
                backgroundColor: ['#f0ad4e','#5cb85c','#d9534f']
            }]
        }
    });

    // Gender Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($genderCounts->keys()) !!},
            datasets: [{
                label: 'Applications by Gender',
                data: {!! json_encode($genderCounts->values()) !!},
                backgroundColor: ['#007bff','#ff6384']
            }]
        }
    });
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CDF Applications</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Applicant</th>
                <th>Serial</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
            <tr>
                <td>{{ $app->full_name }}</td>
                <td>{{ $app->serial_number }}</td>
                <td>{{ ucfirst($app->status) }}</td>
                <td>{{ $app->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.cdf.view', $app->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $applications->links() }}
</div>
@endsection

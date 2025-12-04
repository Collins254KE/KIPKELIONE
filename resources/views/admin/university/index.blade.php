@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">University/College Applications</h3>

    @if($universityApplications->isEmpty())
        <div class="alert alert-info">No University/College applications yet.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Serial</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($universityApplications as $app)
                    <tr>
                        <td>{{ $app->full_name }}</td>
                        <td>{{ $app->serial_number ?? 'N/A' }}</td>
                        <td>
                            @if($app->status == 'approved')
                                <span class="badge badge-success">{{ ucfirst($app->status) }}</span>
                            @elseif($app->status == 'rejected')
                                <span class="badge badge-danger">{{ ucfirst($app->status) }}</span>
                            @else
                                <span class="badge badge-warning">{{ ucfirst($app->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $app->created_at?->format('d M Y H:i') ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.university.view', $app->id) }}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

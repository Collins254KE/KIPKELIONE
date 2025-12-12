@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">CDF Applications</h1>

    @if($applications->isEmpty())
        <div class="alert alert-info">No CDF applications found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Applicant</th>
                    <th>Serial</th>
                    <th>Ward</th>
                    <th>Location</th>
                    <th>Sub-location</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $app)
                    <tr>
                        <td>{{ $app->full_name }}</td>
                        <td>{{ $app->serial_number ?? '-' }}</td>
                        <td>{{ $app->birth_ward ?? '-' }}</td>
                        <td>{{ $app->birth_location ?? '-' }}</td>
                        <td>{{ $app->birth_sublocation ?? '-' }}</td>
                        <td>
                            @if($app->status == 'approved')
                                <span class="badge bg-success">{{ ucfirst($app->status) }}</span>
                            @elseif($app->status == 'rejected')
                                <span class="badge bg-danger">{{ ucfirst($app->status) }}</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ ucfirst($app->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $app->created_at?->format('d M Y') ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.cdf.view', $app->id) }}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $applications->links() }}
        </div>
    @endif
</div>
@endsection

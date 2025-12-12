@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Admin Dashboard</h3>

    {{-- High School CDF Applications --}}
    <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
        <h5>Latest High School CDF Applications</h5>
        <div class="btn-group">
            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Generate Report
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.cdf.generate-report', 'csv') }}">CSV</a>
                <a class="dropdown-item" href="{{ route('admin.cdf.generate-report', 'pdf') }}">PDF</a>
                <a class="dropdown-item" href="{{ route('admin.cdf.generate-report', 'word') }}">Word</a>
            </div>
        </div>
        <a href="{{ route('admin.cdf.analysis') }}" class="btn btn-info btn-sm ml-2">View Analysis</a>
    </div>

    {{-- CDF Table --}}
    @if($cdfApplications->isEmpty())
        <div class="alert alert-info">No CDF applications yet.</div>
    @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Serial</th>
                    <th>Admission No</th>
                    <th>Gender</th>
                    <th>PWD</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>School</th>
                    <th>Ward</th>
                    <th>Location</th>
                    <th>Sub-location</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cdfApplications as $app)
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
                            <a href="{{ route('admin.cdf.view', $app->id) }}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- University / College Applications --}}
    <div class="d-flex justify-content-between align-items-center mt-5 mb-2">
        <h5>Latest University/College Applications</h5>
        <div class="btn-group">
            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Generate Report
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.university.generate-report', 'csv') }}">CSV</a>
                <a class="dropdown-item" href="{{ route('admin.university.generate-report', 'pdf') }}">PDF</a>
                <a class="dropdown-item" href="{{ route('admin.university.generate-report', 'word') }}">Word</a>
            </div>
        </div>
        <a href="{{ route('admin.university.analysis') }}" class="btn btn-info btn-sm ml-2">View Analysis</a>
    </div>

    @if($universityApplications->isEmpty())
        <div class="alert alert-info">No University/College applications yet.</div>
    @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Serial</th>
                    <th>Admission No</th>
                    <th>Gender</th>
                    <th>PWD</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>School / Institution</th>
                    <th>Ward</th>
                    <th>Location</th>
                    <th>Sub-location</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($universityApplications as $app)
                    <tr>
                        <td>{{ $app->full_name ?? 'N/A' }}</td>
                        <td>{{ $app->serial_number ?? 'N/A' }}</td>
                        <td>{{ $app->admission_no ?? 'N/A' }}</td>
                        <td>{{ ucfirst($app->gender ?? 'N/A') }}</td>
                        <td>{{ $app->pwd ?? 'N/A' }}</td>
                        <td>{{ $app->father_name ?? 'N/A' }}</td>
                        <td>{{ $app->mother_name ?? 'N/A' }}</td>
                        <td>{{ $app->institution_name ?? '-' }}</td>
                        <td>{{ $app->birth_ward ?? 'N/A' }}</td>
                        <td>{{ $app->birth_location ?? 'N/A' }}</td>
                        <td>{{ $app->birth_sublocation ?? 'N/A' }}</td>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Application Details</h3>

    <table class="table table-bordered">
    <tr><th>Full Name</th><td>{{ $application->full_name }}</td></tr>

    <tr><th>Serial Number</th><td>{{ $application->serial_number ?? 'N/A' }}</td></tr>

    <tr><th>Gender</th><td>{{ $application->gender ?? 'N/A' }}</td></tr>

    <tr><th>Institution</th><td>{{ $application->institution ?? 'N/A' }}</td></tr>

    <tr><th>Father Name</th><td>{{ $application->father_name ?? 'N/A' }}</td></tr>

    <tr><th>Mother Name</th><td>{{ $application->mother_name ?? 'N/A' }}</td></tr>

    <tr><th>Status</th><td>{{ ucfirst($application->status) }}</td></tr>
</table>


    <form action="{{ route('admin.university.update', $application->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status">Update Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" @if($application->status=='pending') selected @endif>Pending</option>
                <option value="approved" @if($application->status=='approved') selected @endif>Approved</option>
                <option value="rejected" @if($application->status=='rejected') selected @endif>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Status</button>
        <a href="{{ route('admin.university.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection

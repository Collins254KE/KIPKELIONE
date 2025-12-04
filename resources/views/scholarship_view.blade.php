@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Application Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>Full Name</th>
            <td>{{ $application->full_name }}</td>
        </tr>
        <tr>
            <th>National ID</th>
            <td>{{ $application->national_id }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $application->gender }}</td>
        </tr>
        <tr>
            <th>Student Phone</th>
            <td>{{ $application->student_phone }}</td>
        </tr>
        <tr>
            <th>Father Name</th>
            <td>{{ $application->father_name }}</td>
        </tr>
        <tr>
            <th>Mother Name</th>
            <td>{{ $application->mother_name }}</td>
        </tr>
        <tr>
            <th>Institution</th>
            <td>{{ $application->institution_name }}</td>
        </tr>
        <tr>
            <th>Admission No</th>
            <td>{{ $application->admission_no }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $application->status }}</td>
        </tr>
        <tr>
            <th>Serial Number</th>
            <td>{{ $application->serial_number }}</td>
        </tr>
    </table>

    <a href="{{ route('scholarship.form') }}" class="btn btn-primary">Back to Applications</a>
</div>
@endsection

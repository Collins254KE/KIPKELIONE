@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CDF Bursary Application Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>Full Name</th>
            <td>{{ $application->full_name }}</td>
        </tr>
        <tr>
            <th>Birth Certificate No</th>
            <td>{{ $application->birth_cert }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $application->gender }}</td>
        </tr>
        <tr>
            <th>Person With Disability (PWD)</th>
            <td>{{ $application->pwd ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Father Name</th>
            <td>{{ $application->father_name }}</td>
        </tr>
        <tr>
            <th>Father ID</th>
            <td>{{ $application->father_id }}</td>
        </tr>
        <tr>
            <th>Father Phone</th>
            <td>{{ $application->father_phone }}</td>
        </tr>
        <tr>
            <th>Mother Name</th>
            <td>{{ $application->mother_name }}</td>
        </tr>
        <tr>
            <th>Mother ID</th>
            <td>{{ $application->mother_id }}</td>
        </tr>
        <tr>
            <th>Mother Phone</th>
            <td>{{ $application->mother_phone }}</td>
        </tr>
        <tr>
            <th>School Name</th>
            <td>{{ $application->school_name }}</td>
        </tr>
        <tr>
            <th>Admission No</th>
            <td>{{ $application->admission_no }}</td>
        </tr>
        <tr>
            <th>School Address</th>
            <td>{{ $application->address }}</td>
        </tr>
        <tr>
            <th>Ward</th>
            <td>{{ $application->birth_ward }}</td>
        </tr>
        <tr>
            <th>Location</th>
            <td>{{ $application->birth_location }}</td>
        </tr>
        <tr>
            <th>Sublocation</th>
            <td>{{ $application->birth_sublocation }}</td>
        </tr>
        <tr>
            <th>Village</th>
            <td>{{ $application->birth_village ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Head Teacher Name</th>
            <td>{{ $application->principal_name }}</td>
        </tr>
        <tr>
            <th>Recommendation Letter</th>
            <td>
                <a href="{{ asset('storage/' . $application->principal_letter) }}" target="_blank" class="btn btn-sm btn-primary">View / Download</a>
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($application->status) }}</td>
        </tr>
        <tr>
            <th>Serial Number</th>
            <td>{{ $application->serial_number }}</td>
        </tr>
    </table>

    <a href="{{ route('scholarship.cdf') }}" class="btn btn-secondary">Back to Applications</a>

</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Application Details</h1>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td>{{ $application->full_name }}</td>
                </tr>
                <tr>
                    <th>Birth Certificate</th>
                    <td>{{ $application->birth_cert }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($application->gender) }}</td>
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
                    <th>Father Name</th>
                    <td>{{ $application->father_name }}</td>
                </tr>
                <tr>
                    <th>Mother Name</th>
                    <td>{{ $application->mother_name }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($application->status) }}</td>
                </tr>
                <tr>
                    <th>Serial Number</th>
                    <td>{{ $application->serial_number }}</td>
                </tr>
                @if($application->status === 'approved')
                <tr>
                    <th>Award Amount</th>
                    <td>{{ $application->award_amount ? 'KSh ' . number_format($application->award_amount) : '-' }}</td>
                </tr>
                @elseif($application->status === 'rejected')
                <tr>
                    <th>Reason for Rejection</th>
                    <td>{{ $application->rejection_reason ?? '-' }}</td>
                </tr>
                @endif
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Update Application Status & Award Amount / Reason</div>
        <div class="card-body">
            <form action="{{ route('admin.cdf.update', $application->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="pending" @if($application->status=='pending') selected @endif>Pending</option>
                        <option value="approved" @if($application->status=='approved') selected @endif>Approved</option>
                        <option value="rejected" @if($application->status=='rejected') selected @endif>Rejected</option>
                    </select>
                </div>

                <div class="mb-3" id="award_div">
                    <label for="award_amount" class="form-label">Award Amount</label>
                    <select name="award_amount" id="award_amount" class="form-control">
                        @foreach([5000,10000,15000,20000,25000,30000] as $amount)
                            <option value="{{ $amount }}" @if($application->award_amount == $amount) selected @endif>
                                KSh {{ number_format($amount) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" id="rejection_div">
                    <label for="rejection_reason" class="form-label">Reason for Rejection</label>
                    <textarea name="rejection_reason" id="rejection_reason" class="form-control" rows="3">{{ $application->rejection_reason ?? '' }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.cdf.index') }}" class="btn btn-secondary">Back to List</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function toggleFields() {
        const status = document.getElementById('status').value;
        const awardDiv = document.getElementById('award_div');
        const rejectionDiv = document.getElementById('rejection_div');

        if(status === 'approved') {
            awardDiv.style.display = 'block';
            rejectionDiv.style.display = 'none';
        } else if(status === 'rejected') {
            awardDiv.style.display = 'none';
            rejectionDiv.style.display = 'block';
        } else { // pending
            awardDiv.style.display = 'none';
            rejectionDiv.style.display = 'none';
        }
    }

    document.getElementById('status').addEventListener('change', toggleFields);

    // Initialize fields on page load
    toggleFields();
</script>
@endsection

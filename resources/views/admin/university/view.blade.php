@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Application Details</h3>

    <table class="table table-bordered mb-4">
        <tr>
            <th>Full Name</th>
            <td>{{ $application->full_name }}</td>
        </tr>
        <tr>
            <th>Serial Number</th>
            <td>{{ $application->serial_number ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ ucfirst($application->gender ?? 'N/A') }}</td>
        </tr>
        <tr>
            <th>Institution</th>
            <td>{{ $application->institution_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Father Name</th>
            <td>{{ $application->father_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Mother Name</th>
            <td>{{ $application->mother_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($application->status) }}</td>
        </tr>
        @if($application->status === 'approved')
        <tr>
            <th>Award Amount</th>
            <td>{{ $application->award_amount ? 'KSh ' . number_format($application->award_amount) : '-' }}</td>
        </tr>
        @elseif($application->status === 'rejected')
        <tr>
            <th>Rejection Reason</th>
            <td>{{ $application->rejection_reason ?? '-' }}</td>
        </tr>
        @endif
    </table>

    <form action="{{ route('admin.university.update', $application->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status">Update Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" @if($application->status=='pending') selected @endif>Pending</option>
                <option value="approved" @if($application->status=='approved') selected @endif>Approved</option>
                <option value="rejected" @if($application->status=='rejected') selected @endif>Rejected</option>
            </select>
        </div>

        <div class="mb-3" id="awardDiv" style="{{ $application->status === 'approved' ? '' : 'display:none;' }}">
            <label for="award_amount">Award Amount</label>
            <select name="award_amount" class="form-control">
                @foreach([5000,10000,15000,20000,25000,30000] as $amount)
                    <option value="{{ $amount }}" @if($application->award_amount == $amount) selected @endif>
                        KSh {{ number_format($amount) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="reasonDiv" style="{{ $application->status === 'rejected' ? '' : 'display:none;' }}">
            <label for="rejection_reason">Rejection Reason</label>
            <textarea name="rejection_reason" class="form-control" rows="3">{{ $application->rejection_reason }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.university.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const statusSelect = document.getElementById('status');
    const awardDiv = document.getElementById('awardDiv');
    const reasonDiv = document.getElementById('reasonDiv');

    function toggleFields() {
        const status = statusSelect.value;
        if(status === 'approved') {
            awardDiv.style.display = 'block';
            reasonDiv.style.display = 'none';
        } else if(status === 'rejected') {
            awardDiv.style.display = 'none';
            reasonDiv.style.display = 'block';
        } else { // pending
            awardDiv.style.display = 'none';
            reasonDiv.style.display = 'none';
        }
    }

    statusSelect.addEventListener('change', toggleFields);

    // Initialize fields on page load
    toggleFields();
</script>
@endsection

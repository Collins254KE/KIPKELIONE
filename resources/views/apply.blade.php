@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Applications Close Countdown --}}
    <div class="alert alert-info mb-4">
        <strong>Applications close in:</strong> <span id="countdown"></span>
    </div>

    <h3 class="mb-4">CDF High School Bursary Application</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="applicationForm" action="{{ route('scholarship.cdf.submit') }}" method="POST" enctype="multipart/form-data">

        @csrf

        {{-- STUDENT DETAILS --}}
        <h5 class="text-primary mt-4 mb-3">STUDENT PERSONAL DETAILS</h5>
        <div class="row mb-3">
            <div class="col-md-3">
                <label>Application Year *</label>
                <select name="application_year" class="form-control" required>
                    <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                    <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Birth Cert No *</label>
                <input type="text" name="birth_cert" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Full Name *</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Gender *</label>
                <select name="gender" class="form-control" required>
                    <option value="">--Select--</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Person With Disability (PWD)</label>
                <select name="pwd" class="form-control">
                    <option value="">--Select--</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>

<<<<<<< HEAD
        {{-- SCHOOL / COURSE DETAILS --}}
        <h5 class="text-info mt-4 mb-3">SCHOOL / INSTITUTION DETAILS</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>School Name *</label>
                <input type="text" name="school_name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Admission Number *</label>
                <input type="text" name="admission_no" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>School Address *</label>
                <input type="text" name="address" class="form-control" required>
            </div>
=======
        {{-- SCHOOL / INSTITUTION DETAILS --}}
<h5 class="text-info mt-4 mb-3">SCHOOL / INSTITUTION DETAILS</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="school_name">School Name <span class="text-danger">*</span></label>
        <input type="text"
               id="school_name"
               name="school_name"
               class="form-control @error('school_name') is-invalid @enderror"
               value="{{ old('school_name') }}"
               required>

        @error('school_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="admission_no">Admission Number <span class="text-danger">*</span></label>
        <input type="text"
               id="admission_no"
               name="admission_no"
               class="form-control @error('admission_no') is-invalid @enderror"
               value="{{ old('admission_no') }}"
               required>

        @error('admission_no')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="address">School Address <span class="text-danger">*</span></label>
        <input type="text"
               id="address"
               name="address"
               class="form-control @error('address') is-invalid @enderror"
               value="{{ old('address') }}"
               required>

        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- FEE STRUCTURE (Attached to School) --}}
<div class="row mb-3">
    <div class="col-md-6">
        <label for="fee_structure">
            Upload Current Fee Structure <span class="text-danger">*</span>
        </label>

        <input type="file"
               id="fee_structure"
               name="fee_structure"
               class="form-control @error('fee_structure') is-invalid @enderror"
               accept=".pdf,.jpg,.jpeg,.png"
               required>

        @error('fee_structure')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="form-text text-muted">
            Accepted formats: PDF, JPG, PNG (Maximum 2MB)
        </small>
    </div>

    <div class="col-md-6">
        <label for="term_fees">
            Total Fees Per Term (KES) <span class="text-danger">*</span>
        </label>

        <input type="number"
               id="term_fees"
               name="term_fees"
               class="form-control @error('term_fees') is-invalid @enderror"
               value="{{ old('term_fees') }}"
               min="0"
               step="1"
               placeholder="e.g. 25000"
               required>

        @error('term_fees')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

>>>>>>> 16ca537 (update files)
        </div>

        {{-- PARENTS / GUARDIAN DETAILS --}}
        <h5 class="text-success mt-4 mb-3">PARENT / GUARDIAN DETAILS</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Father/Guardian Name *</label>
                <input type="text" name="father_name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>ID Number *</label>
                <input type="text" name="father_id" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Phone *</label>
                <input type="text" name="father_phone" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Mother/Guardian Name *</label>
                <input type="text" name="mother_name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>ID Number *</label>
                <input type="text" name="mother_id" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Phone *</label>
                <input type="text" name="mother_phone" class="form-control" required>
            </div>
        </div>

        {{-- HOME DETAILS --}}
        <h5 class="text-warning mt-4 mb-3">HOME BACKGROUND</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Ward *</label>
                <select id="wardSelect" name="birth_ward" class="form-control" required>
                    <option value="">-- Select Ward --</option>
                    <option>Londiani</option>
                    <option>Kedowa / Kimugul</option>
                    <option>Chepseon</option>
                    <option>Tendeno / Sorget</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Location *</label>
                <select id="locationSelect" name="birth_location" class="form-control" required>
                    <option value="">-- Select Location --</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Sublocation *</label>
                <select id="sublocationSelect" name="birth_sublocation" class="form-control" required>
                    <option value="">-- Select Sublocation --</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label>Village</label>
            <input type="text" name="birth_village" class="form-control">
        </div>

        {{-- HEAD TEACHER --}}
        <h5 class="text-danger mt-4 mb-3">HEAD TEACHER CONFIRMATION</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Name of Head Teacher *</label>
                <input type="text" name="principal_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Upload Recommendation Letter / Stamp *</label>
                <input type="file" name="principal_letter" class="form-control" required>
            </div>
        </div>

        <button id="submitBtn" type="submit" class="btn btn-primary mt-4">Submit Application</button>
    </form>

{{-- APPLICATION HISTORY --}}
<h3 class="mt-5 mb-3">Application History</h3>

@php
    $sessionId = session()->getId();

    // Show applications for authenticated users or by session
    $userApplications = auth()->check()
        ? $applications
        : $applications->where('session_id', $sessionId);
@endphp

@if($userApplications->isEmpty())
    <div class="alert alert-info">No applications yet.</div>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Application Type</th> {{-- New Column --}}
                <th>Serial</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userApplications as $app)
                <tr>
                    <td>{{ $app->full_name }}</td>
                    <td>
                        @if(isset($app->school_name) && !empty($app->school_name))
                            High School
                        @else
                            University/College
                        @endif
                    </td>
                    <td>{{ $app->serial_number ?? 'N/A' }}</td>
                    <td>{{ ucfirst($app->status) }}</td>
                    <td>{{ $app->created_at->format('d M Y H:i') }}</td>
                    <td>
                        @if(isset($app->school_name) && !empty($app->school_name))
                            <a href="{{ route('scholarship.cdf.view', $app->id) }}" class="btn btn-sm btn-primary">View</a>
                        @else
                            <a href="{{ route('scholarship.view', $app->id) }}" class="btn btn-sm btn-primary">View</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif



<script>
document.addEventListener('DOMContentLoaded', function() {
    const wardData = {
        "Londiani": { "Londiani Town": ["Centre", "Maji Mazuri"] },
        "Kedowa / Kimugul": { "Kedowa": ["North", "South"] },
        "Chepseon": { "Chepseon": ["North", "South"] },
        "Tendeno / Sorget": { "Tendeno": ["North", "South"] }
    };

    const wardSelect = document.getElementById('wardSelect');
    const locationSelect = document.getElementById('locationSelect');
    const sublocationSelect = document.getElementById('sublocationSelect');

    wardSelect.addEventListener('change', function () {
        const locations = wardData[this.value] || {};
        locationSelect.innerHTML = '<option value="">-- Select Location --</option>';
        sublocationSelect.innerHTML = '<option value="">-- Select Sublocation --</option>';
        Object.keys(locations).forEach(loc => locationSelect.innerHTML += `<option>${loc}</option>`);
    });

    locationSelect.addEventListener('change', function () {
        const ward = wardSelect.value;
        const subs = wardData[ward][this.value] || [];
        sublocationSelect.innerHTML = '<option value="">-- Select Sublocation --</option>';
        subs.forEach(sub => sublocationSelect.innerHTML += `<option>${sub}</option>`);
    });

    // Countdown
    const closingDate = new Date("2025-12-31 23:59:59").getTime();
    setInterval(() => {
        const now = Date.now();
        const diff = closingDate - now;
        if (diff <= 0) {
            document.getElementById('countdown').innerText = "Applications Closed";
            document.getElementById('submitBtn').disabled = true;
            return;
        }
        const d = Math.floor(diff / (1000*60*60*24));
        const h = Math.floor((diff % (1000*60*60*24)) / (1000*60*60));
        const m = Math.floor((diff % (1000*60*60)) / (1000*60));
        const s = Math.floor((diff % (1000*60)) / 1000);
        document.getElementById('countdown').innerText = `${d}d ${h}h ${m}m ${s}s`;
    }, 1000);
});
</script>
@endsection

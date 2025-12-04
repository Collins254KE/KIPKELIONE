@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Applications Close Countdown --}}
    <div class="alert alert-info mb-4">
        <strong>Applications close in:</strong> <span id="countdown"></span>
    </div>

    <h3 class="mb-4">University/College Bursary Application</h3>

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

    <form id="applicationForm" action="{{ route('scholarship.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- STUDENT PERSONAL DETAILS --}}
        <h5 class="text-primary mt-4 mb-3">STUDENT PERSONAL DETAILS</h5>
        <div class="col-md-3 mb-3">
            <label>Application Year</label>
            <select name="application_year" class="form-control" required>
                <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>National ID*</label>
                <input type="text" name="national_id" class="form-control" placeholder="Type National ID" required>
            </div>
            <div class="col-md-8">
                <label>Full Name*</label>
                <input type="text" name="full_name" class="form-control" placeholder="Type Full Name" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Gender*</label>
                <select name="gender" class="form-control" required>
                    <option value="">--Select Gender--</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Person With Disability</label>
                <select name="pwd" class="form-control">
                    <option value="">--Select PWD--</option>
                    <option value="Yes" {{ old('pwd') == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ old('pwd') == 'No' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Student Mobile Phone*</label>
                <input type="text" name="student_phone" class="form-control" required>
            </div>
        </div>

        {{-- FATHER DETAILS --}}
        <h5 class="text-success mt-4 mb-3">FATHER DETAILS</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Full Name*</label>
                <input type="text" name="father_name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>National ID*</label>
                <input type="text" name="father_id" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Phone Number*</label>
                <input type="text" name="father_phone" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Occupation</label>
                <input type="text" name="father_occupation" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Email (Optional)</label>
                <input type="email" name="father_email" class="form-control" placeholder="example@mail.com">
            </div>
        </div>

        {{-- MOTHER DETAILS --}}
        <h5 class="text-danger mt-4 mb-3">MOTHER DETAILS</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Full Name*</label>
                <input type="text" name="mother_name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>National ID*</label>
                <input type="text" name="mother_id" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Phone Number*</label>
                <input type="text" name="mother_phone" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Occupation</label>
                <input type="text" name="mother_occupation" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Email (Optional)</label>
                <input type="email" name="mother_email" class="form-control" placeholder="example@mail.com">
            </div>
        </div>

        {{-- PLACE OF BIRTH --}}
        <h5 class="text-warning mt-4 mb-3">PLACE OF BIRTH</h5>
        <div class="row mb-3">
            <div class="col-md-3">
                <label>Ward</label>
                <select id="wardSelect" name="birth_ward" class="form-control" required>
                    <option value="">-- Select Ward --</option>
                    <option value="Londiani">Londiani</option>
                    <option value="Kedowa / Kimugul">Kedowa / Kimugul</option>
                    <option value="Chepseon">Chepseon</option>
                    <option value="Tendeno / Sorget">Tendeno / Sorget</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Location</label>
                <select id="locationSelect" name="birth_location" class="form-control" required>
                    <option value="">-- Select Location --</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Sublocation</label>
                <select id="sublocationSelect" name="birth_sublocation" class="form-control" required>
                    <option value="">-- Select Sublocation --</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Village</label>
                <input type="text" name="birth_village" class="form-control">
            </div>
        </div>

        {{-- INSTITUTION --}}
        <h5 class="text-info mt-4 mb-3">INSTITUTION</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Name of Institution</label>
                <input type="text" name="institution_name" class="form-control" placeholder="Start typing institution name...">
            </div>
            <div class="col-md-3">
                <label>Admission Number</label>
                <input type="text" name="admission_no" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Level of Study</label>
                <select name="level_of_study" class="form-control">
                    <option value="">--Select Level--</option>
                    <option value="Certificate">Certificate</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Degree">Degree</option>
                    <option value="Postgraduate">Postgraduate</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label>Mode of Study</label>
                <select name="mode_of_study" class="form-control">
                    <option value="">--Select Mode--</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Distance">Distance</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Year of Study</label>
                <select name="year_of_study" class="form-control">
                    <option value="">--Select Year--</option>
                    @for($i=1; $i<=8; $i++)
                        <option value="{{ $i }}">Year {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label>Semester</label>
                <select name="semester" class="form-control">
                    <option value="">--Select Semester--</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Course Duration</label>
                <select name="course_duration" class="form-control">
                    <option value="">--Select Duration--</option>
                    <option value="1 Year">1 Year</option>
                    <option value="2 Years">2 Years</option>
                    <option value="3 Years">3 Years</option>
                    <option value="4 Years">4 Years</option>
                    <option value="5 Years">5 Years</option>
                </select>
            </div>
        </div>

        <button id="submitBtn" type="submit" class="btn btn-primary mt-4">Submit Application</button>
    </form>

    {{-- APPLICATION HISTORY --}}
    <h3 class="mt-5 mb-3">Application History</h3>

    @php
        $sessionId = session()->getId();
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
                    <th>Application Type</th>
                    <th>Serial Number</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userApplications as $app)
                    <tr>
                        <td>{{ $app->full_name }}</td>
                        <td>{{ isset($app->school_name) && $app->school_name ? 'High School' : 'University/College' }}</td>
                        <td>{{ $app->serial_number ?? 'N/A' }}</td>
                        <td>
                            @if($app->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($app->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($app->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-secondary">Unknown</span>
                            @endif
                        </td>
                        <td>{{ $app->created_at->format('d M Y H:i') }}</td>
                        <td>
                            @if(isset($app->school_name) && $app->school_name)
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

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const wardData = {
        "Londiani": { "Londiani Town": ["Kipkelion East", "Chebalungu", "Maji Mazuri"], "Kipkelion Estate": ["Londiani Centre", "Kipkelion West"] },
        "Kedowa / Kimugul": { "Kedowa": ["Kedowa North", "Kedowa South"], "Kimugul": ["Kimugul East", "Kimugul West"] },
        "Chepseon": { "Chepseon Centre": ["Chepseon North", "Chepseon South"], "Chepseon East": ["Chepseon East 1", "Chepseon East 2"] },
        "Tendeno / Sorget": { "Tendeno": ["Tendeno North", "Tendeno South"], "Sorget": ["Sorget Centre", "Sorget East"] }
    };

    const wardSelect = document.getElementById('wardSelect');
    const locationSelect = document.getElementById('locationSelect');
    const sublocationSelect = document.getElementById('sublocationSelect');

    wardSelect.addEventListener('change', function() {
        const ward = this.value;
        const locations = wardData[ward] || {};
        locationSelect.innerHTML = '<option value="">-- Select Location --</option>';
        sublocationSelect.innerHTML = '<option value="">-- Select Sublocation --</option>';
        Object.keys(locations).forEach(loc => {
            const option = document.createElement('option');
            option.value = loc;
            option.textContent = loc;
            locationSelect.appendChild(option);
        });
    });

    locationSelect.addEventListener('change', function() {
        const ward = wardSelect.value;
        const location = this.value;
        const sublocations = (wardData[ward] && wardData[ward][location]) || [];
        sublocationSelect.innerHTML = '<option value="">-- Select Sublocation --</option>';
        sublocations.forEach(sub => {
            const option = document.createElement('option');
            option.value = sub;
            option.textContent = sub;
            sublocationSelect.appendChild(option);
        });
    });

    // Countdown Timer
    const closingDate = new Date("2025-12-31 23:59:59").getTime();
    const countdownEl = document.getElementById('countdown');
    const submitBtn = document.getElementById('submitBtn');

    const timer = setInterval(function() {
        const now = new Date().getTime();
        const distance = closingDate - now;

        if (distance < 0) {
            clearInterval(timer);
            countdownEl.innerHTML = "Applications are now closed.";
            submitBtn.disabled = true;
            submitBtn.innerText = "Applications Closed";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownEl.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }, 1000);
});
</script>
@endsection

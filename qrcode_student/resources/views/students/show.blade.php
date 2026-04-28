@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Student Profile</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow border-0 text-center p-3">
            <img src="{{ $student->picture_url }}" class="rounded-circle mx-auto" width="150">
            <h5 class="mt-3">{{ $student->first_name }} {{ $student->last_name }}</h5>
            <p class="text-muted">{{ $student->id_number }}</p>
        </div>

        <div class="card shadow border-0 mt-3 p-3 text-center">
            <h6 class="mb-3">QR Code</h6>
            <div id="qrcode" class="d-flex justify-content-center"></div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow border-0">
            <div class="card-body">
                <h5>Information</h5>
                <hr>

                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Phone:</strong> {{ $student->phone }}</p>
                <p><strong>Department:</strong> {{ $student->department }}</p>
                <p><strong>Year Level:</strong> {{ $student->year_level }}</p>

                <hr>

                <small class="text-muted">QR contains full student data</small>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let data = @json($student->qr_code);

    new QRCode(document.getElementById("qrcode"), {
        text: data ? data : "No Data",
        width: 180,
        height: 180
    });
});
</script>
@endsection
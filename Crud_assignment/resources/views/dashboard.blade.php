@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- Welcome Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Welcome, {{ session('user')->first_name }}!</h2>
        <div>
            <a href="/profile" class="btn btn-outline-primary me-2">
                <i class="bi bi-person-circle"></i> Edit Profile
            </a>
            <a href="/logout" class="btn btn-outline-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>

    <div class="row g-4">

        <!-- Personal Info Card -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-person-fill"></i> Personal Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ session('user')->first_name }} {{ session('user')->last_name }}</p>
                    <p><strong>Email:</strong> {{ session('user')->email }}</p>
                    <p><strong>Phone:</strong> {{ session('user')->phone }}</p>
                    <p><strong>Address:</strong> {{ session('user')->address }}</p>
                </div>
            </div>
        </div>

        <!-- Academic Info Card -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-book-fill"></i> Academic Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Student ID:</strong> {{ session('user')->student_id }}</p>
                    <p><strong>Course:</strong> {{ session('user')->course }}</p>
                    <p><strong>Year Level:</strong> <span class="badge bg-warning text-dark">{{ session('user')->year_level }}</span></p>
                    <p><strong>Gender:</strong> {{ session('user')->gender }}</p>
                    <p><strong>Birthdate:</strong> {{ session('user')->birthdate }}</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Activity Logs -->
    <div class="row mt-4 g-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="bi bi-clock-history"></i> Recent Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @php
                            $logs = DB::table('logs')
                                ->where('user_id', session('user')->id)
                                ->orderByDesc('created_at')
                                ->limit(5)
                                ->get();
                        @endphp

                        @forelse($logs as $log)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    <strong>{{ $log->action }}:</strong> {{ $log->description }}
                                </span>
                                <span class="badge bg-primary rounded-pill">{{ date('M d, Y', strtotime($log->created_at)) }}</span>
                            </li>
                        @empty
                            <li class="list-group-item">No recent activity.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
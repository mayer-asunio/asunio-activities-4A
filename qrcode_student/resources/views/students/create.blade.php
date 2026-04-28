@extends('layouts.app')

@section('title', 'Add New Student')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Add New Student</h3>
                <a href="{{ route('students.index') }}" class="btn btn-light">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>ID Number</label>
                            <input type="text" name="id_number" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label>Department</label>
                            <select name="department" class="form-select" required>
                                <option value="">Select</option>
                                <option>Computer Science</option>
                                <option>Information Technology</option>
                                <option>Engineering</option>
                                <option>Business Administration</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Year Level</label>
                            <select name="year_level" class="form-select" required>
                                <option value="">Select</option>
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Picture</label>
                            <input type="file" name="picture" class="form-control">
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button class="btn btn-primary px-4">Save Student</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
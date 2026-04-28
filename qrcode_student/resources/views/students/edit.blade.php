@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Edit Student</h3>
                <a href="{{ route('students.show', $student) }}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>ID Number</label>
                            <input type="text" name="id_number" class="form-control" value="{{ $student->id_number }}">
                        </div>

                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $student->email }}">
                        </div>

                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}">
                        </div>

                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}">
                        </div>

                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                        </div>

                        <div class="col-md-6">
                            <label>Department</label>
                            <input type="text" name="department" class="form-control" value="{{ $student->department }}">
                        </div>

                        <div class="col-md-6">
                            <label>Year Level</label>
                            <input type="text" name="year_level" class="form-control" value="{{ $student->year_level }}">
                        </div>

                        <div class="col-md-6">
                            <label>Picture</label>
                            <input type="file" name="picture" class="form-control">
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button class="btn btn-primary px-4">Update</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
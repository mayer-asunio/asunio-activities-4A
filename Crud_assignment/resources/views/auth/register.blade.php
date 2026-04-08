@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-5">
            <h3 class="text-center mb-4 fw-bold">Student Registration</h3>
            
            <form method="POST" action="/register">
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Student ID</label>
                        <input name="student_id" class="form-control" placeholder="Enter student ID">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">First Name</label>
                        <input name="first_name" class="form-control" placeholder="First Name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Last Name</label>
                        <input name="last_name" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option selected disabled>Choose gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Phone</label>
                        <input name="phone" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <input name="course" class="form-control" placeholder="Course">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Year Level</label>
                        <input name="year_level" class="form-control" placeholder="Year Level">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter full address"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary w-100 mt-4 fw-bold">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="mb-4 fw-bold">Edit Profile</h3>

            <form method="POST" action="/profile/update">
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
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input name="first_name" value="{{ $user->first_name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input name="last_name" value="{{ $user->last_name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input name="phone" value="{{ $user->phone }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                </div>
                <button class="btn btn-primary w-100 fw-bold">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
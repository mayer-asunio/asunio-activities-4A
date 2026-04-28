@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Students</h3>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

<div class="row">
    @foreach ($students as $student)
        <div class="col-md-3 mb-4">
            <div class="card shadow border-0">
                <img src="{{ $student->picture_url }}" class="card-img-top" style="height:200px; object-fit:cover;">
                <div class="card-body text-center">
                    <h6>{{ $student->first_name }} {{ $student->last_name }}</h6>
                    <small class="text-muted">{{ $student->id_number }}</small>

                    <div class="mt-3 d-flex justify-content-center gap-2">
                        <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $students->links() }}
</div>
@endsection
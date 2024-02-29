@extends('dashboard.layout.main')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Add New Grade Data</h1>
    <a href="/dashboard/grade" type="button" class="btn btn-primary mb-3">
        <i class="bi bi-box-arrow-left"></i>
        Back
    </a>

    <form method="POST" action="{{ url('/dashboard/grade/add') }}">   
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Grade</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}">
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
</div>
@endsection
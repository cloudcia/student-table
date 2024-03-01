@extends('dashboard.layouts.main')

@section('content')
    <a href="/dashboard/grade" type="button" class="btn btn-primary">
        <i class="bi bi-box-arrow-left"></i>
        Back
    </a>
    <h3 style="text-align: center;">Edit Grade</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/dashboard/grade/update/{{$grade->id}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Grade</label>
            <input type="text" class="form-control" value="{{ $grade->nama }}" id="nama" name="nama" required>
        </div>

        <button type="submit" class="btn btn-danger">Update</button>
    </form>
@endsection

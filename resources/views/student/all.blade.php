@extends('layouts.main')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h1>{{ $title }}</h1>

        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Data</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->tanggal_lahir }}</td>
                        <td>{{ optional($student->grades)->kelas }}</td>
                        <td>{{ $student->alamat }}</td>
                        <td>
                            <a href="/students/detail/{{$student->id }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                            <form action="/students/delete/{{$student->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

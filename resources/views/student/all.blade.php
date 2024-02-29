@extends('layouts.main')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h1>{{ $title }}</h1>
       
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
                            <td>{{ $student->grades->nama }}</td>
                            <td>{{ $student->alamat }}</td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
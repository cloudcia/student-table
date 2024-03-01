@extends('dashboard.layout.main')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.students.update', $student->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $student->nis }}" readonly>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $student->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}" required>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" name="grade_id" id="kelas"> {{-- Fixed the name attribute --}}
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ $grade->id == $student->grade_id ? 'selected' : '' }}>
                            {{ $grade->nama }}
                        </option>
                    @endforeach
                </select> {{-- Closing select tag added --}}
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $student->alamat }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

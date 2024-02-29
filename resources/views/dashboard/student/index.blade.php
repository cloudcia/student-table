@extends('dashboard.layout.main')

@section('content')
    <div class="container">

        <h1>{{ $title }}</h1>

        <div class="row">
  <!-- <div class="col-md-6" >
    <form action="/dashboard/student">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" aria-label="Search" value="{{request('search')}}">
        <button class="btn btn-primary" type="submit" id="button-addon2" >Search</button>
      </div>
    </form>
  </div>
</div> -->

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-warning sol-lg-12" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <a href="{{ route('dashboard.students.create') }}" class="btn btn-primary mb-3">Add New Data</a>

       
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->nama }}</td>
                            <td>{{ optional($student->grades)->nama }}</td>
                            <td>
                                <a href="{{ route('dashboard.students.show', $student->id) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('dashboard.students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('dashboard.students.destroy', $student->id) }}" method="post" class="d-inline">
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

    <div class="d-flex justify-content-center">
  {{ $students->links()}}
</div>
@endsection

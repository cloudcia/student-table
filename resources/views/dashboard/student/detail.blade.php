@extends('dashboard.layout.main')

@section('content')
<h1>Student Details</h1>
    <br/>
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            {{$students->nis}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$students->nama}}</li>
            <li class="list-group-item">{{$students->tanggal_lahir}}</li>
            <li class="list-group-item">{{$students->grade->nama }}</li>
            <li class="list-group-item">{{$students->alamat}}</li>
        </ul>
    </div>
    <br>
    <a href="/dashboard/students" class="btn btn-primary">Back</a>
@endsection
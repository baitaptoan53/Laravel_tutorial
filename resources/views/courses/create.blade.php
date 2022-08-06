@extends('layout.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('course.store') }}" method="post">
    @csrf
    Name
    <input type="text" name="fist_name">
    <br>
    Descreption
    <input type="text" name="last_name">
    <br>
    Teacher
    <input type="text" name="status">
    <br>
    status
    
    <input type="date" name="birthdate">
    <br>
    <button>Create</button>


</form>
@endsection
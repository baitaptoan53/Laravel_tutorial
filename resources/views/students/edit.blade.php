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
    <form action="{{ route('student.update', $student) }}" method="post">
        @csrf
        @method('PUT')
        Fisrt name
        <input type="text" name="fist_name" class="m-2" value="{{ $student->fist_name }}">
        <br>
        Last name
        <input type="text" name="last_name" class="m-2" value="{{ $student->last_name }}">
        <br>
        Gender:
        <input type="radio" name="gender" value="0" class="m-2" value="{{ $student->gender }}">Male
        <input type="radio" name="gender" value="1" class="m-2" value="{{ $student->gender }}">Female
        <br>
        Birth date
        <input type="date" name="birthdate" class="m-2" value="{{ $student->birthdate }}">
        <br>
        <button>Edit</button>
    </form>
@endsection

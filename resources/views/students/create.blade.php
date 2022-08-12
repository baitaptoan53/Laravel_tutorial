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
<form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data>
    @csrf
    Fisrt name
    <input type="text" name="fist_name">
    <br>
    Last name
    <input type="text" name="last_name">
    <br>
    Gender:
    <input type="radio" name="gender" value="0">Male
    <input type="radio" name="gender" value="1">Female
    <br>
    Birth date
    <input type="date" name="birthdate">
    <br>
    @foreach($arrStudentStatus as $option =>$value)
    <input type="radio" name="status" value="{{ $value }}" class="m-2"  
    @if ($loop->first)
        checked
    @endif>
    {{ $option }}
    @endforeach
    <br>

    Course
    <select name="course_id">
        @foreach($course as $course)
            <option value="{{ $course->id }}">
                {{ $course->name }}
            </option>
        @endforeach
    </select>
    <br>
    Avatar
    <input type="file" name="avatar">
    <br>
    <button>Create</button>
</form>
@endsection
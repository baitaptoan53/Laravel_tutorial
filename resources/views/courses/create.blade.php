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
    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" class="m-2">
        <br>
        Descreption
        <input type="text" name="description" class="m-2">
        <br>
        Teacher
        <input type="text" name="teacher" class="m-2">
        <br>
        Status
        @foreach($arrCourseStatus as $option =>$value)
            <input type="radio" name="status" value="{{ $value }}" class="m-2"  
            @if ($loop->first)
                checked
            @endif>
            {{ $option }}
        @endforeach
        <br>
        <button class="btn btn-primary">Create</button>
    </form>
@endsection
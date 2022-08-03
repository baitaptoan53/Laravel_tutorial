@extends('layout.master')
@section('content')
    <div class='card-body'>
        <a class="btn btn-success" href="{{ route('student.create') }}">
            Add Student
        </a>
        <form class="float-right form-group form-inline">
            <label class="mr-2">Search:</label>
            <input type="search" name="q" value="{{ $search }}" class="form-control">
        </form>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Tool</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td class='center'>{{ $student->id }}</td>
                    <td class='center'>{{ $student->fullname }}</td>
                    <td class='center'>{{ $student->age }}</td>
                    <td class='center'>{{ $student->gender }}</td>
                    <td>
                        <a href="{{ route('student.edit', $student) }}">Edit</a>

                        <form action="{{ route('student.destroy', $student) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <nav>
            <ul class="pagination pagination-rounded mb-0">
                {{ $students->links() }}
            </ul>
        </nav>
    </div>
@endsection
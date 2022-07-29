<style>
    .center {
        text-align: center;
    }
</style>
<h1>
    Đây là danh sách sinh viên
</h1>
<a href="{{ route('student.create') }}">Add</a>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Full Name</th>

        <th>Age</th>
        <th>Gender</th>
    </tr>
    @foreach ($students as $student)
        <tr>
            <td class='center'>{{ $student->id }}</td>
            <td class='center'>{{ $student->fullname }}</td>
            <td class='center'>{{ $student->age }}</td>
            <td class='center'>{{ $student->gender }}</td>
            <td>
               
                <form action="{{route('student.destroy',$student )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button> 
                </form>
            </td>
        </tr>
    @endforeach
</table>

<style>
    .center {
        text-align: center;
    }
</style>
<h1>
    Đây là danh sách sinh viên
</h1>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
    
        <th>Birthdate</th>
        <th>Gender</th>

    </tr>
    @foreach ($students as $student)
        <tr>
            <td class='center'>{{ $student->id }}</td>
            <td class='center'>{{ $student->fullname }}</td>
           
            <td class='center'>{{ $student->birthdate }}</td>
            <td class='center'>{{ $student->gender }}</td>
        </tr>
    @endforeach
</table>

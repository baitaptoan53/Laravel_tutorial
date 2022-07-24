
<h1>
                   Đây là danh sách sinh viên
</h1>
<table border="1" width="100%">
                   <tr>
                                      <th>ID</th>          
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Birthdate</th>
                                      <th>Gender</th>

                   </tr>
                   @foreach($students as $student)
                   <tr>
                                      <td>{{$student->id}}</td>
                                      <td>{{$student->fist_name}}</td>
                                      <td>{{$student->last_name}}</td>
                                      <td>{{$student->birthdate}}</td>
                                      <td>{{$student->gender}}</td>
                   </tr>
                   @endforeach
</table>
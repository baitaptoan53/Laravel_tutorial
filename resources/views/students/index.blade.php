@extends('layout.master')
@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css"/>
@endpush
@section('content')
    <div class='card-body'>
        <a class="btn btn-success" href="{{ route('student.create') }}">
            Add Student
        </a>
        <table class="table table-striped" id="table-index">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.js"></script>
    <script>
   <script>
        $(function() {
    $('#table-index').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('student.api') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'fullName', name: 'fullName' },
            { data: 'age', name: 'age' },
            { data: 'gender', name: 'gender' }
        ]
    });
});
</script>
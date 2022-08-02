<style>
    input {
        margin: 16px 0;
    }
</style>
<h1>This is edit student page</h1>
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
    <input type="text" name="fist_name" value="{{ $student->fist_name }}">
    <br>
    Last name
    <input type="text" name="last_name" value="{{ $student->last_name }}">
    <br>
    Gender:
    <input type="radio" name="gender" value="0" value="{{ $student->gender }}">Male
    <input type="radio" name="gender" value="1" value="{{ $student->gender }}">Female
    <br>
    Birth date
    <input type="date" name="birthdate" value="{{ $student->birthdate }}">
    <br>
    <button>Edit</button>
</form>

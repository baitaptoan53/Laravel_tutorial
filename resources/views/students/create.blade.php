<style>
    input {
        margin: 16px 0;
    }
</style>
<h1>This is add student page</h1>
<form action="{{ route('student.store') }}" method="post">
    @csrf
    Fisrt name
    <input type="text" name="fist_name">
    <br>
    Last name
    <input type="text" name="last_name">
    <br>
    Gender:
    <input type="radio" name="gen_der" value="0">Male
    <input type="radio" name="gen_der" value="1">Female
    <br>
    Birth date
    <input type="date" name="birthdate">
    <br>
    <button>Create</button>


</form>

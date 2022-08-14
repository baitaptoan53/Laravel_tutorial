<form action="{{ route('process_register') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter name"><br>
        Email
        <input type="text" name="email" value="{{ old('email') }}" placeholder = "Enter email" ><br>
        Password
        <input type="password" name="password" value="{{ old('password') }}" placeholder="Enter password"><br>
        <button>Register</button>
    </div>
</form>

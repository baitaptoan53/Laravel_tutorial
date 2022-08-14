<form method="post" action="{{route('process_login')}}">
                   @csrf
                   Email: <input type="text" name="email" value="{{old('email')}}"><br>
                   Password: <input type="password" name="password" value="{{old('password')}}"><br>
                   <button>Login</button>

</form>
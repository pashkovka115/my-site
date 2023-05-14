
<center>
    <div>
        <ul>
            @if(session('status'))
                <li>{{ session('status') }}</li>
            @endif
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <label>Email
            <input type="email" name="email">
        </label><br><br>
        <button type="submit">Отправить ссылку для сброса пароля</button>
    </form>
</center>

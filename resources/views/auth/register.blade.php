
<center>
    <div>
        <ul>
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    <form action="{{ route('auth.store') }}" method="post">
        @csrf
        <label>Имя
            <input type="text" name="name">
        </label><br><br>
        <label>Email
            <input type="email" name="email">
        </label><br><br>
        <label>Пароль
            <input type="password" name="password">
        </label><br><br>
        <label>Повторите пароль
            <input type="password" name="password_confirmation">
        </label><br><br>
        <button type="submit">Зарегестрироваться</button>
    </form>
</center>

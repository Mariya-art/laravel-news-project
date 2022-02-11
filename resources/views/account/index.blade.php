<h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
<a href="/">На главную</a><br>
@if(Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}" style="color:red;">Перейти в админку</a><br>
@endif
<a href="{{ route('account.logout') }}">Выход</a><br>
@if(Auth::user()->avatar)
    <img src="{{ Auth::user()->avatar }}" alt="avatar" style="width:300px;">
@endif

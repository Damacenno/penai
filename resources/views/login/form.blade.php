@if($mensagem = Session::get('erro'))
{{ $mensagem }}
@endif
<form action="{{ route('login.auth') }}" method="POST">
    @csrf

    Email <input type="email" name="email">
    Senha <input type="password" name="password"> 
    <button type="submit">Entrar</button>

</form>
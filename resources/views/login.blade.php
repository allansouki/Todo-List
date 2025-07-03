<x-layout page="Login" :mainClass="'form-login-page'">

    <div class="login-header">
    <img src="/assets/images/logo.png" alt="Logo" width="60" />
    <h1 class="system-title">Todo-List</h1>
    <p class="system-subtitle">Organize suas tarefas com eficiência</p>
    <p class="login-call">Faça seu login</p>

    @if ($errors->any())
<<<<<<< HEAD
    <div class="login-error" >
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
=======
    <div class="login-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
>>>>>>> 6d2b341015f6b9bd730f3a879f2b88f5f681a7c8
            @endforeach
        </ul>
    </div>
@endif

</div>


    <form method="post" action="{{ route('login_action') }}">
        @csrf

        <x-form.text-input
            type="email"
            name="email"
            label="Email"
            placeholder="Seu email"
        />

        <x-form.text-input
            type="password"
            name="password"
            label="Senha"
            placeholder="Digite sua senha"
        />

        <br>

        <div class="login-buttons">
    <x-form.button type="reset" label="Limpar" class="btn-login-reset" />
    <x-form.button label="Login" class="btn-login-submit" />
</div>

<div class="login-register-area">
    <span>Não tem conta?</span>
    <a href="{{ route('register') }}" class="login-register-link">Registre-se</a>
</div>

    </form>
</x-layout>

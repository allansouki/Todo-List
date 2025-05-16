<x-layout page="Registro" :mainClass="'form-register-page'">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <section class="register-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('registerAction') }}">
            @csrf

            <x-form.text-input name="name" label="Nome" placeholder="Seu nome" />
            <x-form.text-input type="email" name="email" label="Email" placeholder="Seu email" />
            <x-form.text-input type="password" name="password" label="Senha" placeholder="Digite sua senha" />
            <x-form.text-input type="password" name="password_confirmation" label="Confirme sua senha" placeholder="Confirme sua senha" />

            <br>

            <div class="login-buttons">
                <x-form.button type="reset" label="Limpar" class="btn-login-reset" />
                <x-form.button label="Registrar-se" class="btn-login-submit" />
            </div>
        </form>
    </section>
</x-layout>

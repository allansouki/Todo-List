<x-layout page="Criar Tarefa" :mainClass="'form-page'">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <form method="post" action="{{ route('task.create_action') }}">
        @csrf

        <x-form.text-input
            name="title"
            label="Título da Task"
            required="required"
            placeholder="Digite a tarefa"
        />

        <x-form.text-input
            type="datetime-local"
            name="due_date"
            label="Data da realização"
            placeholder="Selecione a data"
        />

        <x-form.select-input name="category_id" label="Categoria" placeholder="Selecione a categoria">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-form.select-input>

        <x-form.textarea-input
            name="description"
            label="Descrição da tarefa"
            placeholder="Digite uma descrição"
            required="required"
        />

        <br>

        <x-form.button type="reset" label="Limpar Campos" class="btn-secondary" />
        <x-form.button label="Criar Tarefa" />
    </form>
</x-layout>

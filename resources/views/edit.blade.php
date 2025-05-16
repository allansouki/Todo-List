<x-layout page="Editar Tarefa" :mainClass="'form-page'">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <form method="post" action="{{ route('task.edit_action') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $task->id }}">

        <x-form.checkbox
            name="is_done"
            label="Tarefa realizada?"
            checked="{{ $task->is_done }}"
        />

        <x-form.text-input
            name="title"
            label="Título da Task"
            required="required"
            placeholder="Digite a tarefa"
            value="{{ $task->title }}"
        />

        <x-form.text-input
            type="datetime-local"
            name="due_date"
            label="Data da realização"
            placeholder="Selecione a data"
            value="{{ $task->due_date }}"
        />

        <x-form.select-input name="category_id" label="Categoria" placeholder="Selecione a categoria">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if ($category->id == $task->category_id) selected @endif>
                    {{ $category->title }}
                </option>
            @endforeach
        </x-form.select-input>

        <x-form.textarea-input
            name="description"
            label="Descrição da tarefa"
            placeholder="Digite uma descrição"
            required="required"
            value="{{ $task->description }}"
        />

        <br>

        <x-form.button type="reset" label="Limpar Campos" class="btn-secondary" />
        <x-form.button label="Atualizar Tarefa" />
    </form>
</x-layout>

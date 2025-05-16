<x-layout>

<x-slot:btn>

<a href="{{route('task.create')}}" class="btn btn-primary">Criar tarefa</a>

<a href="{{route('logout')}}" class="btn btn-primary">Sair</a>
</x-slot:btn>
    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do Dia - {{$AuthUser->name}}</h2>
            <hr class="LinhaHeader">
         <a href=" {{route('home' , ['date'=> $date_prev_button])}}">   <img src="/assets/images/icon-prev.png" alt="" srcset="">
         </a>
            {{$date_as_string}}

            <a href=" {{route('home' , ['date' => $date_next_button])}}">
            <img src="/assets/images/icon-next.png" alt="" srcset="">
        </a>
        </div>
        <div class="graph_header-subtitle">Tarefas: <b>{{$feito_tasks_count }}/{{$tasks_count }}</b></div>
        <div class="graph_placeholder"> <canvas id="myChart" width="100" height="100"></canvas> </div>

        <div class="tasks_left_footer">
        <img src="/assets/images/icon-info.png" alt="" srcset="">
        Restam {{$undone_tasks_count}} tarefas para serem finalizadas
    </div>
    </section>

    <section class="list">
        <div class="list_header">
            <select class="list-header_select" onChange="changeTaskStatusFilter(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_pending">Tarefas Pendentes</option>
                <option value="task_done">Tarefas Realizadas</option>
            </select>
        </div>


        <div class="task_list">

        @foreach($tasks as $task )
        <x-task :data=$task>
        </x-task>
        @endforeach


        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function changeTaskStatusFilter(e) {

            if (e.value == 'task_pending') {
                showAllTasks();
                document.querySelectorAll('.task_done').forEach(function(element) {
                    element.style.display = 'none';
                });
            } else if (e.value == 'task_done') {
                showAllTasks()
                document.querySelectorAll('.task_pending').forEach(function(element) {
                    element.style.display = 'none';
                });
            }else{
                showAllTasks()
            }
        }
    </script>

<script>
    function showAllTasks() {
        document.querySelectorAll('.task').forEach(function(element) {
            element.style.display = 'block';
        });
    }
</script>







    <script>
       async function taskUpdate(element) {
    let status = element.checked;
    let taskId = element.dataset.id;
    let url = '{{ route('task.update') }}';

    let rawResult = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'accept': 'application/json'
        },
        body: JSON.stringify({
            status,
            taskId,
            _token: '{{ csrf_token() }}'
        })
    });

    let result = await rawResult.json();

    if (result.status === 'success') {

     //   Swal.fire(result.message); // Exibe "Tarefa atualizada com sucesso!"

        Swal.fire({
        title: result.message,
        timer: 1500
        });


        window.location.href = '{{ route("home") }}'; // Redireciona para a home
    } else {
        alert('Erro ao atualizar tarefa.');
    }
}

    </script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    let tarefa_pendente = "{{$undone_tasks_count}}";
    let tarefa_feita = "{{$feito_tasks_count }}";


    const myChart = new Chart(ctx, {
        type: 'doughnut', // tipos: bar, line, pie, doughnut, etc.
        data: {
            labels: ['Pendentes', 'Reallizados'],
            datasets: [{
                label: 'Tarefas',
                data: [tarefa_pendente, tarefa_feita],
                borderWidth: 1,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


</x-layout>

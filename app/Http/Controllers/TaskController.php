<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        $task->is_done = $request->status;
        $task->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Tarefa atualizada com sucesso!',
            'task' => $task
        ]);
    }





    public function index(){


    }

    public function create(Request $request){

        $categories = Category::all();

        $data['categories'] = $categories;

        return view('create', $data);

    }

    public function create_action(Request $request){

       //  return dd($request->all());

       $task = $request->only(['title', 'category_id', 'description','due_date']);
       $task['user_id'] = 1;

       $bdTask = Task::create($task);

       if ($bdTask) {
           return redirect(route('home'));
       } else {
           return 'Erro ao inserir';
       }





    }



    public function edit(Request $request){

        $id = $request->id;

        $task = Task::find($id);
        if (!$task) {
            return redirect(route('home'));
        }

        $data['task'] = $task;

        $categories = Category::all();

        $data['categories'] = $categories;

        return view('edit',$data);
    }

    public function delete(Request $request){

        $task = Task::find($request->id);
        if (!$task) {
            return 'Erro ao atualizar!';
        }

        $task->delete();

        return redirect(route('home'));
    }


    public function edit_action(Request $request){
        //return dd($request->all());
       $request_data = $request->only(['title','due_date', 'category_id', 'description']);

       $request_data['is_done'] = $request->is_done ? true : false;

       $task = Task::find($request->id);
       if (!$task) {
        return 'Erro ao atualizar!';
    }

      $task->update($request_data);
      $task->save();

      return redirect(route('home'));


    }
}

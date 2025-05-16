<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //



    public function index(Request $request) {

       if($request->date){
        $filteredDate = $request->date;
       }else{
        $filteredDate = date('y-m-d');
       }

        $carbonDate = Carbon::createFromDate($filteredDate);
        Carbon::setLocale('pt_BR');
        $data['date_as_string'] = $carbonDate->translatedFormat('d \d\e F');
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('y-m-d');

        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();
        $data['AuthUser'] = Auth::user();

        $data['tasks_count'] = $data['tasks']->count();
        $data['tasks_pendentes'] =  $data['tasks_count'] /100 * 100;

        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();
        $data['feito_tasks_count'] = $data['tasks']->where('is_done', true)->count();

        return view('home', $data);
    }

}

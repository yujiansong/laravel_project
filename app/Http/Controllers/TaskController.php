<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
{
    public function home()
    {
        return 'hello, jiansong';
    }

    public function store(Request $request)
    {
        $task = new Task();
//        $task->title = Input::get('title');
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();
        return redirect('task');
    }
}

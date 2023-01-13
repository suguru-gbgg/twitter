<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class MainController extends Controller
{
    public function insert(Request $Request)
    {
        Task::where('user_id', '=', Auth::user()->id)->delete();

        for ($i = 0; $i <= $Request->count; $i++){

            $tasks = new Task();

            $a = "text".$i;
            $b = $Request->$a;

            $tasks->user_id = Auth::user()->id;
            $tasks->text = $b;

            $tasks->save();
        }
        return view('index');
    }
} 
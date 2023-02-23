<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class MainController extends Controller
{
    public function insert(Request $Request)
    {
        $tasks = new Task();

        $tasks->user_id = Auth::user()->id;
        $tasks->user_name = Auth::user()->name;
        $tasks->text = $Request->text;

        $tasks->save();
        $db_texts = Task::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('index' ,compact('db_texts'));
    }

    public function front(Request $Request)
    {
        $db_texts = Task::where('user_id', '=', Auth::user()->id)->get();
       
        return view('index' ,compact('db_texts'));
    }
} 
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
        $db_texts = Task::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
       
        return view('index' ,compact('db_texts'));
    }

    public function shousai(Request $Request)
    {
        $text_id = $Request->text_id;

        $db_text = Task::where('id', '=', $text_id)->get();

        return view('shousai' ,compact('db_text'));
        
    }

    public function sakujo(Request $Request)
    {
        $text_id = $Request->text_id;
        
        Task::where('id', '=', $text_id)->delete();

        $db_texts = Task::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('index' ,compact('db_texts'));
        
    }
} 
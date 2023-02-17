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

            $post_name = "text".$i;
            $post_text = $Request->$post_name;

            $tasks->user_id = Auth::user()->id;
            $tasks->user_name = Auth::user()->name;
            $tasks->text = $post_text;

            $tasks->save();
        }
        $db_texts = Task::where('user_id', '=', Auth::user()->id)->get();

        return view('index' ,compact('dbtexts'));
    }

    public function front(Request $Request)
    {
        $db_texts = Task::where('user_id', '=', Auth::user()->id)->get();
       
        return view('index' ,compact('dbtexts'));
    }
} 
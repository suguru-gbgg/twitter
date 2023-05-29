<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Profile;

class MainController extends Controller
{
    public function insert(Request $Request)
    {
        $tasks = new Task();

        $tasks->user_id = Auth::user()->id;
        $tasks->user_name = Auth::user()->name;
        $tasks->text = $Request->text;

        $tasks->save();
        $db_texts = Task::orderBy('id', 'desc')->get();

        return view('index' ,compact('db_texts'));
    }

    public function front(Request $Request)
    {
        $db_texts = Task::orderBy('id', 'desc')->get();
       
        return view('index' ,compact('db_texts'));
    }

    public function shousai(Request $Request)
    {
        $text_id = $Request->text_id;

        $db_texts = Task::where('id', '=', $text_id)->get();

        return view('shousai' ,compact('db_texts'));
    }

    public function sakujo(Request $Request)
    {
        $text_id = $Request->text_id;
        
        Task::where('id', '=', $text_id)->delete();

        $db_texts = Task::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('index' ,compact('db_texts'));
    }

    public function hennshuu(Request $Request)
    {
        $text_id = $Request->text_id;

        $db_texts = Task::where('id', '=', $text_id)->get();

        return view('hennshuu',compact('db_texts'));
    }

    public function kousin(Request $Request)
    {
        $text_id = $Request->text_id;
        $h_text =  $Request->text;
    
        Task::where('id', '=', $text_id)->update([
            'text' =>  $h_text,
        ]);

        $db_texts = Task::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        $profile_texts = Profile::where('user_id', '=', Auth::user()->id)->get();

        return view('index' ,compact('db_texts'));
    }

    public function profile(Request $Request)
    {
        $user_id = $Request->user_id;
       
        $db_texts = Task::where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
        $profile_texts = Profile::where('user_id', '=', Auth::user()->id)->get();

        return view('profile' ,compact('db_texts','profile_texts'));
    }

    public function self_intr(Request $Request)
    {
        $profiles = Profile::where('user_id', '=', Auth::user()->id)->first();

        $self_text = $Request->self_text;

        return view('self_intr',compact('self_text'));    
    }

    public function self_insert(Request $Request)
    {
        $profile = new Profile();

        $profile->user_id = Auth::user()->id;
        $profile->user_name = Auth::user()->name;
        $profile->self = $Request->self;
        dd($Request->self);

        $profile->save();

        $profile_texts = Profile::where('user_id', '=', Auth::user()->id)->get();
        $db_texts = Task::orderBy('id', 'desc')->get();
        
        return view('profile' ,compact('db_texts','profile_texts'));
    }

    public function self_update(Request $Request)
    {

        $profile = new Profile();

        $self_text = $Request->self;

        Profile::where('user_id', '=', Auth::user()->id)->update([
            'self' =>  $self_text,
        ]);


        $profile_texts = Profile::where('user_id', '=', Auth::user()->id)->get();
        $db_texts = Task::orderBy('id', 'desc')->get();
        
        return view('profile' ,compact('db_texts','profile_texts'));
    }    
} 
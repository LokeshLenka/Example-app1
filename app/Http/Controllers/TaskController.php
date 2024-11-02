<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Task;

class TaskController extends Controller
{
    public function create(){
        return view('tasks.create');
    }
}

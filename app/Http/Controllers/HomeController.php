<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Section;
use App\Models\PerformanceAnswers;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users=User::count();
        $departments=Department::count();
        $sections=Section::count();
        $responses=PerformanceAnswers::count();


        return view('dashboard',compact('users','departments','sections','responses'));
    }
}

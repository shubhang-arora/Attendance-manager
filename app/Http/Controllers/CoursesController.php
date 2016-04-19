<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCourse(Request $request){
        dd($request->all());
    }
    public function dd(){
        dd(time());
    }
}

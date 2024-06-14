<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function Course(){
        try {
            $courses = DB::table('course')->paginate(5);
            return view('Course')->with('courses', $courses);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    //
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function SaveCourse(Request $request)
    {
        try {
            $request->validate([
                'course' => 'required|max:50',
            ]);
            Course::SaveCourse(request('course'));
            return redirect('Home');
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    public function getCourses()
    {
        try {
            $courses = DB::table('course')->paginate(10);
            return view('ListCourse')->with('courses', $courses);
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}

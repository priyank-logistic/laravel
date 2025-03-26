<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Yajra\DataTables\DataTables as DataTables;

class StudentController extends Controller
{
    //
    function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::query();
            return DataTables::of($students)->make(true); 
        }
        return view("students");
    }

}

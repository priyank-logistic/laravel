<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;

class StudentController extends Controller
{
    //
    function index(Request $request){
        if ($request->ajax()) {
            $students = Student::select('*');
    
            return DataTables::of($students)
            ->addColumn('is_active', function($row){
                if($row->is_active){
                   return 'Active';
                }else{
                   return 'inactive';
                }
           })
            ->filter(function ($query) use ($request) {
                if ($request->get('is_active') == '0' || $request->get('is_active') == '1') {

                    $query->where('is_active', $request->get('is_active'));
                }
                if (!empty($request->get('search'))) {
                     $query->where(function($para) use($request){
                        $search = $request->get('search');
                        $para->orWhere('name', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%");
                    });
                }
            })
            ->make(true); 
            
        }
        return view("students");
    }

    function sendEmail(){
        $to = 'priyankviradiya227@gmail.com';
        $msg = 'you have successfully completed the task';
        $subject = 'congratulation';
        Mail::to($to)->send(new sendEmail($msg,$subject)); 
    return "Email Send";
    }

}


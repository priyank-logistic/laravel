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
            $students = Student::All()->append('password');

            if($request->is_active == "0" || $request->is_active == "1"){
                $students = Student::query()->whereIn('is_active',[$request->is_active]);
            }
            
            return DataTables::of($students)->make(true);
        }
        return view("students");
    }

    function delete($id){
        $student = Student::findOrFail($id);
        if($student){
            $student->delete();
            return response()->json(["status"=> "success","message"=> "student deleted"]);
        }
        else{
            return response()->json(["status"=> "error","message"=> "student not deleted"]);
        }

    }
    
    function sendEmail(){
        $to = 'priyankviradiya227@gmail.com';
        $msg = 'you have successfully completed the task';
        $subject = 'congratulation';
        Mail::to($to)->send(new sendEmail($msg,$subject)); 
    return "Email Send";
    }

    function addStudent(){
        $student =  new Student;
        $student->name = "priyank";
        $student->email = "priyankviradiya2@gmail.com";
        $student->state = "Gujarat";
        $student->phone = "7452136985";
        $student->is_active = "1";
        if($student->save()){
            return "Student Saved";
        }
        else{
            return "Student not Saved";
        }
    }

    function updateSubscription($id){
        $student = Student::find($id);
        if($student){
            $student->subscriptionDays(12);
            return response()->json(["status"=> "success","message"=> "days add successfully"]);
        }
        else{
            return response()->json(["status"=> "error","message"=> "student not found"]);
        }

    }

}


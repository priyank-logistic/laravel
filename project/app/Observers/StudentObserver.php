<?php

namespace App\Observers;

use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        //
        $refernce = random_int(100000, 999999);
        $student->reference_code = $refernce;
        $student->save();
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        // 
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        //
        $to = 'priyankviradiya227@gmail.com';
        $msg = 'You Have Successfully Delete the Student '.$student->name;
        $subject = 'Delete Student';
        Mail::to($to)->send(new sendEmail($msg,$subject)); 

    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}

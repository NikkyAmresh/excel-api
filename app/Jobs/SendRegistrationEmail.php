<?php

namespace App\Jobs;

use App\Mail\RegistrationConfirmation;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function handle()
    {
        Mail::to($this->student->email)->send(new RegistrationConfirmation($this->student->name,$this->student->email,$this->student->phone));
    }
}
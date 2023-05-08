<?php

namespace App\Imports;

use App\Jobs\SendRegistrationEmail;
use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentsImport implements ToCollection, WithChunkReading, ShouldQueue
{
    public function collection(Collection $rows)
    {
        $rows->shift();
        foreach ($rows as $row) {
            $student = new Student();
            $student->name = $row[0];
            $student->email = $row[1];
            $student->phone = $row[2];
            $student->save();

            SendRegistrationEmail::dispatch($student);
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
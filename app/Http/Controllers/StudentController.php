<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new \App\Imports\StudentsImport, $request->file('file')->store('files'));

        return response()->json(['message' => 'Import successful']);
    }

    public function getStudents(Request $request)
    {
        $students = Student::paginate(10);

        return response()->json($students);
    }
}
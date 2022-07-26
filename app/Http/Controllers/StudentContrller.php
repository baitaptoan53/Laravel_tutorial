<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class StudentContrller extends Controller
{
    public function index()
    {
        $student = student::all();
        //hien thi view trong folder student trong do co file index
        return view('students.index', [
            'students' => $student
        ]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $student = new student();
        $student->fist_name = $request->get('fist_name');
        $student->last_name = $request->get('last_name');
        $student->birthdate = $request->get('birthdate');
        $student->gender = $request->get('gender');
        $student->save();
        return redirect()->route('student.index');
    }
}

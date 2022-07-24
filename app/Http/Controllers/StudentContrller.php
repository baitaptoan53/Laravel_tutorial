<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
}

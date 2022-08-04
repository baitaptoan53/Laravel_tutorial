<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\student;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class StudentContrller extends Controller
{
    public function index(Request $request)
    {
        // $age = \Carbon\Carbon::parse($request->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y');
        $search = $request->get('q');
        $student = student::query()
        ->where('last_name', 'like', '%' . $search . '%')
        ->orWhere('fist_name', 'like', '%' . $search . '%')
        // ->orWhere('age', 'like', '%' . $search . '%')
        ->paginate(5);
        $student ->appends(['q' => $search]);
        
        //hien thi view trong folder student trong do co file index
        return view('students.index', [
            'students' => $student,
            'search' => $search
        ]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(StoreRequest $request)
    {
        $student = new student();
        $student->fist_name = $request->get('fist_name');
        $student->last_name = $request->get('last_name');
        $student->birthdate = $request->get('birthdate');
        $student->gender = $request->get('gender');
        $student->save();
        return redirect()->route('student.index');
    }
    public function destroy(student $student)
    {
        // student::where('id',$student)->delete();
        $student->delete();
        return redirect()->route('student.index');
    }
    public function edit(student $student)
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }
    public function update(UpdateRequest $request, student $student)
    {
        $student->update(
            $request->except(['_token', '_method'])
        );
        return redirect()->route('student.index');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\student;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
class StudentContrller extends Controller
{
    public function index()
    {
        return view('students.index');
    }
    public function api()
    {
        return Datatables::of(student::query())->make(true);
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
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
        return Datatables::of(student::query())
        //conection full name
        ->addColumn('full_name', function (student $student) {
            return $student->first_name . ' ' . $student->last_name;
        })
        ->addColumn('edit', function ($object) {
            return route('student.edit', $object);
        })
        ->addColumn('destroy', function ($object) {
            return route('student.destroy', $object);
        })
        ->make(true);
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
    public function destroy($student)
    {
        // student::where('id',$student)->delete();
        // $student->delete();
        // return redirect()->route('student.index');
        student::destroy($student);
        $arr = [];
        $arr['status'] = true;
        $arr['message'] = '';
        return response($arr, 200);
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
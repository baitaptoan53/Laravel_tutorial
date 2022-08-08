<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\student;
use App\Models\Course;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Enums\StudentStatus;

class StudentContrller extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new student();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' ', $arr);
        $arrStudentStatus = StudentStatus::getArrayView();

        View::share('arrStudentStatus', $arrStudentStatus);
        View::share('title', $title);
    }

    public function index()
    {
        return view('students.index');
    }

    public function api()
    {
        return Datatables::of($this->model::query())
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
        $course = Course::query()->get();
        return view('students.create',
    [
        'course' => $course,
    ]);
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
        $this->model::destroy($student);
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

    public function update(UpdateRequest $request, $student)
    {
        $student->update(
            $request->except(['_token', '_method'])
        );
        return redirect()->route('student.index');
    }
}

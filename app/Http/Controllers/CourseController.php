<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Yajra\Datatables\Datatables;
use App\Enums\CourseStatus;
use App\Models\student;


class CourseController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Course();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' ', $arr);
        $arrCourseStatus = CourseStatus::getArrayView();

        View::share('title', $title);
        View::share('arrCourseStatus', $arrCourseStatus);
    }
    public function index()
    {
        return view('courses.index');
    }
    public function api()
    {
        return Datatables::of($this->model::query())
            ->addColumn('edit', function ($object) {
                return route('courses.edit', $object);
            })
            ->addColumn('destroy', function ($object) {
                return route('courses.destroy', $object);
            })
            ->make(true);
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store(StoreCourseRequest $request)
    {
        $course =new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->teacher=$request->teacher;
        $course->save();
        return redirect()->route('courses.index');
    }
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

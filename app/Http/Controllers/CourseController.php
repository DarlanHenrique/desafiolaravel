<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\User;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('admin.courses.index',compact('courses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        $categories = Category::all();
        return view('admin.courses.create',compact('course', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $slug = Str::slug("$request->name", '-');
        $data = $request->all();
        if ($request->hasfile('image_link')) {
            $extension = $request->image_link->getClientOriginalExtension();
            $nameFile = "$slug.{$extension}";
            $request->image_link->storeAs('public/img', $nameFile);
            $data['image_link'] = $nameFile;
        } else {
            unset($data['image_link']);
        }
        $data['slug'] = $slug;
        $link = $request->video;
        $link = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$link);
        $data['video'] = $link;
        Course::create($data);
        return redirect()->route('courses.index')->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.show',compact('course', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.edit',compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $slug = Str::slug("$request->name", '-');
        $data = $request->all();
        if ($request->hasfile('image_link')) {
            Storage::delete('public/img' . $course->image_link);
            $extension = $request->image_link->getClientOriginalExtension();
            $nameFile = "$slug.{$extension}";
            $request->image_link->storeAs('public/img', $nameFile);
            $data['image_link'] = $nameFile;
        } else {
            unset($data['image_link']);
        }
        $data['slug'] = $slug;
        $course->update($data);
        return redirect()->route('courses.index')->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        Storage::delete('public/img', $course->image_link);
        return redirect()->route('courses.index')->with('success',true);
    }
}

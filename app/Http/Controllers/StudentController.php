<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Spatie\Backtrace\Backtrace;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = 'students.';
    const PATH_UPLOAD = 'students';


    public function index()
    {
        $data = Student::latest()->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'code' => 'required|unique:students',
            'name' => 'required',
            'img' => 'required|image|max:5000',
            'note' => 'nullable',
            'status' => ['required', Rule::in([Student::STATUS_ABSENT, Student::STATUS_PRESENT])]
        ]);
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        Student::create($data);
        return back()->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

        return view(self::PATH_VIEW . __FUNCTION__, compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'class_name' => 'required',
            'code' => [
                'required',
                Rule::unique('students')->ignore($student->id)
            ],
            'name' => 'required',
            'img' => 'nullable|image|max:5000',
            'note' => 'nullable',
            'status' => [
                'required',
                Rule::in([Student::STATUS_ABSENT, Student::STATUS_PRESENT])
            ]
        ]);
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        $oldImg = $student->img;
        $student->update($data);
        if ($request->hasFile('img')) {
            Storage::delete($oldImg);
        }
        return back()->with('msg', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        if (Storage::exists($student->img)) {
            Storage::delete($student->img);
        }
        return redirect()->route('students.index')->with('success', 'Post deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent()
    {
        return view('add-student');
    }
    public function storeStudent(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time(). '.'. $image->extension();
        $image->move(public_path('images'),$imageName);

        $student = new Student();
        $student->name = $name;
        $student->profileimage = $imageName;
        $student->save();

        return redirect()->route('all.student')->with('msg','Student record has been inserted')->with('msg-type','success');
    }
    public function student()
    {
        $students = Student::all();
        return view('all-student',compact('students'));
    }
    public function editStudent($id)
    {
        $student = Student::find($id);
        return view('edit-student',compact('student'));
    }
    public function updateStudent(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time(). '.'. $image->extension();
        $image->move(public_path('images'),$imageName);

        $student = Student::find($request->id);
        $student->name = $name;
        $student->profileimage = $imageName;
        $student->save();
        return redirect()->route('all.student')->with('msg','Student Edit Successfull')->with('msg-type','info');
    }
    public function deleteStudent($id)
    {
        $student = Student::find($id);
        unlink(public_path('images').'/'.$student->profileimage);
        $student->delete();
        return back()->with('msg','Student delete Successfull')->with('msg-type','error');
    }
}

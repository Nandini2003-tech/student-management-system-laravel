<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{    
    public function dashboard()
    {
        return view('dashboard');
    }

/**    
* Display a listing of the resource.
*/
    public function index(Request $request)
    {
        $search =$request->search;
        $students= Student::with('Department')
        ->where('name','like',"%$search%")
        ->orWhere('email','like',"%$search%")
        ->orWhere('gender','like',"%$search%")
        ->orWhere('address','like',"%$search%")
        ->paginate('5')
        ->withQueryString();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        $departments= Department::all();
            return view('students.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=>'required|email|unique:students,email',
            'phone'=>'nullable|string|max:15',
            'department_id'=>'required|exists:departments,id',
            'address'=>'required|string',
            'gender'=>'required|in:male,female,other',
            'image'=>'nullable|max:2048|image',
        ]);
        try{
        if($request->hasFile('image')){
            $file= $request->file('image');
            $fileName=time().$file->getClientOriginalName();
            $path = $file->storeAs('students',$fileName,'public');
            $data['image']=$path;
        }
        Student::create($data);
        return redirect()->route('students.index')->with('success', "Student added successfully!");
        }catch(Exception $e){
        return redirect()->back()
        ->withInput()
        ->with('error', "Student could bot be added. Please try again!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student= $student;
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
          $departments=Department::all();
    //    $students= Student::with('Department')->get();
       return view('students.edit', compact('student','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Student $student)
    {
        $data =$request->validate([
            'name'=> 'required|string|max:255',
            'email'=>'required|email|unique:students,email,'.$student->id,
            'phone'=>'nullable|string|max:15',
            'department_id'=>'required|exists:departments,id',
            'address'=>'required|string',
            'gender'=>'required|in:male,female,other',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        try{
             
        if($request->hasFile('image')){
            if($student->image){
            Storage::disk('public')->delete($student->image);
            }
            $file= $request->file('image');
            $fileName=time().$file->getClientOriginalName();
            $path = $file->storeAs('students',$fileName,'public');
            $data['image']=$path;
        }
      
        $student->update($data);        
        return redirect()->route('students.index')->with('success','Student updated successfully');
        }catch(Exception $e){
          return redirect()->back()->with('error', 'Student could not be updated. Please try again!');
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if($student->image){
            Storage::disk('public')->delete($student->image);
        }
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }
}

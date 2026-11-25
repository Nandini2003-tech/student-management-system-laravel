<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $TotalStudents= Student::count();
        $TotalDepartments= Department::count();
        $TotalMale= Student::where('gender','male')->count();
        $TotalFemale= Student::where('gender','female')->count();
   
        $latestStudents= Student::with('Department')->latest()->take(5)->get();

     $latestStudentsCount= Student::latest()->take(5)->get()->count();

          return view('dashboard', compact('TotalStudents','TotalDepartments','TotalMale','TotalFemale','latestStudentsCount','latestStudents'));
    }
}

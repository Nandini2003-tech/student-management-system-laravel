@extends('layouts.app2')
@section('content')
<div class="container min-h-full">
<div class="row  d-flex justify-content-center align-items-center min-h-full">
<div class="col-md-8 col-lg-10">
<div class="card shadow-sm mx-auto">
<div class="card-header text-center bg-dark text-light fs-2">
Student Detalis
</div>
<div class="card-body p-4">
<div class="d-flex align-items-center gap-3 mb-4">
<div>
@if($student->image)
<img src="{{asset('storage/'. $student->image)}}"  alt="Student Image" width="80" height="80" class="rounded-circle">
@else
<img src="{{asset('images/default.webp')}}"  alt="Student Image"  width="80" height="80"  class="rounded-circle">
@endif
</div>
<div class="d-flex flex-column">
<Strong class="fs-3 text-capitalize">{{$student->name}}</Strong>
<small class="text-muted">Student ID:#{{$student->id}}</small>
</div>
</div>
<hr>

<div class="my-3">
<b class="fs-5">Personal Information</b>

<div class="row mt-2">

<div class="col-md-6">
<b>Full Name</b>
<p class="text-capitalize">{{$student->name}}</p>
</div>

<div class="col-md-6">
<b>Email</b>
<p>{{$student->email}}</p>
</div>

</div>

<div class="row">
<div class="col-md-6">
<b>Phone</b>
<p>{{$student->phone}}</p>
</div>
<div class="col-md-6">
<b>Gender</b>
<p class="text-capitalize">{{$student->gender}}</p>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Department</b>
<p>{{$student->department->name}}</p>
</div>
<div class="col-md-6">
<b>Created At</b>
<p>{{$student->created_at}}</p>
</div>
</div>
<div class="col-12">
<b class="">Address</b>
<p class="text-capitalize">{{$student->address}}</p>
</div>
<div class="d-flex justify-content-end gap-2">
<a href="{{route('dashboard')}}" class="btn btn-secondary">Back</a>

<a href="{{route('students.index')}}" class="btn btn-primary">View Students</a>

<a href="{{route('students.edit',$student->id)}}" class="btn btn-warning">Edit Student</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
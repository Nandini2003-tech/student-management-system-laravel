@extends('layouts.app2')
@section('content')
<div class="container">
<!-- dashboard header -->
<div class="mb-3 d-flex justify-content-between">
<div>
<h2 class="fw-bold mb-0">Dashboard</h2>
<p class="text-muted mb-0 mt-1 text-capitalize">Welcome {{Auth::user()->name}}</p>
</div>

<div>
<a href="{{route('students.create')}}" class="btn btn-success">+ Add Student</a>
</div>
</div>

<div class="row g-3 mb-4">
<div class="col-lg-3 col-md-6 mb-3">
<div class="card bg-secondary-subtle shadow text-center p-4 h-100">
<div class="card-body">
<i class="bi bi-person-add fs-2"></i>
<h5 class="card-title">Total Students</h5>
<b class="card-text fs-1 fw-semibold">
{{$TotalStudents}}
</b>
</div>
</div>
</div>

<div class="col-lg-3 col-md-6 mb-3">
<div class="card bg-success-subtle shadow text-center p-4 h-100">
<div class="card-body">
<i class="bi bi-book-half fs-2"></i>
<h5 class="card-title">Total Departments</h5>
<b class="card-text fs-1 fw-semibold">{{$TotalDepartments}}</b>
</div>
</div>
</div>

<div class="col-lg-3 col-md-6 mb-3">
<div class="card bg-info-subtle shadow text-center p-4 h-100">
<div class="card-body">
<i class="bi bi-gender-male fs-2 "></i>
<h5 class="card-title">Total Male</h5>
<b class="card-text fs-1 fw-semibold">{{$TotalMale}}</b>
</div>
</div>
</div>

<div class="col-lg-3 col-md-6 mb-3">
<div class="card bg-danger-subtle shadow text-center p-4 h-100">
<div class="card-body">
<i class="bi bi-gender-female fs-2"></i>
<h5 class="card-title">Total Female</h5>
<b class="card-text fs-1 fw-semibold">{{$TotalFemale}}</b>
</div>
</div>
</div>

</div>

<!-- recent added -->
<div class="row mb-3 justify-content-center align-items-center">
<div class="col-md-12">

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{session('success')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card my-2"> 
<div class="card-header  bg-success-subtle d-flex justify-content-between align-items-center flex-wrap flex-md-column">
<h5 class="fw-bold pt-2 fs-3">Recently added Students</h5>
<b class="text-muted">Latest : {{$latestStudentsCount}}</b>
</div>
<div class="table-responsive">
<table class="table align-middle table-hover w-full">
<thead>
<tr class="fs-6">
<th>Id</th>
<th>Name</th>
<th>Department</th>
 <th>Action</th>
                    <th>Status</th>
</tr>
</thead>
<tbody>
@foreach($latestStudents as $student)
<tr>
<td class="">{{$student->id}}</td>
<td class="card-title text-capitalize fw-semibold">{{$student->name}}</td>
<td class="card-text">{{$student->department->name}} </td>
<td> <a href="{{route('students.show',$student->id)}}" class="btn btn-primary btn-sm"> View</a></td>
<td> 
@if($student->created_at && $student->created_at->greaterThanOrEqualTo(now()->subDays(7)))
<span class="badge bg-success p-2">New</span>
 @else
        <span class="text-muted">-</span>
    @endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="card-footer bg-success-subtle">
<a href="{{route('students.index')}}" class="">View all students -></a>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
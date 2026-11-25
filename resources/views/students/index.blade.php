@extends('layouts.app2')
@section('content')
<div class="container mt-0">
<h2 class="text-center">All Students</h2>
<div>
<form action="{{route('students.index')}}" method="get">
<div class="d-flex justify-content-between gap-2 mb-3">
<input type="text" class="w-100 p-2 rounded" name="search" placeholder="Search here" value="{{ request('search') }}">

<button class="btn btn-warning rounded" type="submit"> <i class="bi bi-search me-1 fs-5"></i></button>

<a href="{{route('students.index')}}" class="btn btn-dark rounded" type="submit"><i class="bi bi-arrow-clockwise me-1 fs-5"></i></a>
</div>
</form>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{session('success')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive">
<table class="table  align-middle table-bordered  table-striped table-hover w-100">
<thead class="table-dark fw-semibold text-capitalize">
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Department</th>
<th>Address</th>
<th>Gender</th>
<th>Image</th>
<th>Actions</th>
</tr>
</thead>
<tbody class="bg-danger">
@if($students->count()>0)
@foreach($students as $student)
<tr class="align-middle">
<td>{{$student->id}}</td>
<td class="text-capitalize">{{$student->name}}</td>
<td>{{$student->email}}</td>
<td>{{$student->phone}}</td>
<td>{{$student->department->name}}</td>
<td>{{$student->address}}</td>
<td>{{$student->gender}}</td>
<td>
@if($student->image)
<img src="{{asset('storage/'.$student->image)}}" width="60" height="60" class="rounded">
@else
<img src="{{asset('images/default.webp')}}" alt="" width="60" height="60" class="rounded">
@endif
</td>
<td>
<div class="d-flex gap-2 justify-content-around align-items-center">
<a href="{{route('students.show',$student->id)}}" class="btn btn-primary btn-sm"> View</a>
<a href="{{route('students.edit',$student->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>

<form action="{{route('students.destroy',$student->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger"> <i class="bi bi-trash3"></i></button>
</form>

</div>
</td>
</tr>
@endforeach
@else
<tr>
<td class="text-center text-muted py-4" colspan="9">
<strong>No Student Records Found</strong>
</td>
</tr>
@endif
</tbody>
</table>
{{$students->links()}}
</div>
</div>
</div>
@endsection
@extends('layouts.app2')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-md-10">
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>{{session('error')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card shadow light-yellow">
<div class="card-header bg-warning">
<h3 class=" text-dark text-center fs-2 fw-bold  m-0">Edit Student</h3>
</div>
<div class="card-body p-3 p-md-4">
<form action="{{route('students.update',$student)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row mb-3">
        <div class="col-md-6">
                <label for="" class="form-label fw-medium">Enter Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" value="{{old('name', $student->name)}}"><br>
                @error('name')
                <small class="invalid-feedback">
                        {{$message}}
                </small>
                @enderror
        </div>
        <div class="col-md-6">
                <label for="" class="form-label fw-medium">Enter Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{old('email', $student->email)}}"><br>
                @error('email')
                <small class="invalid-feedback">
                        {{$message}}
                </small>
                @enderror
        </div>
</div>

<div class="row mb-3">
        <div class="col-md-6">
                <label for="" class="form-label fw-medium"> Phone</label>
                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" placeholder="Phone" value="{{old('phone', $student->phone)}}"><br>
                @error('phone')
                <small class="invalid-feedback">
                        {{$message}}
                </small>
                @enderror
        </div>

        <div class="col-md-6">
                <label for="" class="form-label fw-medium">Department</label>
                <select name="department_id" class="form-select @error('department_id') is-invalid @enderror"> <br><br>
                        <option value="">Select Department</option>
                        @foreach($departments as $dept)
                        <option value="{{$dept->id}}"
                                {{old('department_id', $student->department_id) == $dept->id ? 'selected' :''}}>
                                {{$dept->name}}
                        </option>
                        @endforeach
                </select>
                @error('department_id')
                <small class="invalid-feedback">
                        {{$message}}
                </small>
                @enderror
        </div>
</div>

<div class="row">
<div class="col-12">
<label for="" class="form-label fw-medium">Address</label>
<textarea class="form-control @error('address') is-invalid @enderror"  placeholder="address" name="address">{{old('address', $student->address)}}</textarea><br>
@error('address')
<small class="invalid-feedback">
        {{$message}}
</small>
@enderror
</div>
</div>

<div class="row mb-3">
<div class="col-12">
<label for="" class="form-label fw-medium">Gender</label><br>

<div class="form-check d-flex gap-sm-5 flex-wrap">
        <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="male"
                        {{old('gender', $student->gender)== 'male' ? 'checked' : ''}}>
                <label class="form-check-label">Male</label>
        </div>
        <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female"
                        {{old('gender',$student->gender)== 'female' ? 'checked' : ''}}>
                <label class="form-check-label">Female</label>
        </div>
        <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="other"
                        {{old('gender',$student->gender)== 'other' ? 'checked' : ''}}>
                <label class="form-check-label">Other</label>
        </div>
</div>
@error('gender')
<small class="text-danger">
        {{$message}}
</small>
@enderror

</div>
</div>

<div class="row mb-3">
<div class="col-12">
<!-- previous image -->
<div class="mb-3">
<label for="" class="form-label fw-medium"> Student Current Image</label> <br>
 @if($student->image)
<img src="{{asset('storage/'. $student->image)}}"  alt="Student Image" width="200"  height="150"  class="rounded object-fit-cover>" <br>
 @else
        <img src="{{ asset('images/default.webp') }}"
             alt="Default Image"
             width="200" height="150"
             class="rounded object-fit-cover">
    @endif
</div>

<div>
        <label for="" class="form-label fw-medium">Upload New Image</label>
<input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
@error('image')
<small class="invalid-feedback">
        {{$message}}
</small>
@enderror
</div>
</div>
</div>

<button type="submit" class="btn btn-warning w-100">Update</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
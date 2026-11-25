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
                            <div class="card shadow light-green">
                                    <div class="card-header bg-success text-white">
                                            <h3 class="text-center fw-bold m-0"> Add Student</h3>
                                            <p class=" text-md-center mb-0 mt-1 text-lg-start">
                                                    Fill the student details below.
                                            </p>
                                    </div>

                                    <div class="card-body p-3 p-md-4">
                                            <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                    <label for="" class="form-label fw-medium">Enter Name</label>
                                                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                                                                    @error('name')
                                                                    <small class="invalid-feedback">
                                                                            {{$message}}
                                                                    </small>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                    <label for="" class="form-label fw-medium">Enter Email</label>
                                                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{old('email')}}">
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
                                                                    <input class="form-control  @error('phone') is-invalid @enderror" type="tel" name="phone" placeholder="Phone" value="{{old('phone')}}">
                                                                    @error('phone')
                                                                    <small class="invalid-feedback">
                                                                            {{$message}}
                                                                    </small>
                                                                    @enderror
                                                            </div>

        <div class="col-md-6">
                <label for="" class="form-label fw-medium">Department</label>
                <select name="department_id" class="form-control  @error('department_id') is-invalid @enderror"> <br><br>
                        <option value="">Select Department</option>
                        @foreach($departments as $dept)
                        <option value="{{$dept->id}}"
                                {{old('department_id') == $dept->id ? 'selected' :''}}>
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

                                                    <div class="row mb-3">
                                                            <div class="col-12">
                                                                    <label for="" class="form-label fw-medium">Address</label>
                                                                    <textarea class="form-control  @error('address') is-invalid @enderror" placeholder="address" name="address">{{old('address')}}</textarea>
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

                <div class=" d-flex gap-sm-4 flex-wrap form-check">
                        <div>
                                <input class="form-check-input" type="radio" name="gender" value="male"
                                        {{old('gender')== 'male' ? 'checked' : ''}}>
                                <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female"
                                        {{old('gender')== 'female' ? 'checked' : ''}}>
                                <label class="form-check-label">Female</label>
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="other"
                                        {{old('gender')== 'other' ? 'checked' : ''}}>
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
                                                                    <label for="" class="form-label fw-medium">Upload Student Image</label>
                                                                    <input class="form-control  @error('image') is-invalid @enderror" type="file" name="image"><br>
                                                                    @error('image')
                                                                    <small class="invalid-feedback">
                                                                            {{$message}}
                                                                    </small>
                                                                    @enderror
                                                            </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-success w-100">Save</button>
                                            </form>
                                    </div>

                            </div>

                    </div>
            </div>
    </div>
    @endsection
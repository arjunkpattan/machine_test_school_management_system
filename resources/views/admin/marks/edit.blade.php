@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-4">
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Edit Details</h3>
                            <!-- <a class="btn btn-primary btn-sm mr-2" href="@yield('createRoute')">Add new</a> -->
                            <a class="btn btn-success" href="{{ route('student-marks.index') }}"> Go back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
             
                    <!--- Form starts -->
                    <form action="{{ route('student-marks.update',$student_mark->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="student_id"> Student <small style="color:red;">*</small> </label>
                                        <select id="user_type" disabled name="student_id" required class="form-control">
                                        <option value="" > -- Select Student-- </option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}" @if($student_mark->student_id == $student->id) selected @endif>{{ $student->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="term"> Term <small style="color:red;">*</small> </label>
                                        <select id="user_type" name="term" required class="form-control">
                                        <option value="" > -- Select Student-- </option>
                                        <option value="One" @if($student_mark->term == 'One') selected @endif >One</option>
                                        <option value="Two" @if($student_mark->term == 'Two') selected @endif >Two</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4 mb-4">
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <h3> Subject Details</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="maths" class="control-label">Maths <small style="color:red">* </small> </label>
                                        <input type="text" id="maths" name="maths" placeholder="Enter marks" required class="form-control {{$errors->has('maths') ? 'is-invalid' : ''}}" value="{{$student_mark->maths}}">
                                        @if($errors->has('maths'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('maths')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="science" class="control-label">Science <small style="color:red">* </small> </label>
                                        <input type="text" id="science" name="science" placeholder="Enter marks" required class="form-control {{$errors->has('science') ? 'is-invalid' : ''}}" value="{{$student_mark->science}}">
                                        @if($errors->has('science'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('science')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="computer" class="control-label">computer <small style="color:red">* </small> </label>
                                        <input type="text" id="computer" name="computer" placeholder="Enter marks" required class="form-control {{$errors->has('computer') ? 'is-invalid' : ''}}"  value="{{$student_mark->computer}}">
                                        @if($errors->has('computer'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('computer')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                            <a href="{{ route('student-marks.store') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
@endsection
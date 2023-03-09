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
                    <h3 class="card-title">Add Marks</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <form action="{{ route('student-marks.store') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="student_id"> Student <small style="color:red;">*</small> </label>
                                        <select id="student_id" name="student_id" required class="form-control">
                                        <option value="" > -- Select Student-- </option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            @endforeach
                                            @if($errors->has('student_id'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('student_id')}}</strong>
                                            </span>
                                        @endif
                                        </select>
                                
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="term"> Term <small style="color:red;">*</small> </label>
                                        <select id="user_type" name="term" required class="form-control">
                                        <option value="" > -- Select Student-- </option>
                                        <option value="One">One</option>
                                        <option value="Two">Two</option>

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
                                        <input type="text" id="maths" name="maths" placeholder="Enter marks" required class="form-control {{$errors->has('maths') ? 'is-invalid' : ''}}" value="{{old('maths')}}">
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
                                        <input type="text" id="science" name="science" placeholder="Enter marks" required class="form-control {{$errors->has('science') ? 'is-invalid' : ''}}" value="{{old('science')}}">
                                        @if($errors->has('science'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('science')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="computer" class="control-label">Computer <small style="color:red">* </small> </label>
                                        <input type="text" id="computer" name="computer" placeholder="Enter marks" required class="form-control {{$errors->has('computer') ? 'is-invalid' : ''}}" value="{{old('computer')}}">
                                        @if($errors->has('computer'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('computer')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

          

                            
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('student-marks.store') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
@endsection
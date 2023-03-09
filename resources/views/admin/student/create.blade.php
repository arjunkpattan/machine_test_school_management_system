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
                    <h3 class="card-title">Add Student</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <form action="{{ route('students.store') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Name <small style="color:red">* </small> </label>
                                        <input type="text" id="name" name="name" required class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('name')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="age" class="control-label">Age <small style="color:red">* </small> </label>
                                        <input type="text" id="age" name="age" required class="form-control {{$errors->has('age') ? 'is-invalid' : ''}}" value="{{old('age')}}">
                                        @if($errors->has('age'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('age')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="gender" class="control-label"> Gender <small style="color:red;">*</small></label><br/>
                                        <div class="ml-3">
                                            <input type="radio" id="male" name="gender" value="M" class="form-check-inline" required ><label class="form-check-label" for="male"> Male </label> 
                                            <input type="radio" id="female" name="gender" value="F" class="form-check-inline" ><label class="form-check-label" for="female"> Female </label>
                                                @if($errors->has('gender'))
                                                <span class="help-block error invalid-feedback">
                                                    <strong>{{$errors->first('gender')}}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="number" class="control-label">Mob Number <small style="color:red">* </small> </label>
                                        <input type="text" id="number" name="number" required class="form-control {{$errors->has('number') ? 'is-invalid' : ''}}" value="{{old('number')}}">
                                        @if($errors->has('number'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('number')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email <small style="color:red">* </small> </label>
                                        <input type="text" id="email" name="email" required class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <span class="help-block error invalid-feedback">
                                                <strong>{{$errors->first('email')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="age" class="control-label">Country <small style="color:red">* </small> </label>
                                        <select id="country-dd" class="form-control" name="country_id" >
                                            <option value="">Select Country</option>
                                                @foreach ($countries as $data)
                                                <option value="{{$data->id}}">
                                                    {{$data->name}}
                                                </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="age" class="control-label">State <small style="color:red">* </small> </label>
                                        <select id="state-dd" name="state_id" class="form-control">
                                        </select>
                                    </div>
                                </div>

                            
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('students.store') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>


@section('additionalScripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection


@endsection

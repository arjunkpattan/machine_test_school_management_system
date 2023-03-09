@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-4">
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Student Details</h3>
                            <!-- <a class="btn btn-primary btn-sm mr-2" href="@yield('createRoute')">Add new</a> -->
                            <a class="btn btn-success" href="{{ route('students.create') }}"> Add Student</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Mob Number</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $key => $student)
                        <tr>
                            @php
                            $i=1;
                            @endphp
                            <td>{{ ++$key }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->number }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->country->name }}</td>
                            <td>{{ $student->state->name }}</td>
                            <td>
                                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                

                    
                                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

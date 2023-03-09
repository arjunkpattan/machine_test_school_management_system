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
                            <h3 class="card-title">Student Mark Details</h3>
                            <!-- <a class="btn btn-primary btn-sm mr-2" href="@yield('createRoute')">Add new</a> -->
                            <a class="btn btn-success" href="{{ route('student-marks.create') }}"> Add Marks</a>
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
                            <th>Maths</th>
                            <th>Science</th>
                            <th>Computer</th>
                            <th>Term</th>
                            <th>Total Marks</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($marks as $key => $mark)
                        <tr>
                            @php
                            $i=1;
                            @endphp
                            <td>{{ ++$key }}</td>
                            <td>{{ $mark->student->name }}</td>
                            <td>{{ $mark->maths }}</td>
                            <td>{{ $mark->science }}</td>
                            <td>{{ $mark->computer }}</td>
                            <td>{{ $mark->term }}</td>
                            <td>{{ $mark->total }}</td>
                            <td>{{date_format($mark->created_at ,'M j, Y G:i A')}}</td>
                            <td>
                                <form action="{{ route('student-marks.destroy',$mark->id) }}" method="POST">
                

                    
                                    <a class="btn btn-primary" href="{{ route('student-marks.edit',$mark->id) }}">Edit</a>
                
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

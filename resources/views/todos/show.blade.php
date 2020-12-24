@extends('layouts.app')

@extends('layouts.navbar')

@section('content')

            <h1 class="text-center my-5">
              {{$todo->name}}
            </h1>

            <div class="row justify-content-center">

                    <div class="col-md-6">

                        <div class="card card-default">
           
                            <div class="card-header">
             
                                Todos
                            </div>

                            <div class="card-body">

                                {{$todo->description}}
                            </div>

                            <div class="form-group text-center">

                                <a href="{{url('todos/edit/'.$todo->id)}} " class="btn btn-info btn-sm my-3">Edit</a>
               
                                <a href="{{url('todos/delete/'.$todo->id)}} " class="btn btn-danger btn-sm my-3">Delete</a>

                            </div>

                        </div>
                    </div>
         
            </div>
@endsection
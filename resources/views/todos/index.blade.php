@extends('layouts.app')

@extends('layouts.navbar')

@section('content')

            <h1 class="text-center my-5">Todos</h1>

            <div class="row justify-content-center">

                <div class="row col-md-8 offset-md-2">

                    <div class="card card-default">

                        <div class="card-header">
                            Todos
                        </div>

                        <div class="card-body">

                            <ul class="list-group">
                                
                                @foreach($todos as $todo)
                
                                    <li class="list-group-item">
                                            
                                        {{$todo->name}} 

                                        @if(!$todo->completed)

                                        <a href="{{url('todos/complete/'.$todo->id)}} " class="btn btn-warning btn-sm" style="float:right; color: white;">Completed</a>

                                        @endif

                                        <a href="{{url('todos/'.$todo->id)}} " class="btn btn-primary btn-sm mr-2" style="float:right;">View</a>
                                    </li>
               
                                @endforeach
                            <ul> 
                        </div>

                    </div>
                
                </div>

            </div>
@endsection

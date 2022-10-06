@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h5 class="card-header">
                   <a href="{{ route('todo.create') }}" class="btn btn sm btn-outline-primary"> Add Item </a>

                </h5>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session()->has('success2'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success2') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <table class="table table-hover table-borderless">
                        <thread>
                            <th scope="col">item <th>
                            <th scope="col"></th>
                        </thread>
                        <tbody>
                        @forelse ($todos as $todo)
                        <tr>
                            @if($todo->completed)
                                <td><a href="{{ route('todo.edit',$todo->id)}}" style="color:black"><s> {{$todo->title}} </s></a></td>
                            @else
                                <td><a href="{{ route('todo.edit',$todo->id)}}" style="color:black"> {{$todo->title}}</a> </td>
                            @endif
                            
                            <td>
                                <a href="{{ route('todo.edit',$todo->id)}}" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ route('todo.show',$todo->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        

                        @empty
                        <tr>
                            <td> No Items </td>
                                
                        </tr>

                        @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

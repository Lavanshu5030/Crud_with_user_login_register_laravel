@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete {{ $todo->title }} </div>
                <h5 class="card-header">
                   <a href="{{ route('todo.index') }}" class="btn btn sm btn-outline-primary"><i class="fa fa-arrow-left"></i> Go Back </a>

                </h5>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <!-- {{ __('You are logged in!') }} -->
                    <!-- <table class="table table-hover table-borderless">
                        <thread>
                            <th scope="col">item <th>
                            <th scope="col"></th>
                        </thread>
                        <tbody>
                            <tr>
                                <td> Get Mangoes </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-outline-success">Edit</a>
                                    <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif -->
                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <h4 class="text-center">Are you sure you want to delete {{ $todo->delete}}? </h4>
                                
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Yes
                                </button>
                                <a href=" {{route('todo.index')}}" class="btn btn-info">No</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
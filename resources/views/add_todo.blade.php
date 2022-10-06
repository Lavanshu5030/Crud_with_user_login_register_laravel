@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Todo</div>
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
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('todo.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-form-label text-md-right">Title</label>

                            <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('email') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-form-label text-md-right">Description</label>

                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('password') is-invalid @enderror" autocomplete="description" value="{{ old('description') }}"></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ old('completed')}}">

                                <label class="form-check-label" for="completed">
                                    Completed?
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

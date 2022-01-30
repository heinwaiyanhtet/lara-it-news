@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
    <x-bread-camp>
        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-camp>

    <div class="row">
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">
                            <i class="feather-feather"></i>
                            Edit Category
                        </h4>
                        <hr>

                        <form action="{{route('category.update',$category->id)}}" class="mb-3" method="post">
                            @csrf
                            @method('put')
                            <div class="form-inline mb-2">
                                <input type="text" class="form-control form-control-lg mr-2 @error('title') is-invalid @enderror" value="{{old('title',$category->title)}}" placeholder="New Category" name="title" required>
                                <button class="btn btn-lg btn-primary">Update </button>
                            </div>
                            @error('title')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror

                            @if(session('message'))
                                <small class="text-success">{{session('message')}}</small>
                            @endif
                        </form>

                       @include('category.list');
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

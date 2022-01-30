@extends('layouts.app')

@section("title") Category Manager @endsection

@section('content')
    <x-bread-camp>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Category Manager</a></li>
    </x-bread-camp>

    <div class="row">
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">
                            <i class="feather-feather"></i>
                            Category List
                        </h4>
                        <hr>

                        <form action="{{route('category.store')}}" class="mb-3" method="post">
                            @csrf
                            <div class="form-inline mb-2">
                                <input type="text" class="form-control form-control-lg mr-2 @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="New Category" name="title" required>
                                <button class="btn btn-lg btn-primary">Add Category</button>
                            </div>
                            @error('title')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror

                            @if(session('message'))
                                <small class="text-success">{{session('message')}}</small>
                            @endif
                        </form>

                       @include('category.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

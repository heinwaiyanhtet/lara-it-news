@extends('layouts.app')

@section("title") Edit Photo @endsection

@section('content')
    <x-bread-camp>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Photo</li>
    </x-bread-camp>

    <div class="row">
        <div class="container">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{isset(auth()->user()->photo) ? asset('storage/profile/'.auth()->user()->photo) : asset('dashboard/img/user/user-default-photo.jpg') }}" class="mx-auto rounded-circle my-3 w-50 d-block">

                        <form action="{{route('profile.changePhoto')}}" method="post" class="mt-2" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="form-group mb-0 mr-2">
                                    <label class="text-center">
                                        <i class="mr-1 feather-image"></i>
                                        Select New Photo
                                    </label>
                                    <input type="file" class="form-control p-1 mr-2 overflow-hidden mb-0" name="photo">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-upload"></i>
                                </button>
                            </div>
                            @error('photo')
                            <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')


@section('title')
    user profile
@endsection


@section('content')

    <x-bread-camp>
         <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </x-bread-camp>


    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{isset(auth()->user()->photo) ? asset('storage/profile/'.auth()->user()->photo) : asset('dashboard/img/user/user-default-photo.jpg')}}" class="w-50 rounded-circle my-3" alt="">

                        <h3 class="mb-0 font-weight-bold">
                            {{auth()->user()->name}}
                        </h3>

                        <small class="text-black-50">
                            {{ Auth::user()->email }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

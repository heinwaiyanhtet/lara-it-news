@extends('layouts.app')

@section("title") Edit Photo @endsection

@section('content')
    <x-bread-camp>
        <li class="breadcrumb-item"><a href="#">Sample</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sample Page</li>
    </x-bread-camp>

    <div class="row">
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">
                            <i class="feather-feather"></i>
                            Sample Page
                        </h4>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab commodi corporis eaque ex fugiat, libero modi, molestiae nesciunt nostrum optio quam, quidem ut veniam! Aliquid eaque impedit minus quasi tempore.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

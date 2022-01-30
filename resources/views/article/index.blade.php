@extends('layouts.app')

@section("title") Article List @endsection

@section('content')
    <x-bread-camp>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-camp>

    <div class="row">
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">
                            <i class="feather-list"></i>
                            Article List
                        </h4>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-3">
                                <a href="{{route('article.create')}}" class="btn btn-lg btn-outline-primary me-3">
                                    <i class="feather-plus-circle"></i>
                                    Create Article
                                </a>
                                @isset(request()->search)
                                    <a href="{{route('article.index')}}" class="btn btn-lg btn-outline-dark me-3">
                                        <i class="feather-list"></i>
                                        All Article
                                    </a>
                                    <span class="h5">Search By : {{request()->search}} </span>
                                @endisset
                            </div>
                            <form action="{{route('article.index')}}" class="mb-3" method="get">
                                <div class="form-inline mb-2">
                                    <input type="text" class="form-control form-control-lg mr-2"  value="{{request()->search}}" placeholder="Search" name="search" required>
                                    <button class="btn btn-lg btn-primary">
                                        <i class="feather-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        @if(session('message'))
                            <p class="alert alert-success"> {{session('message')}}</p>
                        @endif

                        <table class="table-hover table-bordered table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>
                                        <span class="font-weight-bold">  {{\Illuminate\Support\Str::words($article->title,5)}}</span>

                                        <br>
                                        <small class="text-black-50">{{\Illuminate\Support\Str::words($article->description,8)}}</small>
                                    </td>
                                    <td>{{$article->category->title}}</td>
                                    <td>{{$article->user->name}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{route('article.show',$article->id)}}" class="btn btn-outline-success">
                                            Show
                                        </a>

                                        <a href="{{route('article.edit',$article->id)}}" class="btn btn-outline-primary">
                                            Edit
                                        </a>

                                        <form action="{{route('article.destroy',[$article->id,"page"=>request()->page])}}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete {{$article->title}} article?')">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="small">
                                            <i class="feather-calendar"></i>
                                            {{$article->created_at->format("d-m-Y")}}
                                        </span>
                                                                <br>
                                                                <span class="small">
                                        <i class="feather-clock"></i>
                                        {{$article->created_at->format("h:i A")}}
                                    </span>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan=6" class="text-center">
                                        There is no Article
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between align-items-center">
                            {{$articles->appends(request()->all())->links()}}
                            <p class="font-weight-bold mb-0 h4">Total : {{$articles->total()}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

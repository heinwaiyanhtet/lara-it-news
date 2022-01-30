@extends('layouts.app');

@section('title')
    Edit Article
@endsection

@section('content')
    <x-bread-camp>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}">Edit Article</a></li>
        <li class="breadcrumb-item active"><a href="#">Edit Article</a></li>
    </x-bread-camp>

    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Edit Article
                    </h4>
                    <form action="{{route('article.update',$article->id)}}" id="editArticle" method="post">
                        @csrf
                        @method('put')
                    </form>

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label>Select Category</label>
                        <select name="category" form="editArticle"   class="custom-select custom-select-lg @error('category') is-invalid @enderror">
                            <option value="">Select Category</option>

                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category',$article->category_id) == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <div class="form-group">
                            <label>Article Title</label>
                            <input type="text" class="form-control-lg form-control @error('title') is-invalid @enderror" form="editArticle" value="{{old('article',$article->title)}}" name="title">
                            @error('title')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Article Description</label>
                            <textarea rows="15" type="text" form="editArticle"  class="form-control-lg form-control @error('description') is-invalid @enderror" name="description">{{old('description',$article->description)}}</textarea>
                            @error('description')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button class="btn btn-primary btn-lg w-100" form="editArticle">Update Article</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

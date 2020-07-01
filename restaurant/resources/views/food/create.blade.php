@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
            <form action="{{ route('food.store') }}" method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">新增食物項目</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名稱</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">描述</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                      @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">價錢</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">類別</label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="">請選食物類別</option>
                        @foreach(App\Category::all() as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">圖片</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary" type="submit">送出</button>
                    </div>


                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">商品</div>
                <img class="img-fluid" src="{{ asset('images') }}\{{ $food->image }}" alt="">

                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">介紹</div>
                <div class="card-body">
                    <p><h2>{{ $food->name }}</h2></p>
                    <p class="lead">{{ $food->description }}</p>
                    <p><h5>價錢:{{ $food->price }}</h5></p>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

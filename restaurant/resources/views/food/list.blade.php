@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-12 my-3"><img class="img-fluid"  src="{{asset('images')}}\bg.jpg" alt=""></div>
    <div class="row justify-content-center">
      @foreach($categories as $category)
        <div class="col-md-12">
           <h2 style="color:lightsalmon" class="align-items-center">{{ $category->name }}</h2>
            <div class="jumbotron ">
                 <div class="row">
                @foreach(App\Food::where('category_id',$category->id)->get() as $food)
                <div class="col-md-3">

                    <img class="" src="{{ asset('images') }}\{{ $food->image }}" width="200" height="200">
                    <h5 class="text-center my-3">{{ $food->name }}

                    </h5>
                    <h6 class="text-center">{{ $food->price }}元</h6>
                       <p class="text-center my-3"><a href="{{route('food.view',[$food->id]) }}"button class="btn btn-outline-danger">view</button></a></p>
                </div>

                @endforeach
            </div>
            </div>

        </div>
       @endforeach
    </div>
</div>
@endsection

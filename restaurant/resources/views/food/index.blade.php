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
            <div class="card">
                <div class="card-header">食物 <span class="float-right">
                    <a href="{{ route('food.create') }}">
                        <button class="btn btn-outline-secondary">
                            新增商品
                        </button>
                    </a>
                </span></div>


                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">圖片</th>
                            <th scope="col">名稱</th>
                            <th scope="col">描述</th>
                            <th scope="col">價錢</th>
                            <th scope="col">類別</th>
                            <th scope="col">編輯</th>
                            <th scope="col">刪除</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(count($foods)>0)
                        @foreach($foods as $key =>$food)
                          <tr>
                            <td><img src="{{ asset('images') }}/{{ $food->image}}"  width="100" alt=""></td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->description }}</td>
                            <td>{{ $food->price }}元</td>
                              <td>{{ $food->category->name }}</td>
                            <td>
                                <a href="{{route('food.edit',[$food->id])}}">
                                   <button class="btn btn-sm btn-outline-success">編輯</button>
                                </a>
                            </td>
                            <td>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{ $food->id }}">
                                        刪除
                                    </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('food.destroy',[$food->id]) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">注意!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    你確定要刪除嗎?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                    <button type="submit" class="btn btn-danger">刪除</button>
                                </div>
                                </div>
                            </form>
                            </div>
                            </div>
                        </td>
                          </tr>
                        @endforeach
                        @else
                        <td>還沒新增食物!</td>
                        @endif
                      </tbody>
                      </table>
                      {{ $foods->links()}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

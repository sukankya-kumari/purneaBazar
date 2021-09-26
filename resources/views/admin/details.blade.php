@extends('admin.base')
@section('content')
<div class="container mt-4">
    <div class="row">
        @if (session()->has('msg'))
        <div class="alert alert-danger">
            {{!!session('msg')!!}}
        </div>
        @else

        <div class="col-lg-12" style="background-color: #fab1a0">
            <div class="row">

                <h4 class="text-center mt-3 fw-bolder" style="text-shadow: white 2px 5px;">Your Business Details</h4>
                @foreach ($user_detail as $item)
                <div class="col-lg-12 mx-auto mb-4" style="background-color: #fab1a0">
                    <div class="row" style="background-color: #fab1a0">
                        <div class="col mt-2" style="background-color: #fab1a0">
                            <section class="manage">
                                <div class="card" style="background-image:url('{{('image/'.$item->image)}}')">
                                    <div class="card-body">
                                        <h3 class="text-light fw-bold text-uppercase">{{$item->b_name}}</h3>
                                        <h5 class="text-light fw-bold "><i class="bi bi-telephone-fill"></i> +91
                                            {{$item->contact}}</h5>
                                        <p class="text-light fw-bold "><i class="bi bi-geo-alt-fill"></i>
                                            {{$item->address}}</p>
                                    </div>

                                </div>
                            </section>
                        </div>
                        <div class="col" style="background-color: #fab1a0">
                            <div class="card border-0" style="background-color: #fab1a0">
                                <div class="card-body">

                                    <p class="">State: {{$item->state}}</p>
                                    <p class="">City: {{$item->city}}</p>
                                    <p class="">Opening Time: {{$item->open_time}}</p>
                                    <p class="">Closing Time: {{$item->close_time}}</p>
                                    <?php
                                    $v = $item->type_of_service;
                                    ?>
                                    <p class="">Service Type: @if($v==0)
                                        Offline Service
                                        @else
                                        <a href="" class="btn">Online Service</a>

                                        @endif</p>
                                    <p class="">Website Link: {{$item->add_link}}</p>
                                    <div class="row">
                                        <div class="col">
                                                <a href="{{route('admin.edit',['id'=>$item->id])}}" class="btn btn-info form-control" style="background-color: #dfe6e9">Edit <i class="bi bi-pencil"></i></a>

                                        </div>
                                        <div class="col">
                                            <form action="{{route('admin.detail.delete',['id'=>$item->id])}}" method="POST">
                                                @method("delete") @csrf
                                                <input type="hidden">
        
                                                <button type="submit" class="btn btn-danger form-control"><i class="bi bi-trash-fill"></i> delete </button>
                                       
                                            </form>
                                        </div>
                                    </div>





                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endif
@endsection

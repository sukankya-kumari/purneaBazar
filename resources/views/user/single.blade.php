@extends('admin.base')
@section('content')
<div class="container">
    <div class="row">
        <section class="home">
            <div class="col-lg-11 mx-auto p-3 border mx-auto mt-4" style="background-color: #fab1a0">
                <div class="row">
                    <div class="col-lg-7">
                        <section class="manages">
                            <div class="card"
                                style="background-image:url('{{('../image/'.$item->image)}}'); height:470px;">

                                <a href="" class="stretched-link"> </a>
                                <div class="card-body">
                                    <h1 class="text-light text-uppercase">{{$item->b_name}}</h1>
                                    <h5 class="text-light fw-bold "><i class="bi bi-telephone-fill"></i> +91
                                        {{$item->contact}}</h5>
                                    <p class="text-light fw-bold "><i class="bi bi-geo-alt-fill"></i>
                                        {{$item->address}}</p>
                                    
                                    @php

                                        $total = 0;$count = 0;
                                        foreach($item->review as $rate){
                                        $total += $rate->rating;
                                        $count++;
                                        }

                                        if($total > 0){
                                        $avg= $total/$count;

                                        }
                                    @endphp

                                    @if ($total > 0)
                                        @for($i =1;$i<=$avg;$i++) <th class="d-flex">
                                            <i class="fa fa-star p-0 m-0" aria-hidden="true" style="color: #ffff19"></i>
                                            </th>
                                        @endfor
                                    @endif
                                    @if($item->open_time || $item->close_time )
                                    <p class="text-light fw-bold"><i class="bi bi-hourglass-top"></i> {{$item->open_time}}</p>
                                    <p class="text-light fw-bold"><i class="bi bi-hourglass-bottom"></i> {{$item->close_time}}</p>
                               
                                    @else
                                     @endif
                                </div>


                            </div>
                        </section>
                    </div>
                    <div class="col-lg-5" >
                        <div class="card border-0 "style="background-color: #fab1a0">
                            <div class="card-body mt-1">
                                <?php
                            $v = $item->type_of_service;
                            $a = $item->id;
                            ?>

                                @if($v==0)
                                <a href="" class="btn btn-secondary disabled mb-3 px-5 py-2">Offline Service</a>
                                @else
                                <a href="{{$item->add_link}}" class="btn btn-success mb-3 px-5 py-2">Online Service</a>

                                @endif
                                <p>
                                    <a href="{{url('/vote',$item->id)}}" class="btn btn-info btn-small text-light"> Vote
                                        {{$item->vote}}<i class="bi bi-hand-thumbs-up"></i></a>

                                    <a href="{{url('/unlike',$item->id)}}" class="btn btn-info btn-small text-light"><i
                                            class="bi bi-hand-thumbs-down"></i></a></p>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <a href="" class="text-dark border-secondary btn btn-light px-4 py-2"><i
                                                class="bi bi-chat-fill"></i> Review and Rating</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="#Modal" class="text-dark border-secondary btn btn-light px-5 py-2"
                                            data-bs-toggle="modal"><i class="bi bi-pencil-fill"></i> Write Review</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <h5>Reviews</h5>
                                        <table class="table">
                                            @foreach ($re as $r)
                                            <tr>
                                                <?php 
                                                $s = $r->rating;
                                                ?>
                                                <th class="border-0 text-capitalize m-0 p-0">{{$r->name}}
                                                    @for($i =1;$i<=$s;$i++) <i class="fa fa-star p-0 m-0"
                                                        aria-hidden="true" style="color: #ffff19"></i>
                                                        @endfor
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="border-0">{{$r->comment}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <div class="row">
            <div class="col-lg-6">
                <div class="modal fade" id="Modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('review')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="b_id" value="{{$a}}">
                                    <div class="mb-3">
                                        <label for="">Rating</label>
                                        <br>
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="mb-3">
                                        <label for="">rewiew</label>
                                        <textarea name="comment" class="form-control" cols="20" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-12 mt-5">
            <h3>Suggestions ({{$pro->count()}})</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4">
                <div class="row">
                    @foreach ($pro as $item)
                    <div class="col-lg-3 mb-2">
                        <div class="card">
                            <a href="{{route('user.single',['slugs'=>$item->slugs])}}" class="stretched-link"><img
                                    src="{{asset('image/'.$item->image)}}" alt="" width="100%" class="cart-img-top"
                                    height="200px"></a>
                        </div>
                        <div class="card-body">
                            <h4 class="text-truncate">{{$item->b_name}}</h4>
                            <p>vote {{$item->vote}}</p>
                            <h5><i class="bi bi-telephone-fill"></i> +91 {{$item->contact}}</h5>
                            <p><i class="bi bi-geo-alt-fill"></i> {{$item->address}} ,{{$item->city}},{{$item->state}}
                            </p>


                            <?php
                            $v = $item->type_of_service;
                            ?>
                            @if($v==0)
                            <p>Offline Service</p>
                            @else
                            <a href="" class="btn btn-success">Online Service</a>

                            @endif
                        </div>

                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection

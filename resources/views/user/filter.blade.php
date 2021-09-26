

@extends('admin.base')
@section('content')
<div class="container">
    <div class="row">
       @foreach ($data as $item)
       <div class="col-lg-5 mx-auto mt-4" style="background-color: white">
      
        <div class="row">
            <div class="col-lg-6" style="background-color: white">
                <div class="card border-0 p-3">
                    <a href="{{route('user.single',['slugs'=>$item->slugs])}}" class="stretched-link"> <img src="{{asset('image/'.$item->image)}}" alt="" class="img-top" height="200px"> </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0" style="background-color: white">
                    <div class="card-body">
                        <h4 class="text-truncate">{{$item->b_name}}</h4>
                        <h5 class="mt-2">{{$item->business->bname}}</h5>
                        <p>
                            vote  {{$item->vote}}
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
                     
                        @for($i =1;$i<=$avg;$i++) 

                            <th class="d-flex">
                                <i class="fa fa-star p-0 m-0" aria-hidden="true" style="color: #ffff19"></i>
                            </th>
                        @endfor
                      @endif
                        </p>
                        <h5><i class="bi bi-telephone-fill"></i>  +91 {{$item->contact}}</h5>
                        <p><i class="bi bi-geo-alt-fill"></i> {{$item->address}} ,{{$item->city}},{{$item->state}}</p>
                       
                       
                        <?php
                        $v = $item->type_of_service;
                        ?>
                        @if($v==0)
                        <p>Offline Service</p>
                        @else
                        <a href="{{$item->add_link}}" class="btn btn-success">Online Service</a>

                        @endif
                       
                    </div>
                </div>

            </div>
        </div>
    </div>
       @endforeach
      
    </div>
</div>
    
@endsection 
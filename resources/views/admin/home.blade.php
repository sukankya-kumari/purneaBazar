@extends('admin.base')
@section('content')
<div class="container-fluid" > 
    <div class="row">
        <div class="col-lg-2 position-fixed left-0 " style="overflow-y: scroll;height:90vh">
            <div class="list-group rounded-0" style="background-color: #f3f6f7">
                @foreach ($data as $item)
                <a href="{{route('user.filter',['urls'=>$item->urls,])}}"
                    class="list-group-item d-flex mt-4 justify-content-between text-dark border-0 shawod align-items-center"
                    style="background-color: #f3f6f7">
                    {{$item->bname}}
                    @php
                    $total = 0;$count = 0;

                    foreach($item->bitem as $b){
                    $total += $b->id;
                    $count++;

                    }

                    @endphp
                    @if($total > 0)
                    <span class="badge bg-primary rounded-pill">{{$count}}</span>

                    @else

                    <span class="badge bg-primary rounded-pill">0</span>
                    @endif


                </a>
                @endforeach



            </div>
        </div>
        <div class="col-lg-10 postion-relative " style="margin-left:16%;margin-top:0.4px">
          <div>
            @livewire('searchdata')
          
          </div>
         
      

        </div>
    </div>




</div>
@endsection

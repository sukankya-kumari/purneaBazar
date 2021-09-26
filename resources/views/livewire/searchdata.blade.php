<div>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-0 mt-2">
                <div class="d-flex">
                    <input type="search" wire:model="search" placeholder="search any things Eg:- Name,address" class="rounded-0 border-0 form-control">
                    <button type="button" class="btn btn-light rounded-0 border-0"><i class="bi bi-search"></i></button>
                    <div wire:loading wire:target="search" class="col-4 ms-auto">
                        <p class="text-info font-weight-bold">Searching...........</p>
                </div>
              
            </div>
        </div>
    </div>
    <div class="row mt-0 p-0" style="margin-left: 25px">
      
      <div class="col-lg-12 mx-auto">
          <div class="row mt-0">
           @if($search)
            @foreach ($item as $i)
            <div class="col-lg-3 mb-2">
                <div class="card border-0 shadow">
                    <a href="{{route('user.single',['slugs'=>$i->slugs])}}" class="stretched-link"> <img src="{{asset('image/'.$i->image)}}" alt="" width="100%" class="cart-img-top" height="200px"></a>
                    <div class="card-body">
                      <p class="text-truncate">{{$i->b_name}}</p>
                      <?php
                      $v = $i->type_of_service;
                      ?>
                      @if($v==0)
                      <p>Offline Service</p>
                      @else
                      <p>Online Service</p>
    
                      @endif
                        
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="row ms-5">
                @foreach ($data as $item)
                <div class="col-lg-5 border rounded ms-3 mt-4" style="background-color: white">
                    <div class="row">
                        <div class="col-lg-6 p-2" style="background-color: #f3f6f7">
                            <div class="card" style="background-color: #f3f6f7">
                                <a href="{{route('user.filter',['urls'=>$item->urls,])}}" class="stretched-link"> <img src="{{asset('img/'.$item->img)}}" alt="" class="cardimg-top" width="100%" height="150px"> </a>
                   
                            </div>
                        </div>
                        <div class="col-lg-6" style="background-color: #f3f6f7">
                            <div class="card border-0" style="background-color: #f3f6f7">
                                <div class="card-body">
                                    <h4>{{$item->bname}}</h4>
                                    <p>{{$item->description}}<p>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
             @endforeach
                   
            </div>
                
            @endif
       
          </div>
      </div>
    </div>
</div>

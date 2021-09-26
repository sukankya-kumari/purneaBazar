@extends('admin.base')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-10 mx-auto mb-4">
            <div class="card border-0" style="background-color: #f3f6f7">
                <h4 class="text-center mt-3">Update Your Business Details</h4>
                <div class="card-body" style="background-color: #f3f6f7">
                    <form class="card-body" action="{{route('update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <div class="md-form ">
                                <label class="">Business Name</label>
                                <input type="text" name="b_name" class="form-control" value="{{$data['b_name']}}">
                                @error('b_name')
                                <p class="text-danger small">{{$message}}</p>
                                @enderror
                              
                            </div>
          
                          </div>
                          <div class="col-md-4 mb-3">
                            <div class="md-form">
                                <label for="">Contact</label>
                                <input type="text" name="contact" class="form-control" value="{{$data['contact']}}">
                               
                            </div>
          
                          </div>
                          <div class="col-md-4 mb-3">
                            <div class="md-form">
                                <label for="">business_id</label>
                                <select name="business_id" class="form-control">
                                    <option value="">Select Type Of Business</option>
                                    @foreach ($bus as $b)
                                    <option value="{{$b->id}}">{{$b->bname}}</option>
        
                                    @endforeach
                                </select>
                               
                            </div>
          
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="md-form ">
                                    <label for="">address</label>
                                    <input type="text" name="address" value="{{$data['address']}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="md-form ">
                                    <label for="">city</label>
                                    <input type="text" name="city" value="{{$data['city']}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="md-form ">
                                    <label for="">state</label>
                                    <input type="text" name="state" value="{{$data['state']}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="md-form ">
                                    <label for="">open_time</label>
                                    <input type="text" name="open_time"  value="{{$data['open_time']}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="md-form ">
                                    <label for="">close_time</label>
                                    <input type="text" name="close_time" value="{{$data['close_time']}}" class="form-control">
                               </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="md-form ">
                                    <label for="">Type of service</label>
                                        <select name="type_of_service" value="{{$data['type_of_service']}}" class="form-control">
                                            <option value="1">
                                                Online
                                            </option>
                                            <option value="0">
                                                Offline
                                            </option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                              <div class="md-form ">
                                <label for="">Add link</label>
                                <input type="text" name="add_link" value="{{$data['add_link']}}" class="form-control">
                              </div>
            
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="md-form">
                                <label for="">image</label>
                                <input type="file" name="image" class="form-control" value="{{$data['img']}}">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12  mb-4">
                            <label for="">description</label>
                            <textarea name="description" cols="30" rows="5" class="form-control">{{$data['description']}}</textarea>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <button class="btn btn-primary btn-lg btn-block form-control" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.base')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-10 mx-auto mb-4">
            <div class="card border-0" style="background-color: #f3f6f7">
                <h4 class="text-center mt-3">Insert Your Business Details</h4>
                @if (session()->has('msg'))
                <div class="alert alert-danger">
                    {{!!session('msg')!!}}
                </div>
                @else
                <div class="card-body" style="background-color: #f3f6f7">
                    <form action="{{route('businessInsert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Name</label>
                                    <select name="user_id" class="form-control">
                                       
                                        <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>

                                       
                                    </select>
                                    @error('user_id')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                    @error('contact')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">b_name</label>
                                    <input type="text" name="b_name" class="form-control">
                                    @error('b_name')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="">business_id</label>
                                    <select name="business_id" class="form-control">
                                        @foreach ($bus as $b)
                                        <option value="{{$b->id}}">{{$b->bname}}</option>

                                        @endforeach
                                    </select>
                                    @error('business_id')
                                    <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                    <a href="#Modal" class="text-info" data-bs-toggle="modal">Add Business Category</a>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">address</label>
                                    <input type="text" name="address" class="form-control">
                                    @error('address')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="">city</label>
                                    <input type="text" name="city" class="form-control">
                                    @error('city')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="">state</label>
                                    <input type="text" name="state" class="form-control">
                                    @error('state')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">open_time</label>
                                    <input type="text" name="open_time" class="form-control">
                                    @error('open_time')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="">close_time</label>
                                    <input type="text" name="close_time" class="form-control">
                                    @error('close_time')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Type of service</label>
                                    <select name="type_of_service" class="form-control">
                                        <option value="1">
                                            Online
                                        </option>
                                        <option value="0">
                                            Offline
                                        </option>

                                    </select>
                                    @error('type_of_service')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Add link</label>
                                    <input type="text" name="add_link" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="">description</label>
                            <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                            @error('description')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success form-control">
                        </div>
                    </form>
                    <p class="text-end"><a href="{{route('admin.details',['user_id'=>Auth::user()->id])}}"
                            class="">Click here to see your details</a></p>
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="modal fade" id="Modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Business Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('insert')}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="">bname</label>
                                                    <input type="text" name="bname" class="form-control">
                                                    @error('bname')
                                                        <p class="text-danger small">{{$message}}</p>
                                                    @enderror
                                                </div>
                                             
                                                <div class="mb-3">
                                                    <label for="">img</label>
                                                    <input type="file" name="img" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">description</label>
                                                    <textarea name="description" class="form-control" cols="30"
                                                        rows="10"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

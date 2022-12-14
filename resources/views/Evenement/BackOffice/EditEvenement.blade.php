@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Evenement',
    'activePage' => 'evenement',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">


        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Event")}}</h5>
          </div>
          <div class="card-body">
        


             <form action="/evenement/update/{{ $evenements->id }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method("put")

                            <div class="mb-3">
                            <label> Title</label>

                            <input type="text" name="title" class="form-control m-2" placeholder="Title"  value="{{ $evenements->title }}">
        				 <!-- <input type="text" name="author" class="form-control m-2" placeholder="author"> -->
               
                 @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

                </div>
                 <div class="mb-3">
                            <label> Description</label>     
                 
                 
                 <Textarea name="description" cols="20" rows="4" class="form-control m-2" placeholder="Description"  >
                         {{ $evenements->description }}
                         </Textarea>
@error('description')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
                         </div>
                         <div class="mb-3">
                            <label> Capacity</label>

                         <input type="text" name="capacite" class="form-control m-2" placeholder="Capacity"  value="{{ $evenements->capacite }}">

                         @error('capacite')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
                         </div>            
<div class="mb-3">
                            <label>Date of event</label>

                         <input type="date" name="date" class="form-control m-2" placeholder="Date of event"  value="{{ $evenements->date }}">
                         @error('date')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
                        </div>
<div class="mb-3">
                         <label class="m-2">Image</label>
                                    
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="image"  value="{{ $evenements->image }}">
                         @error('image')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
                        </div>
                                                  <img src="/cover/{{ $evenements->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>



          </div>
      </div>
    </div>



      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                <h5 class="title">{{ auth()->user()->name }}</h5>
              </a>
              <p class="description">
                  {{ auth()->user()->email }}
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
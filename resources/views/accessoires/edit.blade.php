@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Accessoire edit',
    'activePage' => 'Accessoire',
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
            <h5 class="title">{{__(" Edit Profile")}}</h5>
          </div>
          <div class="card-body">
                 <form action="{{ route('accessoires.update',$accessoire->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
               
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom Accessoire:</strong>
                        <input type="text" name="nomAccessoire" value="{{ $accessoire->nomAccessoire }}" class="form-control" placeholder="Nom Accessoire">
                        @error('nomAccessoire')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prix Accessoire :</strong>
                        <input type="text" name="prix" value="{{ $accessoire->prix }}" class="form-control" placeholder="Prix Accessoire">
                        @error('prix')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
           
                <div class="mb-3">
                         <label class="m-2">Image</label>
                                    
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="image"  value="{{ $accessoire->image }}">
                                                  <img src="/coverAccessoire/{{ $accessoire->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
             </div>
        </form>
          </div>
          </div>
          </div>
          </div>
          </div>
          
@endsection
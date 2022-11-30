@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Gestion Trotinettes',
    'activePage' => 'trotinettes',
    
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
                 <form action="{{ route('trotinettes.update',$trotinette->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
               
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom Trotinette:</strong>
                        <input type="text" name="nom" value="{{ $trotinette->nom }}" class="form-control" placeholder="Nom Trotinette">
                        @error('nom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Categorie Trotinette :</strong>
                        <select name="categorie_id" value="{{ $trotinette->categorie_id }}"class="form-control">
                        <option selected disabled value="{{ $trotinette->categorie_id }}"> {{$trotinette->categoryT->type}}</option>
                                @foreach($categoriets as $item)
                                <option value="{{ $item->id }}">{{ $item->type }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

             
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Vitesse Trotinette :</strong>
                        <input type="text" name="vitesse" value="{{ $trotinette->vitesse }}" class="form-control" placeholder="Vitesse Trotinette">
                        @error('vitesse')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Poids Trotinette :</strong>
                        <input type="text" name="poids" value="{{ $trotinette->poids }}" class="form-control" placeholder="Poids Trotinette">
                        @error('poids')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Couleur Trotinette :</strong>
                        <input type="text" name="couleur" value="{{ $trotinette->couleur }}" class="form-control" placeholder="Couleur Trotinette">
                        @error('couleur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prix Trotinette :</strong>
                        <input type="text" name="prix" value="{{ $trotinette->prix }}" class="form-control" placeholder="Prix Trotinette">
                        @error('prix')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prix_location Trotinette :</strong>
                        <input type="text" name="prix_location" value="{{ $trotinette->prix_location }}" class="form-control" placeholder="Prix_location Trotinette">
                        @error('prix_location')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Quantité Trotinette :</strong>
                        <input type="text" name="quantite" value="{{ $trotinette->quantite }}" class="form-control" placeholder="quantite">
                        @error('quantite')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                  <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>image Trotinette :</strong>
                        <input type="text" name="image" value="{{ $trotinette->image }}" class="form-control" placeholder="quantite">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> -->
                <div class="mb-3">
                         <label class="m-2">Image</label>
                                    
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="image"  value="{{ $trotinette->image }}">
                                                  <img src="/coverTrotinette/{{ $trotinette->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
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
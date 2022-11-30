@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Participant',
    'activePage' => 'participant',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Create Participant")}}</h5>
          </div>
          <div class="card-body">
            <form action="/participant/add" method="post" enctype="multipart/form-data">

                         @csrf
 
        				 <input type="text" name="NomParticipant" class="form-control m-2" placeholder="Nom Particitpant">
                 
                 @error('NomParticipant')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                 
                 <input type="text" name="PrenomParticipant" cols="20" rows="4" class="form-control m-2" placeholder="Prenom Particitpant Balade"></input>
                 
                 @error('PrenomParticipant')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                 
                 <input type="text" name="MailParticipant" class="form-control m-2" placeholder="Mail Particitpant">

                 @error('MailParticipant')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                         <select name="EtatPhysique" class="form-control m-2">
                                <option >options</option>
                                <option value="Bonne">Bonne</option>
                                <option value="Moyenne">Moyenne</option>
                                <option value="Mauvaise">Mauvaise</option>


                               

                            </select>
        				 <!-- <input type="text" name="author" class="form-control m-2" placeholder="author"> -->

                         <input type="text" name="numParticipant" class="form-control m-2" placeholder="Num Particitpant">
                         
                         @error('numParticipant')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                         <input type="text" name="AgeParticipant" class="form-control m-2" placeholder="Age Participant">
                         @error('AgeParticipant')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                         <label class="m-2">Image</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="imageParticipant">
                         @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                         <div class="mb-3">
                            <label> Choose Balade</label>
                            <select name="balade_id" class="form-control">
                                @foreach ($balades as $item)
                                <option value="{{ $item->id}}">{{ $item->titleBalade}}</option>
                                @endforeach

                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>



          </div>
      </div>
    </div>


    </div>
  </div>
@endsection
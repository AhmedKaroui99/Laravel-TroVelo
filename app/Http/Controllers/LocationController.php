<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Accessoire;
use App\Models\Trotinette;
use App\Models\Velo;
use App\Mail\locationEmail;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view all locations
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront()
    {
        return view('locations.indexFront');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all velos
        
        //get all clients

        //get all accessoires
        $accessoires = Accessoire::all();
        $velos = Velo::all();
        $trotinettes = Trotinette::all();

        //create a new location
        return view('locations.create', compact('accessoires', 'velos', 'trotinettes'));
    }
    
    /**
     * Store a newly created resource in storage.
     * @param  \App\Models\Trotinette  $trotinette
     * 
     * @return \Illuminate\Http\Response
     * */
      public function create2()
    {
        // get id from params
        $id = request()->route('id');
        // get the velo
 
        // get trotinette
        $trotinette = Trotinette::find($id);

        //get all accessoires
        $accessoires = Accessoire::all();


        //create a new location
        return view('locations.create2', compact('accessoires', 'trotinette'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Models\Velo  $velo
     * 
     * @return \Illuminate\Http\Response
     * */
    public function create3()
    {
        // get id from params
        $id = request()->route('id');
        // get the velo
 
        // get trotinette
        $velo = Velo::find($id);

        //get all accessoires
        $accessoires = Accessoire::all();


        //create a new location
        return view('locations.create3', compact('accessoires', 'velo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store a new location
        $request->validate([
            'idClient' => 'required | integer | min:8',
            'emailClient' => 'required | email',
            'idStation' => 'required | integer | min:1 | max:3',
            'dateDebut' => 'required | date | after:today',
            'dateFin' => 'required | date | after:dateDebut',
            'prix' => 'required | integer | min:1',
            'statutPaiement' => 'required'
        ]);

        $location = new Location([
            'idClient' => $request->get('idClient'),
            'emailClient' => $request->get('emailClient'),
            'idStation' => $request->get('idStation'),
            'dateDebut' => $request->get('dateDebut'),
            'dateFin' => $request->get('dateFin'),
            'prix' => $request->get('prix'),
            'statutPaiement' => $request->get('statutPaiement'),
            
        ]);
        $location->statutLocation = '1';
        $location->remarque = 'pas de remnarque';
        $location->idAgent = '1';

        // associer velo a la location
        if ($request->get('idVelo') != null) {
            $location->velo_id = $request->get('idVelo');
        }
        
        // associer trontinette a la location
        if ($request->get('idTrotinette') != null) {
            $location->trotinette_id = $request->get('idTrotinette');
        }
        
        // associer les accessoires à la location
        if ($request->get('accessoires') != null) {
            $location->accessoire_id = $request->get('accessoires');
        }
        // send an email 
        \Mail::to($request->get('emailClient'))->send(new locationEmail($location));
                
        
        $location->save();
        return redirect('/locations')->with('success', 'Location saved!');

    }
    public function store2(Request $request)
    {
       //store a new location
       $request->validate([
        'idClient' => 'required | integer | min:8',
        'emailClient' => 'required | email',
        'idStation' => 'required | integer | min:1 | max:3',
        'dateDebut' => 'required | date | after:today',
        'dateFin' => 'required | date | after:dateDebut',
        'prix' => 'required'
    ]);

    $location = new Location([
        'idClient' => $request->get('idClient'),
        'emailClient' => $request->get('emailClient'),
        'idStation' => $request->get('idStation'),
        'dateDebut' => $request->get('dateDebut'),
        'dateFin' => $request->get('dateFin'),
        'prix' => $request->get('prix'),
        
    ]);
    
    $location->statutLocation = '1';
    $location->remarque = 'pas de remnarque';
    $location->idAgent = '1';
    $location->statutPaiement = '1';

    // get id from params
    $id = request()->route('id');

    
    // associer trontinette a la location
        $location->trotinette_id = $id;
        $location->velo_id = null;
    
    // associer les accessoires à la location
    if ($request->get('accessoires') != null) {
        $location->accessoire_id = $request->get('accessoires');
    }
        
        // send an email 
        \Mail::to($request->get('emailClient'))->send(new locationEmail($location));

        $location->save();
        return redirect('/FrontOffice')->with('success', 'Location saved!');

    }
    
    public function store3(Request $request)
    {
       //store a new location
       $request->validate([
        'idClient' => 'required | integer | min:8',
        'emailClient' => 'required | email',
        'idStation' => 'required | integer | min:1 | max:3',
        'dateDebut' => 'required | date | after:today',
        'dateFin' => 'required | date | after:dateDebut',
        'prix' => 'required'
    ]);

    $location = new Location([
        'idClient' => $request->get('idClient'),
        'emailClient' => $request->get('emailClient'),
        'idStation' => $request->get('idStation'),
        'dateDebut' => $request->get('dateDebut'),
        'dateFin' => $request->get('dateFin'),
        'prix' => $request->get('prix'),
        
    ]);
    
    $location->statutLocation = '1';
    $location->remarque = 'pas de remnarque';
    $location->idAgent = '1';
    $location->statutPaiement = '1';

    // get id from params
    $id = request()->route('id');

    
    // associer trontinette a la location
        $location->trotinette_id = null;
        $location->velo_id = $id;
    
    // associer les accessoires à la location
    if ($request->get('accessoires') != null) {
        $location->accessoire_id = $request->get('accessoires');
    }
        
        // send an email 
        \Mail::to($request->get('emailClient'))->send(new locationEmail($location));

        $location->save();
        return redirect('/FrontOffice')->with('success', 'Location saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        // if ($location->trotinette_id != null) {
        //     $trotinette = Trotinette::find($location->trotinette_id);
        //     return view('locations.show', compact('location', 'trotinette'));
        // }

        // if ($location->velo_id != null) {
        //     $velo = Velo::find($location->velo_id);
        //     return view('locations.show', compact('location', 'velo'));
        // }

        //show a location
        return view('locations.show', compact('location'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //edit a location
        return view('locations.edit', compact('location'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //update a location
        $request->validate([
            'idVelo' => 'required',
            'idClient' => 'required',
            'idStation' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required',
            'prix' => 'required',
            'statutPaiement' => 'required'
        ]);

        $location->idVelo = $request->get('idVelo');
        $location->idClient = $request->get('idClient');
        $location->idStation = $request->get('idStation');
        $location->dateDebut = $request->get('dateDebut');
        $location->dateFin = $request->get('dateFin');
        $location->prix = $request->get('prix');
        $location->statutPaiement = $request->get('statutPaiement');
        $location->statutLocation = $request->get('statutLocation');
        $location->remarque = $request->get('remarque');
        
        $location->save();

        return redirect('/locations')->with('success', 'Location updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        // delete a location
        $location->delete();
        return redirect('/locations')->with('success', 'Location deleted!');
    }
}
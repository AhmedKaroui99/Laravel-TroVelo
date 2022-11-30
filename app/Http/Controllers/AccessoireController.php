<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AccessoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all accessoires
        $accessoires = Accessoire::all();
        return view('accessoires.index', compact('accessoires'));

    }
       public function index2()
    {
        // show all accessoires
        $accessoires = Accessoire::all();
        return view('accessoires.index2', compact('accessoires'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show the form to create a new accessoire
        return view('accessoires.create');

    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        $request->validate([
            'nomAccessoire' => 'required',
            'prix' => 'required',
            'image' => 'required',
        ]);
        
           if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("coverAccessoire/"),$imageName);

            $accessoire =new Accessoire([
            'nomAccessoire' => $request->nomAccessoire,
            'prix' =>$request->prix,
            'image' => $imageName,

            ]);
           $accessoire->save();
        }
       


        return redirect()->route('accessoires.index')->with('success','Accessoire has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function show(Accessoire $accessoire)
    {
        // show the accessoire
        return view('accessoires.show', compact('accessoire')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessoire $accessoire)
    {
        // show the form to edit the accessoire
        return view('accessoires.edit', compact('accessoire'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nomAccessoire' => 'required',
            'prix' => 'required',
            'image' => 'required',
        ]);
        
     $accessoire=Accessoire::findOrFail($id);

        if($request->hasFile("image")){
         if (File::exists("coverAccessoire/".$accessoire->image)) {
             File::delete("coverAccessoire/".$accessoire->image);
         }
         $file=$request->file("image");
         $accessoire->image=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/coverAccessoire"),$accessoire->image);
         $request['image']=$accessoire->image;
     }
        
         $accessoire->update([
            'nomAccessoire' => $request->nomAccessoire,
            'prix' =>$request->prix,
            'image' => $accessoire->image,
            ]);
        // $trotinette->fill($request->post())->save();

        return redirect()->route('accessoires.index')->with('success','Accessoire Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessoire $accessoire)
    {
        // delete the accessoire
        $accessoire->delete();

        return redirect()->route('accessoires.index');

    }
}

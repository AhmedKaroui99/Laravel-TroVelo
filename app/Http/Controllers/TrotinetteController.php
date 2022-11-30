<?php

namespace App\Http\Controllers;
use App\Models\Trotinette;
use App\Models\CategorieT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDF;


class TrotinetteController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {

      
        // $trotinettes = Trotinette::orderBy('id','desc')->paginate(5);
        $trotinettes = (new Trotinette)->orderBy('id','desc')->paginate(10000);
        $categoriets = (new CategorieT)->orderBy('id','desc')->paginate(10000);

         return view('trotinettes.index', compact('trotinettes','categoriets'));

        // $trotinettes = Trotinette::with('CategorieTrotinette')->get();
        // return view('trotinettes.index', compact('trotinettes'));
    }
       public function index2()
    {

      
        // $trotinettes = Trotinette::orderBy('id','desc')->paginate(5);
        $trotinettes = (new Trotinette)->orderBy('id','desc')->paginate(10000);
        $categoriets = (new CategorieT)->orderBy('id','desc')->paginate(10000);

         return view('trotinettes.index2', compact('trotinettes','categoriets'));

        // $trotinettes = Trotinette::with('CategorieTrotinette')->get();
        // return view('trotinettes.index', compact('trotinettes'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // $CategorieTrotinettes= CategorieT::all();
       
        $categoriets = CategorieT::all();
        return view('trotinettes.create',['categoriets' => $categoriets]);
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
           'nom' => 'required',
            'categorie_id' => 'required',
            'vitesse' => 'required | Integer',
            'poids' => 'required | Integer',
            'couleur' => 'required',
            'prix' => 'required | Integer',
            'prix_location' => 'required | Integer',
            'quantite' => 'required |',
            'image' => 'required',
        ]);
        
           if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("coverTrotinette/"),$imageName);

            $trotinette =new Trotinette([
            'nom' => $request->nom,
            'categorie_id' =>$request->categorie_id,
            'vitesse' =>$request->vitesse,
            'poids' =>$request->poids,
            'couleur' =>$request->couleur,
            'prix' =>$request->prix,
            'prix_location' =>$request->prix_location,
            'quantite' =>$request->quantite,
            'image' => $imageName,

            ]);
           $trotinette->save();
        }
       


        return redirect()->route('trotinettes.index')->with('success','Trotinette has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\trotinette $trotinette
    * @return \Illuminate\Http\Response
    */
    public function show(Trotinette $trotinette)
    {
        return view('trotinettes.show',compact('trotinette'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Trotinette  $trotinette
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $categoriets = CategorieT::all();
       $trotinette=Trotinette::findOrFail($id);


        return view('trotinettes.edit',compact('trotinette','categoriets'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\trotinette  $trotinette
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nom' => 'required',
            'categorie_id' => 'required',
            'vitesse' => 'required',
            'poids' => 'required',
            'couleur' => 'required',
            'prix' => 'required',
            'prix_location' => 'required',
            'quantite' => 'required',
        ]);
        
     $trotinette=Trotinette::findOrFail($id);

        if($request->hasFile("image")){
         if (File::exists("coverTrotinette/".$trotinette->image)) {
             File::delete("coverTrotinette/".$trotinette->image);
         }
         $file=$request->file("image");
         $trotinette->image=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/coverTrotinette"),$trotinette->image);
         $request['image']=$trotinette->image;
     }
        
         $trotinette->update([
            'nom' => $request->nom,
            'categorie_id' =>$request->categorie_id,
            'vitesse' =>$request->vitesse,
            'poids' =>$request->poids,
            'couleur' =>$request->couleur,
            'prix' =>$request->prix,
            'prix_location' =>$request->prix_location,
            'quantite' =>$request->quantite,
            'image' => $trotinette->image,

            ]);
        // $trotinette->fill($request->post())->save();

        return redirect()->route('trotinettes.index')->with('success','Trotinette Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Trotinette  $trotinette
    * @return \Illuminate\Http\Response
    */
    public function destroy(Trotinette $trotinette)
    {
        $trotinette->delete();
        return redirect()->route('trotinettes.index')->with('success','Trotinette has been deleted successfully');
    }


    
    public function export_trotinette_pdf()
    {
        $trotinettes=Trotinette::get();
        $pdf = PDF::loadview('pdftrotinette.trotinettes',[
            'trotinettes'=>$trotinettes
        ]);
        return $pdf->download('trotinettes.pdf');    
    }
    
}

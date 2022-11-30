<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Evenement;
use Illuminate\Support\Facades\File;
use App\Models\ReservationEvenement;

class EvenementController extends Controller
{
    //

    public function AllEvenement(){

        $evenements = Evenement::latest()->orderBy('id','desc')->paginate(2);


        
        return view('Evenement.BackOffice.AllEvenement',compact('evenements'));
     }


      public function AllEvenement2(Request $request){


       
//         $evenements =Evenement::where
//         (['title','!=',Null],
//         [function ($queryy) use ($request){
//             if(($query = $request->query))
//             {
//                 $queryy->orWhere('title','LIKE','%'.$query.'%')->get();
//             }
//         }
//         ])
//         ->orderBy("id","desc");
//     }

        
//         $search_text =$_GET['query'];
//         if($search_text=!null)
//         $evenements =Evenement::where('title','LIKE','%'.$search_text.'%')->get()->sortByDesc('id');
// else
        $evenements=Evenement::all();
        



        return view('Evenement.BackOffice.AllEvenement2')->with('evenements',$evenements);
     }

     /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function AddEvenement(Request $request){
        
        $validatedData = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required',
            'date' =>  ['required','after:tomorrow'],
            'capacite' => ['required','numeric'],
            'image' => 'required',
                       
        ],
        [
            'title.required' => 'Please Input an event title',
            'description.required' => 'Please Input Descrition',
            'date.required' => 'Please Input date', 
            'capacite.required' => 'lease Input capacite', 
            'image.required' => 'choose image', 

        ]);


        if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $Evenement =new Evenement([
            'title' => $request->title,
            'description' =>$request->description,
            'date' =>$request->date,
            'capacite' =>$request->capacite,
            'image' => $imageName,

            ]);
           $Evenement->save();
        }
    
        $notification = array(
            'message' => 'evenement Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect("/evenement/all")->with($notification);;




    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $evenements=Evenement::findOrFail($id);
        return view('Evenement.BackOffice.EditEvenement')->with('evenements',$evenements);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


         
        $validatedData = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required',
            'date' => 'required',
            'capacite' => 'required',
            'image' => 'required',
                       
        ],
        [
            'title.required' => 'Please Input an event title',
            'description.required' => 'Please Input Descrition',
            'date.required' => 'Please Input date', 
            'capacite.required' => 'lease Input capacite', 
            'image.required' => 'choose image', 

        ]);

        
     $evenements=Evenement::findOrFail($id);
     if($request->hasFile("image")){
         if (File::exists("cover/".$evenements->image)) {
             File::delete("cover/".$evenements->image);
         }
         $file=$request->file("image");
         $evenements->image=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/cover"),$evenements->image);
         $request['image']=$evenements->image;
     }

        $evenements->update([
            'title' => $request->title,
            'description' =>$request->description,
            'date' =>$request->date,
            'capacite' =>$request->capacite,
            'image' => $evenements->image,

        ]);

   

        return redirect("/evenement/all");

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $evenements=Evenement::findOrFail($id);

         if (File::exists("cover/".$evenements->image)) {
             File::delete("cover/".$evenements->image);
         }
    

         $ReservationEvenement= ReservationEvenement::where('evenement_id', $id)->get();
         $ReservationEvenement->each->delete();

         $evenements->delete();
         return back();


    }


    public function AllEvenementSearch(Request $request){


       
      
                $search_text =$_GET['query'];
                $evenements =Evenement::where('title','LIKE','%'.$search_text.'%')->get()->sortByDesc('id');
     
        
        
        
                return view('Evenement.BackOffice.AllEvenementSearch')->with('evenements',$evenements);
             }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationEvenement;
use App\Models\Evenement;
use Illuminate\Support\Facades\DB;
use PDF;
class ReservationEvenementController extends Controller
{
    public function AllReservationEvenement()
   {

      $ReservationEvenement = ReservationEvenement::latest()->paginate(5);
      return view('ReservationEvenement.AllReservationEvenement', compact('ReservationEvenement'));
   }

   public function createReservationEvent()
   {

      $events = Evenement::all();

      return view('ReservationEvenement.AddReservationEvenement', compact('events'));
   }
   public function createReservationEvent2($id)
   {

         // $events = Evenement::all();
         $idEvent=$id;
         $Evenement = Evenement::findOrFail($id);
         $res = DB::table('reservation_evenements')
         ->where('evenement_id', '=', $id)
         ->sum('nb_place');

         $nb_place_restante= $Evenement->capacite-$res ; 

      return view('ReservationEvenement.AddReservationEvenement2', compact('Evenement','idEvent','nb_place_restante'));
   }

 

   public function AddReservationEvenement(Request $request)
   {

      $Evenement = Evenement::findOrFail($request->evenement_id);
      


      $Evenement->evenements()->create([
         'evenement_id' => $request->evenement_id,
         'nb_place' => $request->nb_place,
         'user' => $request->user,

      ]);

      return redirect('reservationevenement/all')->with('message', 'reservation ajouté');
   }
      public function AddReservationEvenement2(Request $request)
   {


      $Evenement = Evenement::findOrFail($request->evenement_id);

      $res = DB::table('reservation_evenements')
      ->where('evenement_id', '=', $request->evenement_id)
      ->sum('nb_place');

       $nb_place_restante=  $Evenement->capacite-$res ; 

      $validatedData = $request->validate([
         'nb_place' => 'required|min:1|lte:'.$nb_place_restante,
         'user' => 'required',
       
                    
     ],
     [
         'nb_place.required' => 'Please Input number of person',
         'user.required' => 'Please write user name',
        

     ]);


    



      $Evenement->evenements()->create([
         'evenement_id' => $request->evenement_id,
         'nb_place' => $request->nb_place,
         'user' => $request->user,

      ]);
  

      return redirect('/FrontOffice/Evenements')->with('message', 'reservation ajouté');

      

   }

   public function createReservationEventEdit()
   {

      $events = Evenement::all();

      return view('ReservationEvenement.EditReservationEvenement', compact('events'));
   }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservationEvenement  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $ReservationEvenement=ReservationEvenement::findOrFail($id);
       $events = Evenement::all();

        return view('ReservationEvenement.EditReservationEvenement', compact('events'))->with('ReservationEvenement',$ReservationEvenement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservationEvenement  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     $ReservationEvenements=ReservationEvenement::findOrFail($id);


        $ReservationEvenements->update([
         'evenement_id' => $request->evenement_id,
         'nb_place' => $request->nb_place,
         'user' => $request->user,

        ]);

   

        return redirect("/reservationevenement/all");

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationEvenement  
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ReservationEvenements=ReservationEvenement::findOrFail($id);

    
         $ReservationEvenements->delete();
         return back();


    }




    public function getPostPdf ()
{


//    $ReservationEvenement = DB::table('reservation_evenements')
//    ->where('id', '=', $id)
//    ->get();

//    $event = DB::table('evenements')
//    ->where('id', '=', $ReservationEvenement->evenement_id)
//    ->get();


   
//    // $ReservationEvenement=ReservationEvenement::get();

//     $pdf = PDF::loadView('ReservationEvenement.AllReservationEvenementPDF',[
//       'ReservationEvenement'=>$ReservationEvenement , 'event'=>$event
//   ]);
//     return $pdf->download("reservations.pdf");



$ReservationEvenement=ReservationEvenement::get();
$pdf = PDF::loadview('ReservationEvenement.AllReservationEvenementPDF',[
    'ReservationEvenement'=>$ReservationEvenement
]);
return $pdf->download('ReservationEvenement.pdf');    

}


}

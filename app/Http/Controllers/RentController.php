<?php

namespace App\Http\Controllers;
use App\Models\Rent;
use App\Models\Auto;
use App\Models\Klijent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class RentController extends Controller
{
    public function index()
    {
        $rents=Rent::all();
        return view('/rents', compact('rents'));
    }
    
     public function show($id):view
    {
        $rent=Rent::find($id);
        return view('/rent_show', compact('rent'));
    }
     public function new():view
    {
        $autos=Auto::all();
        $clients=Klijent::all();
        return view('/rent_create', compact('autos' ,"clients"));
    }
     public function create(Request $request)
    {
        $rent= new Rent();
         $rent->auto_id=$request->auto_id;
         $rent->klijent_id=$request->klijent_id;
          $rent->data_wyp=$request->data_wyp;
          $rent->data_zwr=$request->data_zwr; 
           $rent->wyp_dni=$request->wyp_dni; 
           $rent->km_wyp=$request->km_wyp; 
            $rent->km_zwrot=$request->km_zwrot;
           $rent->save();     
        
        return redirect()->route('rent.index');
    }
      public function edit($id):view
    {
        $rent=Rent::find($id);
        $autos=Auto::all();
        $clients=Klijent::all();
        return view('/rent_edit', compact('rent' ,'autos' ,"clients"));
    }
     public function update(Request $request ,$id)
     
    {   
   dd(  $request->validate([
    'auto_id' => 'required|nullable',
    'klijent_id' => 'required|nullable',
    'data_wyp' => 'nullable|date',
    'data_zwr' => 'nullable|date',
    'wyp_dni' => 'nullable|integer',
]));  
        // dd($request);
         $rent=  Rent::find($id);
        // dd($rent->auto_id);
         //dd($request->auto_id);
         $rent->auto_id=$request->auto_id;
         $rent->klijent_id=$request->klijent_id;
          $rent->data_wyp=$request->data_wyp;
          $rent->data_zwr=$request->data_zwr; 
           $rent->wyp_dni=$request->wyp_dni; 
           $rent->km_wyp=$request->km_wyp; 
            $rent->km_zwrot=$request->km_zwrot;
           $rent->save();     
        
        return redirect()->route('rent.index');
    }
      public function destroy($id)
    {
       $rent=Rent::find($id);
        
        $rent->delete();
        return redirect()->route('rent.index');
    }
}

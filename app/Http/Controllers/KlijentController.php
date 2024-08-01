<?php

namespace App\Http\Controllers;
use  App\Models\Klijent;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class KlijentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $clients=Klijent::all();
        return view('clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $client=new Klijent();
        $client->surname=$request->surname;
         $client->city=$request->city;
          $client->adres=$request->adres;
           $client->phone=$request->phone;
           $client->save();
       return redirect('/clients');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
        $client=Klijent::find($id);
        return view('/client_show ' , compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id):view
    {
        $client = Klijent::find($id);
       
        
        return view('/client_edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
       $client=Klijent::find($id);
        $client->surname=$request->surname;
         $client->city=$request->city;
          $client->adres=$request->adres;
           $client->phone=$request->phone;
           $client->save();
           return redirect( route('client.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client=Klijent::find($id);
        $client->delete();
        return redirect( route('client.index'));
    }
}

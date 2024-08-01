<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



namespace App\Http\Controllers;
use  App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
class AutoController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
     
  public function index():View
  {
    $auto = Auto::all();
    return view('auto', compact('auto'));
  
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  
   public function show($id):View
  {
    $auto = Auto::find($id);
    return view('auto_show', compact('auto'));
  }
   public function create(Request $request)
   
  { 
       $auto = new Auto;
       $auto->marka=$request->marka;
       $auto->model=$request->model;
       $auto->save();
    return redirect('/auto');
  }
   public function edit($id)
  {
    $auto = Auto::find($id);
    return view('auto', compact('auto'));
  }
    public function update(Request $request, $id) 
    {
        $auto= Auto::find($id);
        $auto->marka = $request->input('marka');
        $auto->model  = $request->input('model');
       
        $auto->update();
        return redirect("/auto");
    }
     public function delete1($id)
  {
    $auto = Auto::find($id);
    $auto->delete();
    return redirect('/auto');
  }
}
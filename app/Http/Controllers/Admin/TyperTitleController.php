<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;

class TyperTitleController extends Controller
{
   public function index(TyperTitleDataTable $dataTable){
   
  
    return $dataTable-> render('admin.typer-title.index');
 
}


   public function create(){

    return view('admin.typer-title.create');
   }
  

   public function show($id){

   }

   public function store(Request $request){
  
    $request->validate([
        'title' => ['required', 'max:200']
    ]);

    $create = new TyperTitle();
    $create->title = $request->title;
    $create->save();
    toastr()->success('Created Successfully!', 'Congrats');

   return redirect()->route('admin.type-title.index');

   }


   public function edit($id)
   {
    $title = TyperTitle::findOrFail($id);
       return view('admin.typer-title.edit',compact('title'));
   }

   public function update(Request $request, $id)
   {
    $request->validate([
        'title' => ['required', 'max:200']
    ]);

    
    $edit = TyperTitle::findOrFail($id);
    $edit->title = $request->title;
    $edit->save();
    toastr()->success('Updated Successfully!', 'Congrats');

   return redirect()->route('admin.type-title.index');

   }

   /**
    * Delete the user's account.
    */
   public function destroy($id)
   
   {
    
    $title = TyperTitle::findOrFail($id);

    $title->delete();
    
    
   }
}

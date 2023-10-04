<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FeedbackDataTable;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeedbackDataTable $dataTable)
    {
        return $dataTable->render('admin.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'string',
            'description' => 'required|string|max:1000',
            
            
            
        ]);


        $storeData = [

            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
        ];

        Feedback::create($storeData);


        toastr()->success('Feedback Created Successfully!', 'Success');
        return redirect()->route('admin.feedback.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feedback = Feedback::findOrFail($id);
       
        return view('admin.feedback.edit',compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'string',
            'description' => 'required|string|max:1000',
            
            
            
        ]);

        $feedback = Feedback::findOrFail($id);

        $storeData = [
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
        ];

        $feedback->update($storeData);


        toastr()->success('Feedback Updated Successfully!', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback =Feedback::findOrFail($id);
        $feedback->delete();
    }
}

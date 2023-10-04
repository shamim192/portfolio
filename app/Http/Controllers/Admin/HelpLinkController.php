<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HelpLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\HelpLink;
use Illuminate\Http\Request;

class HelpLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HelpLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.help-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.help-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|url',
        ]);


        $storeData = [

            'name' => $request->name,
            'url' => $request->url,

        ];

        HelpLink::create($storeData);


        toastr()->success('Help Link Created Successfully!', 'Success');
        return redirect()->route('admin.help-link.index');
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
        $helpLink = HelpLink::findOrFail($id);
       
        return view('admin.help-link.edit',compact('helpLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|url',
        ]);



        $helpLink = HelpLink::findOrFail($id);


        $storeData = [

            'name' => $request->name,
            'url' => $request->url,

        ];
        $helpLink->update($storeData);

        toastr()->success('Help Link Updated Successfully!', 'Success');
        return redirect()->route('admin.help-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $helpLink = HelpLink::findOrFail($id);
        $helpLink->delete();
    }
}

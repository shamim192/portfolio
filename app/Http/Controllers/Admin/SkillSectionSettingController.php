<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillSectionSetting;
use Illuminate\Http\Request;

class SkillSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $skillSectionSetting = SkillSectionSetting::first();
        return view('admin.skill-setting.index',compact('skillSectionSetting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|max:200',
            'sub_title' => 'required|max:500',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $skillSectionSetting = SkillSectionSetting::first();
        $imagePath = handleUpload('image', $skillSectionSetting);


        SkillSectionSetting::updateOrCreate(
            [
                'id' => $id
            ],

            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => (!empty($imagePath) ? $imagePath : $skillSectionSetting->image),
            ]
        );
        toastr()->success('Updated Successfully!', 'Congrats');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

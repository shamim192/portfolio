<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.general-setting.index',compact('setting'));
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
           'logo' => 'required|max:5000|image',
           'footer_logo' => 'required|max:5000|image',
           'favicon' => 'required|max:5000|image',
        ]);

        $generalSetting = GeneralSetting::first();
       
       
        $logo = handleUpload('logo',$generalSetting);
        $footer_logo = handleUpload('footer_logo',$generalSetting);
        $favicon = handleUpload('favicon',$generalSetting);       

        GeneralSetting::updateOrCreate(
            [ 'id' => $id],
            [
             'logo' => (!empty($logo) ? $logo : $generalSetting->logo),
             'footer_logo' => (!empty($footer_logo) ? $footer_logo : $generalSetting->footer_logo),
             'favicon' =>(!empty($favicon) ? $favicon : $generalSetting->favicon),

        ]);

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

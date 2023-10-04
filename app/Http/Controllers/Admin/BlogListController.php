<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\BlogListDataTable;
use App\Models\BlogList;

class BlogListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogListDataTable $dataTable)
    {
        return $dataTable->render('admin.blog-list.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = BlogCategory::all();
        return view('admin.blog-list.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
            'title' => 'required|string|max:255',
            'category_id' => 'required|numeric',   
            'description' => 'required|string|max:10000',
                    
        ]);

        $imagePath = handleUpload('image');

        $storeData = [
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            
        ];       

        BlogList::create($storeData);

      
        toastr()->success('Blog Created Successfully!','Success');
        return redirect()->route('admin.blog-list.index');
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
        $blog = BlogList::findOrFail($id);
        $category = BlogCategory::all();
        return view('admin.blog-list.edit',compact('blog','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:5000',
            'title' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'description' => 'required|string|max:10000',
            
            
        ]);

        $blog = BlogList::findOrFail($id);
       
        if ($request->hasFile('image')) {            
            $imagePath = handleUpload('image');
            $blog->update(['image' => $imagePath]);
        }   
       
        $storeData = [           
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            
        ];
       
       $blog->update($storeData);

      
        toastr()->success('Blog Updated Successfully!','Success');
        return redirect()->route('admin.blog-list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = BlogList::findOrFail($id);
        deleteFileIfExist($blog->image);
        $blog->delete();
    }
}

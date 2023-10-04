<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {

        return $dataTable->render('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.portfolio-item.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category_id' => 'required|numeric',
            'client' => 'string',
            'website' => 'url',
        ]);

        $imagePath = handleUpload('image');

        $storeData = [
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'client' => $request->client,
            'website' => $request->website,
        ];

        PortfolioItem::create($storeData);

      
        toastr()->success('Portfolio Item Created Successfully!','Success');
        return redirect()->route('admin.portfolio-item.index');
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
        $portfolioItem = PortfolioItem::findOrFail($id);
        $category = Category::all();
        return view('admin.portfolio-item.edit',compact('portfolioItem','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:5000',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category_id' => 'required|numeric',
            'client' => 'string',
            'website' => 'url',
        ]);

        $portfolioItem = PortfolioItem::findOrFail($id);
       
        if ($request->hasFile('image')) {            
            $imagePath = handleUpload('image');
            $portfolioItem->update(['image' => $imagePath]);
        }   
       
        $storeData = [           
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'client' => $request->client,
            'website' => $request->website,
        ];
       
       $portfolioItem->update($storeData);

      
        toastr()->success('Portfolio Item Updated Successfully!','Success');
        return redirect()->route('admin.portfolio-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        deleteFileIfExist($portfolioItem->image);
        $portfolioItem->delete();
    }
}

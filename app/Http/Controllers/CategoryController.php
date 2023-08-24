<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::all();
        return view('admin.createCat', compact('categorys'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createCat');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Category::create($request->all());
        return redirect()->route('category.index')
        ->with('success','Category added successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // return view('admin.editCat',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();
      
        return redirect()->route('category.index')
        ->with('success','Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Category::exists($category)) {
        $category->delete();
        return redirect()->route('category.index')
        ->with('success','Category Deleted successfully');
    } else {
        return response('Category Not Found', 404);
    }
    }
}

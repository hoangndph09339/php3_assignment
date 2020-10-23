<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $categories = Category::all();
//        dd($user);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        return view('admin.Categories.create',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new Category();
        $cate->fill($request->all());
        if ($cate->save()){
            return redirect()->route('categories.index')->with('notify','Them Cate thanh cong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        $categories = Category::all();
        return view('admin.Categories.edit', compact('Category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($category->update($request->all())){
            return redirect()->route('categories.index')->with('notify','Sửa thể loại thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $ParentCategory = Category::where('parent_id', $category->id);
            $ParentCategory->update(['parent_id' => null]);
            $CategoryInProducts = Product::where('category_id', $category->id);
            $CategoryInProducts->update(['category_id' => null]);
            $category->delete();
        }
        return redirect()->route('categories.index')->with('notify', 'Xóa category thành công');
    }
}

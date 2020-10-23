<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
//        dd($user);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $cate = Category::all();
        return view('admin.Products.create', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('image_url')) {
            $originalFileName = $request->image_url->getClientOriginalName();
            $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
            $path = $request->file('image_url')->storeAs('products', $fileName);
            $product->image_url = $path;
        }
        if ($product->save()) {
            return redirect()->route('products.index')->with('notify', 'Thêm sản phẩm thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $comments = Comment::with(['user', 'product'])->where('product_id', $product->id)->orderBy('id', 'desc')->get();
        return view('admin.Products.show', compact('product','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.Products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('image_url')) {
            $originalFileName = $request->image_url->getClientOriginalName();
            $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
            $path = $request->file('image_url')->storeAs('products', $fileName);
            $product->image_url = $path;
            if ($product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'sale_percent' => $request->sale_percent,
                'stocks' => $request->stocks,
                'is_active' => $request->is_active,
            ])) {
                return redirect()->route('products.index')->with('notify', 'Sửa sản phẩm thành công');
            }
        } else {
            if ($product->update($request->all())) {
                return redirect()->route('products.index')->with('notify', 'Sửa sản phẩm thành công');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
//        dd($product);
        if ($product) {
            $comments = Comment::where('product_id', $product->id);
            if (isset($comments)) {
                $comments->delete();
            }
            $product->delete();
        }
        return redirect()->route('products.index')->with('notify', 'Xóa sản phẩm thành công');
    }
}

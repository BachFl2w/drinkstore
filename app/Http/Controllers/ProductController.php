<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Images;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsData = Product::all();

        return view('admin.product_list', compact('productsData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $product->name . '_' . $image->getClientOriginalName();
            $path = public_path(config('image_path.product') . $filename);
            $imageResize = Images::make($image->getRealPath())->resize(600, 348)->save($path);

            $image = new Image();
            $images->create([
                'name' => $filename,
                'product_id' => $product->id,
            ]);
        }

        return reqspone()->json([
            'success' => __('Store successfully !')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->findOrFail();

        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return reqspone()->json([
            'success' => __('Update successfully !')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return reqspone()->json([
            'success' => __('Delete successfully !')
        ]);
    }

    public function getDataJson()
    {
        $productsData = Product::with('categories')->get();

        return $productsData;
    }

    public function uploadImage(Request $request)
    {
        $images = $request->images;
        $productId = $request->product_id;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\MimeType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($info)
    {
        //create a path to put the product inside
        $path = "/public/products/user_".Auth::user()->id."/";

        //make an array containing the information needed to store the product inside the database
        $attr = [
            'user_id'     => Auth::user()->id,
            'name'        => $info['name'],
            'description' => $info['description'],
            'price'       => $info['price'],
            'pic_path'    => $path
        ];

        $product = new Product($attr);

        return $product;
    }


    /**
     * store the picture to the storage as a file
     * 
     * @param string the path that we will store the picture to
     * 
     * @param Illuminate\Http\UploadedFile the file
     * 
     * @param string the name that the pic will saved with
     * 
     * @return boolean true if the operation succeed, false otherwise
     */

    public function storeToStorage(string $path = null , UploadedFile $file = null , string $name = null) : bool {
        if($path == null || $name == null || $file == null){
            return false;
        }

        Storage::putFileAs($path , $file , $name);

        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $info = $request->safe()->except('pic');
        $file = $request->only('pic');


        //public/products/user.user_id/product.name_product.id
        $product = $this->create($info);
        $product->save();
        $count = Product::all()->count() + 1;
        $fileName = "product_".$product->id.".".( $file['pic']->extension());

        $this->storeToStorage($product->pic_path , $file['pic'] , $fileName);

        $product->pic_path = $product->pic_path.$fileName;

        return Redirect::to(route('dashboard' , ['workspace' => "add"]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function delProduct(Request $req){
        $product  = Product::find($req->input('id'));

        $product->delete();
        return json_encode([
            'message' => $product->name." was deleted successfully" 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
    }
}

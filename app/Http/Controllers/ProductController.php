<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            redirect('/login');
        }

        $product = Product::latest()->paginate(10);
        return view("index", compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'     => 'required',
        ]);

        // dd($request->all());exit;

        //upload image
        $image = $request->file('image');
        $image->storeAs('public', $image->hashName());
        
        $product = new Product;
        $product->image = $image->hashName();
        $product->name = $request->product_name;
        $product->descrption = $request->description;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        
        $product->save();

        if($product){
            //redirect dengan pesan sukses
            return redirect('/')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->get()->first();
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name'     => 'required',
        ]);

        $product = Product::findOrFail($id);

        if($request->file('image') == "") {

            $product->update([
                'name'     => $request->product_name,
                'descrption'   => $request->description,
                'buy_price'   => $request->buy_price,
                'sell_price'   => $request->sell_price,
            ]);

        } else {
            Storage::disk('local')->delete('public/'.$product->image);

            $image = $request->file('image');
            $image->storeAs('public', $image->hashName());

            $product->update([
                'image'     => $image->hashName(),
                'name'     => $request->product_name,
                'descrption'   => $request->description,
                'buy_price'   => $request->buy_price,
                'sell_price'   => $request->sell_price,
            ]);
            
        }

        if($product){
            //redirect dengan pesan sukses
            return redirect('/')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if($product){
            //redirect dengan pesan sukses
            return redirect('/')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect('/')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}

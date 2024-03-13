<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('produk.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Session::flash('category_id', $request->category_id);
         Session::flash('picture', $request->picture);
         Session::flash('name', $request->name);
         Session::flash('price', $request->price);
         Session::flash('status', $request->status);

         $request->validate([
             'category_id'=>'required',
             'picture'=>'required',
             'name'=>'required',
             'price'=>'required',
             'status'=>'required',
         ]);

         $data = [
            'category_id'=>$request->category_id,
            'picture'=> $request->file('picture')->store('promo', 'public'),
            'name'=>$request->name,
            'price'=>$request->price,
            'status'=>$request->status,
        ];
             Product::create($data);
             return redirect()->to('admin/menu')->with('success','Berhasil Menambahkan Produk');
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
        $data = product::where('name', $id)->first();
        return view('produk.edit')->with('data', $data);
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
         Session::flash('category_id', $request->category_id);
         Session::flash('picture', $request->picture);
         Session::flash('name', $request->name);
         Session::flash('price', $request->price);
         Session::flash('status', $request->status);

         $request->validate([
             'category_id'=>'required',
             'picture'=>'required',
             'name'=>'required',
             'price'=>'required',
             'status'=>'required',
         ]);

         $data = [
            'category_id'=>$request->category_id,
            'picture'=>$request->file('picture')->store('promo', 'public'),
            'name'=>$request->name,
            'price'=>$request->price,
            'status'=>$request->status,
        ];
        Product::where('name', $id)->update($data);
        return redirect()->to('admin/menu')->with('success','Berhasil Melakukan Update Produk.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('name', $id)->delete();
        return redirect()->to('admin/menu')->with('success', 'Berhasil Menghapus Produk!');
    }
}
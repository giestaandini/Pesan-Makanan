<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pencarian = $request->pencarian;
        $jumlahBaris = 4;
        if(strlen($pencarian)){
            $data = kategori::where('idkategori','like',"%$pencarian%")
                    ->orWhere('kategori','like',"%$pencarian%")
                    ->paginate($jumlahBaris);
        } else {
            $data = kategori::orderBy('idkategori', 'desc')->paginate($jumlahBaris);
        }
        return view('Kategori.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('idkategori', $request->idkategori);
        Session::flash('kategori', $request->kategori);

        $request->validate([
            'idkategori'=>'required|numeric|unique:kategori,idkategori',
            'kategori'=>'required'
        ],[
            'idkategori.unique' => 'ID Kategori Sudah Ada Didalam Database.'
        ]);
        $data = [
            'idkategori'=>$request->idkategori,
            'kategori'=>$request->kategori,
        ];
        Kategori::create($data);
        return redirect()->to('user/kategori')->with('success','Berhasil Menambahkan Kategori');
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
        $data = kategori::where('idkategori', $id)->first();
        return view('kategori.edit')->with('data', $data);
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
        $request->validate([
            'kategori'=>'required'
        ]);
        $data = [
            'kategori'=>$request->kategori,
        ];
        Kategori::where('idkategori', $id)->update($data);
        return redirect()->to('user/kategori')->with('success','Berhasil Melakukan Update Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori::where('idkategori', $id)->delete();
        return redirect()->to('user/kategori')->with('success', 'Berhasil Menghapus Kategori');
    }
}

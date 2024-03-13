<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illmuninate\Support\Facades\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::with('product')->get();
        return view('Order.index', compact('orders'));
    }

    // function view_pdf() 
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $orders = order::with('product')->get();
    //     $html = view('order.cetak', compact('orders'))->render();
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output('nama_file.pdf', 'I');
    //     return $mpdf;
    // }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'asem';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = order::where('meja', $id)->first();
        return view('Order.edit')->with('data', $data);
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
         Session::flash('status', $request->status);

         $request->validate([
             'status'=>'required',
         ]);

         $data = [
            'status'=>$request->status,
        ];
        order::where('status', $id)->update($data);
        return redirect()->to('admin/orderan')->with('success','Berhasil Melakukan Update Pesanan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        order::where('meja', $id)->delete();
        return redirect()->to('admin/orderan')->with('success', 'Berhasil Menghapus Pesanan!');
    }
}

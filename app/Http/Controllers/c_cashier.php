<?php

namespace App\Http\Controllers;
use App\m_transaksi;
use App\m_sukucadang;
use App\m_detailtransaksi;
use Illuminate\Http\Request;

class c_cashier extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_transaksi = m_transaksi::all()->where('status','proses');
        return view('cashier.table_data.data_transaksi',compact('data_transaksi'));
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

    public function aksi_delete($id_transaksi){
        $data_transaksi = m_transaksi::find($id_transaksi);
        $data_transaksi->delete();
        return redirect('cashier'); 
    }

    public function proses($id_transaksi)
    {
        $data_suku = m_sukucadang::all();
        $data_transaksi =  m_transaksi::find($id_transaksi); 
        $data_detail = m_detailtransaksi::all()->where('id_transaksi',$id_transaksi); 
        return view('cashier.crud.proses',compact('data_transaksi','data_suku','data_detail'));
    }




    public function aksi_tambahSuku(Request $request){
        // return var_dump($request->input());
        $arr = $request->input('id_sukucadang');
        $sukucadang = explode(',', $arr);
        $id_transaksi = $request->input('id_transaksi');
        $data_detail = new m_detailtransaksi([
            'id_transaksi' => $request->input('id_transaksi'),
            'id_user' => '11',
            'tgl_transaksi' => $request->input('tgl_transaksi'),
            'nama_customer' => $request->input('nama_customer'),
            'plat_nomor' => $request->input('plat_nomor'),
            'id_sukucadang' => $sukucadang[0],
            'nama_mekanik' => $request->input('nama_mekanik'),
            'harga' => $sukucadang[1],           
            'merk_motor' => $request->input('merk_motor'),            
            'status' => 'selesai'                                    
        ]);
        $data_detail->save();

        return redirect('cashier/'.$id_transaksi.'/proses');

    }

    public function indexsukucadang(Request $request){
        $data_sukucadang = m_sukucadang::all();
        return view('cashier.table_data.data_sukucadang',compact('data_sukucadang'));

    }

    public function add_sukucadang(Request $request){
        return view('cashier.crud.addSukuCadang');

    }
    public function aksi_addsukucadang(Request $request){
        // return var_dump($request->input());

        $data_sukucadang = new m_sukucadang([
            'nama' => $request->input('nama_suku'),
            'harga' => $request->input('harga'),  
            'stock' => $request->input('stock'),                                 
        ]);
        $data_sukucadang->save();

        return redirect('cashier/indexSukucadang');

    }

    public function updateDataSuku($id_suku)
    {
        $data_suku =  m_sukucadang::find($id_suku);  
        return view('cashier.crud.updateSuku',compact('data_suku'));
    }

    public function aksi_updateSuku(Request $request,$id_suku)
    {
        $data_suku = m_sukucadang::find($id_suku);
        $data_suku->nama = $request->input('nama_suku');
        $data_suku->harga = $request->input('harga');
        $data_suku->stock = $request->input('stock');        
        $data_suku->save();
        return redirect('cashier/indexSukucadang');   
        

    }

    public function delete_suku($id_suku){
        $data_suku = m_sukucadang::find($id_suku);
        $data_suku->delete();
        return redirect('cashier/indexSukucadang');

    }

    public function hapus_suku($id_transaksi,$nomor){
        $data_transaksi = m_detailtransaksi::find($nomor);
        $data_transaksi->delete();
        return redirect('cashier/'.$id_transaksi.'/proses'); 
    }

    public function submit_detail($id_transaksi){
        $data_detail = m_transaksi::find($id_transaksi);
        $data_detail->status = 'selesai';
        $data_detail->save();
        return redirect('cashier'); 
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
     * @param  \App\m_sukucadang  $m_sukucadang
     * @return \Illuminate\Http\Response
     */
    public function show(m_sukucadang $m_sukucadang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\m_sukucadang  $m_sukucadang
     * @return \Illuminate\Http\Response
     */
    public function edit(m_sukucadang $m_sukucadang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\m_sukucadang  $m_sukucadang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, m_sukucadang $m_sukucadang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_sukucadang  $m_sukucadang
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_sukucadang $m_sukucadang)
    {
        //
    }
}

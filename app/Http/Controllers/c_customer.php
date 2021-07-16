<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\m_transaksi;

class c_customer extends Controller
{
    public function index(){
        return view('customer.form_transaksi');
    }
    public function aksi_create(Request $request){
    	$date = Carbon::now();
    	$id_transaksi = self::getID();
        $data_transaksi = new m_transaksi([
            'id_transaksi' => $id_transaksi,
            'tgl_transaksi' => $date,
            'nama_customer' => $request->input('nama_customer'),
            'plat_nomor' => $request->input('plat_nomor'),
            'nohp_cust' => $request->input('nohp_cust'),
            'merk_motor' => $request->input('merk_motor'),
            'keluhan' => $request->input('keluhan'),
            'status' => 'proses',            
        ]);
        $data_transaksi->save();

        return redirect('/');

    }


    public function getID(){
        $day = Carbon::now();
        $ran = Str::random(4);
        $sub = Str::of($day)->substr(5, 6);
        $id_transaksi = "TR-" . $sub . "-" .$ran;

        return $id_transaksi;
    }
}

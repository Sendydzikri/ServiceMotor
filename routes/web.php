 <?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   if(session('login')){
   		if(session('manager')){
		  	return redirect('/manager');   			
   		}else{
   			return redirect('/cashier'); 
   		}
   }else{
   	 return redirect('/login');
   }
});

Route::get('/login','c_login@index');
Route::post('/login/aksi_login','c_login@login');
Route::get('/form_transaksi','c_customer@index');
Route::post('/form_transaksi/aksi_create','c_customer@aksi_create');


Route::group(['middleware' => 'cek_loginMiddle'], function(){

Route::get('/manager','c_manager@index');
Route::get('/manager/create','c_manager@create');
Route::post('/manager/aksi_create','c_manager@aksi_create');
Route::get('/manager/{id_user}/update','c_manager@updateData');
Route::patch('/manager/{id_user}/aksi_update','c_manager@aksi_update');
Route::delete('/manager/{id_user}/aksi_delete','c_manager@aksi_delete');
Route::get('/logout','c_login@logout');


Route::get('/cashier','c_cashier@index');
Route::get('/cashier/indexSukucadang','c_cashier@indexsukucadang');
Route::get('/cashier/addSukucadang','c_cashier@add_sukucadang');
Route::post('/cashier/aksi_addSukucadang','c_cashier@aksi_addSukucadang');
Route::get('/cashier/{id_sukucadang}/updateSuku','c_cashier@updateDataSuku');
Route::patch('/cashier/{id_sukucadang}/aksi_updateSuku','c_cashier@aksi_updateSuku');
Route::delete('/cashier/{id_suku}/delete_suku','c_cashier@delete_suku');


Route::patch('/cashier/{id_transaksi}/aksi_update','c_cashier@aksi_update');
Route::delete('/cashier/{id_transaksi}/aksi_delete','c_cashier@aksi_delete');
Route::post('/cashier/detailtransaksi','c_cashier@detailtransaksi');

Route::get('/cashier/{id_transaksi}/proses','c_cashier@proses');
Route::post('/cashier/{id_transaksi}/aksi_proses','c_cashier@aksi_proses');

Route::post('/cashier/aksi_tambahSuku','c_cashier@aksi_tambahSuku');
Route::delete('/cashier/{id_transaksi}/{nomor}/hapus_suku','c_cashier@hapus_suku');

Route::patch('/cashier/{id_transaksi}/submit','c_cashier@submit_detail');

});


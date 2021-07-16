<?php

namespace App\Http\Controllers;
use App\m_user;
use Illuminate\Http\Request;

class c_manager extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_users = m_user::all();
        return view('manager.table_data.data_users',compact('data_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.crud.create');
    }

    public function aksi_create(Request $request){
        // return var_dump($request->input());
        $data_users = new m_user([
            'nama_user' => $request->input('nama_user'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'role' => $request->input('role')
        ]);
        $data_users->save();

        return redirect('manager');

    }



    public function updateData($id_user)
    {
        $data_users =  m_user::find($id_user);  
        return view('manager.crud.update',compact('data_users'));
    }


    public function aksi_update(Request $request,$id_user)
    {
        $data_users = m_user::find($id_user);
        $data_users->nama_user = $request->input('nama_user');
        $data_users->username = $request->input('username');
        $data_users->password = $request->input('password');    
        $data_users->role = $request->input('role');
        $data_users->save();
        return redirect('manager');   
        

    }

    public function aksi_delete($id_user)
    {
        $data_users = m_user::find($id_user);
        $data_users->delete();
        return redirect('manager');   
        

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

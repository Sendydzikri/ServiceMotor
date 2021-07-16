<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\m_user;
use Illuminate\Http\Request;

class c_login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = m_user::all()->where('username',$username)->first();
                              

        if($user && Hash::check($user->password,Hash::make($password)))
        {
            if($user->role == 'manager'){
                session(['login' => true]);
                session(['manager' => true]);
                return redirect('manager');
            }else{
                session(['login' => true]);
                session(['cashier' =>true]);
                session(['id_user',$user->id_user]);
                return redirect('cashier');
            }
        }else{
             return redirect('/login')->with('message','Email Atau Password salah !');
        }
              
        
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
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
     * @param  \App\m_user  $m_user
     * @return \Illuminate\Http\Response
     */
    public function show(m_user $m_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\m_user  $m_user
     * @return \Illuminate\Http\Response
     */
    public function edit(m_user $m_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\m_user  $m_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, m_user $m_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_user  $m_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_user $m_user)
    {
        //
    }
}

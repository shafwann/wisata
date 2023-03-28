<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Admin extends Controller
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

    public function superadmin()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/user');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $user = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/admin');
        $statusCode = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $admin = json_decode($body1, true);

        // dd($data);
        // return view('/api/listagama88', ['data88' => $data]);

        return view('superadmin.dashboard', ['user' => $user], ['admin' => $admin]);
    }

    public function admin()
    {
        return view('superadmin.admin');
    }

    public function destinasi()
    {
        return view('superadmin.destinasi');
    }

    public function menu()
    {
        return view('superadmin.menu');
    }

    public function tambahAdmin()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/role');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return view('superadmin.tambahAdmin', ['data' => $data]);
    }

    public function prosesTambahAdmin(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            // English uppercase characters (A – Z)
            // English lowercase characters (a – z)
            // Base 10 digits (0 – 9)
            // Non-alphanumeric (For example: !, $, #, or %)
        ]);

        $client = new Client();
        $response = $client->request('POST', 'http://localhost/wisata/public/api/tambah-admin', [
            'form_params' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'role_id' => $request->role_id,
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }
}

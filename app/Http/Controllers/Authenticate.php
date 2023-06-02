<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Authenticate extends Controller
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

    public function login()
    {
        return view('authenticate.login');
    }

    public function prosesLogin(Request $request)
    {
        // $client = new Client();
        // $response = $client->request('POST', 'http://localhost/wisata/public/api/proses-login', [
        //     'form_params' => [
        //         'email' => $request->email,
        //         'password' => $request->password,
        //     ]
        // ]);
        // $statusCode = $response->getStatusCode();
        // $body = $response->getBody();

        // $data = json_decode($body, true);

        // if ($data['success'] == true) {
        //     return redirect('/');
        // } else {
        //     Session::flash('error', 'Email atau Password salah');
        //     return redirect('/login');
        // }

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role_id == '5') {
                return redirect('/');
            } else {
                return redirect('/login');
            }
        } else {
            Session::flash('error', 'Email atau Password salah');
            return redirect('/login');
        }
    }

    public function register()
    {
        return view('authenticate.register');
    }

    public function prosesRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            // English uppercase characters (A – Z)
            // English lowercase characters (a – z)
            // Base 10 digits (0 – 9)
            // Non-alphanumeric (For example: !, $, #, or %)
        ]);

        $client = new Client();
        $response = $client->request('POST', 'http://localhost/wisata/public/api/proses-register', [
            'form_params' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password,
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        if ($data['success'] == true) {
            return redirect('/login');
        } else {
            Session::flash('error', 'Email atau Password salah');
            return redirect('/register');
        }
    }

    public function forgotPassword()
    {
        return view('authenticate.forgotPassword');
    }

    public function checkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->role_id == '5') {
                return redirect('/reset-password/' . $user->id);
            } else {
                Session::flash('error', 'Email tidak ditemukan');
                return redirect('/forgot-password');
            }
        } else {
            Session::flash('error', 'Email tidak ditemukan');
            return redirect('/forgot-password');
        }
    }

    public function resetPassword($id)
    {
        $id = User::findorfail($id);
        return view('authenticate.resetPassword', compact('id'));
    }

    public function prosesResetPassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            // English uppercase characters (A – Z)
            // English lowercase characters (a – z)
            // Base 10 digits (0 – 9)
            // Non-alphanumeric (For example: !, $, #, or %)
        ]);

        $client = new Client();
        $response = $client->request('PUT', 'http://localhost/wisata/public/api/proses-reset-password/' . $id, [
            'form_params' => [
                'id' => $id,
                'password' => $request->password,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        if ($data['success'] == true) {
            return redirect('/login');
        } else {
            Session::flash('error', 'Email atau Password salah');
            return redirect('/register');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function loginAdmin()
    {
        return view('superadmin.login');
    }

    public function prosesLoginAdmin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role_id == '1') {
                return redirect('/superadmin');
            } elseif (Auth::user()->role_id == '2') {
                return redirect('/admin-kabupaten');
            } elseif (Auth::user()->role_id == '3') {
                return redirect('/admin-desa');
            } elseif (Auth::user()->role_id == '4') {
                return redirect('/admin-destinasi');
            } else {
                return redirect('/login-admin');
            }
        } else {
            Session::flash('error', 'Email atau Password salah');
            return redirect('/login-admin');
        }
    }
}

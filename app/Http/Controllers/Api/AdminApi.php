<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatApi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminApi extends Controller
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

    public function user()
    {
        $user = User::latest()->where('role_id', '5')->get();
        $total = count($user);
        return new FormatApi(true, 'List User', $total);
    }

    public function admin()
    {
        $role_id = ['2', '3', '4'];
        $user = User::latest()->whereIn('role_id', $role_id)->get();
        $total = count($user);
        return new FormatApi(true, 'List User', $total);
    }

    public function role()
    {
        $role = Role::whereIn('id', [2, 3, 4])->latest()->get();
        return new FormatApi(true, 'List Role', $role);

        // $user = Auth::user();
        // $role = $user->role;
        // return response()->json($role);
    }

    public function tambahAdmin(Request $request)
    {
        if ($request->role_id == '2') {
            $add = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ]);
        } elseif ($request->role_id == '3') {
            $add = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'edit_admin_desa' => '0',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '1',
                'mengajukan_destinasi' => '1',
                'konfirmasi_tiket' => '0',
            ]);
        } elseif ($request->role_id == '4') {
            $add = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'edit_admin_desa' => '0',
                'approve_wisata' => '0',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '1',
            ]);
        }

        return new FormatApi(true, 'Admin Berhasil Ditambahkan', $add);
    }
}

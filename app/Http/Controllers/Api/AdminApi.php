<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatApi;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\Province;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return new FormatApi(true, 'List User', $user);
    }

    public function adminCount()
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

    public function tambahKabupaten(Request $data)
    {
        $add = Kabupaten::create([
            'nama_kabupaten' => $data->nama_kabupaten,
            'user_id' => $data->user_id,
        ]);

        return new FormatApi(true, 'Kabupaten Berhasil Ditambahkan', $add);
    }

    public function tambahAdmin(Request $request)
    {
        $add = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'edit_admin_desa' => '1',
            'approve_wisata' => '1',
            'tambah_edit_admin_destinasi' => '0',
            'mengajukan_destinasi' => '0',
            'konfirmasi_tiket' => '0',
        ]);


        return new FormatApi(true, 'Admin Kabupaten Berhasil Ditambahkan', $add);
    }

    public function adminKabupaten()
    {
        $user = Auth::getUser();

        return new FormatApi(true, 'List Admin Kabupaten', $user);
    }

    public function adminKabupatenSpec($id)
    {
        $user = User::where('id', $id)->get();

        return new FormatApi(true, 'List Admin Kabupaten', $user);
    }

    public function kategori()
    {
        $kategori = Kategori::latest()->get();
        return new FormatApi(true, 'List Kategori', $kategori);
    }

    public function tambahKategori(Request $request)
    {
        $add = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return new FormatApi(true, 'Kategori Berhasil Ditambahkan', $add);
    }

    public function getKategori($id)
    {
        $kategori = Kategori::find($id);
        // $kategori = Kategori::where('id', $id)->first();
        return new FormatApi(true, 'List Kategori', $kategori);
    }

    public function editKategori(Request $request, $id)
    {
        $edit = Kategori::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return new FormatApi(true, 'Kategori Berhasil Diubah', $edit);
    }

    public function hapusKategori($id)
    {
        $hapus = Kategori::where('id', $id)->delete();

        return new FormatApi(true, 'Kategori Berhasil Dihapus', $hapus);
    }

    public function province()
    {
        $province = Province::all();
        return new FormatApi(true, 'List Provinsi', $province);
    }
}

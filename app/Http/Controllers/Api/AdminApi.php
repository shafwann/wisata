<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatApi;
use App\Models\Destinasi;
use App\Models\District;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Role;
use App\Models\User;
use App\Models\Village;
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

    public function tambahAdmin(Request $request)
    {
        if ($request->role_id == '2') {
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
        } elseif ($request->role_id == '3') {
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
                'edit_admin_desa' => '0',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '1',
                'mengajukan_destinasi' => '1',
                'konfirmasi_tiket' => '0',
            ]);
        }


        return new FormatApi(true, 'Admin Kabupaten Berhasil Ditambahkan', $request->province_id, $add);
    }

    public function hapusAdmin($id)
    {
        $hapus = User::where('id', $id)->delete();

        return new FormatApi(true, 'Admin Berhasil Dihapus', $hapus);
    }

    public function nonaktifEditAdminDesa($id)
    {
        $edit = User::where('id', $id)->update([
            'edit_admin_desa' => '0',
        ]);

        return new FormatApi(true, 'Edit Admin Desa Berhasil Dinonaktifkan', $edit);
    }

    public function aktifEditAdminDesa($id)
    {
        $edit = User::where('id', $id)->update([
            'edit_admin_desa' => '1',
        ]);

        return new FormatApi(true, 'Edit Admin Desa Berhasil Diaktifkan', $edit);
    }

    public function nonaktifApproveWisata($id)
    {
        $edit = User::where('id', $id)->update([
            'approve_wisata' => '0',
        ]);

        return new FormatApi(true, 'Approve Wisata Berhasil Dinonaktifkan', $edit);
    }

    public function aktifApproveWisata($id)
    {
        $edit = User::where('id', $id)->update([
            'approve_wisata' => '1',
        ]);

        return new FormatApi(true, 'Approve Wisata Berhasil Diaktifkan', $edit);
    }

    public function nonaktifTambahEditAdminDestinasi($id)
    {
        $edit = User::where('id', $id)->update([
            'tambah_edit_admin_destinasi' => '0',
        ]);

        return new FormatApi(true, 'Tambah Edit Admin Destinasi Berhasil Dinonaktifkan', $edit);
    }

    public function aktifTambahEditAdminDestinasi($id)
    {
        $edit = User::where('id', $id)->update([
            'tambah_edit_admin_destinasi' => '1',
        ]);

        return new FormatApi(true, 'Tambah Edit Admin Destinasi Berhasil Diaktifkan', $edit);
    }

    public function nonaktifMengajukanDestinasi($id)
    {
        $edit = User::where('id', $id)->update([
            'mengajukan_destinasi' => '0',
        ]);

        return new FormatApi(true, 'Mengajukan Destinasi Berhasil Dinonaktifkan', $edit);
    }

    public function aktifMengajukanDestinasi($id)
    {
        $edit = User::where('id', $id)->update([
            'mengajukan_destinasi' => '1',
        ]);

        return new FormatApi(true, 'Mengajukan Destinasi Berhasil Diaktifkan', $edit);
    }

    public function nonaktifKonfirmasiTiket($id)
    {
        $edit = User::where('id', $id)->update([
            'konfirmasi_tiket' => '0',
        ]);

        return new FormatApi(true, 'Konfirmasi Tiket Berhasil Dinonaktifkan', $edit);
    }

    public function aktifKonfirmasiTiket($id)
    {
        $edit = User::where('id', $id)->update([
            'konfirmasi_tiket' => '1',
        ]);

        return new FormatApi(true, 'Konfirmasi Tiket Berhasil Diaktifkan', $edit);
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

    public function regency()
    {
        $regency = Regency::all();
        return new FormatApi(true, 'List Kabupaten', $regency);
    }

    public function district()
    {
        $district = District::all();
        return new FormatApi(true, 'List Kecamatan', $district);
    }

    public function village()
    {
        $village = Village::all();
        return new FormatApi(true, 'List Desa', $village);
    }

    public function destinasi()
    {
        $destinasi = Destinasi::latest()->get();
        return new FormatApi(true, 'List Destinasi', $destinasi);
    }

    public function approveDestinasiAdminDesa($id)
    {
        $destinasi = Destinasi::where('id', $id)->update([
            'approve' => '1',
        ]);
        return new FormatApi(true, 'Approve', $destinasi);
    }

    public function rejectDestinasiAdminDesa($id)
    {
        $destinasi = Destinasi::where('id', $id)->update([
            'approve' => '0',
        ]);
        return new FormatApi(true, 'Reject', $destinasi);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Destinasi;
use Illuminate\Support\Str;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Kategori;
use App\Models\ProfilDesa;
use App\Models\ProfilKabupaten;
use App\Models\Tiket;
use App\Models\Village;
use App\Models\Wahana;
use Illuminate\Support\Facades\Auth;

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
        $response = $client->request('GET', 'http://localhost/wisata/public/api/user-count');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $user = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/admin-count');
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $admin = json_decode($body1, true);

        $response2 = $client->request('GET', 'http://localhost/wisata/public/api/desa-count');
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody();

        $desa = json_decode($body2, true);

        $response3 = $client->request('GET', 'http://localhost/wisata/public/api/destinasi-count');
        $statusCode3 = $response3->getStatusCode();
        $body3 = $response3->getBody();

        $destinasi = json_decode($body3, true);

        $banner = Banner::first()->gambar;
        $banner = explode("|", $banner);

        // return view('superadmin.dashboard', ['user' => $user], ['admin' => $admin], ['desa' => $desa], ['destinasi' => $destinasi]);
        return view('superadmin.dashboard', ['user' => $user, 'admin' => $admin, 'desa' => $desa, 'destinasi' => $destinasi, 'banner' => $banner]);
    }

    public function gantiBanner(Request $request)
    {
        $files = [];
        if ($request->hasfile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('/images'), $name);
                $files[] = $name;
            }

            Banner::where('id', 1)->update([
                'gambar' => implode("|", $files),
            ]);

            return redirect('/superadmin');
        } else {
            $imagePost = "Banner1.png|Banner2.png|Banner3.png";

            Banner::where('id', 1)->update([
                'gambar' => $imagePost,
            ]);

            return redirect('/superadmin');
        }
    }

    public function user()
    {
        return view('superadmin.user');
    }

    public function admin()
    {
        $client = new Client();
        // $response = $client->request('GET', 'http://localhost/wisata/public/api/admin');
        // $statusCode = $response->getStatusCode();
        // $body = $response->getBody();

        // $data = json_decode($body, true);

        $role_id = ['2', '3', '4'];
        $data = User::latest()->whereIn('role_id', $role_id)->paginate(5);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/role');
        $statusCode = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $role = json_decode($body1, true);

        return view('superadmin.admin', ['admin' => $data], ['role' => $role]);
    }

    public function kategori()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/kategori');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return view('superadmin.kategori', ['kategori' => $data]);
    }

    public function tambahKategori(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        if ($request->icon == null) {
            $kategori = Kategori::create([
                'nama_kategori' => $request->nama_kategori,
                'icon' => 'fa-tree',
            ]);
        } else {
            $kategori = Kategori::create([
                'nama_kategori' => $request->nama_kategori,
                'icon' => $request->icon,
            ]);
        }

        return redirect('/superadmin/kategori');
    }

    public function prosesTambahKategori(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'http://localhost/wisata/public/api/tambah-kategori', [
            'form_params' => [
                'nama_kategori' => $request->nama_kategori,
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/kategori');
    }

    public function editKategori(Request $request,$id)
    {
        $client = new Client();
        $response = $client->request('PUT', 'http://localhost/wisata/public/api/edit-kategori/' . $id, [
            'form_params' => [
                'nama_kategori' => $request->nama_kategori,
                'icon' => $request->icon,
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/kategori');
    }

    public function prosesHapusKategori($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/wisata/public/api/hapus-kategori/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/kategori');
    }

    public function tambahAdmin()
    {
        $client = new Client();

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/province');
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $data = json_decode($body1, true);

        return view('superadmin.tambahAdmin', ['data' => $data]);
    }

    public function getRegency(Request $request)
    {
        $province_id = $request->province_id;

        $regencies = Regency::where('province_id', $province_id)->get();

        $option = "<option>Pilih Kabupaten/Kota</option>";
        foreach ($regencies as $kabupaten) {
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
        echo $option;
    }

    public function getDistrict(Request $request)
    {
        $districts = District::where('regency_id', $request->regency_id)->get();

        $option = "<option>Pilih Kecamatan</option>";
        foreach ($districts as $kecamatan) {
            $option .=  "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getVillage(Request $request)
    {
        $villages = Village::where('district_id', $request->district_id)->get();

        $option = "<option>Pilih Desa/Kelurahan</option>";
        foreach ($villages as $desa) {
            $option .=  "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }

    public function prosesTambahAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            // English uppercase characters (A – Z)
            // English lowercase characters (a – z)
            // Base 10 digits (0 – 9)
            // Non-alphanumeric (For example: !, $, #, or %)
            'phone' => 'required|numeric|digits_between:10,13',
            'role_id' => 'required',
        ]);

        // $client = new Client();
        // $response = $client->request('POST', 'http://localhost/wisata/public/api/tambah-admin', [
        //     'form_params' => [
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password,
        //         'role_id' => $request->role_id,
        //         'province_id' => $request->province_id,
        //         'regency_id' => $request->regency_id,
        //         'district_id' => $request->district_id,
        //         'village_id' => $request->village_id,
        //         'phone' => $request->phone,
        //     ]
        // ]);
        // $statusCode = $response->getStatusCode();
        // $body = $response->getBody();

        // $data = json_decode($body, true);

        if ($request->role_id == '2') {
            $add = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ]);
            ProfilKabupaten::create([
                'admin_id' => $add->id,
                'nama_kabupaten' => $request->name,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'foto_kabupaten' => 'kabupaten_default.jpg',
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
            ProfilDesa::create([
                'admin_id' => $add->id,
                'nama_desa' => $request->name,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
            ]);
        } else {
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
                'approve_wisata' => '0',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '1',
            ]);
        }

        return redirect('/superadmin/daftar-admin');
    }

    public function editAdmin($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/admin/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/province');
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $data1 = json_decode($body1, true);

        return view('superadmin.editAdmin', ['data' => $data, 'data1' => $data1]);
    }

    public function prosesEditAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            // English uppercase characters (A – Z)
            // English lowercase characters (a – z)
            // Base 10 digits (0 – 9)
            // Non-alphanumeric (For example: !, $, #, or %)
            'phone' => 'required|numeric|digits_between:10,13',
            'role_id' => 'required',
        ]);

        $client = new Client();
        $response = $client->request('PUT', 'http://localhost/wisata/public/api/edit-admin/' . $id, [
            'form_params' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role_id' => $request->role_id,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                'phone' => $request->phone,
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function hapusAdmin($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/wisata/public/api/hapus-admin/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        // $response1 = $client->request('DELETE', 'http://localhost/wisata/public/api/hapus-profil-admin/' . $id);
        // $statusCode1 = $response1->getStatusCode();
        // $body1 = $response1->getBody();

        // $data1 = json_decode($body1, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function nonaktifEditAdminDesa($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/nonaktif-edit-admin-desa/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function aktifEditAdminDesa($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/aktif-edit-admin-desa/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function nonaktifApproveWisata($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/nonaktif-approve-wisata/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function aktifApproveWisata($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/aktif-approve-wisata/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function nonaktifTambahEditAdminDestinasi($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/nonaktif-tambah-edit-admin-destinasi/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function aktifTambahEditAdminDestinasi($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/aktif-tambah-edit-admin-destinasi/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function nonaktifMengajukanDestinasi($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/nonaktif-mengajukan-destinasi/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function aktifMengajukanDestinasi($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/aktif-mengajukan-destinasi/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function nonaktifKonfirmasiTiket($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/nonaktif-konfirmasi-tiket/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function aktifKonfirmasiTiket($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/aktif-konfirmasi-tiket/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/superadmin/daftar-admin');
    }

    public function tambahKabupaten($id)
    {
        $client = new Client();

        $response = $client->request('GET', 'http://localhost/wisata/public/api/admin-kabupaten-spec/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        $response1 = $client->request('POST', 'http://localhost/wisata/public/api/tambah-kabupaten', [
            'form_params' => [
                'nama_kabupaten' => $data['data'][0]['name'],
                'user_id' => $data['data'][0]['id'],
            ]
        ]);

        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $data1 = json_decode($body1, true);

        return redirect('/superadmin/daftar-admin');
        // dd($data);
    }

    // ADMIN KABUPATEN
    public function adminKabupaten()
    {
        $id_user = Auth::user()->id;
        $id_provinsi = Auth::user()->province_id;
        $id_kabupaten = Auth::user()->regency_id;

        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/profil-kabupaten/' . $id_user);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $profil = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/jumlah-destinasi/' . $id_kabupaten);
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $jumlahDestinasi = json_decode($body1, true);

        $response2 = $client->request('GET', 'http://localhost/wisata/public/api/jumlah-desa/' . $id_kabupaten);
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody();

        $jumlahDesa = json_decode($body2, true);

        $response3 = $client->request('GET', 'http://localhost/wisata/public/api/jumlah-admin-desa-spesifik/' . $id_kabupaten);
        $statusCode3 = $response3->getStatusCode();
        $body3 = $response3->getBody();

        $jumlahAdmin = json_decode($body3, true);

        $response4 = $client->request('GET', 'http://localhost/wisata/public/api/provinsi-spesifik/' . $id_provinsi);
        $statusCode4 = $response4->getStatusCode();
        $body4 = $response4->getBody();

        $provinsi = json_decode($body4, true);

        return view('adminkabupaten.dashboard', ['profil' => $profil, 'jumlahDestinasi' => $jumlahDestinasi, 'jumlahDesa' => $jumlahDesa, 'jumlahAdmin' => $jumlahAdmin, 'provinsi' => $provinsi]);
    }

    public function editProfilAdminKabupaten($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/profil-kabupaten/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $profil = json_decode($body, true);

        return view('adminkabupaten.editProfil', ['profil' => $profil]);
    }

    public function prosesEditProfilAdminKabupaten(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kabupaten' => 'required',
            'foto_kabupaten' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_kabupaten')) {
            $image = $request->file('foto_kabupaten');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $client = new Client();
            $response = $client->request('PUT', 'http://localhost/wisata/public/api/edit-profil-admin-kabupaten/' . $id, [
                'form_params' => [
                    'nama_kabupaten' => $request->nama_kabupaten,
                    'foto_kabupaten' => $name,
                ]
            ]);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody();

            $data = json_decode($body, true);
        }

        return redirect('/admin-kabupaten');
    }

    public function daftarAdminKabupaten()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/daftar-admin-dari-kabupaten/' . Auth::user()->regency_id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $admin = json_decode($body, true);

        return view('adminkabupaten.daftarAdmin', ['admin' => $admin]);
    }

    public function destinasiAdminKabupaten()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/destinasi');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $destinasi = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/kategori');
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $kategori = json_decode($body1, true);

        $response2 = $client->request('GET', 'http://localhost/wisata/public/api/district');
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody();

        $kecamatan = json_decode($body2, true);


        $response3 = $client->request('GET', 'http://localhost/wisata/public/api/village');
        $statusCode3 = $response3->getStatusCode();
        $body3 = $response3->getBody();

        $desa = json_decode($body3, true);

        $response4 = $client->request('GET', 'http://localhost/wisata/public/api/regency');
        $statusCode4 = $response4->getStatusCode();
        $body4 = $response4->getBody();

        $kabupaten = json_decode($body4, true);

        return view('adminkabupaten.destinasi', ['destinasi' => $destinasi, 'kategori' => $kategori, 'kabupaten' => $kabupaten, 'kecamatan' => $kecamatan, 'desa' => $desa]);
    }

    public function approveDestinasiAdminKabupaten($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/approve-destinasi/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/admin-kabupaten/destinasi');
    }

    public function rejectDestinasiAdminKabupaten($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/reject-destinasi/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/admin-kabupaten/destinasi');
    }

    // ADMIN DESA
    public function adminDesa()
    {
        $destinasi = Destinasi::where('village_id', Auth::user()->village_id)->get();
        $jumlahDestinasi = count($destinasi);

        $admin = User::where('village_id', Auth::user()->village_id)->where('role_id', 4)->get();
        $jumlahAdmin = count($admin);

        $profil = ProfilDesa::where('village_id', Auth::user()->village_id)->first();

        $user = User::where('id', Auth::user()->id)->first();

        return view('admindesa.dashboard', ['jumlahDestinasi' => $jumlahDestinasi, 'jumlahAdmin' => $jumlahAdmin, 'profil' => $profil, 'user' => $user]);
    }

    public function editProfilAdminDesa()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();

        $profil = ProfilDesa::where('admin_id', Auth::user()->id)->first();

        return view('admindesa.editProfil', ['user' => $user, 'profil' => $profil]);
    }

    public function prosesEditProfilAdminDesa(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'email' => 'required',
            'phone' => 'required',
            'alamat_desa' => 'required',
            'deskripsi_desa' => 'required',
        ]);

        User::where('id', $id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        ProfilDesa::where('admin_id', $id)->update([
            'alamat_desa' => $request->alamat_desa,
            'deskripsi_desa' => $request->deskripsi_desa,
        ]);

        return redirect('/admin-desa');
    }

    public function daftarAdminDestinasi()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/admin-destinasi');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $user = json_decode($body, true);

        return view('admindesa.daftarAdmin', ['user' => $user]);
    }

    public function tambahAdminDestinasi()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/destinasi');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $destinasi = json_decode($body, true);

        return view('admindesa.tambahAdmin', ['destinasi' => $destinasi]);
    }

    public function prosesTambahAdminDestinasi(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'http://localhost/wisata/public/api/tambah-admin-destinasi', [
            'form_params' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'province_id' => Auth::user()->province_id,
                'regency_id' => Auth::user()->regency_id,
                'district_id' => Auth::user()->district_id,
                'village_id' => Auth::user()->village_id,
                'destinasi_id' => $request->destinasi_id,
                'phone' => $request->phone,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/admin-desa/daftar-admin');
    }

    public function destinasiAdminDesa()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/destinasi');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $destinasi = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/kategori');
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $kategori = json_decode($body1, true);

        return view('admindesa.destinasi', ['destinasi' => $destinasi, 'kategori' => $kategori]);
    }

    public function tambahDestinasiAdminDesa()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/kategori');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $kategori = json_decode($body, true);

        return view('admindesa.tambahDestinasi', ['kategori' => $kategori]);
    }

    public function prosesTambahDestinasiAdminDesa(Request $request)
    {
        $client = new Client();
        $files = [];
        if ($request->hasfile('foto_destinasi')) {
            foreach ($request->file('foto_destinasi') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('/images'), $name);
                $files[] = $name;
            }

            Destinasi::create([
                'nama_destinasi' => $request->nama_destinasi,
                'kategori_id' => $request->kategori_id,
                'alamat_destinasi' => $request->alamat_destinasi,
                'deskripsi_destinasi' => $request->deskripsi_destinasi,
                'htm_destinasi' => $request->htm_destinasi,
                'foto_destinasi' => implode("|", $files),
                'province_id' => Auth::user()->province_id,
                'regency_id' => Auth::user()->regency_id,
                'district_id' => Auth::user()->district_id,
                'village_id' => Auth::user()->village_id,
            ]);

            return redirect('/admin-desa/destinasi');
        } else {
            $imagePost = "ktp.png";

            $response = $client->request('POST', 'http://localhost/wisata/public/api/tambah-destinasi', [
                'form_params' => [
                    'nama_destinasi' => $request->nama_destinasi,
                    'kategori_id' => $request->kategori_id,
                    'alamat_destinasi' => $request->alamat_destinasi,
                    'deskripsi_destinasi' => $request->deskripsi_destinasi,
                    'htm_destinasi' => $request->htm_destinasi,
                    'foto_destinasi' => $imagePost,
                    'province_id' => Auth::user()->province_id,
                    'regency_id' => Auth::user()->regency_id,
                    'district_id' => Auth::user()->district_id,
                    'village_id' => Auth::user()->village_id,
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody();

            $data = json_decode($body, true);

            return redirect('/admin-desa/destinasi');
        }
    }

    public function approveDestinasiAdminDesa($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/approve-destinasi-admin-desa/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/admin-desa/destinasi');
    }

    public function rejectDestinasiAdminDesa($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/reject-destinasi-admin-desa/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return redirect('/admin-desa/destinasi');
    }

    // Admin Destinasi
    public function adminDestinasi()
    {
        return view('admindestinasi.dashboard');
    }

    public function konfirmasiTiket()
    {
        $tiket = Tiket::where('destinasi_id', Auth::user()->destinasi_id)->get();

        $destinasi = Destinasi::where('id', Auth::user()->destinasi_id)->first();

        return view('admindestinasi.konfirmasiTiket', ['tiket' => $tiket, 'destinasi' => $destinasi]);
    }

    public function konfirmasiTiketId($id)
    {
        Tiket::where('id', $id)->update([
            'konfirmasi' => '1'
        ]);

        return redirect('/admin-destinasi/konfirmasi-tiket');
    }

    public function wahana()
    {
        $wahana = Wahana::where('destinasi_id', Auth::user()->destinasi_id)->paginate(6);

        return view('admindestinasi.wahana', ['wahana' => $wahana]);
    }

    public function tambahWahana()
    {
        return view('admindestinasi.tambahWahana');
    }

    public function prosesTambahWahana(Request $request)
    {
        $files = [];
        if ($request->hasfile('foto_wahana')) {
            foreach ($request->file('foto_wahana') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('/images'), $name);
                $files[] = $name;
            }

            Wahana::create([
                'nama_wahana' => $request->name,
                'foto_wahana' => implode("|", $files),
                'htm_wahana' => $request->harga,
                'deskripsi_wahana' => $request->deskripsi_wahana,
                'destinasi_id' => Auth::user()->destinasi_id,
            ]);

            return redirect('/admin-destinasi/wahana');
        } else {
            $imagePost = "ktp.png";

            Wahana::create([
                'nama_wahana' => $request->name,
                'foto_wahana' => $imagePost,
                'htm_wahana' => $request->harga,
                'deskripsi_wahana' => $request->deskripsi_wahana,
                'destinasi_id' => Auth::user()->destinasi_id,
            ]);

            return redirect('/admin-destinasi/wahana');
        }
    }
}

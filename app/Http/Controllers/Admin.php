<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
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
        $response = $client->request('GET', 'http://localhost/wisata/public/api/user');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $user = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/admin-count');
        $statusCode = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $admin = json_decode($body1, true);

        // dd($data);
        // return view('/api/listagama88', ['data88' => $data]);

        return view('superadmin.dashboard', ['user' => $user], ['admin' => $admin]);
    }

    public function user()
    {
        return view('superadmin.user');
    }

    public function admin()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/admin');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        $response1 = $client->request('GET', 'http://localhost/wisata/public/api/role');
        $statusCode = $response1->getStatusCode();
        $body1 = $response1->getBody();

        $role = json_decode($body1, true);

        // dd($data);

        return view('superadmin.admin', ['admin' => $data], ['role' => $role]);
    }

    public function destinasi()
    {
        return view('superadmin.destinasi');
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

    public function tambahKategori()
    {
        return view('superadmin.tambahKategori');
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

    public function editKategori($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/kategori/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body, true);

        return view('superadmin.editKategori', ['data' => $data]);
    }

    public function prosesEditKategori(Request $request, $id)
    {
        $client = new Client();
        $response = $client->request('PUT', 'http://localhost/wisata/public/api/edit-kategori/' . $id, [
            'form_params' => [
                'nama_kategori' => $request->nama_kategori,
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

        $client = new Client();
        $response = $client->request('POST', 'http://localhost/wisata/public/api/tambah-admin', [
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
        // $client = new Client();
        // $response = $client->request('GET', 'http://localhost/wisata/public/api/admin-kabupaten');
        // $statusCode = $response->getStatusCode();
        // $body = $response->getBody();

        // $user = json_decode($body, true);

        return view('adminkabupaten.dashboard');
        // return view('adminkabupaten.dashboard', ['user' => $user]);
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

    // ADMIN DESA
    public function adminDesa()
    {
        // $client = new Client();
        // $response = $client->request('GET', 'http://localhost/wisata/public/api/admin-desa');
        // $statusCode = $response->getStatusCode();
        // $body = $response->getBody();

        // $user = json_decode($body, true);

        return view('admindesa.dashboard');
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

        // dd($destinasi);
        // $destinasi = Auth::where('village_id', $data['data']->village_id)->get();

        return view('admindesa.destinasi', ['destinasi' => $destinasi, 'kategori' => $kategori]);
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
}

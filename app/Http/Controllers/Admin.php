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
        $regencies = Regency::where('province_id', $request->province_id)->get();

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

        if ($request->role_id == 2) {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'province_id' => $request->province_2,
                'regency_id' => $request->regency_2,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ]);
            return dd($data);
        } else if ($request->role_id == 3) {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'province_id' => $request->province_3,
                'regency_id' => $request->regency_3,
                'district_id' => $request->district_3,
                'village_id' => $request->village_3,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ]);
            return dd($data);
        } else {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'province_id' => $request->province_4,
                'regency_id' => $request->regency_4,
                'district_id' => $request->district_4,
                'village_id' => $request->village_4,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ]);
            return dd($data);
        }
        // return redirect('/superadmin/daftar-admin');
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

    public function adminKabupaten()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/admin-kabupaten');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $user = json_decode($body, true);

        return view('adminkabupaten.dashboard', ['user' => $user]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Destinasi;
use App\Models\Kategori;
use App\Models\ProfilDesa;
use App\Models\Regency;
use App\Models\Tiket;
use App\Models\User;
use App\Models\Wahana;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::first()->gambar;
        $banner = explode("|", $banner);

        $client = new Client();
        $response = $client->request('GET', 'http://localhost/wisata/public/api/kategori');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $kategori = json_decode($body, true);

        $kategori1 = Kategori::all();

        $destinasi = Destinasi::where('approve', '1')->latest()->paginate(6);
        // $destinasi = Destinasi::latest()->paginate(4);

        $arrayGambar = Destinasi::where('approve', '1')->first()->foto_destinasi;
        // $arrayGambar = explode("|", $destinasiArray);

        $response2 = $client->request('GET', 'http://localhost/wisata/public/api/profil-kabupaten');
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody();

        $kabupaten = json_decode($body2, true);

        $regency = Regency::all();

        $response3 = $client->request('GET', 'http://localhost/wisata/public/api/profil-desa');
        $statusCode3 = $response3->getStatusCode();
        $body3 = $response3->getBody();

        $desa = json_decode($body3, true);

        $profildesa = ProfilDesa::latest()->paginate(4);

        return view('home.index', ['banner' => $banner, 'kategori' => $kategori, 'kategori1' => $kategori1, 'regency' => $regency, 'destinasi' => $destinasi, 'kabupaten' => $kabupaten, 'desa' => $desa, 'arrayGambar' => $arrayGambar, 'profildesa' => $profildesa]);
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

    public function kabupaten()
    {
        $client = new Client();
        $response2 = $client->request('GET', 'http://localhost/wisata/public/api/profil-kabupaten');
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody();

        $kabupaten = json_decode($body2, true);

        $response3 = $client->request('GET', 'http://localhost/wisata/public/api/profil-desa');
        $statusCode3 = $response3->getStatusCode();
        $body3 = $response3->getBody();

        $desa = json_decode($body3, true);

        return view('home.kabupaten', ['kabupaten' => $kabupaten, 'desa' => $desa]);
    }

    public function detailKabupaten($id)
    {
        $client = new Client();
        $response2 = $client->request('GET', 'http://localhost/wisata/public/api/profil-kabupaten-spesifik/' . $id);
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody();

        $kabupaten = json_decode($body2, true);

        $response3 = $client->request('GET', 'http://localhost/wisata/public/api/profil-desa');
        $statusCode3 = $response3->getStatusCode();
        $body3 = $response3->getBody();

        $desa = json_decode($body3, true);

        return view('home.detailKabupaten', ['kabupaten' => $kabupaten, 'desa' => $desa]);
    }

    public function desa()
    {
        $desa = ProfilDesa::latest()->paginate(9);

        return view('home.desa', ['desa' => $desa]);
    }

    public function detailDesa($id)
    {
        $desa = ProfilDesa::where('id', $id)->get();

        $dataGambar = ProfilDesa::where('id', $id)->first()->foto_desa;
        $arrayGambar = explode("|", $dataGambar);

        $desa_id = ProfilDesa::where('id', $id)->first()->village_id;
        $destinasi = Destinasi::where('village_id', $desa_id)->paginate(6);

        $kategori = Kategori::latest();
        // dd($kategori);

        return view('home.detailDesa', ['desa' => $desa, 'arrayGambar' => $arrayGambar, 'destinasi' => $destinasi, 'kategori' => $kategori]);
    }

    public function destinasi($id)
    {
        $destinasi = Destinasi::where('id', $id)->get();

        // asumsi data gambar tersimpan di dalam variabel $dataGambar
        $dataGambar = Destinasi::where('id', $id)->first()->foto_destinasi;

        // memecah data gambar menjadi array dengan pemisah "|"
        $arrayGambar = explode("|", $dataGambar);
        // dd($arrayGambar);

        $kategori = Kategori::where('id', Destinasi::where('id', $id)->first()->kategori_id)->get();

        $wahana = Wahana::where('destinasi_id', $id)->paginate(4);
        // dd($kategori);

        return view('home.destinasi', ['destinasi' => $destinasi, 'kategori' => $kategori, 'arrayGambar' => $arrayGambar, 'wahana' => $wahana]);
    }

    public function pesan($id)
    {
        $destinasi = Destinasi::where('id', $id)->get();

        return view('home.pesan', ['destinasi' => $destinasi]);
    }

    public function prosesPesan($id_destinasi, $id_user)
    {
        $user = User::where('id', $id_user)->first();
        $tiket = Tiket::create([
            'nama_pemesan' => $user['name'],
            'jumlah_tiket' => request('jumlah'),
            'tanggal_kunjungan' => request('tanggal'),
            'user_id' => $id_user,
            'destinasi_id' => $id_destinasi,
            'konfirmasi' => '0',
        ]);

        $destinasi = Destinasi::where('id', $id_destinasi)->get();
        $total = request('jumlah') * $destinasi[0]['htm_destinasi'];

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $tiket->id,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('home.checkout', ['snapToken' => $snapToken, 'tiket' => $tiket, 'destinasi' => $destinasi, 'total' => $total, 'user' => $user]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $tiket = Tiket::find($request->order_id);
                $tiket->update(['konfirmasi' => '1']);
            }
        }
    }

    public function daftarPemesanan()
    {
        $id = Auth::user()->id;
        $tiket = Tiket::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);

        $destinasi = Destinasi::all();

        $admin = User::all();
        return view('home.daftarPemesanan', ['tiket' => $tiket, 'destinasi' => $destinasi, 'admin' => $admin]);
    }

    public function pdf()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = Pdf::loadView('home.pdf', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }

    public function downloadTiket($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        $user = User::where('id', $tiket->user_id)->first();
        $destinasi = Destinasi::where('id', $tiket->destinasi_id)->first();

        $pdf = Pdf::loadView('home.pdf', ['tiket' => $tiket, 'user' => $user, 'destinasi' => $destinasi]);

        // $pdf->setPaper('A4', 'potrait');
        // $pdf->render();

        return $pdf->download($id . '.pdf');
    }
}

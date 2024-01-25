<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Str;


class KontakController extends Controller
{
    public function index(){
        $data = Location::all();
        return view('kontak.index', compact('data'));
    }

    public function create(){
        return view('kontak.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'urlMaps' => 'required',
            'status' => 'required',
        ]);

        $nama = $request->nama;
        $alamat = $request->alamat;
        $noTelp = $request->no_telp;
        $email = $request->email;
        $url = $request->urlMaps;
        $status = $request->status;
        if($status == 'cabang'){
            $status2 = 'Cabang';
        }elseif($status == 'pusat'){
            $status2 = 'Pusat';
        }else{
            $status2 = 'Dummy';
        }
        
        //Buat kode
        $katapertama = 'LO';
        $cekData = Location::where('namaCabang', $nama)->exists();
        if($cekData){
            return view('lokasi.index')
                ->with('error','Data sudah tersedia!');
        }else{
            $cekData2 = Location::count();
            $offset = $cekData2 % 26;
            $data = chr($offset + 65);
            $angka = rand(100, 999);
            $acak = strtoupper(Str::random(1));

            if($cekData2 == 0) {
                $pertama = '001';
            }elseif($cekData2 > 0 && $cekData2 < 10){
                $pertama = '00' . $cekData2;
            }elseif($cekData2 >= 10 && $cekData2 < 100){
                $pertama = '0'.$cekData2;
            }elseif($cekData2 >= 100 && $cekData2 < 999){
                $pertama = $cekData2;
            }else{
                $pertama = rand(1, 999);
                if($pertama > 0 && $pertama < 10){
                        $pertama = '00' . $cekData2;
                }elseif($pertama >= 10  && $pertama < 100){
                        $pertama = '0'.$pertama;
                }else{
                    $pertama;
                }
            }
        }
        $idLokasi = $katapertama.$data.$pertama.$acak.$angka;

        Location::create([
            'locationID' => $idLokasi,
            'namaCabang' => $nama,
            'alamat' => $alamat,
            'no_telp' => $noTelp,
            'email' => $email,
            'url_maps' => $url,
            'status' => $status2,
        ]);

        return redirect()->route('location.index')
        ->with('success', 'Data lokasi berhasil ditambahkan!');
    }

    public function show($locationID){
        $data = Location::find($locationID);
        return view('kontak.show', compact('data'));
    }

    public function edit($locationID){
        $data = Location::find($locationID);
        return view('kontak.edit', compact('data'));
    }

    public function update($locationID, Request $request){
        $data = Location::find($locationID);

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'urlMaps' => 'required',
            'status' => 'required',
        ]);

        $idLokasi = $request->locationID;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $noTelp = $request->no_telp;
        $email = $request->email;
        $url = $request->urlMaps;
        $status = $request->status;
        if($status == 'cabang'){
            $status2 = 'Cabang';
        }elseif($status == 'pusat'){
            $status2 = 'Pusat';
        }elseif($status == 'Dummy'){
            $status2 = 'Dummy';
        }else{
            $status2 = $status;
        }
        
        $data->update([
            'locationID' => $idLokasi,
            'namaCabang' => $nama,
            'alamat' => $alamat,
            'no_telp' => $noTelp,
            'email' => $email,
            'url_maps' => $url,
            'status' => $status2,
        ]);

        return redirect()->route('location.index')
            ->with('success', 'Data lokasi berhasil diubah!');
    }

    public function destroy(Request $request, $locationID){
        $data = Location::find($locationID);
        $data->delete();
        return redirect()->route('location.index')->with('success','Data berhasil dihapus!');
    }

    public function cari(Request $request){
        $keyword = $request->search;

        $dataCari = Location::where('namaCabang', 'LIKE', "%$keyword%")
                        ->orWhere('alamat', 'LIKE', "%$keyword%")
                        ->orWhere('no_telp', 'LIKE', "%$keyword%")
                        ->orWhere('email', 'LIKE', "%$keyword%")
                        ->orWhere('status', 'LIKE', "%$keyword%")
                        ->get();
        
        return view('kontak.hasil', compact('dataCari'));
    }
}

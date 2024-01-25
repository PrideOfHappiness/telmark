<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Str;

class AboutUsController extends Controller
{
    public function index(){
        $data = AboutUs::all();
        return view('aboutUs.index', compact('data'));
    }

    public function create(){
        return view('aboutUs.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'jenis' => 'required',
            'data' => 'required',
        ]);

        $status1 = $request->jenis;
        $judul = $request->judul;
        $data = $request->data;
        $id = strtoupper(Str::random(10));

        if($status1 == 'companyOverview'){
            $status2 = 'Overview';
        }elseif($status1 == 'Visi'){
            $status2 = 'Visi';
        }elseif($status1 == 'Misi'){
            $status2 = 'Misi';
        }elseif($status1 == 'Featured'){
            $status2 = 'Featured';
        }else{
            $status2 = '';
        }

        AboutUs::create([
            'aboutUsID' => $id,
            'jenis_data' => $status2,
            'judul' => $judul,
            'data' => $data,
        ]);

        return redirect()->route('aboutUs.index')
        ->with('success', 'Data Tentang Kami berhasil ditambahkan!');
    }

    public function show($aboutUsID){
        $data = AboutUs::find($aboutUsID);
        if($data->jenis_data == 'Overview'){
            $jenis = 'Gambaran Umum Perusahaan';
        }elseif($data->jenis_data == 'Visi'){
            $jenis = 'Visi Perusahaan';
        }elseif($data->jenis_data == 'Misi'){
            $jenis = 'Misi Perusahaan';
        }else{       
            $jenis = 'Keunggulan Perusahaan';
        }
        return view('aboutUs.show', compact('data', 'jenis'));
    }

    public function edit($aboutUsID){
        $data = AboutUs::find($aboutUsID);
        if($data->jenis_data == 'Overview'){
            $jenis = 'Gambaran Umum Perusahaan';
        }elseif($data->jenis_data == 'Visi'){
            $jenis = 'Visi Perusahaan';
        }elseif($data->jenis_data == 'Misi'){
            $jenis = 'Misi Perusahaan';
        }else{       
            $jenis = 'Keunggulan Perusahaan';
        }
        return view('aboutUs.edit', compact('data', 'jenis'));
    }

    public function update(Request $request, $aboutUsID){
        $data1 = AboutUs::find($aboutUsID);

        $this->validate($request, [
            'jenis' => 'required',
            'data' => 'required',
        ]);

        $aboutUsid = $request->id;
        $status1 = $request->jenis;
        $judul = $request->judul;
        $data = $request->data;

        if($status1 == 'companyOverview'){
            $status2 = 'Overview';
        }elseif($status1 == 'Visi'){
            $status2 = 'Visi';
        }elseif($status1 == 'Misi'){
            $status2 = 'Misi';
        }elseif($status1 == 'Featured'){
            $status2 = 'Featured';
        }else{
            $status2 = $status1;
        }

        $data1->update([
            'aboutUsID' => $aboutUsid,
            'jenis_data' => $status2,
            'judul' => $judul,
            'data' => $data,
        ]);

        return redirect()->route('aboutUs.index')
            ->with('success', 'Data Tentang Kami berhasil diubah!');
    }

    public function destroy($aboutUsID){
        $data = AboutUs::find($aboutUsID);
        $data->delete();
        return redirect()->route('aboutUs.index')->with('success','Data berhasil dihapus!');
    }
}

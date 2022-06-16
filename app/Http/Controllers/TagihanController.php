<?php

namespace App\Http\Controllers;

use App\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    private $viewPrefix = "tagihan";
    private $routePrefix = "tagihan";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('bulan') && $request->filled('tahun')) {
            $models = Tagihan::whereMonth('tanggal_tagihan', $request->bulan)
                ->whereYear('tanggal_tagihan', $request->tahun)
                ->latest()
                ->get();
        } else {
            $models = Tagihan::latest()->get();
        }
        $data['models'] = $models;
        $data['routePrefix'] = $this->routePrefix;
        return view('tagihan_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Tagihan();
        $data['model'] = $model;
        $data['method'] = 'POST';
        $data['route'] = $this->routePrefix . '.store';
        $data['namaTombol'] = 'Buat Tagihan';
        $data['biayaList'] = \App\Biaya::get()->pluck('biaya_nama', 'id');
        return view($this->viewPrefix . '_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'biaya_id' => 'required',
            'tanggal_tagihan' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'angkatan' => 'nullable',
        ]);

        $biaya = \App\Biaya::findOrFail($request->biaya_id);
        $siswa = \App\Siswa::query();
        if ($request->filled('angkatan')) {
            $siswa = $siswa->where('angkatan', $request->angkatan);
        }
        $siswa = $siswa->get();
        $tanggalTagihan = \Carbon\Carbon::parse($request->tanggal_tagihan);
        $bulanTagihan = $tanggalTagihan->format('m');
        $tahunTagihan = $tanggalTagihan->format('Y');
        foreach ($siswa as $item) {
            $cekTagihan = \App\Tagihan::whereMonth('tanggal_tagihan', $bulanTagihan)->whereYear('tanggal_tagihan', $tahunTagihan)->where('siswa_id', $item->id)->first();
            if ($cekTagihan == null) {
                $tagihan = new Tagihan();
                $tagihan->siswa_id = $item->id;
                $tagihan->tanggal_tagihan = $request->tanggal_tagihan;
                $tagihan->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
                $tagihan->nama = $biaya->nama;
                $tagihan->jumlah = $biaya->jumlah;
                $tagihan->status = 'baru';
                $tagihan->dibuat_oleh = \Auth::user()->name;
                $tagihan->save();
            }
        }
        flash('Data tagihan berhasil dibuat');
        return redirect()->route('tagihan.index');
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
}

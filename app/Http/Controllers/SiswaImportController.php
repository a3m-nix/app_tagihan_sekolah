<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaImportController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file_siswa' => 'required|mimes:csv,xls,xlsx',
        ]);
        $file = $request->file('file_siswa');
        $namaFile = $file->getClientOriginalName();
        $file->move('file_siswa', $namaFile);
        Excel::import(new SiswaImport, public_path('/file_siswa/' . $namaFile));
        flash('Data siswa berhasil diimport')->success();
        return back();
    }
}

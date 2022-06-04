<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (is_int($row[0])) {
                $no = $row[0];
                $nisn = $row[1];
                $nama = $row[2];
                $programStudi = $row[3];
                $angkatan = $row[4];
                $siswa = \App\Siswa::where('nisn', $nisn)->first();
                if ($siswa == null) {
                    \App\Siswa::create([
                        'nisn' => $nisn,
                        'nama' => $nama,
                        'program_studi' => $programStudi,
                        'angkatan' => $angkatan,
                        'user_id' => Auth::user()->id,
                    ]);
                }
            }
        }
    }
}

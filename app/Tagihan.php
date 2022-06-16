<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $guarded = [];
    protected $dates = ['tanggal_tagihan', 'tanggal_jatuh_tempo'];

    /**
     * Get the siswa that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function getJumlahRupiah()
    {
        return number_format($this->jumlah, 0, ",", ".");
    }
}

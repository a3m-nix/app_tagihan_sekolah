<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Biaya extends Model
{
    protected $table = 'biaya';
    protected $guarded = [];
    protected $appends = ['biaya_nama'];

    public function getBiayaNamaAttribute()
    {
        return $this->nama . ' (' . $this->getJumlahRupiah() . ')';
    }

    /**
     * Get the user that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function getJumlahRupiah()
    {
        return number_format($this->jumlah, 0, ",", ".");
    }
}

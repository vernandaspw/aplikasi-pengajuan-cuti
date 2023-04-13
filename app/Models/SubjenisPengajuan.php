<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjenisPengajuan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenispengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jenis_pengajuan_id', 'id');
    }
}

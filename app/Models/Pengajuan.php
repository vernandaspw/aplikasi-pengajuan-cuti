<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function JenisPengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jenis_pengajuan_id', 'id');
    }

    public function SubjenisPengajuan()
    {
        return $this->belongsTo(SubjenisPengajuan::class, 'subjenis_pengajuan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

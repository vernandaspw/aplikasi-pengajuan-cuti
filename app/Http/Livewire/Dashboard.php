<?php

namespace App\Http\Livewire;

use App\Models\JenisPengajuan;
use App\Models\Pengajuan;
use Livewire\Component;

class Dashboard extends Component
{
    public $cuti, $izin;
    public $cuti_menunggu, $izin_menunggu;
    public $cuti_reject, $izin_reject;
    public  $pengajuan = [];

    public $take = 10;

    public $konfirm;

    public function lanjut()
    {
        $this->take = $this->take + 1;
    }

    public function render()
    {
        $this->pengajuan = Pengajuan::with('JenisPengajuan', 'SubjenisPengajuan')->where('user_id', auth()->user()->id)->take($this->take)->latest()->get();

        $cuti = JenisPengajuan::where('nama', 'cuti')->first();
        $izin = JenisPengajuan::where('nama', 'izin')->first();
        $this->cuti =  Pengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $cuti->id)->where('status', 'approve')->whereMonth('created_at', now())->get()->sum('jumlah_hari');
        $this->izin =  Pengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $izin->id)->where('status', 'approve')->whereYear('created_at', now())->get()->sum('jumlah_hari');

        $this->cuti_menunggu =  Pengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $cuti->id)->where('status', 'menunggu')->whereMonth('created_at', now())->get()->sum('jumlah_hari');
        $this->izin_menunggu =  Pengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $izin->id)->where('status', 'menunggu')->whereYear('created_at', now())->get()->sum('jumlah_hari');

        $this->cuti_reject =  Pengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $cuti->id)->where('status', 'reject')->whereMonth('created_at', now())->get()->sum('jumlah_hari');
        $this->izin_reject =  Pengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $izin->id)->where('status', 'reject')->whereYear('created_at', now())->get()->sum('jumlah_hari');

        $this->konfirm =  Pengajuan::where('status', 'menunggu')->get()->count();

        return view('livewire.dashboard')->extends('main')->section('main');
    }
}

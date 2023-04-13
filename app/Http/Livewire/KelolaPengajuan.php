<?php

namespace App\Http\Livewire;

use App\Models\JenisPengajuan;
use App\Models\Pengajuan;
use App\Models\SubjenisPengajuan;
use Livewire\Component;

class KelolaPengajuan extends Component
{
    public $pengajuan,  $subjenis_pengajuan, $jenispengajuan  = [];
    public  $edit = false;
    public $take = 10;

    public $nama, $jenis_pengajuan_id, $subjenis_pengajuan_id, $start_date, $end_date, $jumlah_hari, $keterangan, $status;

    public function lanjut()
    {
        $this->take = $this->take + 1;
    }

    public function mount()
    {
        $this->jenispengajuan = JenisPengajuan::latest()->get();
        $this->subjenis_pengajuan = SubjenisPengajuan::latest()->get();
    }

    public function render()
    {
        $this->pengajuan = Pengajuan::with('JenisPengajuan', 'SubjenisPengajuan')->take($this->take)->latest()->get();
        return view('livewire.kelola-pengajuan')->extends('main')->section('main');
    }

    public function approve($id)
    {
        Pengajuan::find($id)->update([
            'status' => 'approve'
        ]);
    }

    public function reject($id)
    {
        Pengajuan::find($id)->update([
            'status' => 'reject'
        ]);
    }

    public function resetnull()
    {
        $this->byid =   null;
        $this->nama = null;
        $this->jenis_pengajuan_id = null;
        $this->subjenis_pengajuan_id = null;
        $this->nama = null;
        $this->keterangan = null;
        $this->kuota = null;
        $this->status = null;
    }

    public function tutup()
    {
        $this->edit = false;
        $this->create = false;

        $this->byid = null;
        $this->nama = null;
        $this->jenis_pengajuan_id = null;
        $this->subjenis_pengajuan_id = null;
        $this->keterangan = null;
        $this->kuota = null;
        $this->status = null;
    }

    public function editform($id)
    {
        $this->edit = true;
        $this->create = false;
        $data = Pengajuan::with('JenisPengajuan', 'user', 'SubjenisPengajuan')->find($id);

        $this->byid = $data->id;
        $this->nama = $data->user->nama;
        $this->jenis_pengajuan_id = $data->JenisPengajuan->id;
        $this->subjenis_pengajuan_id = $data->SubjenisPengajuan->id;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
        $this->jumlah_hari = $data->jumlah_hari;
        $this->keterangan = $data->keterangan;
        $this->status = $data->status;
    }

    public function edit($byid)
    {
        $data = Pengajuan::find($byid);
        $data->update([
            'jenis_pengajuan_id' => $this->jenis_pengajuan_id,
            'subjenis_pengajuan_id' => $this->subjenis_pengajuan_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'jumlah_hari' =>  $this->jumlah_hari,
            'keterangan' => $this->keterangan,
            'status' => $this->status
        ]);

        session()->flash('success', 'berhasil edit data');
    }
}

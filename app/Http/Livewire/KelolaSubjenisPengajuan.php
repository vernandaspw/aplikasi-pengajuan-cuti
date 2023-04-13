<?php

namespace App\Http\Livewire;

use App\Models\JenisPengajuan;
use App\Models\SubjenisPengajuan;
use Livewire\Component;

class KelolaSubjenisPengajuan extends Component
{
    public $subjenis_pengajuan, $jenispengajuan = [];
    public $create, $edit = false;

    public $jenis_pengajuan_id, $nama, $keterangan, $kuota;
    public $status = true;


    public function mount()
    {
        $this->jenispengajuan = JenisPengajuan::latest()->get();
    }
    public function render()
    {
        $this->subjenis_pengajuan = SubjenisPengajuan::with('jenispengajuan')->latest()->get();
        return view('livewire.kelola-subjenis-pengajuan')->extends('main')->section('main');
    }

    public function resetnull()
    {
        $this->byid =   null;
        $this->jenis_pengajuan_id = null;
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
        $this->jenis_pengajuan_id = null;
        $this->nama = null;
        $this->keterangan = null;
        $this->kuota = null;
        $this->status = null;
    }

    public function buatform()
    {
        $this->edit = false;
        $this->create = true;

        $this->byid = null;
        $this->jenis_pengajuan_id = null;
        $this->nama = null;
        $this->keterangan = null;
        $this->kuota = null;
        $this->status = null;
    }

    public function buat()
    {
        $this->validate([
            'jenis_pengajuan_id' => 'required',
            'nama' => 'required',
            'keterangan' => 'nullable',
            'kuota' =>  'nullable',
            'status' => 'nullable',
        ]);
        SubjenisPengajuan::create([
            'jenis_pengajuan_id' => $this->jenis_pengajuan_id,
            'nama' =>  $this->nama,
            'keterangan' => $this->keterangan,
            'kuota' =>   $this->kuota,
            'status' => $this->status
        ]);
        session()->flash('success', 'berhasil buat data');
    }

    public function editform($id)
    {
        $this->edit = true;
        $this->create = false;
        $data = SubjenisPengajuan::with('jenispengajuan')->find($id);

        $this->byid = $data->id;
        $this->jenis_pengajuan_id = $data->jenispengajuan->id;
        $this->nama = $data->nama;
        $this->keterangan = $data->keterangan;
        $this->kuota = $data->kuota;
        $this->status = $data->status;
    }

    public function edit($byid)
    {
        $data = SubjenisPengajuan::find($byid);
        $data->update([
            'jenis_pengajuan_id' => $this->jenis_pengajuan_id,
            'nama' =>  $this->nama,
            'keterangan' => $this->keterangan,
            'kuota' =>   $this->kuota,
            'status' => $this->status
        ]);

        session()->flash('success', 'berhasil edit data');
    }
}

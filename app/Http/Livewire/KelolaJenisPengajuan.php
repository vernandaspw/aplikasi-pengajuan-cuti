<?php

namespace App\Http\Livewire;

use App\Models\JenisPengajuan;
use Livewire\Component;

class KelolaJenisPengajuan extends Component
{
    public $jenis_pengajuan;
    public $edit = false;

    public $byid, $nama, $keterangan;

    public function mount()
    {
        $this->jenis_pengajuan = JenisPengajuan::latest()->get();
    }
    public function render()
    {
        return view('livewire.kelola-jenis-pengajuan')->extends('main')->section('main');
    }
    public function resetnull()
    {
        $this->byid =   null;
        $this->nama = null;
        $this->keterangan = null;
    }

    public function tutup()
    {
        $this->edit = false;

        $this->byid = null;
        $this->nama = null;
        $this->keterangan = null;
    }

    public function editform($id)
    {
        $this->edit = true;
        $data = JenisPengajuan::find($id);

        $this->byid = $data->id;
        $this->nama = $data->nama;
        $this->keterangan = $data->keterangan;
    }

    public function edit($byid)
    {
        $data = JenisPengajuan::find($byid);
        $data->update([
            'nama' =>   $this->nama,
            'nik' =>  $this->keterangan,
        ]);

        session()->flash('success', 'berhasil edit data');
    }
}

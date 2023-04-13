<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class KelolaSetting extends Component
{
    public $byid, $izin, $cuti;

    public function mount()
    {
        $setting = Setting::find(1);
        $this->byid = $setting->id;
        $this->izin = $setting->max_kuota_izin_perbulan;
        $this->cuti = $setting->max_kuota_cuti_pertahun;
    }

    public function render()
    {


        return view('livewire.kelola-setting')->extends('main')->section('main');
    }

    public function ubah()
    {
        $data = Setting::find($this->byid);

        $data->update([
            'max_kuota_izin_perbulan' => $this->izin,
            'max_kuota_cuti_pertahun' => $this->cuti
        ]);
        session()->flash('success', 'berhasil ubah data');
    }
}

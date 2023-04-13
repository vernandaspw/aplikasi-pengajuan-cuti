<?php

namespace App\Http\Livewire;

use App\Models\JenisPengajuan;
use App\Models\Pengajuan as ModelsPengajuan;
use App\Models\Setting;
use App\Models\SubjenisPengajuan;
use Livewire\Component;

class Pengajuan extends Component
{

    public  $subjenis_pengajuan, $jenispengajuan  = [];

    public $jenis_pengajuan_id, $subjenis_pengajuan_id, $start_date, $end_date, $jumlah_hari, $keterangan, $status;

    public $jml_telah_diambil;

    public function mount()
    {

        $this->jenispengajuan = JenisPengajuan::latest()->get();
        $this->subjenis_pengajuan = SubjenisPengajuan::latest()->get();
    }

    public function render()
    {

        return view('livewire.pengajuan')->extends('main')->section('main');
    }

    public function resetnull()
    {
        $this->jenis_pengajuan_id = null;
        $this->subjenis_pengajuan_id = null;
        $this->start_date = null;
        $this->end_date = null;
        $this->keterangan = null;
    }

    public function updated()
    {
        $a = strtotime($this->end_date);
        $e = strtotime($this->start_date);

        $j = $a - $e;
        $h = $j / 60 / 60 / 24;

        $this->jumlah_hari = $h + 1;

        $cuti = JenisPengajuan::where('nama', 'cuti')->first();
        $izin = JenisPengajuan::where('nama', 'izin')->first();
        if ($this->jenis_pengajuan_id) {
            if ($this->jenis_pengajuan_id == $cuti->id) {
                $this->jml_telah_diambil =  ModelsPengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $cuti->id)->where('status', 'approve')->whereMonth('created_at', now())->get()->sum('jumlah_hari');
            } else {
                $this->jml_telah_diambil =  ModelsPengajuan::where('user_id', auth()->user()->id)->where('jenis_pengajuan_id', $izin->id)->where('status', 'approve')->whereYear('created_at', now())->get()->sum('jumlah_hari');
            }
        }
    }

    public function buat()
    {
        $this->validate([
            'jenis_pengajuan_id' => 'required',
            'subjenis_pengajuan_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'keterangan' => 'nullable',
        ]);
        // jika izin cek jumlah hari pengajuan pada bulan ini dgn setting max
        $setting = Setting::first();
        // dd($setting);


        $cuti = JenisPengajuan::where('nama', 'cuti')->first();
        if ($this->jenis_pengajuan_id) {
            $datacek = $this->jml_telah_diambil + $this->jumlah_hari;
            if ($this->jenis_pengajuan_id == $cuti->id) {
                if ($datacek <= $setting->max_kuota_cuti_pertahun) {
                    ModelsPengajuan::create([
                        'user_id' => auth()->user()->id,
                        'jenis_pengajuan_id' => $this->jenis_pengajuan_id,
                        'subjenis_pengajuan_id' => $this->subjenis_pengajuan_id,
                        'start_date' =>  $this->start_date,
                        'end_date' =>  $this->end_date,
                        'keterangan' => $this->keterangan,
                        'jumlah_hari' =>  $this->jumlah_hari,
                        'status' => 'menunggu'
                    ]);
                    session()->flash('success', 'berhasil buat data');
                } else {
                    session()->flash('error', 'kamu telah melewati batas jumlah ambil cuti untuk tahun ini');
                }
            } else {
                if ($datacek <= $setting->max_kuota_izin_perbulan) {
                    ModelsPengajuan::create([
                        'user_id' => auth()->user()->id,
                        'jenis_pengajuan_id' => $this->jenis_pengajuan_id,
                        'subjenis_pengajuan_id' => $this->subjenis_pengajuan_id,
                        'start_date' =>  $this->start_date,
                        'end_date' =>  $this->end_date,
                        'keterangan' => $this->keterangan,
                        'jumlah_hari' =>  $this->jumlah_hari,
                        'status' => 'menunggu'
                    ]);
                    session()->flash('success', 'berhasil buat data');
                } else {
                    session()->flash('error', 'kamu telah melewati batas jumlah ambil cuti untuk bulan ini');
                }
            }
        }
    }
}

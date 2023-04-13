<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class KelolaAkun extends Component
{
    public $akun = [];

    public $byid, $username, $password, $nama, $nik, $devisi, $posisi, $tgl_lahir, $sex, $alamat, $phone, $role;


    public $create, $edit = false;

    public function mount()
    {
        $this->akun = User::where('role', 'pegawai')->latest()->get();
    }
    public function render()
    {
        return view('livewire.kelola-akun')->extends('main')->section('main');
    }

    public function resetnull()
    {
        $this->byid =   null;
        $this->username = null;
        $this->nama = null;
        $this->nik = null;
        $this->devisi = null;
        $this->posisi = null;
        $this->tgl_lahir = null;
        $this->sex = null;
        $this->alamat = null;
        $this->phone = null;
        $this->role = null;

    }

    public function tutup()
    {
        $this->edit = false;
        $this->create = false;

        $this->byid = null;
        $this->username = null;
        $this->nama = null;
        $this->nik = null;
        $this->devisi = null;
        $this->posisi = null;
        $this->tgl_lahir = null;
        $this->sex = null;
        $this->alamat = null;
        $this->phone = null;
        $this->role = null;

    }

    public function buatform()
    {
        $this->edit = false;
        $this->create = true;

        $this->byid = null;
        $this->username = null;
        $this->nama = null;
        $this->nik = null;
        $this->devisi = null;
        $this->posisi = null;
        $this->tgl_lahir = null;
        $this->sex = null;
        $this->alamat = null;
        $this->phone = null;
        $this->role = null;

    }

    public function buat()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'nik' => 'nullable',
            'devisi' =>  'nullable',
            'posisi' => 'nullable',
            'tgl_lahir' =>  'nullable',
            'sex' =>  'nullable',
            'alamat' =>     'nullable',
            'phone' =>    'nullable',
            'role' => 'required',

        ]);
        User::create([
            'username' => $this->username,
            'password' =>  Hash::make($this->password),
            'nama' =>   $this->nama,
            'nik' =>  $this->nik,
            'devisi' =>  $this->devisi,
            'posisi' =>  $this->posisi,
            'tgl_lahir' =>  $this->tgl_lahir,
            'sex' =>    $this->sex,
            'alamat' =>      $this->alamat,
            'phone' =>    $this->phone,
            'role' =>   $this->role,

        ]);
        session()->flash('success', 'berhasil buat data');
    }

    public function editform($id)
    {
        $this->edit = true;
        $this->create = false;
        $data = User::find($id);

        $this->byid = $data->id;
        $this->username = $data->username;
        $this->nama = $data->nama;
        $this->nik = $data->nik;
        $this->devisi = $data->devisi;
        $this->posisi = $data->posisi;
        $this->tgl_lahir = $data->tgl_lahir;
        $this->sex = $data->sex;
        $this->alamat = $data->alamat;
        $this->phone = $data->phone;
        $this->role = $data->role;

    }

    public function edit($byid)
    {

        $data = User::find($byid);
        $data->update([
            'username' => $this->username,
            'password' =>  $this->password != null ? Hash::make($this->password) : $data->password,
            'nama' =>   $this->nama,
            'nik' =>  $this->nik,
            'devisi' =>  $this->devisi,
            'posisi' =>  $this->posisi,
            'tgl_lahir' =>  $this->tgl_lahir,
            'sex' =>    $this->sex,
            'alamat' =>      $this->alamat,
            'phone' =>    $this->phone,
            'role' =>   $this->role,
        ]);
        session()->flash('success', 'berhasil edit data');
    }

    public function delete($id)
    {
        $data = User::find($id);

        $data->delete();
        session()->flash('success', 'berhasil hapus data');
    }

}

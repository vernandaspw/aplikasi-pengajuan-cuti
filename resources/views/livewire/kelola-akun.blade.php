<div>
    <div class="container mt-3 mb-5">
        <div class="">
            <h3>Kelola akun</h3>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if ($edit)
            <div class="">
                <h4>
                    Edit akun
                </h4>
                <form wire:submit.prevent="edit({{ $byid }})">
                    <div class="">
                        <label for="username">Username</label>
                        <input wire:model='username' class="form-control @error('username') is-invalid @enderror"
                            type="text" placeholder="username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="password">Password</label>
                        <input wire:model='password' class="form-control @error('password') is-invalid @enderror"
                            type="password" placeholder="password" name="" id="">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="nama">nama</label>
                        <input wire:model='nama' class="form-control @error('nama') is-invalid @enderror" type="text"
                            placeholder="nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="nik">nik</label>
                        <input wire:model='nik' class="form-control @error('nik') is-invalid @enderror" type="text"
                            placeholder="nik">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="devisi">devisi</label>
                        <input wire:model='devisi' class="form-control @error('devisi') is-invalid @enderror"
                            type="text" placeholder="devisi">
                        @error('devisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="posisi">posisi</label>
                        <input wire:model='posisi' class="form-control @error('posisi') is-invalid @enderror"
                            type="text" placeholder="posisi">
                        @error('posisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="tgl_lahir">tanggal lahir</label>
                        <input wire:model='tgl_lahir' class="form-control @error('tgl_lahir') is-invalid @enderror"
                            type="date" placeholder="tgl_lahir">
                        @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="sex">Jenis kelamin</label>
                        <select class="@error('sex') is-invalid @enderror form-control" wire:model='sex' id="">
                            <option value="">Pilih</option>
                            <option value="m" @if ($sex == 'm') selected @endif>Laki laki</option>
                            <option value="f" @if ($sex == 'f') selected @endif>Perempuan</option>
                        </select>
                        @error('sex')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="alamat">alamat</label>
                        <textarea wire:model='alamat' class="form-control @error('alamat') is-invalid @enderror" id="alamat" cols="30"
                            rows="5">{{ $alamat }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="role">Level</label>
                        <select class="@error('role') is-invalid @enderror form-control" wire:model='role'
                            id="">
                            <option value="">Pilih</option>
                            <option value="admin" @if ($role == 'admin') selected @endif>Admin</option>
                            <option value="pegawai" @if ($role == 'pegawai') selected @endif>Pegawai</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="">
                        <label for="isaktif">Status</label>
                        <select required class="@error('isaktif') is-invalid @enderror form-control" wire:model='aktif'
                            id="">
                            <option value="">Pilih</option>
                            <option value="1">aktif</option>
                            <option value="0">non aktif</option>
                        </select>
                        @error('isaktif')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="mt-3">
                        <button class="btn btn-success form-control" type="submit">
                            Ubah
                        </button>
                    </div>
                </form>
                <div class="mt-2"><button class="btn btn-white  form-control" wire:click='tutup' type="button">Kembali</button>
                </div>
            </div>
        @elseif ($create)
        <div class="">
            <h4>
                Buat akun
            </h4>
            <form wire:submit.prevent="buat({{ $byid }})">
                <div class="">
                    <label for="username">Username</label>
                    <input wire:model='username' class="form-control @error('username') is-invalid @enderror"
                        type="text" placeholder="username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="password">Password</label>
                    <input wire:model='password' class="form-control @error('password') is-invalid @enderror"
                        type="password" placeholder="password" name="" id="">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="nama">nama</label>
                    <input wire:model='nama' class="form-control @error('nama') is-invalid @enderror" type="text"
                        placeholder="nama">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="nik">nik</label>
                    <input wire:model='nik' class="form-control @error('nik') is-invalid @enderror" type="text"
                        placeholder="nik">
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="devisi">devisi</label>
                    <input wire:model='devisi' class="form-control @error('devisi') is-invalid @enderror"
                        type="text" placeholder="devisi">
                    @error('devisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="posisi">posisi</label>
                    <input wire:model='posisi' class="form-control @error('posisi') is-invalid @enderror"
                        type="text" placeholder="posisi">
                    @error('posisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="tgl_lahir">tanggal lahir</label>
                    <input wire:model='tgl_lahir' class="form-control @error('tgl_lahir') is-invalid @enderror"
                        type="date" placeholder="tgl_lahir">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="sex">Jenis kelamin</label>
                    <select class="@error('sex') is-invalid @enderror form-control" wire:model='sex' id="">
                        <option value="">Pilih</option>
                        <option value="m" @if ($sex == 'm') selected @endif>Laki laki</option>
                        <option value="f" @if ($sex == 'f') selected @endif>Perempuan</option>
                    </select>
                    @error('sex')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="alamat">alamat</label>
                    <textarea wire:model='alamat' class="form-control @error('alamat') is-invalid @enderror" id="alamat" cols="30"
                        rows="5">{{ $alamat }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="role">Level</label>
                    <select class="@error('role') is-invalid @enderror form-control" wire:model='role'
                        id="">
                        <option value="">Pilih</option>
                        <option value="admin" @if ($role == 'admin') selected @endif>Admin</option>
                        <option value="pegawai" @if ($role == 'pegawai') selected @endif>Pegawai</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="">
                    <label for="isaktif">Status</label>
                    <select class="@error('isaktif') is-invalid @enderror form-control" wire:model='isaktif'
                        id="">
                        <option value="">Pilih</option>
                        <option value="1" @if ($isaktif == true) selected @endif>aktif</option>
                        <option value="0" @if ($isaktif == false) selected @endif>non aktif</option>
                    </select>
                    @error('isaktif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="mt-3">
                    <button class="btn btn-success form-control" type="submit">
                        Buat
                    </button>
                </div>
            </form>
            <div class="mt-2"><button class="btn btn-white  form-control" wire:click='tutup' type="button">Kembali</button>
            </div>
        </div>
        @else
            <div class="">
                <button type="button" wire:click='buatform' class="btn btn-success">Buat akun</button>
            </div>
            <div class="text-center mt-2">
                <table class="table">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">username</th>
                            <th scope="col">nama</th>
                            <th scope="col">nik</th>
                            <th scope="col">devisi</th>
                            <th scope="col">Jenis kelamin</th>
                            <th scope="col">role</th>

                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($akun as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->devisi }}</td>
                                <td>{{ $data->sex }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    <button class="btn btn-info"
                                        wire:click="editform({{ $data->id }})">Edit</button>
                                        <button class="btn btn-danger"
                                        wire:click="delete({{ $data->id }})">Delete</button>
                                </td>
                            </tr>
                        @empty
                            tidak ada
                        @endforelse

                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

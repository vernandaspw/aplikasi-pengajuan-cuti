<div>
    <div class="container mt-3 mb-5">
        <div class="">
            <h3>Kelola Subjenis pengajuan</h3>
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
                    Edit
                </h4>
                <form wire:submit.prevent="edit({{ $byid }})">
                    <div class="">
                        <label for="jenis_pengajuan_id">Pilih jenis pengajuan</label>
                        <select class="@error('jenis_pengajuan_id') is-invalid @enderror form-control" wire:model='jenis_pengajuan_id'
                            id="">
                            <option value="">Pilih jenis pengajuan</option>
                            @foreach ($jenispengajuan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                        @error('jenis_pengajuan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="nama">nama subjenis pengajuan</label>
                        <input wire:model='nama' class="form-control @error('nama') is-invalid @enderror"
                            type="text" placeholder="nama subjenis pengajuan">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="keterangan">keterangan</label>
                        <textarea wire:model='keterangan' class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                            cols="30" rows="5">{{ $keterangan }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="kuota">kuota (optional)</label>
                        <input wire:model='kuota' class="form-control @error('kuota') is-invalid @enderror"
                            type="number" placeholder="Masukan jummlah hari">
                        @error('kuota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <label for="status">Status</label>
                        <select class="@error('status') is-invalid @enderror form-control" wire:model='status'
                            id="">
                            <option value="">Pilih</option>
                            <option value="1" @if ($status == true) selected @endif>aktif</option>
                            <option value="0" @if ($status == false) selected @endif>non aktif
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success form-control" type="submit">
                            Ubah
                        </button>
                    </div>
                </form>
                <div class="mt-2"><button class="btn btn-white  form-control" wire:click='tutup'
                        type="button">Kembali</button>
                </div>
            </div>
        @elseif ($create)
            <div class="">
                <h4>
                    Buat
                </h4>
                <form wire:submit.prevent="buat">
                    <div class="">
                        <label for="jenis_pengajuan_id">Pilih jenis pengajuan</label>
                        <select class="@error('jenis_pengajuan_id') is-invalid @enderror form-control" wire:model='jenis_pengajuan_id'
                            id="">
                            <option value="">Pilih jenis pengajuan</option>
                            @foreach ($jenispengajuan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                        @error('jenis_pengajuan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="nama">nama subjenis pengajuan</label>
                        <input wire:model='nama' class="form-control @error('nama') is-invalid @enderror"
                            type="text" placeholder="nama subjenis pengajuan">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="keterangan">keterangan</label>
                        <textarea wire:model='keterangan' class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                            cols="30" rows="5">{{ $keterangan }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="kuota">kuota (optional)</label>
                        <input wire:model='kuota' class="form-control @error('kuota') is-invalid @enderror"
                            type="number" placeholder="Masukan jummlah hari">
                        @error('kuota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <label for="status">Status</label>
                        <select class="@error('status') is-invalid @enderror form-control" wire:model='status'
                            id="">
                            <option value="">Pilih</option>
                            <option value="1" @if ($status == true) selected @endif>aktif</option>
                            <option value="0" @if ($status == false) selected @endif>non aktif
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success form-control" type="submit">
                            Buat
                        </button>
                    </div>
                </form>
                <div class="mt-2"><button class="btn btn-white  form-control" wire:click='tutup'
                        type="button">Kembali</button>
                </div>
            </div>
        @else
            <div class="">
                <button type="button" wire:click='buatform' class="btn btn-success">Buat baru</button>
            </div>
            <div class="text-center mt-2">
                <table class="table">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jenis pengajuan</th>
                            <th scope="col">nama</th>
                            <th scope="col">keterangan</th>
                            <th scope="col">kuota hari</th>
                            <th scope="col">status</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subjenis_pengajuan as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->jenispengajuan->nama }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->kuota }}</td>
                                <td>{{ $data->status == true ? 'active' : 'nonactive' }}</td>
                                <td>
                                    <button class="btn btn-info"
                                        wire:click="editform({{ $data->id }})">Edit</button>
                                </td>
                            </tr>
                        @empty
                            <b>tidak ada</b>
                        @endforelse

                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

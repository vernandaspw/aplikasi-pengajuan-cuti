<div>
    <div class="container mt-3 mb-5">
        <div class="">
            <h3>Kelola Pengajuan</h3>
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
                        <label for="">Nama</label>
                        <div class="">{{ $nama }}</div>
                    </div>
                    <div class="">
                        <label for="jenis_pengajuan_id">Pilih jenis pengajuan</label>
                        <select class="@error('jenis_pengajuan_id') is-invalid @enderror form-control"
                            wire:model='jenis_pengajuan_id' id="">
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
                        <label for="subjenis_pengajuan_id">Pilih Subjenis pengajuan</label>
                        <select class="@error('subjenis_pengajuan_id') is-invalid @enderror form-control"
                            wire:model='subjenis_pengajuan_id' id="">
                            <option value="">Pilih Subjenis pengajuan</option>
                            @foreach ($subjenis_pengajuan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                        @error('subjenis_pengajuan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <label for="start_date">Tanggal mulai cuti/izin</label>
                        <input wire:model='start_date' class="form-control @error('start_date') is-invalid @enderror"
                            type="date" placeholder="Masukan jummlah hari">
                        @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <label for="end_date">Tanggal selesai cuti/izin</label>
                        <input wire:model='end_date' class="form-control @error('end_date') is-invalid @enderror"
                            type="date" placeholder="Masukan jummlah hari">
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <label for="jumlah_hari">Jumlah hari cuti/izin</label>
                        <input wire:model='jumlah_hari' class="form-control @error('jumlah_hari') is-invalid @enderror"
                            type="date" placeholder="Masukan jummlah hari">
                        @error('jumlah_hari')
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
                        <label for="status">Status</label>
                        <select class="@error('status') is-invalid @enderror form-control" wire:model='status'
                            id="">
                            <option value="">Pilih</option>
                            <option value="menunggu" @if ($status == 'menunggu') selected @endif>Menunggu</option>
                            <option value="approve" @if ($status == 'approve') selected @endif>Approve
                            </option>
                            <option value="reject" @if ($status == 'reject') selected @endif>Reject
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
        @else
            <div class="text-center mt-2">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nama</th>
                                <th scope="col">Jenis pengajuan</th>
                                <th scope="col">Subjenis pengajuan</th>
                                <th scope="col">Tanggal mulai cuti/izin</th>
                                <th scope="col">Tanggal selesai cuti/izin</th>
                                <th scope="col">jumlah hari</th>
                                <th scope="col">keterangan</th>
                                <th scope="col">status</th>
                                <th style="width: 20%" scope="col">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengajuan as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->user->nama }}</td>
                                    <td>{{ $data->JenisPengajuan->nama }}</td>
                                    <td>{{ $data->SubjenisPengajuan->nama }}</td>
                                    <td>{{ $data->start_date }}</td>
                                    <td>{{ $data->end_date }}</td>
                                    <td>{{ $data->jumlah_hari }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td style="@if ($data->status == 'menunggu') color: orange;
                                    @elseif($data->status == 'approve')
                                    color: green;
                                    @else
                                    color: red;
                                    @endif">
                                        {{ $data->status }}</td>
                                    <td>
                                        @if ($data->status == 'menunggu')
                                            <button class="btn btn-sm btn-success"
                                                wire:click="approve('{{ $data->id }}')">Approve</button>
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="reject('{{ $data->id }}')">Reject</button>
                                        @endif
                                        <button class="btn btn-sm btn-info"
                                            wire:click="editform('{{ $data->id }}')">Edit</button>
                                    </td>
                                </tr>
                            @empty
                                <b>tidak ada</b>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    @if ($pengajuan->count() > $take)
                        <button class="btn btn-secondary px-4" wire:click='lanjut'>Lanjut</button>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

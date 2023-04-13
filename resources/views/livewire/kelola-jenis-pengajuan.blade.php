<div>
    <div class="container mt-3 mb-5">
        <div class="">
            <h3>Kelola Jenis Pengajuan</h3>
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
                        <label for="keterangan">keterangan</label>
                        <input wire:model='keterangan' class="form-control @error('keterangan') is-invalid @enderror" type="text"
                            placeholder="keterangan">
                        @error('keterangan')
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
                <table class="table">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nama</th>
                            <th scope="col">keterangan</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jenis_pengajuan as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <button class="btn btn-info"
                                        wire:click="editform({{ $data->id }})">Edit</button>
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

<div>
    <div class="container mt-3 mb-5">
        <div class="">
            <h3>Penajuan Cuti/Izin</h3>
        </div>


        <div class="">

            <form wire:submit.prevent="buat">
                <div class="">
                    <label for="">Nama</label>
                    <input class="form-control" type="text" value="{{ auth()->user()->nama }}" readonly>
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
                @if($jml_telah_diambil)
                Jumlah telah approve {{ $jml_telah_diambil }}
                @endif
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
                    <input readonly wire:model='jumlah_hari'
                        class="form-control @error('jumlah_hari') is-invalid @enderror" type="number"
                        placeholder="Masukan jummlah hari">
                    @error('jumlah_hari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="">
                    <label for="keterangan">keterangan</label>
                    <textarea placeholder="is keterangan / alasan" wire:model='keterangan'
                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" cols="30" rows="5"></textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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
                <div class="mt-3">
                    <button class="btn btn-success form-control" type="submit">
                        Mengajukan
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>

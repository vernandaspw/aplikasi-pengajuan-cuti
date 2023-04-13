<div>
    <div class="mt-3 container">
        @if (auth()->user()->role == 'pegawai')
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                           Cuti tahun ini yg diajukan
                        </div>
                        <div class="card-body">
                            {{ $cuti_menunggu }} Hari
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                           Izin bulan ini yg diajukan
                        </div>
                        <div class="card-body">
                            {{ $izin_menunggu }} Hari
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                           Cuti tahun ini yg diapprove
                        </div>
                        <div class="card-body">
                            {{ $cuti }} Hari
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                           Izin bulan ini yg diapprove
                        </div>
                        <div class="card-body">
                            {{ $izin }} Hari
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                           Cuti tahun ini yg ditolak
                        </div>
                        <div class="card-body">
                            {{ $cuti_reject }} Hari
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                           Izin bulan ini yg ditolak
                        </div>
                        <div class="card-body">
                            {{ $izin_reject }} Hari
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
               <div class="mt-3">
                <h5>
                    Riwayat Pengajuan
                </h5>
               </div>
                <div class="text-center mt-1">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">Jenis pengajuan</th>
                                    <th scope="col">Subjenis pengajuan</th>
                                    <th scope="col">Tanggal mulai cuti/izin</th>
                                    <th scope="col">Tanggal selesai cuti/izin</th>
                                    <th scope="col">jumlah hari</th>
                                    <th scope="col">keterangan</th>
                                    <th scope="col">status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajuan as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

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
            </div>
        @endif

        @if(auth()->user()->role == 'admin')
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                           Menunggu untuk dikonfirmasi
                        </div>
                        <div class="card-body">
                            {{ $konfirm }} Hari
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

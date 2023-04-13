<div>
    <div class="mt-3 container">
        <h3>Kelola setting</h3>
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
        <div class="mt-2">

            <form wire:submit.prevent='ubah'>
                <div class="">
                    <label for="max_kuota_izin_perbulan">max kuota izin dalam sebulan</label>
                    <input wire:model='izin' class="form-control @error('max_kuota_izin_perbulan') is-invalid @enderror"
                        type="text" placeholder="masukan jumlah hari">
                    @error('max_kuota_izin_perbulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="max_kuota_cuti_pertahun">max kuota cuti dalam setahun</label>
                    <input wire:model='cuti' class="form-control @error('max_kuota_cuti_pertahun') is-invalid @enderror"
                        type="text" placeholder="masukan jumlah hari">
                    @error('max_kuota_cuti_pertahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-success form-control mt-3">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>

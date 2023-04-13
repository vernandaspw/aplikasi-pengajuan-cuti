<div>
    <div class="">
        <div class="d-flex justify-content-center">
            <div class="card w-xl mt-5 border-0 shadow-none">
                <div class="card-body">
                   <center>
                    <img width="70px" src="{{ asset('logo.png') }}" alt="">
                    <br>
                    <h3><b>
                        Login / Masuk
                        <br>
                        Aplikasi Pengajuan Cuti
                    </b></h3>
                   </center>
                    <hr>

                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form wire:submit.prevent='login'>
                        <div class="">
                            <label for="username">Username</label>
                            <input wire:model='username' class="form-control @error('username')
                            is-invalid
                            @enderror" type="text" placeholder="username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="password">Password</label>
                            <input wire:model='password' class="form-control @error('password')
                            is-invalid
                            @enderror" type="password" placeholder="password" name=""
                                id="">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button class="form-control btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

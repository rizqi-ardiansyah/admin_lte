@extends('layouts.layout')
@section('main-content')
<body>
    <div class="header home">
        <div class="container-fluid">
            <div class="hero row align-items-center" id="register">
                <div class="container justify-content-between">
                    <div class="col-md-8">
                        <h1 class="text-white"><b>Register</b></h1>
                        <form action="{{ route('register') }}" class="form-register col-md-8" method="POST">
                            @csrf
                            <input class="form-control shadow-sm" name="name" id="name" type="text" placeholder="Nama" required>
                            <input class="form-control shadow-sm" name="username" id="username" type="text" placeholder="Username" required>
                            <input class="form-control shadow-sm" name="email" id="email" type="email" placeholder="Alamat Email" required>
                            <input class="form-control shadow-sm" name="phone" id="phone" type="tel" placeholder="Nomor HP" required>
                            <input class="form-control shadow-sm" name="password" id="password" type="password" placeholder="Password" required>
                            <input class="form-control shadow-sm" name="password" id="password" type="password" placeholder="Konfirmasi Password" required>
                            <div class="d-flex justify-content-start">
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="id_role" value="2" id="Customer" required/>
                                    <label class="form-check-label" for="id_role"> Customer </label>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="id_role" value="3" id="Teknisi" required/>
                                    <label class="form-check-label" for="id_role">Teknisi</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success shadow-sm border-0">Register</button>
                        </form>
                        <p id="teks-bawah-register">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                    <div class="col-md-4">
                        <img src="/img/technician-illustration1.png" alt="ilustrasi1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

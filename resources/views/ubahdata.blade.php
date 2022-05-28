@extends('layouts.layout')
@section('main-content')
<div class="header home">
    <div class="container-fluid">
        <div class="hero row align-items-center">
            <div class="d-flex justify-content-center" id="form-ubah-data">
                <div class="col text-center">
                    <img src="/assets/image/kucingkecil.jpg" alt="" class="rounded mx-auto d-block img-fluid mb-3 mt-3"
                        style="width: 50%; height: 50%">
                    <button type="submit" name="submit" class="btn btn-success shadow-sm border-0">Ubah Foto</button>
                </div>
                <div class="col">
                    <form action="" class="input-form">
                        <input class="form-control shadow-sm" name="email" id="email" type="text" placeholder="Email"
                            required>
                        <input class="form-control shadow-sm" name="password" id="password" type="text"
                            placeholder="Password" required>
                        <input class="form-control shadow-sm" name="address" id="address" type="text"
                            placeholder="Alamat" required>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Bidang Keahlian</option>
                            @foreach($bidang as $b)
                            <option value="{{ $b->id_specialist }}">{{ $b->category }}</option>
                            @endforeach
                        </select>
                        <div class="col custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04">
                            <label class="custom-file-label" for="inputGroupFile04">Sertifikat</label>
                        </div>
                        <button type="submit" class="btn btn-success shadow-sm border-0">Ubah Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .input-form {
        margin-top: 10px;
    }

    .input-form input,
    .input-form .form-select,
    .input-form btn,
    .input-form .custom-file {
        margin-bottom: 10px;
    }
</style>
@endsection
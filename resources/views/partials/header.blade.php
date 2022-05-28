<div class="header home">
                <div class="container-fluid">
                    <div class="header-top row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand">
                                <a href={{ route('index.home') }}>
                                    TechNisi
                                    <!-- <img src="img/logo.png" alt="Logo"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="topbar">
                                <div class="topbar-col">
                                    <a href="tel:+012 345 67890"><i class="fa fa-phone-alt"></i>+012 345 67890</a>
                                </div>
                                <div class="topbar-col">
                                    <a href="mailto:info@example.com"><i class="fa fa-envelope"></i>technisi@gmail.com</a>
                                </div>
                                <div class="topbar-col">
                                    <div class="topbar-social">
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-youtube"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar navbar-expand-lg bg-light navbar-light">
                                <a href="#" class="navbar-brand">MENU</a>
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <a href="index" class="nav-item nav-link">Home</a>
                                        <a href="about" class="nav-item nav-link">Tentang</a>
                                        <a href="service" class="nav-item nav-link">Servis</a>
                                        <a href="" class="nav-item nav-link">Order</a>
                                        <a href="" class="nav-item nav-link">Chat</a>
                                        <a href="contact" class="nav-item nav-link">Contact</a>
                                       <a href={{ route('login') }} class="nav-item nav-link active">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @if(request()->routeIs('index.home'))
                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                            <h2>Best & Trusted</h2>
                            <h2><span>Website</span> Service</h2>
                            <p>Temukan Teknisi Servis Terdekat</p>
                            <a class="btn" href="">Cari Sekarang</a>
                        </div>
                        <div class="col-md-5">
                            <div class="form">
                                <h3>Dapatkan Penawaran</h3>
                                <form>
                                    <input class="form-control" type="text" placeholder="Nama Anda">
                                    <input class="form-control" type="text" placeholder="Nomor Telepon">
                                    <div class="control-group">
                                        <select class="custom-select">
                                            <option selected>Pilih Servis</option>
                                            <option value="1">Servis Elektronik</option>
                                            <option value="2">Servis Perabotan</option>
                                            <option value="3">Servis Laptop</option>
                                        </select>
                                    </div>
                                    <textarea class="form-control" placeholder="Komentar"></textarea>
                                    <button class="btn btn-block">Dapatkan Penawaran</button>
                                </form>
                            </div>
                        </div>
                    </div>
            @endif
                </div>
            </div>

@extends('template')

@if (auth()->user()->role_id == 1)
    @section('javascript')
        <script defer src="editprofile.js"></script>
    @endsection

    @section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri">
                <div class="judul_halaman mt-5">
                    <p style="font-size: 30px; font-weight: bold;">Pengaturan</p>
                </div>
            </div>

            <div class="atas_kanan d-flex  mt-5">
                <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                    <div class="notifikasi d-flex justify-content-center pt-2"
                        style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                        <a href="">
                            <img src="{{ URL::asset('chat.png') }}" class="" style="height: 29px;">
                        </a>
                    </div>
                </div>
                <div class="notifikasi pe-2 mt-2">
                    <a href="\notifikasi">
                        <img src="{{ URL::asset('notifikasi.png') }}" class="ps-2 pe-2 pt-1 pb-1"
                            style="background-color: #f4f4f4; border-radius: 50%; height: 45px;">
                    </a>
                </div>
                <div class="dropdown mt-2">
                    <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                        <img src="\public\image\{{ auth()->user()->foto_profile }}" alt=""
                            style="height: 30px; width: 30px; border-radius: 50px;">
                        {{ Str::limit(auth()->user()->name, 5) }}
                    </button>
                    <div class="dropdown-content">
                        <a href="/editprofile">Pengaturan</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <input type="submit" class="btn btnLogout" value="Logout">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form action="/editprofile/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content_tambahbarang mt-5"
                style="height: 800px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
                @endif
                @if (Session::get('error') && Session::get('error') != null)
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @php
                        Session::put('error', null);
                    @endphp
                @endif
                @if (Session::get('success') && Session::get('success') != null)
                    <div class="alert alert-success">
                        {{ Session::get('error') }}
                    </div>
                    @php
                        Session::put('success', null);
                    @endphp
                @endif
                <div class="daftar_header pt-5 pb-1">
                    <div class="menu_daftar">
                        <div class="button__first pe-3">
                            <div class="d-flex align-items-center flex-column">
                                <button class="btn btn1" id="btnUmkm"
                                    style="background-color: #d7caa0; border-radius: 50%; font-size: 20">
                                    <p class="ps-1 pt-3">1</p>
                                </button>
                                <p style="font-size: 16px; font-weight: bold;">Akun</p>

                            </div>
                        </div>
                        <div class="lines2">
                        </div>
                        <div class="button__second ps-3 pe-3">
                            <div class="d-flex align-items-center flex-column">
                                <button class="btn btn2" id="btnPemasok" style="border-radius: 50%; font-size: 20">
                                    <p class="ps-1 pt-3">2</p>
                                </button>
                                <p style="font-size: 16px; font-weight: bold;">Profil</p>

                            </div>
                        </div>
                    </div>
                    <div class="menu_daftar">
                        <div class="set_akun">
                            <div class="text__first">
                            </div>
                        </div>
                        <div class="lines3" style="visibility: hidden;">
                        </div>
                        <div class="set_profil">
                            <div class="text__first">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pengaturan_akun" style="width: 100%;">
                    <div class="section_dua d-flex" style="width: 100%">
                        <div class="foto_profile" style="width: 30%; padding-top: 7%;">
                            <div class="d-flex justify-content-center">
                                <img src="\public\image\{{ auth()->user()->foto_profile }}" alt="Foto Profil"
                                    style="height: 200px; width: 200px;">
                            </div>
                            <div class="button_pilihfoto d-flex justify-content-center pt-5 mt-2">
                                <label class="custom-file-upload" style="border-radius: 7px;">
                                    <input type="file" name="fotoprofile" />
                                </label>
                            </div>
                        </div>
                        <div class="form_pengaturan_akun" style="width: 70%;">
                            <div class="d-flex justify-content-center pt-4" style="width:80%;">
                                <div class="daftar_akun ms-5" style="width: 95%;">
                                    <div class="text_akun mb-3 mt-3">
                                        <p class="titles" style="font-size: 20px; font-weight: bold;">Akun</p>
                                        <div class="lines4"></div>
                                    </div>

                                    <div class="pengaturan_akun_isi d-flex" style="display: none;">
                                        <div class="pengaturan_akun_kiri mt-2" style="width: 35%;">
                                            <div class="pengaturan_akun_kiri_email mb-3">
                                                <label for="exampleInputEmail1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Email</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Password
                                                    Lama</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4" style="padding-top: 5px;">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Password
                                                    Baru</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4" style="padding-top: 9px;">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Konfirmasi
                                                    Password</label>
                                            </div>
                                        </div>

                                        <div class="daftar_akun_kanan ms-5" style="width: 65%;">
                                            <div class="daftar_akun_kanan_email mb-3">
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="{{ auth()->user()->email }}"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password">
                                                <input type="password" name="password" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Password Lama"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password mt-4">
                                                <input type="password" class="form-control" name="passwordBaru"
                                                    id="exampleInputPassword1" placeholder="Password Baru"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password mt-4">
                                                <input type="password" class="form-control" name="passwordKonfirmasi"
                                                    id="exampleInputPassword1" placeholder="Konfirmasi Password"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pengaturan_akun_isi d-flex">
                                        <div class="pengaturan_profil_kiri mt-2" style="width: 35%; display: none;">
                                            <div class="pengaturan_akun_kiri_email mb-3">
                                                <label for="exampleInputEmail1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Nama
                                                    Toko</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Kategori</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4" style="padding-top: 5px;">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Nomor
                                                    Telepon</label>
                                            </div>
                                        </div>

                                        <div class="daftar_profil_kanan ms-5" style="width: 65%; display: none;">
                                            <div class="daftar_akun_kanan_email mb-3">
                                                <input type="text" name="nama" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="{{ auth()->user()->name }}"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password">
                                                <select name="kategori" class="kategori p-2"
                                                    style="color: black; border-radius: 5px;">
                                                    {{-- <option selected="true" disabled="disabled">{{auth()->user()->kategori}}</option> --}}
                                                    <option value="Fashion"
                                                        @if (auth()->user()->kategori == 'Fashion') {
                                                                selected="selected"
                                                            } @endif>
                                                        Fashion</option>
                                                    <option value="Jasa"
                                                        @if (auth()->user()->kategori == 'Jasa') {
                                                                selected="selected"
                                                            } @endif>
                                                        Jasa</option>
                                                    <option value="Kecantikan"
                                                        @if (auth()->user()->kategori == 'Kecantikan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kecantikan</option>
                                                    <option value="Kesehatan"
                                                        @if (auth()->user()->kategori == 'Kesehatan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kesehatan</option>
                                                    <option value="Makanan dan minuman"
                                                        @if (auth()->user()->kategori == 'Makanan dan minuman') {
                                                                selected="selected"
                                                            } @endif>
                                                        Makanan dan minuman</option>
                                                    <option value="Olahraga"
                                                        @if (auth()->user()->kategori == 'Olahraga') {
                                                                selected="selected"
                                                            } @endif>
                                                        Olahraga</option>
                                                    <option value="Otomotif"
                                                        @if (auth()->user()->kategori == 'Otomotif') {
                                                                selected="selected"
                                                            } @endif>
                                                        Otomotif</option>
                                                    <option value="Perdagangan"
                                                        @if (auth()->user()->kategori == 'Perdagangan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Perdagangan</option>
                                                    <option value="Lainnya"
                                                        @if (auth()->user()->kategori == 'Lainnya') {
                                                                selected="selected"
                                                            } @endif>
                                                        Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="daftar_akun_kanan_password mt-4">
                                                <input type="tel" name="nomorTelp" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Nomor Telfon"
                                                    value={{ auth()->user()->nomortelp }}
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gabungan_button d-flex justify-content-center pt-5">
                    <div class="button__lanjut d-flex justify-content-center pt-4 mt-2" style="width: 30%; height: 75px;">
                        <button type="button" class="btn btn-primary ps-5 pe-5 " id="btn_lanjut"
                            style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Lanjut</button>
                    </div>
                    <div class="button__kembali d-flex justify-content-center pt-4 mt-2"
                        style="width: 30%; height: 75px;">
                        <button type="button" class="btn btn-primary ps-5 pe-5 " id="btn_kembali"
                            style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Kembali</button>
                    </div>
                    <div class="button_simpan d-flex justify-content-center pt-4 mt-2" style="width: 30%">
                        <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan"
                            style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Simpan</button>
                    </div>

                </div>
            </div>
        </form>
    @endsection
@elseif(auth()->user()->role_id == 2)
    @section('javascript')
        <script defer src="editprofilepemasok.js"></script>
    @endsection

    @section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri">
                <div class="judul_halaman mt-5">
                    <p style="font-size: 30px; font-weight: bold;">Pengaturan</p>
                </div>
            </div>

            <div class="atas_kanan d-flex  mt-5">
                <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                    <div class="notifikasi d-flex justify-content-center pt-2"
                        style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                        <a href="">
                            <img src="{{ URL::asset('chat.png') }}" class="" style="height: 29px;">
                        </a>
                    </div>
                </div>
                <div class="notifikasi pe-2 mt-2">
                    <a href="\notifikasi">
                        <img src="{{ URL::asset('notifikasi.png') }}" class="ps-2 pe-2 pt-1 pb-1"
                            style="background-color: #f4f4f4; border-radius: 50%; height: 45px;">
                    </a>
                </div>
                <div class="dropdown mt-2">
                    <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                        <img src="\public\image\{{ auth()->user()->foto_profile }}" alt=""
                            style="height: 40px; width: 40px; border-radius: 50px;">
                        {{ Str::limit(auth()->user()->name, 5) }}
                    </button>
                    <div class="dropdown-content">
                        <a href="/editprofile">Pengaturan</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <input type="submit" class="btn prevbutton" value="Logout">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form action="/editprofile/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content_tambahbarang mt-5"
                style="height: 800px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
                @endif
                @if (Session::get('error') && Session::get('error') != null)
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @php
                        Session::put('error', null);
                    @endphp
                @endif
                @if (Session::get('success') && Session::get('success') != null)
                    <div class="alert alert-success">
                        {{ Session::get('error') }}
                    </div>
                    @php
                        Session::put('success', null);
                    @endphp
                @endif
                <div class="daftar_header pt-5 pb-1">
                    <div class="menu_daftar">
                        <div class="button__first pe-3">
                            <div class="d-flex align-items-center flex-column">
                                <button class="btn btn1" id="btnUmkm"
                                    style="background-color: #d7caa0; border-radius: 50%; font-size: 20">
                                    <p class="ps-1 pt-3">1</p>
                                </button>
                                <p style="font-size: 16px; font-weight: bold;">Akun</p>

                            </div>
                        </div>
                        <div class="lines2">
                        </div>
                        <div class="button__second ps-3 pe-3">
                            <div class="d-flex align-items-center flex-column">
                                <button class="btn btn2" id="btnPemasok" style="border-radius: 50%; font-size: 20">
                                    <p class="ps-1 pt-3">2</p>
                                </button>
                                <p style="font-size: 16px; font-weight: bold;">Profil</p>

                            </div>
                        </div>
                        <div class="lines2">
                        </div>
                        <div class="button__third">
                            <div class="d-flex align-items-center flex-column">
                                <button class="btn btn3" id="btnPemasok" style="border-radius: 50%; font-size: 20">
                                    <p class="ps-1 pt-3">3</p>
                                </button>
                                <p style="font-size: 16px; font-weight: bold;">Platform Sosial</p>

                            </div>
                        </div>
                    </div>
                    <div class="menu_daftar">
                        <div class="set_akun">
                            <div class="text__first">
                            </div>
                        </div>
                        <div class="lines3" style="visibility: hidden;">
                        </div>
                        <div class="set_profil">
                            <div class="text__first">
                            </div>
                        </div>
                        <div class="lines5" style="visibility: hidden;">
                        </div>
                        <div class="set_platformSosial">
                            <div class="text__first">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pengaturan_akun" style="width: 100%;">
                    <div class="section_dua d-flex" style="width: 100%">
                        <div class="foto_profile" style="width: 30%; padding-top: 7%;">
                            <div class="d-flex justify-content-center">
                                <img src="\public\image\{{ auth()->user()->foto_profile }}" alt="Foto Profil"
                                    style="height: 200px; width: 200px;">
                            </div>
                            <div class="button_pilihfoto d-flex justify-content-center pt-5 mt-2">
                                <label class="custom-file-upload" style="border-radius: 7px;">
                                    <input type="file" name="fotoprofile" />
                                </label>
                            </div>
                        </div>
                        <div class="form_pengaturan_akun" style="width: 70%;">
                            <div class="d-flex justify-content-center pt-4" style="width:80%;">
                                <div class="daftar_akun ms-5" style="width: 95%;">
                                    <div class="text_akun mb-3 mt-3">
                                        <p class="titles" style="font-size: 20px; font-weight: bold;">Akun</p>
                                        <div class="lines4"></div>
                                    </div>

                                    <div class="pengaturan_akun_isi d-flex" style="display: none;">
                                        <div class="pengaturan_akun_kiri mt-2" style="width: 35%;">
                                            <div class="pengaturan_akun_kiri_email mb-3">
                                                <label for="exampleInputEmail1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Email</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Password
                                                    Lama</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4" style="padding-top: 5px;">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Password
                                                    Baru</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4" style="padding-top: 9px;">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Konfirmasi
                                                    Password</label>
                                            </div>
                                        </div>

                                        <div class="daftar_akun_kanan ms-5" style="width: 65%;">
                                            <div class="daftar_akun_kanan_email mb-3">
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="{{ auth()->user()->email }}"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password">
                                                <input type="password" name="password" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Password Lama"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password mt-4">
                                                <input type="password" class="form-control" name="passwordBaru"
                                                    id="exampleInputPassword1" placeholder="Password Baru"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password mt-4">
                                                <input type="password" class="form-control" name="passwordKonfirmasi"
                                                    id="exampleInputPassword1" placeholder="Konfirmasi Password"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pengaturan_akun_isi d-flex">
                                        <div class="pengaturan_profil_kiri mt-2" style="width: 35%; display: none;">
                                            <div class="pengaturan_akun_kiri_email mb-3">
                                                <label for="exampleInputEmail1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Nama
                                                    Toko</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Kategori</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4" style="padding-top: 5px;">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Nomor
                                                    Telepon</label>
                                            </div>
                                        </div>

                                        <div class="daftar_profil_kanan ms-5" style="width: 65%; display: none;">
                                            <div class="daftar_akun_kanan_email mb-3">
                                                <input type="text" name="nama" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="{{ auth()->user()->name }}"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password">
                                                <select name="kategori" class="kategori p-2"
                                                    style="color: black; border-radius: 5px;">
                                                    {{-- <option selected="true" disabled="disabled">{{auth()->user()->kategori}}</option> --}}
                                                    <option value="Fashion"
                                                        @if (auth()->user()->kategori == 'Fashion') {
                                                                selected="selected"
                                                            } @endif>
                                                        Fashion</option>
                                                    <option value="Jasa"
                                                        @if (auth()->user()->kategori == 'Jasa') {
                                                                selected="selected"
                                                            } @endif>
                                                        Jasa</option>
                                                    <option value="Kecantikan"
                                                        @if (auth()->user()->kategori == 'Kecantikan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kecantikan</option>
                                                    <option value="Kesehatan"
                                                        @if (auth()->user()->kategori == 'Kesehatan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kesehatan</option>
                                                    <option value="Makanan dan minuman"
                                                        @if (auth()->user()->kategori == 'Makanan dan minuman') {
                                                                selected="selected"
                                                            } @endif>
                                                        Makanan dan minuman</option>
                                                    <option value="Olahraga"
                                                        @if (auth()->user()->kategori == 'Olahraga') {
                                                                selected="selected"
                                                            } @endif>
                                                        Olahraga</option>
                                                    <option value="Otomotif"
                                                        @if (auth()->user()->kategori == 'Otomotif') {
                                                                selected="selected"
                                                            } @endif>
                                                        Otomotif</option>
                                                    <option value="Perdagangan"
                                                        @if (auth()->user()->kategori == 'Perdagangan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Perdagangan</option>
                                                    <option value="Lainnya"
                                                        @if (auth()->user()->kategori == 'Lainnya') {
                                                                selected="selected"
                                                            } @endif>
                                                        Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="daftar_akun_kanan_password mt-4">
                                                <input type="tel" name="nomorTelp" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Nomor Telfon"
                                                    value={{ auth()->user()->nomortelp }}
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pengaturan_akun_isi d-flex">
                                        <div class="pengaturan_platform_kiri mt-2" style="width: 35%; display: none;">
                                            <div class="pengaturan_akun_kiri_email mb-3">
                                                <label for="exampleInputEmail1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Instagram</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Shopee</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4" style="padding-top: 5px;">
                                                <label for="exampleInputPassword1" class="form-label"
                                                    style="color: black; font-size: 16px; font-weight: bold;">Tokopedia</label>
                                            </div>
                                        </div>

                                        <div class="daftar_platform_kanan ms-5" style="width: 65%; display: none;">
                                            <div class="daftar_akun_kanan_email mb-3">
                                                @if (isset($platformIg->get(0)->link))
                                                    <input type="text" name="platform_instagram" class="form-control"
                                                        id="exampleInputEmail1"
                                                        aria-describedby="emailHelp"placeholder="contoh: http://instagram.com/tokokita"
                                                        value="{{ $platformIg->get(0)->link }}"
                                                        style="border: 1px solid #626262; background-color:transparent;">
                                                @else
                                                    <input type="text" name="platform_instagram" class="form-control"
                                                        id="exampleInputEmail1"
                                                        aria-describedby="emailHelp"placeholder="contoh: http://instagram.com/tokokita"
                                                        value=""
                                                        style="border: 1px solid #626262; background-color:transparent;">
                                                @endif
                                            </div>
                                            <div class="daftar_akun_kanan_password">
                                                @if (isset($platformShope->get(0)->link))
                                                    <input type="text" name="platform_shopee" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="contoh: http://shopee.com/tokokita"
                                                        value="{{ $platformShope->get(0)->link }}"
                                                        style="border: 1px solid #626262; background-color:transparent;">
                                                @else
                                                    <input type="text" name="platform_shopee" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="contoh: http://shopee.com/tokokita" value=""
                                                        style="border: 1px solid #626262; background-color:transparent;">
                                                @endif
                                            </div>
                                            <div class="daftar_akun_kanan_password mt-4">
                                                @if (isset($platformTokped->get(0)->link))
                                                    <input type="text" name="platform_tokopedia" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="contoh: http://shopee.com/tokokita"
                                                        value="{{ $platformTokped->get(0)->link }}"
                                                        style="border: 1px solid #626262; background-color:transparent;">
                                                @else
                                                    <input type="text" name="platform_tokopedia" class="form-control"
                                                        id="exampleInputEmail1" value=""
                                                        placeholder="contoh: http://tokopedia.com/tokokita"
                                                        style="border: 1px solid #626262; background-color:transparent;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gabungan_button d-flex justify-content-center pt-5">
                    <div class="button__lanjut d-flex justify-content-center pt-4 mt-2" style="width: 30%; height: 75px;">
                        <button type="button" class="btn btn-primary ps-5 pe-5 " id="btn_lanjut"
                            style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Lanjut</button>
                    </div>
                    <div class="button__kembali d-flex justify-content-center pt-4 mt-2"
                        style="width: 30%; height: 75px;">
                        <button type="button" class="btn btn-primary ps-5 pe-5 " id="btn_kembali"
                            style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Kembali</button>
                    </div>
                    <div class="button_simpan d-flex justify-content-center pt-4 mt-2" style="width: 30%">
                        <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan"
                            style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Simpan</button>
                    </div>

                </div>
            </div>
        </form>
    @endsection
@endif

@extends('template')

@section('javascript')
    <script defer src="/editbarang.js"></script>
@endsection

@if (auth()->user()->role_id == 1)
    @section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri">
                <div class="judul_halaman mt-5">
                    <a href="javascript:history.back()">
                        <button class="ps-3 pe-3"
                            style="background-color: #d7caa0; font-size: 30px; font-weight: bold;border-radius: 50%; border: none;">
                        <</button>
                    </a>
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
                    <a href="/notifikasi">
                        <img src="{{ URL::asset('notifikasi.png') }}" class="ps-2 pe-2 pt-1 pb-1"
                            style="background-color: #f4f4f4; border-radius: 50%; height: 45px;">
                    </a>
                </div>
                <div class="dropdown mt-2">
                    <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                        <img src="\public\image\{{auth()->user()->foto_profile}}" alt="" style="height: 40px; width: 40px; border-radius: 50px;"> {{Str::limit(auth()->user()->name,5)}}
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
        <form action="/editbarang/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content_tambahbarang mt-5"
                style="height: 700px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">
                <div class="pengaturan_akun" style="width: 100%;">
                    <div class="section_dua d-flex" style="width: 100%">
                        <div class="foto_profile" style="width: 30%; padding-top: 7%; height: 100%;">
                            <div class="d-flex justify-content-center">
                                <img src="\public\image\{{ $hasil->get(0)->foto_barang }}" alt="Foto Profil"
                                    style="height: 200px; width: 200px;">
                            </div>
                            <div class="button_pilihfoto d-flex justify-content-center pt-5 mt-2">
                                <label class="custom-file-upload" style="border-radius: 7px;">
                                    <input type="file" name="fotobarang" />
                                </label>
                            </div>
                        </div>

                        <div class="form_pengaturan_akun" style="width: 70%;">
                            <div class="d-flex justify-content-center pt-4" style="width:80%;">
                                <div class="daftar_akun ms-5" style="width: 95%;">
                                    <div class="pengaturan_akun_isi">
                                        <div class="input_content_tambahbarang">
                                            <div class="input_judul_namabarang">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Nama Barang</p>
                                                </label>
                                            </div>
                                            <div class="input_namabarang">
                                                <input type="text" disabled name="namabarang" class="form-control"
                                                    id="exampleInputNamaBarang1" value="{{ $hasil->get(0)->nama }}"
                                                    aria-describedby="emailHelp" placeholder="Nama Barang"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="input_idbarang">
                                                <input type="hidden" name="idbarang" class="form-control"
                                                    id="exampleInputNamaBarang1" value="{{ $hasil->get(0)->id }}"
                                                    aria-describedby="emailHelp" placeholder="Id Barang"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>

                                        <div class="input_content_jenisbarang mt-3">
                                            <div class="input_judul_jenisbarang">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Jenis Barang</p>
                                                </label>
                                            </div>
                                            <div class="daftar_profil_kanan_kategori mb-3">
                                                <select name="kategori" class="kategori p-2"
                                                    style="color: black; border-radius: 5px;">
                                                    {{-- <option selected="true" disabled="disabled">{{auth()->user()->kategori}}</option> --}}
                                                    <option value="Alat tulis"
                                                        @if ($hasil->get(0)->jenis == 'Alat tulis') {
                                                                selected="selected"
                                                            } @endif>
                                                        Alat tulis</option>
                                                    <option value="Bahan baku"
                                                        @if ($hasil->get(0)->jenis == 'Bahan baku') {
                                                                selected="selected"
                                                            } @endif>
                                                        Bahan baku</option>
                                                    <option value="Buku"
                                                        @if ($hasil->get(0)->jenis == 'Buku') {
                                                                selected="selected"
                                                            } @endif>
                                                        Buku</option>
                                                    <option value="Dapur"
                                                        @if ($hasil->get(0)->jenis == 'Dapur') {
                                                                selected="selected"
                                                            } @endif>
                                                        Dapur</option>
                                                    <option value="Elektronik"
                                                        @if ($hasil->get(0)->jenis == 'Elektronik') {
                                                                selected="selected"
                                                            } @endif>
                                                        Elektronik</option>
                                                    <option value="Fashion"
                                                        @if ($hasil->get(0)->jenis == 'Fashion') {
                                                                selected="selected"
                                                            } @endif>
                                                        Fashion</option>
                                                    <option value="Kecantikan"
                                                        @if ($hasil->get(0)->jenis == 'Kecantikan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kecantikan</option>
                                                    <option value="Kerajinan"
                                                        @if ($hasil->get(0)->jenis == 'Kerajinan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kerajinan</option>
                                                    <option value="Kesehatan"
                                                        @if ($hasil->get(0)->jenis == 'Kesehatan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kesehatan</option>
                                                    <option value="Mainan"
                                                        @if ($hasil->get(0)->jenis == 'Mainan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Mainan</option>
                                                    <option value="Makanan dan minuman"
                                                        @if ($hasil->get(0)->jenis == 'Makanan dan minuman') {
                                                                selected="selected"
                                                            } @endif>
                                                        Makanan dan minuman</option>
                                                    <option value="Olahraga"
                                                        @if ($hasil->get(0)->jenis == 'Olahraga') {
                                                                selected="selected"
                                                            } @endif>
                                                        Olahraga</option>
                                                    <option value="Otomotif"
                                                        @if ($hasil->get(0)->jenis == 'Otomotif') {
                                                                selected="selected"
                                                            } @endif>
                                                        Otomotif</option>
                                                    <option value="Perlengkapan pesta"
                                                        @if ($hasil->get(0)->jenis == 'Perlengkapan pesta') {
                                                                selected="selected"
                                                            } @endif>
                                                        Perlengkapan pesta</option>
                                                    <option value="Pertukangan"
                                                        @if ($hasil->get(0)->jenis == 'Pertukangan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Pertukangan</option>
                                                    <option value="Rumah tangga"
                                                        @if ($hasil->get(0)->jenis == 'Rumah tangga') {
                                                                selected="selected"
                                                            } @endif>
                                                        Rumah tangga</option>
                                                    <option value="Lainnya"
                                                        @if ($hasil->get(0)->jenis == 'Lainnya') {
                                                                selected="selected"
                                                            } @endif>
                                                        Lainnya</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="input_content_tanggalkadaluarsa mt-3">
                                            <div class="input_judul_tanggalkadaluarsa">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Tanggal Kadaluarsa</p>
                                                </label>
                                            </div>
                                            <div class="input_tanggalkadaluarsa">
                                                <input type="date" class="form-control" name="tanggalkadaluarsa"
                                                    value="{{ $hasil->get(0)->tanggal_kadaluarsa }}"
                                                    id="exampleInputTanggalKadaluarsa1" aria-describedby="emailHelp"
                                                    placeholder="Tanggal Kadaluarsa"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>

                                        <div class="input_content_harga mt-3">
                                            <div class="input_judul_harga">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Harga</p>
                                                </label>
                                            </div>
                                            <!-- <div class="input_namabarang">
                                                        <input type="number" step="500" class="form-control" id="exampleInputHarga1" aria-describedby="emailHelp" placeholder="Harga" style="border: 1px solid #626262; background-color:transparent;">
                                                        
                                                    </div> -->
                                            <div class="d-flex">

                                                <div style="width: 40%;" class="pe-5">
                                                    <div class="d-flex"
                                                        style="border: 1px solid #626262;padding: 5px; background-color:transparent; border-radius: 5px; width: 100%;">
                                                        <span class="pe-2">Rp</span>
                                                        <input type="text" name="hargabarang"
                                                            style="border: 0px solid #626262;background-color:transparent; outline: 0;"
                                                            value="{{ $hasil->get(0)->harga }}">
                                                    </div>
                                                </div>

                                                <div class="input_content_harga" class="ps-5">

                                                    <div class="d-flex"
                                                        style="border: 1px solid #626262; background-color:transparent; border-radius: 5px; width: 100%;">
                                                        <button type="submit" class="btn"
                                                            style="border-right: 1px solid #626262; border-radius: 0;">-</button>
                                                        {{-- <span class="ps-4 pe-4 pt-2"></span> --}}
                                                        <input type="text" value="{{ $hasil->get(0)->jumlah }}"
                                                            name="jumlahbarang"
                                                            style="border: 0px solid #626262;background-color:transparent; outline: 0; width: 50px; text-align: center;"
                                                            placeholder="Kuantitas">
                                                        <button type="submit" class="btn"
                                                            style="border-left: 1px solid #626262; border-radius: 0;">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button_simpan d-flex justify-content-center pt-5 mt-2">
                    <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan"
                        style="background-color: #D7CAA0; width: 25%; border: none; font-weight: bold; color: black;">Simpan</button>
                </div>
            </div>
        </form>
    @endsection
@elseif(auth()->user()->role_id == 2)
    @section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri">
                <div class="judul_halaman mt-5">
                    <a href="javascript:history.back()">
                        <button class="ps-3 pe-3"
                            style="background-color: #d7caa0; font-size: 30px; font-weight: bold;border-radius: 50%; border: none;">
                            << /button>
                    </a>
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
                    <a href="/notifikasi">
                        <img src="{{ URL::asset('notifikasi.png') }}" class="ps-2 pe-2 pt-1 pb-1"
                            style="background-color: #f4f4f4; border-radius: 50%; height: 45px;">
                    </a>
                </div>
                <div class="dropdown mt-2">
                    <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                        <img src="{{ URL::asset('akun.png') }}" alt="" style="height: 40px;"> Glosary
                    </button>
                    <div class="dropdown-content">
                        <a href="#">Pengaturan</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <form action="/editbarang/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content_tambahbarang mt-5"
                style="height: 700px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">
                <div class="pengaturan_akun" style="width: 100%;">
                    <div class="section_dua d-flex" style="width: 100%">
                        <div class="foto_profile" style="width: 30%; padding-top: 7%; height: 100%;">
                            <div class="d-flex justify-content-center">
                                <img src="\public\image\{{ $hasil->get(0)->foto_barang }}" alt="Foto Profil"
                                    style="height: 200px; width: 200px;">
                            </div>
                            <div class="button_pilihfoto d-flex justify-content-center pt-5 mt-2">
                                <label class="custom-file-upload" style="border-radius: 7px;">
                                    <input type="file" name="fotobarang" />
                                </label>
                            </div>
                        </div>

                        <div class="form_pengaturan_akun" style="width: 70%;">
                            <div class="d-flex justify-content-center pt-4" style="width:80%;">
                                <div class="daftar_akun ms-5" style="width: 95%;">
                                    <div class="pengaturan_akun_isi">
                                        <div class="input_content_tambahbarang">
                                            <div class="input_judul_namabarang">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Nama Barang</p>
                                                </label>
                                            </div>
                                            <div class="input_namabarang">
                                                <input type="text" name="namabarang" class="form-control"
                                                    id="exampleInputNamaBarang1" value="{{ $hasil->get(0)->nama }}"
                                                    aria-describedby="emailHelp" placeholder="Nama Barang"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="input_idbarang">
                                                <input type="hidden" name="idbarang" class="form-control"
                                                    id="exampleInputNamaBarang1" value="{{ $hasil->get(0)->id }}"
                                                    aria-describedby="emailHelp" placeholder="Id Barang"
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>

                                        <div class="input_content_jenisbarang mt-3">
                                            <div class="input_judul_jenisbarang">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Jenis Barang</p>
                                                </label>
                                            </div>
                                            <div class="daftar_profil_kanan_kategori mb-3">
                                                <select name="kategori" class="kategori p-2"
                                                    style="color: black; border-radius: 5px;">
                                                    {{-- <option selected="true" disabled="disabled">{{auth()->user()->kategori}}</option> --}}
                                                    <option value="Alat tulis"
                                                        @if ($hasil->get(0)->jenis == 'Alat tulis') {
                                                                selected="selected"
                                                            } @endif>
                                                        Alat tulis</option>
                                                    <option value="Bahan baku"
                                                        @if ($hasil->get(0)->jenis == 'Bahan baku') {
                                                                selected="selected"
                                                            } @endif>
                                                        Bahan baku</option>
                                                    <option value="Buku"
                                                        @if ($hasil->get(0)->jenis == 'Buku') {
                                                                selected="selected"
                                                            } @endif>
                                                        Buku</option>
                                                    <option value="Dapur"
                                                        @if ($hasil->get(0)->jenis == 'Dapur') {
                                                                selected="selected"
                                                            } @endif>
                                                        Dapur</option>
                                                    <option value="Elektronik"
                                                        @if ($hasil->get(0)->jenis == 'Elektronik') {
                                                                selected="selected"
                                                            } @endif>
                                                        Elektronik</option>
                                                    <option value="Fashion"
                                                        @if ($hasil->get(0)->jenis == 'Fashion') {
                                                                selected="selected"
                                                            } @endif>
                                                        Fashion</option>
                                                    <option value="Kecantikan"
                                                        @if ($hasil->get(0)->jenis == 'Kecantikan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kecantikan</option>
                                                    <option value="Kerajinan"
                                                        @if ($hasil->get(0)->jenis == 'Kerajinan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kerajinan</option>
                                                    <option value="Kesehatan"
                                                        @if ($hasil->get(0)->jenis == 'Kesehatan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Kesehatan</option>
                                                    <option value="Mainan"
                                                        @if ($hasil->get(0)->jenis == 'Mainan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Mainan</option>
                                                    <option value="Makanan dan minuman"
                                                        @if ($hasil->get(0)->jenis == 'Makanan dan minuman') {
                                                                selected="selected"
                                                            } @endif>
                                                        Makanan dan minuman</option>
                                                    <option value="Olahraga"
                                                        @if ($hasil->get(0)->jenis == 'Olahraga') {
                                                                selected="selected"
                                                            } @endif>
                                                        Olahraga</option>
                                                    <option value="Otomotif"
                                                        @if ($hasil->get(0)->jenis == 'Otomotif') {
                                                                selected="selected"
                                                            } @endif>
                                                        Otomotif</option>
                                                    <option value="Perlengkapan pesta"
                                                        @if ($hasil->get(0)->jenis == 'Perlengkapan pesta') {
                                                                selected="selected"
                                                            } @endif>
                                                        Perlengkapan pesta</option>
                                                    <option value="Pertukangan"
                                                        @if ($hasil->get(0)->jenis == 'Pertukangan') {
                                                                selected="selected"
                                                            } @endif>
                                                        Pertukangan</option>
                                                    <option value="Rumah tangga"
                                                        @if ($hasil->get(0)->jenis == 'Rumah tangga') {
                                                                selected="selected"
                                                            } @endif>
                                                        Rumah tangga</option>
                                                    <option value="Lainnya"
                                                        @if ($hasil->get(0)->jenis == 'Lainnya') {
                                                                selected="selected"
                                                            } @endif>
                                                        Lainnya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="input_content_harga mt-3">
                                            <div class="input_judul_harga">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Harga</p>
                                                </label>
                                            </div>
                                            <!-- <div class="input_namabarang">
                                                        <input type="number" step="500" class="form-control" id="exampleInputHarga1" aria-describedby="emailHelp" placeholder="Harga" style="border: 1px solid #626262; background-color:transparent;">
                                                        
                                                    </div> -->
                                            <div class="d-flex">

                                                <div style="width: 40%;" class="pe-5">
                                                    <div class="d-flex"
                                                        style="border: 1px solid #626262;padding: 5px; background-color:transparent; border-radius: 5px; width: 100%;">
                                                        <span class="pe-2">Rp</span>
                                                        <input type="text" name="hargabarang"
                                                            style="border: 0px solid #626262;background-color:transparent; outline: 0;"
                                                            value="{{ $hasil->get(0)->harga }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="input_content_tanggalkadaluarsa mt-3">
                                            <div class="input_judul_tanggalkadaluarsa">
                                                <label for="">
                                                    <p style="font-size: 16px; font-weight: bold;">Deskripsi</p>
                                                </label>
                                            </div>
                                            <div class="input_tanggalkadaluarsa">
                                                <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" placeholder="Deskripsi"
                                                    style="border: 1px solid #626262; background-color:transparent; width: 100%;">{{ $hasil->get(0)->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button_simpan d-flex justify-content-center pt-5 mt-2">
                    <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan"
                        style="background-color: #D7CAA0; width: 25%; border: none; font-weight: bold; color: black;">Simpan</button>
                </div>
            </div>
        </form>
    @endsection
@endif

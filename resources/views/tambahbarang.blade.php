@extends('template')

@section('javascript')
<script defer src="tambahbarang.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                        <div class="atas_kiri">
                            <div class="judul_halaman mt-5">
                                <p style="font-size: 30px; font-weight: bold;">Tambah Barang</p>
                            </div>
                        </div>

                        <div class="atas_kanan d-flex  mt-5">
                            <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                                <div class="notifikasi d-flex justify-content-center pt-2" style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                                        <img src="{{URL::asset('chat.png')}}" class="" style="height: 29px;">
                                </div>
                            </div>
                            <div class="notifikasi pe-2 mt-2">
                                <a href="">
                                    <img src="{{URL::asset('notifikasi.png')}}" class="ps-2 pe-2 pt-1 pb-1" style="background-color: #f4f4f4; border-radius: 50%; height: 45px;">
                                </a>
                            </div>

                            <div class="dropdown mt-2">
                            <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                                <img src="{{URL::asset('akun.png')}}" alt="" style="height: 40px;"> {{Str::limit(auth()->user()->name,5)}}
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


                    <div class="content_tambahbarang mt-5" style="height: 750px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
                        <div class="content_tambah d-flex" style="height: 80px;">
                            <button class="btn d-flex justify-content-center" id="btnBarangBaru" style="width: 50%; background-color: #D7CAA0; border-radius: 25px 0 0 0;">
                            <div class="iconbaru">
                                <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                            </div>
                            <p class="pt-2" style="font-size: 25px; font-weight: bold;">Barang Baru</p>
                            </button>
                            <button class="btn d-flex justify-content-center" id="btnBarangExisting" style="width: 50%; background-color: #fff; border-radius: 0 25px 0 0;">
                            <div class="iconbaru">
                                <img src="{{URL::asset('barangexist.png')}}" alt="" style="height: 60px;">
                            </div>
                            <p class="pt-2" style="font-size: 25px; font-weight: bold;">Barang Eksisting</p>
                            </button>
                        </div>

                        <div class="isi_content_tambahbarang mt-4" style="width: 100%;">
                        <form action="/tambahbarang" method="POST">
                            @csrf
                            <div class="judul_content_tambahbarang text-center">
                               <label for=""><p style="font-size: 25px; font-weight: bold;">Barang Baru</p></label>
                           </div>
                            <div class="judul_content_tambahbarangexist text-center" style="display: none;">
                                <label for=""><p style="font-size: 25px; font-weight: bold;">Barang Eksisting</p></label>
                             </div>

                        <div class="d-flex justify-content-center">
                            <div style="width: 80%;">
                                <div class="input_content_tambahbarang">
                                    <div class="input_judul_namabarang">
                                        <label for="">
                                            <p style="font-size: 16px; font-weight: bold;">Nama Barang</p>
                                        </label> 
                                    </div>
                                    <div class="input_namabarang">
                                        <input type="text" class="form-control namabarang" id="namabarang" name="namabarang" aria-describedby="emailHelp" placeholder="Nama Barang" style="border: 1px solid #626262; background-color:transparent;">
                                    </div>
                                </div>

                                <div class="input_content_jenisbarang mt-3">
                                    <div class="input_judul_jenisbarang">
                                        <label for="">
                                            <p style="font-size: 16px; font-weight: bold;">Jenis Barang</p>
                                        </label> 
                                    </div>
                                    <div class="daftar_profil_kanan_kategori mb-3">
                                        <select name="jenisbarang" class="kategori p-2" style="color: #626262; border-radius: 5px;">
                                            <option value="javascript">Es Grim Coklat</option>
                                            <option value="php">Es Grim Vanilla</option>
                                            <option value="java">Es Grim Stroberi</option>
                                            <option value="golang">Es Grim Matcha</option>
                                            <option value="python">Es Grim Melon</option>
                                            <option value="c#">Es Grim Alpukat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="input_content_jumlahbarang mt-3">
                                    <div class="input_judul_jumlahbarang">
                                        <label for="">
                                            <p style="font-size: 16px; font-weight: bold;">Jumlah Barang</p>
                                        </label> 
                                    </div>
                                    <div class="input_namabarang">
                                        <input type="number" class="form-control jumlahbarang" name = "jumlahbarang" id="exampleInputJumlaBarang1" aria-describedby="emailHelp" placeholder="Jumlah Barang" style="border: 1px solid #626262; background-color:transparent;">
                                    </div>
                                </div>

                                <div class="input_content_jumlahbarang mt-3">
                                    <div class="input_judul_jumlahbarang">
                                        <label for="">
                                            <p style="font-size: 16px; font-weight: bold;">Harga Barang</p>
                                        </label> 
                                    </div>
                                    <div class="input_namabarang">
                                        <input type="number" class="form-control hargabarang" name = "hargabarang" id="exampleInputHargaBarang1" aria-describedby="emailHelp" placeholder="Harga Barang" style="border: 1px solid #626262; background-color:transparent;">
                                    </div>
                                </div>

                                <div class="input_content_tanggalkadaluarsa mt-3">
                                    <div class="input_judul_tanggalkadaluarsa">
                                        <label for="">
                                            <p style="font-size: 16px; font-weight: bold;">Tanggal Kadaluarsa</p>
                                        </label>    
                                    </div>
                                    <div class="input_tanggalkadaluarsa">
                                        <input type="date" class="form-control tanggalkadaluarsa" name="tanggalkadaluarsa" id="exampleInputTanggalKadaluarsa1" aria-describedby="emailHelp" placeholder="Tanggal Kadaluarsa" style="border: 1px solid #626262; background-color:transparent;">
                                    </div>
                                </div>

                                <div class="input_content_fotobarang mt-3">
                                    <div class="input_judul_fotobarang">
                                        <label for="">
                                            <p style="font-size: 16px; font-weight: bold;">Foto Barang</p>
                                        </label>
                                    </div>
                                    <div class="input_fotobarang">
                                        <input type="file" name="fotobarang" class="form-control fotobarang" id="exampleInputFotoBarang1" aria-describedby="emailHelp" placeholder="Foto Barang" style="border: 1px solid #626262; background-color:transparent;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="button_simpan d-flex justify-content-center pt-4 mt-2">
                            <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan" style="background-color: #D7CAA0; width: 25%; border: none; font-weight: bold; color: black;">Simpan</button>
                        </div>
                    </form>
                        </div>

                </div>

    <div class="notif_success hidden">
        <div class="notif_image text-center ps-4 pt-4">
            <img src="{{URL::asset('maskot2.png')}}" alt="">
        </div>
        <div class="notif_text text-center">
            <p>BERHASIL</p>
            <div class="sub_notif_text">
                <p>Berhasil Memasuki Barang ke Penyimpanan <br> Silahkan</p>
            </div>
        </div>
        <div class="text-center">
            <a href="/beranda">
                <button class="btn btnLogin" id="btnUmkm" style="background-color: #d7caa0;">Beranda</button>
            </a>
        </div>
    </div>
    <div class="overlay hidden"></div>
         <div style="visibility:hidden">
            <p class="tanda">{{$flag}}</p>
    </div>
@endsection
@extends('template')

@section('javascript')
<script defer src="beranda.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                    <div class="atas_kiri">
                        <div class="judul_halaman mt-5">
                            <button class="ps-3 pe-3" style="background-color: #d7caa0; font-size: 30px; font-weight: bold;border-radius: 50%; border: none;"><</button>
                        </div>
                    </div>

                    <div class="atas_kanan d-flex  mt-5">
                        <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                            <div class="notifikasi d-flex justify-content-center pt-2" style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                            <a href="">
                                <img src="{{URL::asset('chat.png')}}" class="" style="height: 29px;">
                            </a>
                            </div>
                        </div>
                        <div class="notifikasi pe-2 mt-2">
                            <a href="">
                                <img src="{{URL::asset('notifikasi.png')}}" class="ps-2 pe-2 pt-1 pb-1" style="background-color: #f4f4f4; border-radius: 50%; height: 45px;">
                            </a>
                        </div>
                        <div class="dropdown mt-2">
                            <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                            <img src="{{URL::asset('akun.png')}}" alt="" style="height: 40px;"> Glosary
                            </button>
                            <div class="dropdown-content">
                                <a href="#">Pengaturan</a>
                                <a href="#">Logout</a>
                            </div>
                        </div>  
                    </div>
        </div>

        <div class="content_item mt-5" style="height: 850px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >

                <div class="nama_item">
                        <p style="font-size: 30px; font-weight: bold;">Nugget Kanzler</p>
                </div>
    
                <div class="produk_item">
                    <div class="gambar_item ps-4">
                        <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 250px; margin-left: 60px;">
                    </div>

                    <div class="catatan_item">
                        <div class="harga_item">
                            <p style="font-size: 25px; font-weight: bold;">Rp. 50.000</p>
                        </div>
                        <div class="deskripsi_item">
                            <div class="judul_deskripsi">
                                <p style="font-size: 20px; font-weight: bold;">Deskripsi Produk</p>
                            </div>
                            <div class="isi_deskripsi">
                                <p style="font-size: 16px; width: 60%;">
                                    Nugget Kanzler adalah nugget enak dengan tekstur yang super garing dan pastinya bikin nagih!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data_toko"  style="height: 120px;">
                    <div class="toko_foto">
                        <div class="gambar_toko ps-4">
                            <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 120px; width: 120px; margin-left: 60px; border-radius: 50%;">
                        </div>
                    </div>

                    <div class="toko_keterangan ps-3">
                        <div class="toko_nama">
                            <p style="font-size: 25px; font-weight: bold;">S-MART</p>
                        </div>

                        <div class="toko_tombol">
                            <div class="toko_tombol_chat me-3">
                                <button class="btn btn-primary ps-4 pe-4 " id="btn_chat" style="background-color: #D7CAA0; border: none; font-weight: bold; color: black;">Chat Toko</button>
                            </div>

                            <div class="toko_tombol_platform">
                                <button class="btn btn-primary ps-4 pe-4 " id="btn_platform" style="background-color: #D7CAA0; border: none; font-weight: bold; color: black;">Platform Sosial</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="produk_terkait">
                    <div class="judul_produk_terkait">
                        <p style="font-size: 20px; font-weight: bold;">Produk Terkait</p>
                    </div>

                    <div class="row_produk_terkait d-flex">
                        <div class="kotak_gambar_produk_terkait" style="border: 1px solid black;">
                            <div class="col">
                                <div class="gambar_toko ps-4">
                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                </div>
                                
                                <div class="nama_barang pt-3 ps-2">
                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                </div>
                                
                                <div class="harga_barang ps-2">
                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                </div>
                            </div>   
                        </div>

                        <div class="kotak_gambar_produk_terkait" style="border: 1px solid black;">
                            <div class="col">
                                <div class="gambar_toko ps-4">
                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                </div>
                                
                                <div class="nama_barang pt-3 ps-2">
                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                </div>
                                
                                <div class="harga_barang ps-2">
                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                </div>
                            </div>   
                        </div>

                        <div class="kotak_gambar_produk_terkait" style="border: 1px solid black;">
                            <div class="col">
                                <div class="gambar_toko ps-4">
                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                </div>
                                
                                <div class="nama_barang pt-3 ps-2">
                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                </div>
                                
                                <div class="harga_barang ps-2">
                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                </div>
                            </div>   
                        </div>

                        <div class="kotak_gambar_produk_terkait" style="border: 1px solid black;">
                            <div class="col">
                                <div class="gambar_toko ps-4">
                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                </div>
                                
                                <div class="nama_barang pt-3 ps-2">
                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                </div>
                                
                                <div class="harga_barang ps-2">
                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                </div>
                            </div>   
                        </div>

                        <div class="kotak_gambar_produk_terkait" style="border: 1px solid black;">
                            <div class="col">
                                <div class="gambar_toko ps-4">
                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                </div>
                                
                                <div class="nama_barang pt-3 ps-2">
                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                </div>
                                
                                <div class="harga_barang ps-2">
                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                </div>
                            </div>   
                        </div>

                        
                    </div>

                </div>

        </div>
        
@endsection


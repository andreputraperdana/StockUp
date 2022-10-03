@extends('template')

@section('javascript')
<script defer src="tambahbarang.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                        <div class="atas_kiri">
                            <div class="judul_halaman mt-5">
                                <p style="font-size: 30px; font-weight: bold;">Toko</p>
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
                                <img src="{{URL::asset('akun.png')}}" alt="" style="height: 40px;"> Glosary
                            </button>
                                <div class="dropdown-content">
                                    <a href="#">Pengaturan</a>
                                    <a href="#">Logout</a>
                                </div>
                            </div>

                        </div>
        </div>


                    <div class="content_tambahbarang mt-5" style="height: 890px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex justify-content-center" style="width: 100%;">
                                <div class="images_toko d-flex justify-content-center" style="width: 30%; height: 40px;">
                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                </div>
                                <div class="kolom__toko" style="width: 50%;">
                                    <div class="desc__tok">
                                        <h2>S-MART</h2>
                                    </div>
                                    <div class="tombol_profil_toko d-flex">
                                        <div class="btn_ct" style="width: 20%;">
                                            <button type="submit" class="btn btn-primary" id="btn_chattoko" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Chat Toko</button>
                                        </div>
                                        <div class="btn_ps ps-5" style="width: 33%;">
                                            <button type="submit" class="btn btn-primary" id="btn_platformsoc" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Platform Sosial</button>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <div class="list_toko d-flex pt-4 pb-3" style="width:60%">
                                <div class="container d-flex">
                                    <div class="row row-cols-3">
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="kotak_gambar" style="border: 1px solid black;">
                                            <div class="col">
                                                <div class="gambar_toko ps-4">
                                                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                                                </div>
                                                <div class="nama_barang pt-3">
                                                    <p style="font-size: 16px; font-weight: bold;">Nugget kensler</p>
                                                </div>
                                                <div class="harga_barang">
                                                    <p style="font-size: 16px;">Rp. 50.000</p>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
@endsection
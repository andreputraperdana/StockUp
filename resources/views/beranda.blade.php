@extends('template')

@section('javascript')
<script defer src="beranda.js"></script>
<script defer src="template.js"></script>
@endsection

@section('content')
        <div class="" id="berandaBlade" style="width: 100%;">  

        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri">
                <div class="judul_halaman mt-5">
                    <p style="font-size: 30px; font-weight: bold;">Beranda</p>
                </div>

                <div class="waktu">
                    <p id="waktuskrg"></p>
                </div>
            </div>

            <div class="atas_kanan d-flex  mt-5">
                <div class="notifikasi pe-2 mt-2">
                    <a href="">
                        <img src="{{URL::asset('notifikasi.png')}}" class="ps-2 pe-2 pt-1 pb-1" style="background-color: #F4F4F4; border-radius: 50%; height: 45px;">
                    </a>
                </div>

                <div class="dropdown mt-2">
                    <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                    <img src="{{URL::asset('akun.png')}}" alt="" style="height: 40px;"> {{Str::limit(auth()->user()->name,5)}}
                    </button>
                    <div class="dropdown-content">
                        <a href="#">Pengaturan</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <input type="submit" class="btn prevbutton" value="Logout">
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <div class="d-flex">
            <div style="width: 80%;">
                <div class="kotak_besar mb-4" style="width: 100%;">
                    <div class="kotak_info d-flex" style="width: 100%;">

                        <a href="" class="href me-4" style="width: 60%;">
                            <div class="kotak_info1 pb-2 pt-3" style="background-color: #F4F4F4;">
                                <div class="angka text-center">
                                    <p style="font-size: 30px; font-weight: bold;">25</p>
                                </div>
                                <div class="keterangan text-center pt-1">
                                    <p style="font-size: 16px;">Barang Habis / Akan Habis</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="href me-4" style="width: 60%;">
                            <div class="kotak_info1 pb-2 pt-3" style="background-color: #F4F4F4;">
                                <div class="angka text-center">
                                <p style="font-size: 30px; font-weight: bold;">34</p>
                                </div>
                                <div class="keterangan text-center pt-1">
                                    <p style="font-size: 16px;">Barang Akan Kadaluarsa</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="href me-4" style="width: 60%;">
                            <div class="kotak_info1 pb-2 pt-3" style="background-color: #F4F4F4;">
                                <div class="angka text-center">
                                <p style="font-size: 30px; font-weight: bold;">12</p>
                                </div>
                                <div class="keterangan text-center pt-1">
                                    <p style="font-size: 16px;">Pengeluaran Per Hari</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                    <div class="raja_list" style="width: 97%; height: 355px; border-radius: 25px;">
                        <div class="d-flex justify-content-center" style="width: 100%;">
                            <div id="resp-table" style="width: 80%;">
                                <div id="resp-table-body">
                                    <div class="resp-table-row" style="font-size: 20px; font-weight: bold;"> 
                                        <div class="table-body-cell">
                                            Nama Barang
                                        </div>
                                        <div class="table-body-cell">
                                            Kuantitas
                                        </div>
                                        <div class="table-body-cell">
                                            Jenis Barang
                                        </div>
                                        <div class="table-body-cell">
                                            Total Batch
                                        </div>
                                    </div>
                                    <div class="resp-table-row"> 
                                        <div class="table-body-cell">
                                            Mie ayam
                                        </div>
                                        <div class="table-body-cell">
                                            12
                                        </div>
                                        <div class="table-body-cell">
                                            Raw Material
                                        </div>
                                        <div class="table-body-cell">
                                            21
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="chat pe-4 ps-4" style="height: 462px; width: 22%; border-radius: 25px;">
                <div class="title__chat d-flex pt-4">
                    <div class="pe-3">
                        <p style="font-size: 20px; font-weight: bold;">Pesan Masuk</p>
                    </div>
                    <div class="pt-1">
                        <img src="{{URL::asset('chat.png')}}" class="" style="height: 25px;">
                    </div>
                </div>

                <div class="listall">
                
                </div>
            </div>
        </div>
        </div>
@endsection


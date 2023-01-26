@extends('template')

@section('javascript')
    <script defer src="/item.js"></script>
@endsection

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
        {{-- HEADER --}}
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
                    <img src="\public\image\{{ auth()->user()->foto_profile }}" alt=""
                        style="height: 40px; width: 40px; border-radius: 50px;"> {{ Str::limit(auth()->user()->name, 5) }}
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

    <div class="content_item mt-5" style="height: 850px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">

        <div class="nama_item">
            <p style="font-size: 30px; font-weight: bold;">{{ $BarangDetail->get(0)->nama }}</p>
        </div>

        <div class="produk_item">
            <div class="gambar_item ps-4">
                <img src="\public\image\{{ $BarangDetail->get(0)->foto_barang }}" alt=""
                    style="height: 230px; margin-left: 60px;">
            </div>

            <div class="catatan_item" style="width: 100%">
                <div class="harga_item">
                    <p style="font-size: 25px; font-weight: bold;">@currency($BarangDetail->get(0)->harga)</p>
                </div>
                <div class="deskripsi_item">
                    <div class="judul_deskripsi">
                        <p style="font-size: 20px; font-weight: bold;">Deskripsi Produk</p>
                    </div>
                    <div class="isi_deskripsi">
                        <p style="font-size: 16px; width: 80%;">
                            {{ $BarangDetail->get(0)->deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="data_toko" style="height: 120px;">
            <div class="toko_foto">
                <div class="gambar_toko ps-4">
                    <img src="\public\image\{{ $BarangDetail->get(0)->foto_profile }}" alt=""
                        style="height: 100px; width: 100px; margin-left: 60px; border-radius: 50%;">
                </div>
            </div>

            <div class="toko_keterangan ps-3">
                <div class="toko_nama">
                    <a href="/profiltoko/{{ $BarangDetail->get(0)->user_id }}">
                        <p style="font-size: 25px; font-weight: bold;">{{ $BarangDetail->get(0)->name }}</p>
                    </a>
                </div>

                <div class="toko_tombol">
                    <div class="toko_tombol_chat me-3">
                            <a href="/chat/{{ $BarangDetail->get(0)->user_id }}">
                                <button class="btn btn-primary ps-4 pe-4 " id="btn_chat"
                                    style="background-color: #D7CAA0; border: none; font-weight: bold; color: black;">Chat
                                    Toko</button>
                            </a>
                    </div>

                    <div class="toko_tombol_platform">
                        <a href="/platformsosial/{{ $BarangDetail->get(0)->user_id }}">
                            <button class="btn btn-primary ps-4 pe-4 " id="btn_platform"
                                style="background-color: #D7CAA0; border: none; font-weight: bold; color: black;">Platform
                                Sosial</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="produk_terkait">
            <div class="judul_produk_terkait">
                <p style="font-size: 20px; font-weight: bold;">Produk Lainnya</p>
            </div>

            <div class="row_produk_terkait d-flex">
                @foreach ($BarangRandom as $BarangRandom)
                    <div class="col-3 mb-3">
                        <a href="/item/{{ $BarangRandom->id }}">
                            <div class="card me-5" style="width: 80%;" role="button">
                                <img src="\public\image\{{ $BarangRandom->foto_barang }}" class="card-img-top"
                                    style="width: 100%; height: 150px;" alt="">
                                <div class="card-body">
                                    <p class="card-title" style="text-align: center;  font-size: 14px;">
                                        {{ $BarangRandom->nama }}</p>
                                    <p class="card-text" style="text-align: center; font-weight: bold; font-size: 16px">
                                        @currency($BarangRandom->harga)</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@endsection

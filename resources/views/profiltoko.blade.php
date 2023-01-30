@extends('template')

@section('javascript')
    <script defer src="\tambahbarang.js"></script>
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
                <div class="notifikasi d-flex justify-content-center pt-2"
                    style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                    <img src="{{ URL::asset('chat.png') }}" class="" style="height: 29px;">
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
                        style="height: 40px; width: 40px; border-radius: 50px;"> {{ Str::limit(auth()->user()->name, 5) }}
                </button>
                <div class="dropdown-content">
                    <a href="\editprofile">Pengaturan</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <input type="submit" class="btn prevbutton" value="Logout">
                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="content_tambahbarang mt-5"
        style="height: 890px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex justify-content-center" style="width: 100%;">
                <div class="images_toko d-flex justify-content-center" style="width: 30%; height: 40px;">
                    <img src="\public\image\{{ $Toko->get(0)->foto_profile }}" alt="" style="height: 60px;">
                </div>
                <div class="kolom__toko" style="width: 50%;">
                    <div class="desc__tok">
                        <h2>{{ $Toko->get(0)->name }}</h2>
                    </div>
                    <div class="tombol_profil_toko d-flex">
                        <div class="btn_ct" style="width: 30%;">
                            <form method="POST" action="/chat">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $Toko->get(0)->user_id }}">
                                <button class="btn btn-primary ps-4 pe-4 " id="btn_chat"
                                    style="background-color: #D7CAA0; border: none; font-weight: bold; color: black;">Chat
                                    Toko</button>
                            </form>
                        </div>
                        <div class="btn_ps" style="width: 40%;">
                            <a href="/platformsosial/{{ $Toko->get(0)->user_id }}">
                                <button class="btn btn-primary ps-4 pe-4 " id="btn_platform"
                                    style="background-color: #D7CAA0; border: none; font-weight: bold; color: black;">Platform
                                    Sosial</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mb-3 mt-5">
            <div class="list_toko d-flex pt-4" style="width:70%">
                <div class="container d-flex">
                    <div class="row w-100">
                        @foreach ($barangpemasok as $barangpemasoks)
                            <div class="col-3 mb-3 d-flex">
                                <a href="/item/{{ $barangpemasoks->id }}">
                                    <div class="card me-5" style="width: 100%; height: 250px;" role="button">
                                        <img src="\public\image\{{ $barangpemasoks->foto_barang }}" class="card-img-top"
                                            alt="" style="height: 180px; width: 100%;">
                                        <div class="card-body">
                                            <p class="card-title" style="text-align: center;  font-size: 14px;">
                                                {{ $barangpemasoks->nama }}</p>
                                            <p class="card-text"
                                                style="text-align: center; font-weight: bold; font-size: 16px">
                                                @currency($barangpemasoks->harga)</p>
                                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

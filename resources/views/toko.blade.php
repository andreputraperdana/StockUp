@extends('template')

@section('javascript')
    <script defer src="/toko.js"></script>
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
                    <a href="/editprofile">Pengaturan</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <input type="submit" class="btn prevbutton" value="Logout">
                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="content_tambahbarang mt-5"
        style="height: auto; width: 100%; background-color: #F4F4F4; border-radius: 25px;">

        <div class="d-flex justify-content-between pt-5">
            <div class="text_kategori text-center" style="width: 22%;">
                <p style="font-size: 25px; font-weight: bold;">Kategori</p>
            </div>
            <div class="d-flex justify-content-evenly" style="width: 80%;">
                <div class="d-flex"
                    style="border: 1px solid #626262; background-color:transparent; border-radius: 7px; width: 30%; height: 40px;">
                    <input type="text" class="form-control" id="exampleInputTanggalKadaluarsa1"
                        aria-describedby="emailHelp" placeholder="Cari Barang"
                        style="border-radius: 0; background-color:transparent; border: 0;">
                    <button type="submit" class="btn"
                        style="border-left: 1px solid #626262; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                        <img src="{{ URL::asset('search.png') }}" class="" style="height: 20px;">
                    </button>
                </div>

                <div class="input_pilihtanggal" style="width: 30%;">
                    <input type="date" class="form-control" id="exampleInputPilihTanggal1" name="filterTanggal" aria-describedby="emailHelp"
                        placeholder="Pilih Tanggal" style="border: 1px solid #626262; background-color:transparent;">
                </div>
            </div>
        </div>

        @if (!$Item->isEmpty())
            <div class="d-flex">
                <div class="d-flex pt-4 ps-5"style="width: 28%;">
                    <div class="kategori_raja" style="width: 70%;">
                        @foreach ($Kategori as $Kategories)
                            <div class="kategori_list d-flex">
                                <div class="daftar_kategori d-flex justify-content-between {{ $Kategories->jenis }}" style="width: 100%;">
                                    <a class="{{ $Kategories->jenis }}" href="/toko/{{ $Kategories->jenis }}">
                                        {{ $Kategories->jenis }}
                                    </a>
                                    <p class="{{ $Kategories->jenis }}">{{ $Kategories->total }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="list_toko d-flex pt-4" style="width:70%">
                    <div class="container d-flex">
                        <div class="row w-100">
                            @foreach ($Item as $Items)
                                <div class="col-3 mb-3 d-flex">
                                    <a href="/item/{{ $Items->id }}">
                                        <div class="card me-5" style="width: 100%; height: 250px;" role="button">
                                            <img src="\public\image\{{ $Items->foto_barang }}"
                                                style="height: 180px; width: 100%;" class="card-img-top" alt="">
                                            <div class="card-body">
                                                <p class="card-title" style="text-align: center;  font-size: 14px;">
                                                    {{ $Items->nama }}</p>
                                                <p class="card-text"
                                                    style="text-align: center; font-weight: bold; font-size: 16px">
                                                    @currency($Items->harga)</p>
                                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <span class="d-flex justify-content-center" style="padding-bottom: 20px;">
                                {{ $Item->links() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex" style="justify-content: center; align-items:center; height: 400px;">
                <h4>Barang tidak tersedia</h4>
            </div>
        @endif
    </div>
    <div style="visibility:hidden">
        <p class="tanda">{{ $flag }}</p>
    </div>
@endsection

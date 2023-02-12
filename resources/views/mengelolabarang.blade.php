@extends('template')

@if (auth()->user()->role_id == 1)

    @section('javascript')
        <script defer src="mengelolabarang.js"></script>
    @endsection

    @section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri">
                <div class="judul_halaman mt-5">
                    <p style="font-size: 30px; font-weight: bold;">Mengelola Barang</p>
                </div>
            </div>

            <div class="atas_kanan d-flex  mt-5">
                <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                    <a href="/chat/0">
                        <div class="notifikasi d-flex justify-content-center pt-2"
                            style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                            <img src="{{ URL::asset('chat.png') }}" class="" style="height: 29px;">
                        </div>
                    </a>
                    </div>
                <div class="notifikasi pe-2 mt-2">
                    <div class="item">
                        <a href="/notifikasi">
                            @if ($Totalnotif != 0)
                                <span class="badge">{{ $Totalnotif }}</span>
                            @endif
                            <img src="{{ URL::asset('notifikasi.png') }}" class="ps-2 pe-2 pt-1 pb-1"
                                style="background-color: #F4F4F4; border-radius: 50%; height: 45px;">
                        </a>
                    </div>
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


        <div class="content_tambahbarang mt-5"
            style="height: auto; margin-bottom: 50px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">
            <div style="height: 550px;">
            <div class="d-flex justify-content-center pt-4 pb-5">
                <div class="d-flex justify-content-between" style="width: 90%;">
                    <form action="/mengelolabarang">
                        <div class="d-flex"
                            style="border: 1px solid #626262; background-color:transparent; border-radius: 7px; height: 40px;">
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Cari Barang" style="width: 200px;">
                            <button type="submit" class="btn"
                                style="border-left: 1px solid #626262; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                                <img src="{{ URL::asset('search.png') }}" class="" style="height: 20px;">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-4"style="width: 100%;">
                @if (!$AllItems->isEmpty())
                    <div class="resp-table-body" style="width: 90%;">
                        <div class="" style="font-size: 20px; font-weight: bold; width: 100%">
                            <div class="table-body-cell " style="visibility: visible; width: 33%;">
                                Image
                            </div>
                            <div class="table-body-cell" style="width: 25%;">
                                ID
                            </div>
                            <div class="table-body-cell" style="width: 30%;">
                                Nama Barang
                            </div>
                            <div class="table-body-cell" style="width: 30%;">
                                Kuantitas
                            </div>
                            <div class="table-body-cell" style="visibility: hidden;">
                                Action
                            </div>
                            <div class="table-body-cell" style="visibility: hidden;">
                                <div class="d-flex">
                                    <button class="btn__delete me-3 p-2 pe-3 ps-3"
                                        style="font-size: 16px; font-weight: bold;"> <a href="/login"><img
                                                src="{{ URL::asset('exit.png') }}" alt=""
                                                style="height: 25px;"></a></button>
                                    <button class="btn__login me-3 p-2 pe-3 ps-3"
                                        style="font-size: 16px; font-weight: bold;"> <a href="/login">></a></button>
                                </div>
                            </div>
                        </div>

                        @foreach ($AllItems as $AllItem)
                            <div class="resp-table-row mb-5 p-3" style="font-size: 20px;">
                                <div class="d-flex">
                                    <div class="foto" style="width: 18%;">
                                        <img src="\public\image\{{ $AllItem->BarangUMKM->foto_barang }}" alt="Foto Profil"
                                            style="height: 60px; width: 60px;">
                                    </div>
                                    <div class="nama_header center" style="width: 36%;">
                                        <p style="font-size: 16px;">{{ $AllItem->BarangUMKM->id }}</p>
                                    </div>
                                    <div class="nama_header center" style="width: 36%;">
                                        <p style="font-size: 16px;">{{ $AllItem->BarangUMKM->nama }}</p>
                                    </div>
                                    <div class="total_header center" style="width: 29%;">
                                        <p style="font-size: 16px;">{{ $AllItem->total }}</p>
                                    </div>
                                    <div class="center" style="width: 23%;">
                                        <div class="d-flex">
                                            <button class="btn__barangkeluar me-3 p-2 pe-3 ps-3"
                                                value="{{ $AllItem->BarangUMKM->id }}"
                                                style="font-size: 12px; font-weight: bold; background-color: #D7CAA0; border: none; border-radius: 7px;">Barang
                                                Keluar</button>
                                            <!-- <form action="{{ route('users.destroy', $AllItem->BarangUMKM->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;" onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus Barang Ini?')"><img src="{{ URL::asset('trash.png') }}" alt="" style="height: 25px;"></button>
                                            </form> -->
                                            <button class="btn__expand me-3 p-2 pe-3 ps-3"
                                                value="{{ $AllItem->BarangUMKM->id }}"
                                                style="font-size: 16px; font-weight: bold;"> <img
                                                    src="{{ URL::asset('righticon.png') }}" alt=""
                                                    style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"
                                                    id="expanded"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_list_hidden" id="list_Allitem" style="width: 100%;">
                                    <div class="" style="width: 100%;">
                                        <div class="" style="width: 100%; font-size: 16px;">
                                            <div class="table-body-cell text-center" style="width: 25%;">
                                                ID
                                            </div>
                                            <div class="table-body-cell text-center" style="width: 16%;">
                                                Kuantitas
                                            </div>
                                            <div class="table-body-cell text-center" style="width: 30%;">
                                                Harga
                                            </div>
                                            <div class="table-body-cell text-center" style="width: 20%;">
                                                Tanggal Kadaluarsa
                                            </div>
                                            <div class="table-body-cell text-center"
                                                style="width: 20%; visibility: hidden;">
                                                Action
                                            </div>
                                        </div>
                                    </div>
                                    <div class="additionalhtml">

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                <div class="pt-5">
                    <div class="d-flex justify-content-center">
                        <img src="{{ URL::asset('emptyicon.png') }}" alt="" height="185px">
                    </div>
                    <div class="d-flex" style="justify-content: center; align-items:center;">
                        <h4>Barang Kosong</h4>
                    </div>
                </div>
                @endif
            </div>

            <span class="d-flex justify-content-center">
                {{ $AllItems->links() }}
            </span>
        </div>
        </div>
        <div style="visibility:hidden">
            <p class="tanda">{{ $flag }}</p>
        </div>

        <div class="popup_barangkeluar hidden">
            <div class="notif_text_judul text-center">
                <h1>Barang Keluar</h1>
            </div>
            <form action="/barangkeluar" method="POST" enctype="multipart/form-data" id="submitbarang">
                @csrf
                <div class="notif_content d-flex justify-content-center">
                    <div class="popupbarangkeluar d-flex pt-4">
                        <div class="daftar_profil_kiri me-5 mt-2" style="width: 50%;">
                            <div class="daftar_profil_kiri_sistempengeluaran mb-3" id="sistempengeluaran">
                                <label for="exampleInputNama1" class="form-label" style="color: black;">Sistem
                                    Pengeluaran</label>
                            </div>
                            <div class="daftar_profil_kiri_nama mt-4">
                                <label for="exampleInputKategori1" class="form-label" style="color: black">Nama
                                    Barang</label>
                            </div>
                            <div class="daftar_profil_kiri_jenis mt-4">
                                <label for="exampleInputKategori1" class="form-label" style="color: black">Jenis
                                    Barang</label>
                            </div>
                            <div class="daftar_profil_kiri_id_kadaluarsa mt-4">
                                <label for="exampleInputKategori1" class="form-label" style="color: black">ID /
                                    Tanggal Kadaluarsa</label>
                            </div>
                            <div class="daftar_profil_kiri_kuantitas mt-4">
                                <label for="exampleInputNomorTelepon1" class="form-label"
                                    style="color: black">Kuantitas</label>
                            </div>
                        </div>
                        <div class="daftar_profil" style="width: 50%">
                            <div class="daftar_profil_k mb-3" style="width: 100%;">
                                <select name="pengeluaran" class="pengeluaran p-2"
                                    style="color: #626262; border-radius: 5px; width: 100%; border: 1px solid #626262; background-color:transparent;"
                                    onchange="outputhasil(this)">
                                    <option value="Manual">Manual</option>
                                    <option value="FIFO">FIFO</option>
                                </select>
                            </div>
                            <div class="popupkontendetail">

                            </div>
                            <div class="popupkontenidtanggal">

                            </div>
                            <!-- {{-- <input type="hidden" value="{{$AllItem->total}}"> --}} -->
                            <div class="daftar_profil_kk pt-3" style="width: 100%;">
                                <input type="number" name="kuantitas" class="form-control kuantitas" id="kuantitas"
                                    placeholder="kuantitas"
                                    style="border: 1px solid #626262; background-color:transparent;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button_simpan d-flex justify-content-center pt-4">
                    <button type="submit" class="btn btn-primary ps-5 pe-5" id="btn_simpan"
                        style="background-color: #d7caa0; width: 25%; border: none; font-weight: bold; color: black;">Simpan</button>
                </div>
            </form>
        </div>
        <div class="overlay hidden"></div>
    @endsection
@elseif(auth()->user()->role_id == 2)
    @section('javascript')
        <script defer src="mengelolabarang.js"></script>
    @endsection

    @section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri">
                <div class="judul_halaman mt-5">
                    <p style="font-size: 30px; font-weight: bold;">Mengelola Barang</p>
                </div>
            </div>

            <div class="atas_kanan d-flex  mt-5">
                <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                <a href="/chat/0">
                    <div class="notifikasi d-flex justify-content-center pt-2"
                        style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                        <img src="{{ URL::asset('chat.png') }}" class="" style="height: 29px;">
                    </div>
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


        <div class="content_tambahbarang mt-5"
            style="height: auto; margin-bottom: 50px; width: 100%; background-color: #F4F4F4; border-radius: 25px;">
            <div class="d-flex justify-content-center pt-4 pb-5">
                <div class="d-flex justify-content-between" style="width: 90%;">
                    <form action="/mengelolabarang">
                        <div class="d-flex"
                            style="border: 1px solid #626262; background-color:transparent; border-radius: 7px; height: 40px;">
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Cari Barang" style="width: 200px;">
                            <button type="submit" class="btn"
                                style="border-left: 1px solid #626262; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                                <img src="{{ URL::asset('search.png') }}" class="" style="height: 20px;">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive-md" style="display: flex; justify-content: center; width: 100%;">
                @if (!$AllItems->isEmpty())
                    <table class="table table-borderless align-middle tableMengelola" style="width: 90%;">
                        <thead class="theadMengelola">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Id</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($AllItems as $AllItem)
                            <tbody class="tbodyMengelola">
                                <tr>
                                    <td scope="row"><img src="\public\image\{{ $AllItem->foto_barang }}"
                                            alt="Foto Profil" style="height: 100px; width: 100px;"></td>
                                    <td>{{ $AllItem->id }}</td>
                                    <td>{{ $AllItem->nama }}</td>
                                    <td>{{ $AllItem->jenis }}</td>
                                    <td>@currency($AllItem->harga)</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- <form action="{{ route('users.destroy', $AllItem->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn__delete me-3 p-2 pe-3 ps-3"
                                                    style="font-size: 16px; font-weight: bold;"
                                                    onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus Barang Ini?')"><img
                                                        src="{{ URL::asset('trash.png') }}" alt=""
                                                        style="height: 25px;"></button>
                                            </form> -->
                                            <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"><img
                                                src="{{ URL::asset('trash.png') }}" alt=""
                                            onclick="deleteConfirmation( '{{ $AllItem->id }}');" style="height: 25px;"></button>
                                            <button class="btn__edit me-3 p-2 pe-3 ps-3"
                                                style="font-size: 16px; font-weight: bold;"> <a
                                                    href="/editbarang/{{ $AllItem->id }}"><img
                                                        src="{{ URL::asset('editicon.png') }}" alt=""
                                                        style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"></a></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                @else
                <div class="pt-5">
                    <div class="d-flex justify-content-center">
                        <img src="{{ URL::asset('emptyicon.png') }}" alt="" height="185px">
                    </div>
                    <div class="d-flex" style="justify-content: center; align-items:center;">
                        <h4>Barang Kosong</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <span class="d-flex justify-content-center">
            {{-- {{$AllItems->links()}} --}}
        </span>
        <div style="visibility:hidden">
            <p class="tanda">{{ $flag }}</p>
        </div>
        <div class="overlay hidden"></div>

        <!-- <div class="overlay hidden"></div> -->
    @endsection
@endif

    <div class="hidden">
            <div class="imagedelete">
                <div class="notif_image text-center ps-4" style="height: 300px;">
                    <img src="{{ URL::asset('maskot2.png') }}" alt="">
                </div>
            </div>
        </div>
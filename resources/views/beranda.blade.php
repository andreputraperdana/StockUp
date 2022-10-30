@extends('template')

@section('javascript')
<script defer src="beranda.js"></script>
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
                    <div class="item">
                        <a href="">
                            <span class="badge">3</span>
                            <img src="{{URL::asset('notifikasi.png')}}" class="ps-2 pe-2 pt-1 pb-1" style="background-color: #F4F4F4; border-radius: 50%; height: 45px;">
                        </a>
                    </div>
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

<div id="myPopup-BarangHabis" class="popUp">
  <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2 style="text-align: center;">Barang Habis</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            @foreach($BarangHabis as $BarangHabis)
                    <div class="resp-table-row"> 
                        <div class="table-body-cell">
                            {{$BarangHabis->BarangUMKM->nama}}
                        </div>
                        <div class="table-body-cell">
                            {{$BarangHabis->BarangUMKM->jenis}}
                        </div>
                        <div class="table-body-cell">
                            {{$BarangHabis->jumlah}}
                        </div>
                        <div class="table-body-cell">
                            0
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>

<div id="myPopup-BarangKadaluarsa" class="popUp">
  <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2 style="text-align: center;">Barang akan Kadaluarsa</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            @foreach($BarangAkanKadaluarsa as $BarangAkanKadaluarsa)
                    <div class="resp-table-row"> 
                        <div class="table-body-cell">
                            {{$BarangAkanKadaluarsa->BarangUMKM->nama}}
                        </div>
                        <div class="table-body-cell">
                            {{$BarangAkanKadaluarsa->BarangUMKM->jenis}}
                        </div>
                        <div class="table-body-cell">
                            0
                        </div>
                        <div class="table-body-cell">
                            {{$BarangAkanKadaluarsa->tanggal_kadaluarsa}}
                        </div>
                        <div class="table-body-cell">
                            {{$BarangAkanKadaluarsa->jumlah}}
                        </div>
                        <div class="table-body-cell">
                            @if($BarangAkanKadaluarsa->Date_Today >= $BarangAkanKadaluarsa->tanggal_kadaluarsa)
                                <p>Expired</p>
                            @else
                                <p>Hampir Expired</p>
                            @endif
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>


<div id="myPopup-Pengeluaran" class="popUp">
  <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2 style="text-align: center;">Pengeluaran Per Hari</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            @foreach($PengeluranPerHari as $PengeluranPerHari)
                    <div class="resp-table-row"> 
                        <div class="table-body-cell">
                            {{$PengeluranPerHari->BarangUMKM->nama}}
                        </div>
                        <div class="table-body-cell">
                            {{$PengeluranPerHari->BarangUMKM->jenis}}
                        </div>
                        <div class="table-body-cell">
                            {{$PengeluranPerHari->BarangUMKM->jenis}}
                        </div>
                        <div class="table-body-cell">
                            {{$PengeluranPerHari->jumlah}}
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>

        <div class="d-flex">
            <div style="width: 80%;">
                <div class="kotak_besar mb-4" style="width: 100%;">
                    <div class="kotak_info d-flex" style="width: 100%;">

                        <div class="popUpBarang me-4" id="popUpBarang" style="width: 60%;" data-value="BarangHabis">
                            <div class="kotak_info1 pb-2 pt-3" style="background-color: #F4F4F4;">
                                <div class="angka text-center">
                                    <p style="font-size: 30px; font-weight: bold;">{{$TotalBarangHabis}}</p>
                                </div>
                                <div class="keterangan text-center pt-1">
                                    <p class="inputtext" style="display: none;">BarangHabis</p>
                                    <p style="font-size: 16px;">Barang Habis / Akan Habis</p>
                                </div>
                            </div>
                        </div>

                        <div class="popUpBarang me-4" id="popUpBarang" style="width: 60%;" data-value="BarangHabis">
                            <div class="kotak_info1 pb-2 pt-3" style="background-color: #F4F4F4;">
                                <div class="angka text-center">
                                    <p style="font-size: 30px; font-weight: bold;">{{$TotalBarangAkanKadaluarsa}}</p>
                                </div>
                                <div class="keterangan text-center pt-1">
                                    <p class="inputtext" style="display: none;">BarangKadaluarsa</p>
                                    <p style="font-size: 16px;">Barang Akan Kadaluarsa</p>
                                </div>
                            </div>
                        </div>

                        <div class="popUpBarang me-4" id="popUpBarang" style="width: 60%;" data-value="BarangHabis">
                            <div class="kotak_info1 pb-2 pt-3" style="background-color: #F4F4F4;">
                                <div class="angka text-center">
                                    <p style="font-size: 30px; font-weight: bold;">{{$TotalPengeluranPerHari}}</p>
                                </div>
                                <div class="keterangan text-center pt-1">
                                    <p class="inputtext" style="display: none;">Pengeluaran</p>
                                    <p style="font-size: 16px;">Pengeluaran Per Hari</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="raja_list" style="width: 97%; height: 355px; border-radius: 25px;">
                        <div class="d-flex justify-content-center" style="width: 100%;">
                            <div id="resp-table" style="width: 95%;">
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
                                 @foreach($AllItems as $AllItem)
                                    <div class="resp-table-row"> 
                                        <div class="table-body-cell">
                                            {{$AllItem->BarangUMKM->nama}}
                                        </div>
                                        <div class="table-body-cell">
                                            {{$AllItem->BarangUMKM->total}}
                                        </div>
                                        <div class="table-body-cell">
                                            {{$AllItem->BarangUMKM->jenis}}
                                        </div>
                                        <div class="table-body-cell">
                                            {{$AllItem->totalAll}}
                                        </div>
                                    </div>
                                @endforeach
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

        <div style="visibility: hidden;">
            <p class="tanda">{{$flag}}</p>
        </div>
        </div>
@endsection


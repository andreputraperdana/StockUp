@extends('template')

@section('javascript')
<script defer src="beranda.js"></script>
@endsection

@if(auth()->user()->role_id == 1)
@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri pb-3">
                <div class="judul_halaman mt-5">
                    <p style="font-size: 30px; font-weight: bold;">Dashboard Manajemen Barang</p>
                </div>

                <div class="waktu">
                    <span id="waktuskrg"></span>
                </div>
            </div>
           <div class="atas_kanan d-flex  mt-5">
                <div class="notifikasi pe-2 mt-2">
                    <div class="item">
                        <a href="/notifikasi">
                            <span class="badge">{{$Totalnotif}}</span>
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
                <div class="modal-body d-flex justify-content-center pt-4 pb-5" style="width: 100%;">
                     <table class="table caption-top" style="width: 90%;">
                       <thead>
                         <tr>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;">Nama Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Jenis Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Jumlah Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Batch</td>
                         </tr>
                       </thead>
                       <tbody>
                       @foreach($BarangHabis as $BarangHabis)
                         <tr class="">
                           <td class="pt-4 pb-4">{{$BarangHabis->BarangUMKM->nama}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangHabis->BarangUMKM->jenis}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangHabis->jumlah}}</td>
                           <td class="text-center pt-4 pb-4">0</td>
                         </tr>
                       @endforeach
                       </tbody>
                      </table>
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
                <div class="modal-body d-flex justify-content-center pt-4 pb-5" style="width: 100%;">
                <table class="table caption-top" style="width: 90%;">
                       <thead>
                         <tr>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;">Nama Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jenis Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Batch</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Tanggal Kadaluarsa</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Status</td>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach($BarangAkanKadaluarsa as $BarangAkanKadaluarsa)
                         <tr class="">
                           <td class="pt-4 pb-4">{{$BarangAkanKadaluarsa->BarangUMKM->nama}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangAkanKadaluarsa->BarangUMKM->jenis}}</td>
                           <td class="text-center pt-4 pb-4">0</td>
                           <td class="text-center pt-4 pb-4">{{$BarangAkanKadaluarsa->tanggal_kadaluarsa}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangAkanKadaluarsa->jumlah}}</td>
                           <td class="text-center pt-4 pb-4">
                                @if($BarangAkanKadaluarsa->Date_Today >= $BarangAkanKadaluarsa->tanggal_kadaluarsa)
                                        <p>Expired</p>
                                @else
                                        <p>Hampir Expired</p>
                                @endif
                           </td>
                         </tr>
                       @endforeach
                       </tbody>
                      </table>
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
                <div class="modal-body d-flex justify-content-center pt-4 pb-5" style="width: 100%;">
                <table class="table caption-top" style="width: 90%;">
                       <thead>
                         <tr>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;">Nama Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jenis Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Batch</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang Keluar</td>
                         </tr>
                       </thead>
                       <tbody>
                       @foreach($PengeluranPerHari as $PengeluranPerHari)
                         <tr class="">
                           <td class="pt-4 pb-4">{{$PengeluranPerHari->BarangUMKM->nama}}</td>
                           <td class="text-center pt-4 pb-4">{{$PengeluranPerHari->BarangUMKM->jenis}}</td>
                           <td class="text-center pt-4 pb-4">0</td>
                           <td class="text-center pt-4 pb-4">{{$PengeluranPerHari->jumlah}}</td>
                         </tr>
                       @endforeach
                       </tbody>
                </table>
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
                            <div class="raja_list" style="width: 97%; height: 550px; border-radius: 25px;">
                                <form action="/beranda">
                                    <div class="ps-5 pt-4 pb-5 d-flex justify-content-between" style="width: 95%;">
                                        <div class="d-flex" style="border: 1px solid #626262; background-color:transparent; border-radius: 7px; width: 45%; height: 40px;">
                                             <input type="text" class="form-control" id="namabarang" name="namabarang" aria-describedby="emailHelp" placeholder="Cari Barang" style="border-radius: 0; background-color:transparent; border: 0;">
                                             <button type="submit" class="btn" style="border-left: 1px solid #626262; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                                                 <img src="{{URL::asset('search.png')}}" class="" style="height: 20px;">
                                             </button>
                                         </div>
                                        </div>
                                </form>
                                <div class="">
                                    <div class="d-flex justify-content-center" style="width: 100%;">
                                        <table class="table caption-top" style="width: 90%;">
                                          <thead>
                                            <tr>
                                              <td scope="col" style="opacity: 0.6;">Nama Barang</td>
                                              <td scope="col" style="opacity: 0.6;" class="text-center">Kuantitas</td>
                                              <td scope="col" style="opacity: 0.6;" class="text-center">Jenis Barang</td>
                                              <td scope="col" style="opacity: 0.6;" class="text-center">Total Batch</td>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        @if($Tanda == 0)
                                          @foreach($AllItems as $AllItem)
                                            <tr class="">
                                              <td class="pt-4 pb-4">{{$AllItem->BarangUMKM->nama}}<br><span style="opacity: 0.6;">00{{$AllItem->BarangUMKM->id}}</span></td>
                                              <td class="text-center pt-4 pb-4">{{$AllItem->total}}</td>
                                              <td class="text-center pt-4 pb-4">{{$AllItem->BarangUMKM->jenis}}</td>
                                              <td class="text-center pt-4 pb-4">{{$AllItem->totalAll}}</td>
                                            </tr>
                                          @endforeach
                                        @elseif($Tanda == 1)
                                            @php
                                                $array = array_keys($AllItems);
                                                $max = count($AllItems);
                                            @endphp
                                            @for($i=0; $i<$max; $i++)
                                                @foreach($AllItems as $AllItem)
                                                    <tr class="">
                                                      <td class="pt-4 pb-4">{{$AllItemp[$array[$i]]->BarangUMKM->nama}}<br><span style="opacity: 0.6;">00{{$AllItem[$array[$i]]->BarangUMKM->id}}</span></td>
                                                    </tr>
                                                @endforeach
                                            @endfor
                                        @endif
                                          </tbody>
                                         </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="chat pe-4 ps-4" style="height: 630px; width: 22%; border-radius: 25px;">
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
@endsection
@elseif(auth()->user()->role_id == 2)
@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
            <div class="atas_kiri pb-3">
                <div class="judul_halaman mt-5">
                    <p style="font-size: 30px; font-weight: bold;">Dashboard Manajemen Barang</p>
                </div>

                <div class="waktu">
                    <span id="waktuskrg"></span>
                </div>
            </div>
           <div class="atas_kanan d-flex  mt-5">
                <div class="notifikasi pe-2 mt-2">
                    <div class="item">
                        <a href="/notifikasi">
                            <span class="badge">{{$Totalnotif}}</span>
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
                <div class="modal-body d-flex justify-content-center pt-4 pb-5" style="width: 100%;">
                     <table class="table caption-top" style="width: 90%;">
                       <thead>
                         <tr>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;">Nama Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Jenis Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Jumlah Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Batch</td>
                         </tr>
                       </thead>
                       <tbody>
                       @foreach($BarangHabis as $BarangHabis)
                         <tr class="">
                           <td class="pt-4 pb-4">{{$BarangHabis->BarangUMKM->nama}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangHabis->BarangUMKM->jenis}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangHabis->jumlah}}</td>
                           <td class="text-center pt-4 pb-4">0</td>
                         </tr>
                       @endforeach
                       </tbody>
                      </table>
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
                <div class="modal-body d-flex justify-content-center pt-4 pb-5" style="width: 100%;">
                <table class="table caption-top" style="width: 90%;">
                       <thead>
                         <tr>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;">Nama Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jenis Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Batch</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Tanggal Kadaluarsa</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Status</td>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach($BarangAkanKadaluarsa as $BarangAkanKadaluarsa)
                         <tr class="">
                           <td class="pt-4 pb-4">{{$BarangAkanKadaluarsa->BarangUMKM->nama}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangAkanKadaluarsa->BarangUMKM->jenis}}</td>
                           <td class="text-center pt-4 pb-4">0</td>
                           <td class="text-center pt-4 pb-4">{{$BarangAkanKadaluarsa->tanggal_kadaluarsa}}</td>
                           <td class="text-center pt-4 pb-4">{{$BarangAkanKadaluarsa->jumlah}}</td>
                           <td class="text-center pt-4 pb-4">
                                @if($BarangAkanKadaluarsa->Date_Today >= $BarangAkanKadaluarsa->tanggal_kadaluarsa)
                                        <p>Expired</p>
                                @else
                                        <p>Hampir Expired</p>
                                @endif
                           </td>
                         </tr>
                       @endforeach
                       </tbody>
                      </table>
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
                <div class="modal-body d-flex justify-content-center pt-4 pb-5" style="width: 100%;">
                <table class="table caption-top" style="width: 90%;">
                       <thead>
                         <tr>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;">Nama Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jenis Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Batch</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang Keluar</td>
                         </tr>
                       </thead>
                       <tbody>
                       @foreach($PengeluranPerHari as $PengeluranPerHari)
                         <tr class="">
                           <td class="pt-4 pb-4">{{$PengeluranPerHari->BarangUMKM->nama}}</td>
                           <td class="text-center pt-4 pb-4">{{$PengeluranPerHari->BarangUMKM->jenis}}</td>
                           <td class="text-center pt-4 pb-4">0</td>
                           <td class="text-center pt-4 pb-4">{{$PengeluranPerHari->jumlah}}</td>
                         </tr>
                       @endforeach
                       </tbody>
                </table>
                </div>
            </div>
        </div>
                <div class="d-flex">
                    <div style="width: 80%;">
                            <div class="raja_list" style="width: 97%; height: 550px; border-radius: 25px;">
                                <form action="/beranda">
                                    <div class="ps-5 pt-4 pb-5 d-flex justify-content-between" style="width: 95%;">
                                        <div class="d-flex" style="border: 1px solid #626262; background-color:transparent; border-radius: 7px; width: 45%; height: 40px;">
                                             <input type="text" class="form-control" id="namabarang" name="namabarang" aria-describedby="emailHelp" placeholder="Cari Barang" style="border-radius: 0; background-color:transparent; border: 0;">
                                             <button type="submit" class="btn" style="border-left: 1px solid #626262; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                                                 <img src="{{URL::asset('search.png')}}" class="" style="height: 20px;">
                                             </button>
                                         </div>
                                        </div>
                                </form>
                                <div class="">
                                    <div class="d-flex justify-content-center" style="width: 100%;">
                                        <table class="table caption-top" style="width: 90%;">
                                          <thead>
                                            <tr>
                                              <td scope="col" style="opacity: 0.6;">Nama Barang</td>
                                              <td scope="col" style="opacity: 0.6;" class="text-center">Kuantitas</td>
                                              <td scope="col" style="opacity: 0.6;" class="text-center">Jenis Barang</td>
                                              <td scope="col" style="opacity: 0.6;" class="text-center">Total Batch</td>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        @if($Tanda == 0)
                                          @foreach($AllItems as $AllItem)
                                            <tr class="">
                                              <td class="pt-4 pb-4">{{$AllItem->BarangUMKM->nama}}<br><span style="opacity: 0.6;">00{{$AllItem->BarangUMKM->id}}</span></td>
                                              <td class="text-center pt-4 pb-4">{{$AllItem->total}}</td>
                                              <td class="text-center pt-4 pb-4">{{$AllItem->BarangUMKM->jenis}}</td>
                                              <td class="text-center pt-4 pb-4">{{$AllItem->totalAll}}</td>
                                            </tr>
                                          @endforeach
                                        @elseif($Tanda == 1)
                                            @php
                                                $array = array_keys($AllItems);
                                                $max = count($AllItems);
                                            @endphp
                                            @for($i=0; $i<$max; $i++)
                                                @foreach($AllItems as $AllItem)
                                                    <tr class="">
                                                      <td class="pt-4 pb-4">{{$AllItemp[$array[$i]]->BarangUMKM->nama}}<br><span style="opacity: 0.6;">00{{$AllItem[$array[$i]]->BarangUMKM->id}}</span></td>
                                                    </tr>
                                                @endforeach
                                            @endfor
                                        @endif
                                          </tbody>
                                         </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="chat pe-4 ps-4" style="height: 630px; width: 22%; border-radius: 25px;">
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
@endsection
@endif

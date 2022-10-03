@extends('template')

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


        <div class="content_tambahbarang mt-5" style="height: 780px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >      
                    <div class="d-flex justify-content-center pt-4 pb-5">
                        <div class="d-flex justify-content-between" style="width: 90%;">
                            <div class="d-flex" style="border: 1px solid #626262; background-color:transparent; border-radius: 7px; width: 30%; height: 40px;">
                                <input type="text" class="form-control" id="exampleInputTanggalKadaluarsa1" aria-describedby="emailHelp" placeholder="Cari Barang" style="border-radius: 0; background-color:transparent; border: 0;">
                                <button type="submit" class="btn" style="border-left: 1px solid #626262; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                                    <img src="{{URL::asset('search.png')}}" class="" style="height: 20px;">
                                </button>
                            </div>
                            
                            <div class="input_pilihtanggal" style="width: 20%;">
                                <input type="date" class="form-control" id="exampleInputPilihTanggal1" aria-describedby="emailHelp" placeholder="Pilih Tanggal" style="border: 1px solid #626262; background-color:transparent;">
                            </div>   
                        </div>
                    </div>
                        
                    <div class="d-flex justify-content-center pt-4"style="width: 100%;">
                            <div class="resp-table-body" style="width: 90%;">
                                    <div class="" style="font-size: 20px; font-weight: bold;"> 
                                        <div class="table-body-cell" style="visibility: hidden; width: 35%;">
                                            Image
                                        </div>
                                        <div class="table-body-cell" style="width: 30%;">
                                            Nama Barang
                                        </div>
                                        <div class="table-body-cell" style="width: 32%;">
                                            Kuantitas
                                        </div>
                                        <div class="table-body-cell" style="visibility: hidden;">
                                            <div class="d-flex">
                                                    <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('exit.png')}}" alt="" style="height: 25px;"></a></button>
                                                    <button class="btn__login me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login">></a></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="resp-table-row mb-5 p-3" style="font-size: 20px;"> 
                                        <div class="d-flex">
                                            <div class="" style="width: 25%;">
                                                <img src="{{URL::asset('akun.png')}}" alt="Foto Profil" style="height: 80px;">
                                            </div>
                                            <div class="center" style="width: 21%;">
                                                    Mie Ayam
                                            </div>
                                            <div class="center" style="width: 35%;">
                                                12
                                            </div>
                                            <div class="center">
                                                <div class="d-flex">
                                                        <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('trash.png')}}" alt="" style="height: 25px;"></a></button>
                                                        <button class="btn__expand me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <img src="{{URL::asset('righticon.png')}}" alt="" style="height: 25px; transform: rotate(0deg); transition: all 0.5s;" class="expanded"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item_list_hidden" id="list_Allitem" style="width: 100%;">
                                            <div class="" style="width: 100%;"> 
                                                <div class="" style="width: 100%; font-size: 16px;">
                                                    <div class="table-body-cell text-center" style="width: 25%;">
                                                        ID
                                                    </div>
                                                    <div class="table-body-cell text-center" style="width: 25%;">
                                                        Kuantitas
                                                    </div>
                                                    <div class="table-body-cell text-center" style="width: 25%;">
                                                        Harga
                                                    </div>
                                                    <div class="table-body-cell text-center" style="width: 25%;">
                                                        Tanggal Kadaluarsa
                                                    </div>
                                                    <div class="table-body-cell" style="visibility: hidden;">
                                                        <div class="d-flex">
                                                                <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('exit.png')}}" alt="" style="height: 25px;"></a></button>
                                                                <button class="btn__login me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login">></a></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="resp-table-row mb-3 p-3" style="font-size: 16px; border-radius: 7px; background-color: #C7E0BC;"> 
                                                <div class="d-flex">
                                                    <div class="center" style="width: 25%;">
                                                        001 - 1
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                            10
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                        17.000
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                        20 - 06 - 2022
                                                    </div>
                                                    <div class="center">
                                                        <div class="d-flex">
                                                                <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('trash.png')}}" alt="" style="height: 25px;"></a></button>
                                                                <button class="btn__edit me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('editicon.png')}}" alt="" style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="resp-table-row mb-3 p-3" style="font-size: 16px; border-radius: 7px; background-color: #C7E0BC;"> 
                                                <div class="d-flex">
                                                    <div class="center" style="width: 25%;">
                                                        001 - 2
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                            4
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                        15.000
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                        20 - 06 - 2022
                                                    </div>
                                                    <div class="center">
                                                        <div class="d-flex">
                                                                <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('trash.png')}}" alt="" style="height: 25px;"></a></button>
                                                                <button class="btn__edit me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('editicon.png')}}" alt="" style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="resp-table-row mb-3 p-3" style="font-size: 16px; border-radius: 7px; background-color: #C7E0BC;"> 
                                                <div class="d-flex">
                                                    <div class="center" style="width: 25%;">
                                                        001 - 3
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                            10
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                        16.000
                                                    </div>
                                                    <div class="center" style="width: 25%;">
                                                        15 - 06 - 2022
                                                    </div>
                                                    <div class="center">
                                                        <div class="d-flex">
                                                                <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('trash.png')}}" alt="" style="height: 25px;"></a></button>
                                                                <button class="btn__edit me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('editicon.png')}}" alt="" style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>

                                            </div>   
                                        </div>
                                    </div>

                                    <div class="resp-table-row mb-5 p-3" style="font-size: 20px;"> 
                                        <div class="d-flex">
                                            <div class="" style="width: 25%;">
                                                <img src="{{URL::asset('akun.png')}}" alt="Foto Profil" style="height: 80px;">
                                            </div>
                                            <div class="center" style="width: 21%;">
                                                    Mie Ayam
                                            </div>
                                            <div class="center" style="width: 35%;">
                                                12
                                            </div>
                                            <div class="center">
                                                <div class="d-flex">
                                                        <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('trash.png')}}" alt="" style="height: 25px;"></a></button>
                                                        <button class="btn__expand me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('righticon.png')}}" alt="" style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"></a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="resp-table-row mb-5 p-3" style="font-size: 20px;"> 
                                        <div class="d-flex">
                                            <div class="" style="width: 25%;">
                                                <img src="{{URL::asset('akun.png')}}" alt="Foto Profil" style="height: 80px;">
                                            </div>
                                            <div class="center" style="width: 21%;">
                                                    Mie Ayam
                                            </div>
                                            <div class="center" style="width: 35%;">
                                                12
                                            </div>
                                            <div class="center">
                                                <div class="d-flex">
                                                        <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('trash.png')}}" alt="" style="height: 25px;"></a></button>
                                                        <button class="btn__expand me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login"><img src="{{URL::asset('righticon.png')}}" alt="" style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"></a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                    
                            </div>
                        
                        <!-- <table class="table">
                             <thead >
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">First</th>
                                 <th scope="col">Last</th>
                                 <th scope="col">Handle</th>
                               </tr>
                             </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                                </tbody>
                        </table>     -->
    </div>
@endsection
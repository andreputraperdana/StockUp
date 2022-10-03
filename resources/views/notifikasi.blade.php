@extends('template')

@section('javascript')
<script defer src="beranda.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                    <div class="atas_kiri d-flex">
                        <div class="judul_halaman mt-5 me-3">
                            <button class="ps-3 pe-3" style="background-color: #d7caa0; font-size: 30px; font-weight: bold;border-radius: 50%; border: none;"><</button>
                        </div>
                    
                        <div class="judul_halaman mt-5">
                            <p style="font-size: 30px; font-weight: bold;">Notifikasi</p>
                        </div>
                    </div>

        </div>
        <div class="content_tambahbarang mt-5" style="height: 700px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
           <div class="d-flex justify-content-evenly pt-5">
            <div class="d-flex" style="border: 1px solid #626262; background-color:transparent; border-radius: 7px; width: 30%;">
                <input type="text" class="form-control" id="exampleInputTanggalKadaluarsa1" aria-describedby="emailHelp" placeholder="Cari Notifikasi" style="border-radius: 0; background-color:transparent; border: 0;">
                <button type="submit" class="btn" style="border-left: 1px solid #626262; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                        <img src="{{URL::asset('search.png')}}" class="" style="height: 20px;">
                </button>
            </div>
            
            <div class="input_pilihtanggal" style="width: 30%;">
                <input type="date" class="form-control" id="exampleInputPilihTanggal1" aria-describedby="emailHelp" placeholder="Pilih Tanggal" style="border: 1px solid #626262; background-color:transparent;">
            </div>
            </div>

        <div class="list_raja_notif d-flex justify-content-center pt-5">
            <div class="list_notifikasi d-flex justify-content-center pt-3" style="border: 1px solid black; width: 72%;  border-radius: 7px;">
                <div class="foto_notif pe-5 pt-4">
                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                </div>
                <div class="description_notif ps-5">
                    <div class="title_notif">
                        <p style="font-size: 20px; font-weight: bold;">Kuaci Goreng Tepung</p>
                    </div>
                    <div class="desc_notif">
                        <p style="font-size: 16px;">Barang dah mau abis bos</p>
                    </div>
                    <div class="tanggal_notif">
                        <p style="font-size: 16px;">26 Juli 2022</p>
                    </div>
                </div>
                <div class="button__rekomen">
                    <div class="button_rekomen_notif ps-5">
                        <button type="submit" class="btn btn-primary " id="btn_rekom_notif" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Rekomendasi Barang</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="list_raja_notif d-flex justify-content-center pt-5">
            <div class="list_notifikasi d-flex justify-content-center pt-3" style="border: 1px solid black; width: 72%; border-radius: 7px;">
                <div class="foto_notif pe-5 pt-4">
                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                </div>
                <div class="description_notif ps-5">
                    <div class="title_notif">
                        <p style="font-size: 20px; font-weight: bold;">Kuaci Presto Cabe Ijo</p>
                    </div>
                    <div class="desc_notif">
                        <p style="font-size: 16px;">Yh brgnyh abis</p>
                    </div>
                    <div class="tanggal_notif">
                        <p style="font-size: 16px;">23 Juli 2022</p>
                    </div>
                </div>
                <div class="button__rekomen">
                    <div class="button_rekomen_notif ps-5">
                        <button type="submit" class="btn btn-primary " id="btn_rekom_notif" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Rekomendasi Barang</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="list_raja_notif d-flex justify-content-center pt-5">
            <div class="list_notifikasi d-flex justify-content-center pt-3" style="border: 1px solid black; width: 72%; border-radius: 7px;">
                <div class="foto_notif pe-5 pt-4">
                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                </div>
                <div class="description_notif ps-5">
                    <div class="title_notif">
                        <p style="font-size: 20px; font-weight: bold;">Kuaci Bunga Matahari</p>
                    </div>
                    <div class="desc_notif">
                        <p style="font-size: 16px;">Barang kamu dah mau abis yh</p>
                    </div>
                    <div class="tanggal_notif">
                        <p style="font-size: 16px;">21 Juli 2022</p>
                    </div>
                </div>
                <div class="button__rekomen">
                    <div class="button_rekomen_notif ps-5">
                        <button type="submit" class="btn btn-primary " id="btn_rekom_notif" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Rekomendasi Barang</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
        
        
@endsection


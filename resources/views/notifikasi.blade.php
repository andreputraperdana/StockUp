@extends('template')

@section('javascript')
<script defer src="notifikasi.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                    <div class="atas_kiri d-flex">
                        <div class="judul_halaman mt-5 me-3">
                            <a href="javascript:history.back()">
                                <button class="ps-3 pe-3" style="background-color: #d7caa0; font-size: 30px; font-weight: bold;border-radius: 50%; border: none;"><</button>
                            </a>
                        </div>
                        <div class="judul_halaman mt-5">
                            <p style="font-size: 30px; font-weight: bold;">Notifikasi</p>
                        </div>
                    </div>

        </div>
        <div class="content_tambahbarang mt-5" style="height: 790px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
           <div class="d-flex justify-content-evenly pt-5" style="width: 100%;">
            <div class="daftar_profil_kanan_kategori mb-3" style="width: 25%;">
                 <select name="kategori" class="kategori p-2" style="color: #626262; border-radius: 5px;">
                    <option value="Barang Kadaluarsa">Semua Jenis Notifikasi</option> 
                    <option value="Barang Habis">Barang Habis/Akan Habis</option>
                    <option value="Barang Kadaluarsa">Barang Akan Kadaluarsa</option>
                 </select>
            </div>
            <div class="input_pilihtanggal" style="width: 30%;">
                <input type="date" class="form-control" id="exampleInputPilihTanggal1" aria-describedby="emailHelp" placeholder="Pilih Tanggal" style="border: 1px solid #626262; background-color:transparent;">
            </div>
            </div>

        @foreach($Allbarang as $AllBarang)
        @if(empty($AllBarang->Total))    
        <form action="/detailnotif" method="POST">
        @csrf
        <div class="list_raja_notif d-flex justify-content-center pt-5">
            <div class="list_notifikasi d-flex justify-content-center pt-3" style="border: 1px solid black; width: 72%;  border-radius: 7px;">
                <div class="foto_notif pe-5 pt-4">
                    <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                </div>
                <div class="description_notif ps-5">
                    <div class="title_notif">
                        <p style="font-size: 20px; font-weight: bold;">{{$AllBarang->BarangUMKM->nama}}</p>
                    </div>
                    <div class="desc_notif">
                        <p style="font-size: 16px;">Barang hampir kadaluarsa</p>
                    </div>
                    <div class="tanggal_notif">
                        <p style="font-size: 16px;">Tanggal Kadaluarsa Barang: {{$AllBarang->tanggal_kadaluarsa}}</p>
                    </div>
                </div>
                <input type="hidden" name="id_barang" class="id_barang" value="{{$AllBarang->id}}">
                <div class="button__rekomen">
                    <div class="button_rekomen_notif ps-5">
                        <button type="submit" class="btn btn-primary " id="btn_rekom_notif" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Cari Barang</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @else
            <form action="/detailnotif" method="POST">
            @csrf
            <div class="list_raja_notif d-flex justify-content-center pt-5">
                <div class="list_notifikasi d-flex justify-content-center pt-3" style="border: 1px solid black; width: 72%;  border-radius: 7px;">
                    <div class="foto_notif pe-5 pt-4">
                        <img src="{{URL::asset('barangbaru.png')}}" alt="" style="height: 60px;">
                    </div>
                    <div class="description_notif ps-5" style="width: 38%;">
                        <div class="title_notif">
                            <p style="font-size: 20px; font-weight: bold;">{{$AllBarang->BarangUMKM->nama}}</p>
                        </div>
                        <div class="desc_notif">
                            <p style="font-size: 16px;">Sisa Barang: {{$AllBarang->Total}}</p>
                        </div>
                    </div>
                    <input type="hidden" name="id_barang" class="id_barang" value="{{$AllBarang->id}}">
                    <div class="button__rekomen">
                        <div class="button_rekomen_notif ps-5">
                            <button type="submit" class="btn btn-primary" id="btn_rekom_notif" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Cari Barang</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        @endif
        @endforeach
        
        <div class="d-flex justify-content-center">
            {{$Allbarang->links()}}
        </div>
    </div>

    <div class="notif_success hidden">
        <div class="notif_image text-center ps-4 pt-4">
            <img src="{{URL::asset('maskot2.png')}}" alt="">
        </div>
        <div class="notif text-center" style="font-size: 20px;">
            <p>Silahkan cek beberapa rekomendasi<br>Supplier</p>
        </div>
        <div class="text-center">
            <a href="/toko">
                <button class="btn btnLogin" id="btnUmkm" style="background-color: #d7caa0;">Toko</button>
            </a>
        </div>
    </div>
    <div class="overlay hidden"></div>
        
        
@endsection

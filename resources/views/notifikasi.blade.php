@extends('template')

@section('javascript')
<script defer src="notifikasi.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                    <div class="atas_kiri d-flex">
                        <div class="judul_halaman mt-5 me-3">
                            <a href="/beranda">
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
                    <img src="\public\image\{{$AllBarang->BarangUMKM->foto_barang}}" alt="" style="height: 60px;">
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
                <input type="hidden" name="tipe_notif" class="tipe_notif" value="BarangKadaluarsa">
                <div class="button__rekomen">
                    <div class="button_rekomen_notif ps-5">
                        <button type="submit" class="btn btn-primary " id="btn_rekom_notif" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Detail Barang</button>
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
                    <div class="foto_notif pe-5 pt-3">
                        <img src="\public\image\{{$AllBarang->BarangUMKM->foto_barang}}" alt="" style="height: 60px;">
                    </div>
                    <div class="description_notif ps-5 pt-2 pb-4" style="width: 38%;">
                        <div class="title_notif">
                            <p style="font-size: 20px; font-weight: bold;">{{$AllBarang->BarangUMKM->nama}}</p>
                        </div>
                        <div class="desc_notif">
                            <p style="font-size: 16px;">Sisa Barang: {{$AllBarang->Total}}</p>
                        </div>
                    </div>
                    <input type="hidden" name="id_barang" class="id_barang" value="{{$AllBarang->barang_umkm_id}}">
                    <input type="hidden" name="tipe_notif" class="tipe_notif" value="BarangHabis">
                    <div class="button__rekomen">
                        <div class="button_rekomen_notif ps-5">
                            <button type="submit" class="btn btn-primary" id="btn_rekom_notif" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Detail Barang</button>
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

    <div class="notif_success hidden" style="height: 380px;">
        <div class="header_detail d-flex pt-3 pb-3 ps-2">
            <div class="leftheader_detail">
                <img src="\public\image\{{$AllBarang->BarangUMKM->foto_barang}}" alt="" style="height: 60px;">
            </div>
            <div class="rightheader_detail ps-2 pt-2">
                <div class="detailnamabarang">
                </div>
                <div class="rightkategoribarang">
                </div>
            </div>
        </div>

        <div class="body_detail_1" style="display: none;">
            <div class="body_detail_baranghabis d-flex justify-content-center pt-4 pb-5" style="width: 100%;">
                <table class="table caption-top" style="width: 90%;">
                       <thead>
                         <tr>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;">ID Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Harga</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang</td>
                           <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Tanggal Kadaluarsa</td>
                         </tr>
                       </thead>
                       <tbody class="isi_detail_baranghabis">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="body_detail_2" style="display: none;">
            <div class="body_detail d-flex justify-content-center">
                <div class="left_bodydetail" style="width: 45%;">
                    <div class="IDBarang">
                        <p>ID Barang</p>
                    </div>
                    <div class="Harga">
                        <p>Harga</p>
                    </div>
                    <div class="Jumlah">
                        <p>Jumlah</p>
                    </div>
                    <div class="TanggalKadaluarsa">
                        <p>Tanggal Kadaluarsa</p>
                    </div>
                </div>
                <div class="right_bodydetail">
                    <div class="IDBarangData">
                    </div>
                    <div class="HargaData">
                    </div>
                    <div class="JumlahData">
                    </div>
                    <div class="TanggalKadaluarsaData">
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-1">
            <a href="/toko">
                <button class="btn btntoko" id="btntoko" style="background-color: #d7caa0; font-weight: bold;">Cari Barang</button>
            </a>
        </div>
    </div>
    <div class="overlay hidden"></div>
        
        
@endsection

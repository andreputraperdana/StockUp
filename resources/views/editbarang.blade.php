@extends('template')

@section('javascript')
<script defer src="beranda.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                    <div class="atas_kiri">
                        <div class="judul_halaman mt-5">
                            <button class="ps-3 pe-3" style="background-color: #d7caa0; font-size: 30px; font-weight: bold;border-radius: 50%; border: none;"><</button>
                        </div>
                    </div>

                    <div class="atas_kanan d-flex  mt-5">
                        <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                            <div class="notifikasi d-flex justify-content-center pt-2" style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                            <a href="">
                                <img src="{{URL::asset('chat.png')}}" class="" style="height: 29px;">
                            </a>
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
        <div class="content_tambahbarang mt-5" style="height: 700px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
                    <div class="pengaturan_akun" style="width: 100%;">
                        <div class="section_dua d-flex" style="width: 100%">
                            <div class="foto_profile" style="width: 30%; padding-top: 7%; height: 100%;">
                            <div class="d-flex justify-content-center">
                                <img src="{{URL::asset('akun.png')}}" alt="Foto Profil" style="height: 200px;">
                            </div>
                                <div class="button_pilihfoto d-flex justify-content-center pt-5 mt-2" >
                                    <label class="custom-file-upload" style="border-radius: 7px;">
                                        <input type="file"/>
                                        Pilih Foto
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form_pengaturan_akun" style= "width: 70%;">
                                <div class="d-flex justify-content-center pt-4" style="width:80%;">
                                    <div class="daftar_akun ms-5" style="width: 95%;">
                                        <div class="pengaturan_akun_isi">
                                            <div class="input_content_tambahbarang">
                                                <div class="input_judul_namabarang">
                                                    <label for="">
                                                        <p style="font-size: 16px; font-weight: bold;">Nama Barang</p>
                                                    </label> 
                                                </div>
                                                <div class="input_namabarang">
                                                    <input type="text" class="form-control" id="exampleInputNamaBarang1" aria-describedby="emailHelp" placeholder="Nama Barang" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                            </div>
    
                                            <div class="input_content_jenisbarang mt-3">
                                                <div class="input_judul_jenisbarang">
                                                    <label for="">
                                                        <p style="font-size: 16px; font-weight: bold;">Jenis Barang</p>
                                                    </label> 
                                                </div>
                                                <div class="daftar_profil_kanan_kategori mb-3">
                                                    <select name="kategori" class="kategori p-2" style="color: #626262; border-radius: 5px;">
                                                        <option value="javascript">Es Grim Coklat</option>
                                                        <option value="php">Es Grim Vanilla</option>
                                                        <option value="java">Es Grim Stroberi</option>
                                                        <option value="golang">Es Grim Matcha</option>
                                                        <option value="python">Es Grim Melon</option>
                                                        <option value="c#">Es Grim Alpukat</option>
                                                    </select>
                                                </div>
                                            </div>
    
    
                                            <div class="input_content_tanggalkadaluarsa mt-3">
                                                <div class="input_judul_tanggalkadaluarsa">
                                                    <label for="">
                                                        <p style="font-size: 16px; font-weight: bold;">Tanggal Kadaluarsa</p>
                                                    </label>    
                                                </div>
                                                <div class="input_tanggalkadaluarsa">
                                                    <input type="date" class="form-control" id="exampleInputTanggalKadaluarsa1" aria-describedby="emailHelp" placeholder="Tanggal Kadaluarsa" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                            </div>

                                            <div class="input_content_harga mt-3">
                                                <div class="input_judul_harga">
                                                    <label for="">
                                                        <p style="font-size: 16px; font-weight: bold;">Harga</p>
                                                    </label> 
                                                </div>
                                                <!-- <div class="input_namabarang">
                                                    <input type="number" step="500" class="form-control" id="exampleInputHarga1" aria-describedby="emailHelp" placeholder="Harga" style="border: 1px solid #626262; background-color:transparent;">
                                                    
                                                </div> -->
                                                <div class="d-flex">

                                                    <div style="width: 40%;" class="pe-5">
                                                        <div class="d-flex" style="border: 1px solid #626262;padding: 5px; background-color:transparent; border-radius: 5px; width: 100%;">
                                                            <span class="pe-2">Rp</span>
                                                            <input type="text" style="border: 0px solid #626262;background-color:transparent; outline: 0;" placeholder="Harga">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="input_content_harga" class="ps-5">
                                                        
                                                        <div class="d-flex" style="border: 1px solid #626262; background-color:transparent; border-radius: 5px; width: 100%;">
                                                            <button type="submit" class="btn" style="border-right: 1px solid #626262; border-radius: 0;">-</button>
                                                            <span class="ps-4 pe-4 pt-2">1</span>
                                                            <button type="submit" class="btn" style="border-left: 1px solid #626262; border-radius: 0;">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>


                                            <div class="input_content_catatan mt-3">
                                                <div class="input_judul_catatan">
                                                    <label for="">
                                                        <p style="font-size: 16px; font-weight: bold;">Catatan</p>
                                                    </label> 
                                                </div>
                                                <div class="input_catatan">
                                                    <input type="text" class="form-control" id="exampleInputCatatan1" aria-describedby="emailHelp" placeholder="Catatan" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                            </div>

                                            

                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="button_simpan d-flex justify-content-center pt-5 mt-2">
                        <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan" style="background-color: #D7CAA0; width: 25%; border: none; font-weight: bold; color: black;">Simpan</button>
                    </div>
        </div>
        
@endsection


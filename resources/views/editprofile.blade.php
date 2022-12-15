@extends('template')

@section('javascript')
<script defer src="editprofile.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                    <div class="atas_kiri">
                        <div class="judul_halaman mt-5">
                            <p style="font-size: 30px; font-weight: bold;">Pengaturan</p>
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
                            <img src="{{URL::asset('akun.png')}}" alt="" style="height: 40px;"> {{Str::limit(auth()->user()->name,5)}}
                            </button>
                            <div class="dropdown-content">
                                <a href="/editprofile">Pengaturan</a>
                                <a href="#">Logout</a>
                            </div>
                        </div>  
                    </div>
        </div>


        <div class="content_tambahbarang mt-5" style="height: 700px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
                    <div class="daftar_header pt-5 pb-1">
                        <div class="menu_daftar">
                        <div class="button__first pe-3">
                            <div class="">
                                    <button class="btn btn1" id="btnUmkm" style="background-color: #d7caa0; border-radius: 50%; font-size: 20"><p class="ps-1 pt-3">1</p></button>
                            </div>
                        </div>
                        <div class="lines2">
                        </div>
                        <div class="button__second ps-3">
                            <div class="">
                                <button class="btn btn2" id="btnPemasok" style="border-radius: 50%; font-size: 20"><p class="ps-1 pt-3">2</p></button>
                            </div>
                        </div>
                        </div>
                        <div class="menu_daftar">
                            <div class="set_akun">
                                <div class="text__first">
                                    <p style="font-size: 16px; font-weight: bold;">Akun</p>
                                </div>
                            </div>
                            <div class="lines3" style="visibility: hidden;">
                            </div>
                            <div class="set_profil">
                                <div class="text__first">
                                    <p style="font-size: 16px; font-weight: bold;">Profil</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pengaturan_akun" style="width: 100%;">
                        <div class="section_dua d-flex" style="width: 100%">
                            <div class="foto_profile d-flex justify-content-center" style="width: 30%; padding-top: 7%;">
                                <img src="{{URL::asset('akun.png')}}" alt="Foto Profil" style="height: 200px;">
                            </div>
                            <div class="form_pengaturan_akun" style= "width: 70%;">
                                <div class="d-flex justify-content-center pt-4" style="width:80%;">
                                    <div class="daftar_akun ms-5" style="width: 95%;">
                                        <div class="text_akun mb-3 mt-3">
                                            <p class="titles" style="font-size: 20px; font-weight: bold;">Akun</p>
                                            <div class="lines4"></div>
                                        </div>
                                        <div class="pengaturan_akun_isi d-flex" style="display: none;">
                                            <div class="pengaturan_akun_kiri mt-2" style="width: 35%;">
                                                <div class="pengaturan_akun_kiri_email mb-3">
                                                    <label for="exampleInputEmail1" class="form-label" style="color: black; font-size: 16px; font-weight: bold;">Email</label>
                                                </div>
                                                <div class="daftar_akun_kiri_password mt-4">
                                                    <label for="exampleInputPassword1" class="form-label" style="color: black; font-size: 16px; font-weight: bold;">Password Lama</label>
                                                </div>
                                                <div class="daftar_akun_kiri_password mt-4" style="padding-top: 5px;">
                                                    <label for="exampleInputPassword1" class="form-label" style="color: black; font-size: 16px; font-weight: bold;">Password Baru</label>
                                                </div>
                                                <div class="daftar_akun_kiri_password mt-4" style="padding-top: 9px;">
                                                    <label for="exampleInputPassword1" class="form-label" style="color: black; font-size: 16px; font-weight: bold;">Konfirmasi Password</label>
                                                </div>
                                            </div>

                                            <div class="daftar_akun_kanan ms-5" style="width: 65%;">
                                                <div class="daftar_akun_kanan_email mb-3">
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{auth()->user()->email}}" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                                <div class="daftar_akun_kanan_password">
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Lama" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                                <div class="daftar_akun_kanan_password mt-4">
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Baru" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                                <div class="daftar_akun_kanan_password mt-4">
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pengaturan_akun_isi d-flex">
                                            <div class="pengaturan_profil_kiri mt-2" style="width: 35%; display: none;">
                                                <div class="pengaturan_akun_kiri_email mb-3">
                                                    <label for="exampleInputEmail1" class="form-label" style="color: black; font-size: 16px; font-weight: bold;">Nama Toko</label>
                                                </div>
                                                <div class="daftar_akun_kiri_password mt-4">
                                                    <label for="exampleInputPassword1" class="form-label" style="color: black; font-size: 16px; font-weight: bold;">Kategori</label>
                                                </div>
                                                <div class="daftar_akun_kiri_password mt-4" style="padding-top: 5px;">
                                                    <label for="exampleInputPassword1" class="form-label" style="color: black; font-size: 16px; font-weight: bold;">Nomor Telepon</label>
                                                </div>
                                            </div>

                                            <div class="daftar_profil_kanan ms-5" style="width: 65%; display: none;">
                                                <div class="daftar_akun_kanan_email mb-3">
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{auth()->user()->name}}" style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                                <div class="daftar_akun_kanan_password">
                                                    <select name="kategori" class="kategori p-2" style="color: black; border-radius: 5px;">
                                                        {{-- <option selected="true" disabled="disabled">{{auth()->user()->kategori}}</option> --}}
                                                        <option value="Fashion"
                                                            @if (auth()->user()->kategori == 'Fashion'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Fashion</option>
                                                        <option value="Jasa"
                                                            @if (auth()->user()->kategori == 'Jasa'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Jasa</option>
                                                        <option value="Kecantikan"
                                                            @if (auth()->user()->kategori == 'Kecantikan'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Kecantikan</option>
                                                        <option value="Kesehatan" 
                                                            @if (auth()->user()->kategori == 'Kesehatan'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >
                                                        Kesehatan</option>
                                                        <option value="Makanan dan minuman"
                                                            @if (auth()->user()->kategori == 'Makanan dan minuman'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Makanan dan minuman</option>
                                                        <option value="Olahraga"
                                                            @if (auth()->user()->kategori == 'Olahraga'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Olahraga</option>
                                                        <option value="Otomotif"
                                                            @if (auth()->user()->kategori == 'Otomotif'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Otomotif</option>
                                                        <option value="Perdagangan"
                                                            @if (auth()->user()->kategori == 'Perdagangan'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Perdagangan</option>
                                                        <option value="Lainnya"
                                                            @if (auth()->user()->kategori == 'Lainnya'){
                                                                selected="selected"
                                                            }           
                                                            @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="daftar_akun_kanan_password mt-4">
                                                    <input type="tel" class="form-control" id="exampleInputPassword1" placeholder="Nomor Telfon" value={{auth()->user()->nomortelp}} 
                                                    style="border: 1px solid #626262; background-color:transparent;">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gabungan_button d-flex justify-content-center pt-5">
                        <div class="button__lanjut d-flex justify-content-center pt-4 mt-2" style="width: 30%; height: 75px;">
                            <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_lanjut" style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Lanjut</button>
                        </div>    
                        <div class="button__kembali d-flex justify-content-center pt-4 mt-2" style="width: 30%; height: 75px;">
                            <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_kembali" style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Kembali</button>
                        </div>
                        <div class="button_simpan d-flex justify-content-center pt-4 mt-2" style="width: 30%">
                            <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan" style="background-color: #D7CAA0; width: 70%; border: none; font-weight: bold; color: black;">Simpan</button>
                        </div>
                    </div>
        </div>
@endsection
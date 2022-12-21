<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{URL::asset('style.css')}}>
    <script defer src="scriptregister.js"></script>
    <title>Halaman Utama</title>
  </head>
  <body class="content__body mt-3" style="display: flex; flex-direction: column">
                <div class="daftar d-flex justify-content-center" style="flex: 1;">
                    <div class="daftar__image" style="background-color: #d7caa0; width: 20%;" >
                    <div class="daftar__image__cover">
                        <div class="judul text-center">
                            <p style="font-weight: bold;">STOCKUP</p>
                        </div>
                        <div class="judul__image ms-3">
                            <img src="{{URL::asset('maskot2.png')}}" alt="" style="height: 150px;">
                        </div>
                    </div>
                    <div class="punya__akun">
                        <span>Sudah Memiliki Akun?</span>
                        <br/>
                        <a href="/login"><u>Masuk Disini</u> </a>
                    </div>
                    </div>
                        <div class="daftar__form" style="background-color: #f4f4f4; width: 50%;">
                        <form action="/daftar" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="daftar_header">
                                <div class="d-flex justify-content-center pt-3">
                                    <div class="text_daftar" style="width: 70%;">
                                        <p class="text__daftar">DAFTAR</p>
                                    </div>
                                </div>

                                <div class="menu_daftar">
                                    <div class="pe-5">
                                        <button type="button" name="UMKM" value="1" class="btn btnUmkm" id="btnUmkm" style="background-color: #d7caa0;">UMKM</button>   
                                    </div>
                                    <div class="">
                                        <button type="button" name= "UMKM" value="2" class="btn btnUmkm" id="btnPemasok" >Pemasok</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-4" style="width: 100%;">
                                <div class="daftar_akun ms-5" style="width: 75%;">
                                    <div class="text_akun mb-3 mt-3">
                                        <p style="font-size: 20px; font-weight: bold;">Akun</p>
                                        <div class="lines"></div>
                                    </div>
                                    <div class="daftar_akun_isi d-flex">
                                        <div class="daftar_akun_kiri mt-2" style="width: 25%;">
                                            <div class="daftar_akun_kiri_email mb-3">
                                                <label for="exampleInputEmail1" class="form-label" style="color: black;">Email</label>
                                            </div>
                                            <div class="daftar_akun_kiri_password mt-4">
                                                <label for="exampleInputPassword1" class="form-label" style="color: black">Password</label>
                                            </div>
                                        </div>
                
                                        <div class="daftar_akun_kanan ms-5" style="width: 55%">
                                            <div class="daftar_akun_kanan_email mb-3">
                                                <input type="email" name="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                            <div class="daftar_akun_kanan_password">
                                                <input type="password" name="password" class="form-control password" id="exampleInputPassword1" placeholder="Password" style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                            
                        <div class="d-flex justify-content-center pt-4" style="width: 100%;">
                            <div class="daftar_profil ms-5 mb-4" style="width: 75%;">
                                <div class="text_profil mt-3">
                                        <p style="font-size: 20px; font-weight: bold;">Profil</p>
                                        <div class="lines"></div>
                                </div>
                                <div class="daftar_profil_isi d-flex pt-4">
                                    <div class="daftar_profil_kiri me-5 mt-2" style="width: 25%;">
                                        <div class="daftar_profil_kiri_nama mb-3">
                                            <label for="exampleInputNama1" class="form-label" style="color: black;">Nama</label>
                                        </div>
                                        <div class="daftar_profil_kiri_kategori mt-4">
                                            <label for="exampleInputKategori1" class="form-label" style="color: black">Kategori</label>
                                        </div>
                                        <div class="daftar_profil_kiri_nomortelepon mt-4">
                                            <label for="exampleInputNomorTelepon1" class="form-label" style="color: black">Nomor Telepon</label>
                                        </div>
                                        <div class="daftar_profil_kiri_foto mt-4">
                                            <label for="exampleInputFoto1" class="form-label" style="color: black">Foto</label>
                                        </div>
                                    </div>
            
                                    <div class="daftar_profil_kanan" style="width: 55%">
                                        <div class="daftar_profil_kanan_nama mb-3">
                                            <input type="text" name="nama" class="form-control nama" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="Nama" style="border: 1px solid #626262; background-color:transparent;">
                                        </div>
                                        <div class="daftar_profil_kanan_kategori mb-3">
                                            <select name="kategori" class="kategori p-2" style="color: #626262; border-radius: 5px;">
                                                <option selected="true" disabled="disabled">Pilih Kategori</option>
                                                <option value="Fashion">Fashion</option>
                                                <option value="Jasa">Jasa</option>
                                                <option value="Kecantikan">Kecantikan</option>
                                                <option value="Kesehatan">Kesehatan</option>
                                                <option value="Makanan dan minuman">Makanan dan minuman</option>
                                                <option value="Olahraga">Olahraga</option>
                                                <option value="Otomotif">Otomotif</option>
                                                <option value="Perdagangan">Perdagangan</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="daftar_profil_kanan_nomortelepon mb-3">
                                            <input type="text" name="nomortelp" class="form-control nomortelp" id="exampleInputNomorTelepon1" placeholder="Nomor Telepon" style="border: 1px solid #626262; background-color:transparent;">
                                        </div>
                                            <div class="input_fotoprofil">
                                                <input type="file" name="fotoprofil" class="form-control fotoprofil" id="exampleInputFotoProfil1" aria-describedby="emailHelp" placeholder="Foto Profil" style="border: 1px solid #626262; background-color:transparent;">
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                             
                            <div class="button_simpan d-flex justify-content-center pt-4">
                                <button type="submit" class="btn btn-primary ps-5 pe-5" id="btn_simpan" style="background-color: #d7caa0; border: none; font-weight: bold; color: black;" name="roleid" value="1">Simpan</button>
                            </div>
                        </form>
                        </div>
                </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <div class="foot">
        <div class="copyright text-center" style="margin-top: -55px; margin-bottom: -35px;">
            <p>&#169 2022</p>
        </div>
    </div>
    <div class="notif_success hidden">
        <div class="notif_image text-center ps-4 pt-4">
            <img src="{{URL::asset('maskot2.png')}}" alt="">
        </div>
        <div class="notif_text text-center">
            <p>BERHASIL</p>
            <div class="sub_notif_text">
                <p>Akun Berhasil Didaftarkan</p>
            </div>
        </div>
        <div class="text-center">
            <a href="/login">
                <button class="btn btnLogin" id="btnUmkm" style="background-color: #d7caa0;">Login</button>
            </a>
        </div>
    </div>

    <div class="notif_gagal hidden">
        <div class="notif_image text-center ps-4 pt-4">
            <img src="{{URL::asset('maskot2.png')}}" alt="">
        </div>
        <div class="notif_text text-center">
            <p style="color: red;">TIDAK BERHASIL</p>
            <div class="sub_notif_text">
                <p>Silahkan periksa kembali inputan anda</p>
            </div>
        </div>
        <div class="text-center">
            <div class="texterror" style="color: red;">
                    
            </div>
        </div>
    </div>
    <div class="overlay hidden"></div>
    
</body>
</html>
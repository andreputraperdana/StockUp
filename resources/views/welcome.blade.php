<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{URL::asset('style.css')}}>
    <script defer src="script.js"></script>
    <title>Halaman Utama</title>
  </head>
  <body style="background-color: #f4f4f4;">
    <div class="" id="header">
        <div class="d-flex justify-content-end pt-4 pe-3">
            <div class="login pt-2">
                <button class="btn__login me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/login">Masuk</a></button>
            </div>
            <div class="register pt-2">
                <button class="btn__register p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"><a href="/daftar">Daftar</a></button>
            </div>  
        </div>
        <div class="content-header d-flex justify-content-evenly ps-5 mt-4" style="width: 100%;">
        <div class="d-flex justify-content-center" style="width: 90%;">
            <div class="contents pt-5" style="width: 42%;">
                <div>
                    <div class="highlight">Selamat Datang</div>
                    <div class="fw-bold highlight1 pb-3">StockUp</div>
                </div>
    
                <p class="content pb-3">
                Sebuah aplikasi yang membantu pelaku usaha</br>
                (UMKM) untuk mengelola persediaan barang dengan</br>
                berbagai fitur dan jenis laporan yang telah disediakan</br>
                serta menghubungkan pelaku usaha (UMKM)</br>
                dengan pemasok.
                </p>
                <a href="#section1">
                <button class="btn--text p-2 pe-3 ps-3" style="color: black; font-size: 16px; font-weight: bold;">Pelajari &DownArrow;</button>
                </a>
            </div>
            <div class="imagestock">
                <img src="{{URL::asset('maskot.png')}}" alt="" style="height: 330px;">
            </div>
         </div>
        </div>
    </div>

    <div class="body_c" id="section1">
        <div class="body_content">
            <p class="text-center body_text pb-3" style="font-size: 44px;">Fitur Stock Up</p>
            <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-end line"></div>
            </div>
        </div>

        <div class="container pb-5">
            <div class="row">
              <div class="col text-center">
                <div class="col__content">
                    <div class="col__icon d-flex justify-content-center">
                        <div class="col__icon_square">
                            <img src="{{URL::asset('laporan.png')}}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="col__Text pt-3">
                        <p>Laporan</p>
                    </div>
                    <div class="col__desc">
                        <p>Menyediakan laporan keluar masuk barang, persediaan stok barang,</br>
                        barang kadaluarsa, dan barang habis</br>
                        dalam bentuk digital</p>
                    </div>
                </div>
              </div>
    
              <div class="col text-center">
                <div class="col__icon d-flex justify-content-center">
                    <div class="col__icon_square">
                        <img src="{{URL::asset('notification.png')}}" alt="" srcset="">
                    </div>
                </div>
                <div class="col__Text pt-3">
                    <p>Notifikasi</p>
                </div>
                <div class="col__desc">
                    <p>Memunculkan notifikasi</br>
                    sebagai pemberitahuan barang habis</br>
                    dan kadaluarsa</p>
                </div>
              </div>
              <div class="col text-center">
                <div class="col__icon d-flex justify-content-center">
                    <div class="col__icon_square">
                        <img src="{{URL::asset('komunikasi.png')}}" alt="" srcset="">
                    </div>
                </div>
                <div class="col__Text pt-3">
                    <p>Koneksi ke Pemasok</p>
                </div>
                <div class="col__desc">
                    <p>Memperkenalkan pemasok berserta</br>
                    barang yang dijualnya kepada</br>
                    UMKM melalui chat</p>
                </div>
              </div>
            </div>
        </div>
    </div>


    <div id="footer">
        <div class="d-flex justify-content-between">
            <div class="left-footer d-flex pt-4 ps-4">
                <div class="instagram-icon pe-4">
                    <a href="">
                        <img src="{{URL::asset('instagram.png')}}" alt="" style="height: 50px;">
                    </a>
                </div>
                <div class="twitter-icon pe-4">
                    <a href="">
                        <img src="{{URL::asset('twitter.png')}}" alt="" style="height: 50px;">
                    </a>
                </div>
                <div class="facebook-icon">
                    <a href="">
                        <img src="{{URL::asset('facebook.png')}}" alt="" style="height: 50px;">
                    </a>
                </div>
            </div>
            <div class="copyright right-footer">
                <p class="fw-bold footerCopy text-dark">&#169 2022</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
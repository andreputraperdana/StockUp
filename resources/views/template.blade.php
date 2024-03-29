<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{ URL::asset('/style.css') }}>
    <script defer src="/template.js"></script>
    @yield('javascript')
    <title>Halaman Utama</title>
</head>

<body class="content__body">
    @if (auth()->user()->role_id == 1)
        <div class="side_bar" style="width: 80px;">
            <div class="content_bar">
                <div class="side_logo text-center hidden">
                    <h3 style="font-weight: 1000;">STOCKUP</h3>
                </div>
                <ul class="menu_bar" id="menu_bar" style="width: 100%;">
                    <li class="beranda_">
                        <a href="/beranda" id="linkBeranda">
                            <div class="menu_brnd d-flex ps-4 pt-2 pb-1" role="button" style="transition: all 0.3s;">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('beranda_icon.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="brnd" class="subtextmenu" style="text-decoration:none;">Beranda</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="tambahbarang_">
                        <a href="/tambahbarang" class="linkTambahBarang">
                            <div class="menu_tmbhbrg d-flex ps-4 pt-2 pb-1" role="button"
                                style="transition: all 0.8s;">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('plus.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="tmbhBrg" class="subtextmenu" style="text-decoration:none;">Tambah Barang
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="laporan_">
                        <a href="/laporan" class="linkLaporan">
                            <div class="menu_lprn d-flex ps-4 pt-2 pb-1" role="button" style="transition: all 0.8s;">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('laporan.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="lprn" class="subtextmenu" style="text-decoration:none;">Laporan</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="mengelolabarang_">
                        <a href="/mengelolabarang" class="linkMengelolaBarang">
                            <div class="menu_mnglola d-flex ps-4 pt-2 pb-1" role="button"
                                style="transition: all 0.8s;">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('mengelolabarang.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="mnglolaBrg" class="subtextmenu" style="text-decoration:none;">Mengelola
                                        Barang</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="toko_">
                        <a href="/toko" class="linkToko">
                            <div class="menu_tko d-flex ps-4 pt-2 pb-1" role="button">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('toko.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="tko" class="subtextmenu" style="text-decoration:none;">Toko</p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @elseif(auth()->user()->role_id == 2)
        <div class="side_bar" style="width: 80px;">
            <div class="content_bar">
                <div class="side_logo text-center hidden">
                    <h3 style="font-weight: 1000;">STOCKUP</h3>
                </div>
                <ul class="menu_bar" id="menu_bar" style="width: 100%;">
                    <li class="beranda_">
                        <a href="/beranda" id="linkBeranda">
                            <div class="menu_brnd d-flex ps-4 pt-2 pb-1" role="button"
                                style="transition: all 0.3s;">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('beranda_icon.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="brnd" class="subtextmenu" style="text-decoration:none;">Beranda</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="tambahbarang_">
                        <a href="/tambahbarang" class="linkTambahBarang">
                            <div class="menu_tmbhbrg d-flex ps-4 pt-2 pb-1" role="button"
                                style="transition: all 0.8s;">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('plus.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="tmbhBrg" class="subtextmenu" style="text-decoration:none;">Tambah Barang
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="mengelolabarang_">
                        <a href="/mengelolabarang" class="linkMengelolaBarang">
                            <div class="menu_mnglola d-flex ps-4 pt-2 pb-1" role="button"
                                style="transition: all 0.8s;">
                                <div class="iconmenu">
                                    <img src="{{ URL::asset('mengelolabarang.png') }}" alt="">
                                </div>
                                <div class="textmenu">
                                    <p id="mnglolaBrg" class="subtextmenu" style="text-decoration:none;">Mengelola
                                        Barang</p>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    @endif


    <div class="isi_konten" style="width: 90%;">
        @yield('content')
        <div class="foot">
            <div class="copyright text-center" style="margin-top: -55px; margin-bottom: -35px;">
                <p>&#169 2022</p>
            </div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</body>

</html>

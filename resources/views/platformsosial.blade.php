@extends('template')

@section('javascript')
<script defer src="\mengelolabarang.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                        <div class="atas_kiri">
                            <div class="judul_halaman mt-5">
                                <p style="font-size: 30px; font-weight: bold;">Toko</p>
                            </div>
                        </div>

                        <div class="atas_kanan d-flex  mt-5">
                            <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                                <div class="notifikasi d-flex justify-content-center pt-2" style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                                        <img src="{{URL::asset('chat.png')}}" class="" style="height: 29px;">
                                </div>
                            </div>
                            <div class="notifikasi pe-2 mt-2">
                                <a href="\notifikasi">
                                    <img src="{{URL::asset('notifikasi.png')}}" class="ps-2 pe-2 pt-1 pb-1" style="background-color: #f4f4f4; border-radius: 50%; height: 45px;">
                                </a>
                            </div>

                            <div class="dropdown mt-2">
                            <button class="dropbutton ps-3 pe-4 pt-1 pb-1" style="border: none; border-radius: 25px;">
                                <img src="\public\image\{{auth()->user()->foto_profile}}" alt="" style="height: 40px; width: 40px; border-radius: 50px;"> {{Str::limit(auth()->user()->name,5)}}
                            </button>
                                <div class="dropdown-content">
                                    <a href="\editprofile">Pengaturan</a>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <input type="submit" class="btn prevbutton" value="Logout">
                                    </form>
                                </div>
                            </div>

                        </div>
        </div>


                    <div class="content_tambahbarang mt-5" style="height: 890px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex justify-content-center" style="width: 100%;">
                                <div class="images_toko d-flex justify-content-center" style="width: 30%; height: 40px;">
                                    <img src="\public\image\{{$PlatformSosial->get(0)->foto_profile}}" alt="" style="height: 60px;">
                                </div>
                                <div class="desc__toko" style="width: 50%;">
                                    <h2>{{$PlatformSosial->get(0)->name}}</h2>
                                </div>
                            </div>   
                        </div>
                            <div class="btn_platform" style="margin-top: 150px; width: 100%;">
                                <div class="btn_sopi" style="width: 70%; margin-top: 25px;">
                                    <a href="{{ $PlatformSosial->get(1)->link }}">
                                        <button type="submit" class="btn btn-primary" id="btn_platformsoc" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Shopee</button>
                                    </a>
                                </div>
                                <div class="btn_tokped" style="width: 70%;  margin-top: 25px;">
                                    <a href="{{ $PlatformSosial->get(2)->link }}">
                                        <button type="submit" class="btn btn-primary" id="btn_platformsoc" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Tokopedia</button>
                                    </a>
                                </div>
                                <div class="btn_instagram" style="width: 70%;  margin-top: 25px;">
                                    <a href="{{ $PlatformSosial->get(0)->link }}">
                                        <button type="submit" class="btn btn-primary" id="btn_platformsoc" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Instagram</button>
                                    </a>
                                </div>
                                <div class="btn_whatsapp" style="width: 70%;  margin-top: 25px;">
                                    <a href="http://wa.me/0{{ $PlatformSosial->get(0)->nomortelp }}">
                                        <button type="submit" class="btn btn-primary" id="btn_platformsoc" style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Whatsapp</button>
                                    </a>
                                </div>
                            </div>
                    </div>
@endsection
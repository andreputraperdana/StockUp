<!-- @extends('template')

@section('javascript')
<script defer src="/chat.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                        <div class="atas_kiri">
                            <div class="judul_halaman mt-5">
                                <p style="font-size: 30px; font-weight: bold;">Chat</p>
                            </div>
                        </div>

                        <div class="atas_kanan d-flex  mt-5">
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
                                    <a href="#">Pengaturan</a>
                                    <form action="/logout" method="POST">
                                     @csrf
                                        <input type="submit" class="btn prevbutton" value="Logout">
                                    </form>
                                </div>
                            </div>

                        </div>
            </div>
                @if(auth()->user()->role_id == 1)
                    <div class="d-flex justify-content-center">
                        <div class="content_tambahbarang mt-5 d-flex" style="height: 500px; width: 85%; background-color: #F4F4F4; border-radius: 25px;" >
                        <div class="chat pe-4 ps-4" style="width: 30%; height: 100%; border-radius: 25px 0 0 25px; border-right: 1px solid black;">
                            <div class="title__chat d-flex pt-4">
                                <div class="pe-3">
                                    <p style="font-size: 20px; font-weight: bold;">Pesan Masuk</p>
                                </div>
                                <div class="pt-1">
                                    <img src="{{URL::asset('chat.png')}}" class="" style="height: 25px;">
                                </div>
                            </div>
                            <div class="pesanAllMasuk">
                                
                            </div>
                        </div>

                        @if($id == 0)
                        <div class="d-flex flex-column justify-content-center" style="width: 100%; align-items: center;">
                            <div class="iconmessage">
                                <div class="d-flex justify-content-center">
                                    <img src="{{URL::asset('chaticon.png')}}" alt="" style="height: 60px;">
                                </div>
                                <p style="font-size: 16pt;">Mulai Chat</p>
                            </div>
                        </div>
                        <div class="PemasokID" style="display: none;">0</div>
                        <div class="UMKMID" style="display: none;">0</div>
                        @elseif($id != 0)
                        <div style="width: 70%;">
                            <div class="d-flex justify-content-center" style="width: 100%; border-radius: 0 25px 0 0; background-color: #D7CAA0; height: 55px;">
                                <div class="content__chat d-flex" style="border: 0px; width: 80%;">
                                    <div class="pe-2">
                                        <img src="{{URL::asset('akun.png')}}" alt="" style="height: 50px;"> 
                                    </div>
    
                                    <div class="d-flex flex-column justify-content-center pt-3">
                                        <p style="font-size: 16px; font-weight: bold; margin-bottom: -1px;">{{$userchat->name}}</p>
                                        <p style="font-size: 12px;">{{$userchat->status}}</p>
                                    </div>
    
                                </div>
                            </div>

                            <div class="content-chat">
                                
                            </div>
                            <div class="d-flex flex-column justify-content-end pt-3" >
                                <form method="POST" action="/sendmessage" enctype="multipart/form-data" id="submitmessage">
                                    @csrf
                                    <input type="hidden" name="destinationid" value="{{$userchat->id}}">
                                    <div class="d-flex justify-content-center" >
                                        <div class="d-flex" style="border: 0; background-color:transparent; border-radius: 7px; width: 85%; height: 40px;">
                                            <input type="text" class="form-control me-2 message" id="message" name="message" placeholder="Kirim Pesan" style="border-radius: 0; background-color:transparent; border: 1px solid black;">
                                            <button type="submit" class="btn" style="border: 1px solid black; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                                                <img src="{{URL::asset('sendicon.png')}}" class="" style="height: 20px;">
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="PemasokID" style="display: none;">{{$userchat->id}}</div>
                            <div class="UMKMID" style="display: none;">{{auth()->user()->id}}</div>
                        </div>
                        @endif
                        </div>
                    </div>
                @elseif(auth()->user()->role_id == 2)
                <div class="d-flex justify-content-center">
                        <div class="content_tambahbarang mt-5 d-flex" style="height: 500px; width: 85%; background-color: #F4F4F4; border-radius: 25px;" >
                        <div class="chat pe-4 ps-4" style="width: 30%; height: 100%; border-radius: 25px 0 0 25px; border-right: 1px solid black;">
                            <div class="title__chat d-flex pt-4">
                                <div class="pe-3">
                                    <p style="font-size: 20px; font-weight: bold;">Pesan Masuk</p>
                                </div>
                                <div class="pt-1">
                                    <img src="{{URL::asset('chat.png')}}" class="" style="height: 25px;">
                                </div>
                            </div>
                            <div class="pesanAllMasuk">
                                
                            </div>
                        </div>

                        @if($id == 0)
                        <div class="d-flex flex-column justify-content-center" style="width: 100%; align-items: center;">
                            <div class="iconmessage">
                                <div class="d-flex justify-content-center">
                                    <img src="{{URL::asset('chaticon.png')}}" alt="" style="height: 60px;">
                                </div>
                                <p style="font-size: 16pt;">Mulai Chat</p>
                            </div>
                        </div>
                        <div class="PemasokID" style="display: none;">0</div>
                        <div class="UMKMID" style="display: none;">0</div>
                        @elseif($id != 0)
                        <div style="width: 70%;">
                            <div class="d-flex justify-content-center" style="width: 100%; border-radius: 0 25px 0 0; background-color: #D7CAA0; height: 55px;">
                                <div class="content__chat d-flex" style="border: 0px; width: 80%;">
                                    <div class="pe-2">
                                        <img src="{{URL::asset('akun.png')}}" alt="" style="height: 50px;"> 
                                    </div>
    
                                    <div class="d-flex flex-column justify-content-center pt-3">
                                        <p style="font-size: 16px; font-weight: bold; margin-bottom: -1px;">{{$userchat->name}}</p>
                                        <p style="font-size: 12px;">{{$userchat->status}}</p>
                                    </div>
    
                                </div>
                            </div>

                            <div class="content-chat">
                                
                            </div>
                            <div class="d-flex flex-column justify-content-end pt-3" >
                                <form method="POST" action="/sendmessage" enctype="multipart/form-data" id="submitmessage">
                                    @csrf
                                    <input type="hidden" name="destinationid" value="{{$userchat->id}}">
                                    <div class="d-flex justify-content-center" >
                                        <div class="d-flex" style="border: 0; background-color:transparent; border-radius: 7px; width: 85%; height: 40px;">
                                            <input type="text" class="form-control me-2 message" id="message" name="message" placeholder="Kirim Pesan" style="border-radius: 0; background-color:transparent; border: 1px solid black;">
                                            <button type="submit" class="btn" style="border: 1px solid black; border-radius: 0 7px 7px 0; background-color: #D7CAA0;">
                                                <img src="{{URL::asset('sendicon.png')}}" class="" style="height: 20px;">
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="PemasokID" style="display: none;">{{auth()->user()->id}}</div>
                            <div class="UMKMID" style="display: none;">{{$userchat->id}}<</div>
                        </div>
                        @endif
                        </div>
                    </div>
                @endif
@endsection -->
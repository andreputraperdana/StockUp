@extends('template')

@section('javascript')
<script defer src="laporan.js"></script>
@endsection

@section('content')
        <div class="atas d-flex justify-content-between" style="width:100%">
                        <div class="atas_kiri">
                            <div class="judul_halaman mt-5">
                                <p style="font-size: 30px; font-weight: bold;">Laporan</p>
                            </div>
                        </div>

                        <div class="atas_kanan d-flex  mt-5">
                            <div class="pe-2 mt-2" style="width: 60px; height: 60px;">
                                <div class="notifikasi d-flex justify-content-center pt-2" style="background-color: #f4f4f4; height: 75%; width: 100%; border-radius: 50%;">
                                        <img src="{{URL::asset('chat.png')}}" class="" style="height: 29px;">
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
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <input type="submit" class="btn prevbutton" value="Logout">
                                    </form>
                                </div>
                            </div>

                        </div>
        </div>


                    <div class="content_tambahbarang mt-5" style="height: 780px; width: 100%; background-color: #F4F4F4; border-radius: 25px;" >
                       <div class="d-flex justify-content-center pt-5" style="width: 100%;">
                           <div class="laporan d-flex justify-content-between" style="width: 90%;">
                                   <div class="content_left_laporan" style="width: 40%;">
                                       <div class="input_content_jenisbarang mt-3">
                                               <div class="input_judul_jenisbarang">
                                                   <label for="">
                                                       <p style="font-size: 16px; font-weight: bold;">Jenis Laporan</p>
                                                   </label> 
                                               </div>
                                               <div class="daftar_profil_kanan_kategori mb-3">
                                                   <select name="kategori" class="kategori p-2" style="color: #626262; border-radius: 5px;">
                                                       <option value="javascript">Makanan Beku</option>
                                                       <option value="php">Makanan Instant</option>
                                                       <option value="java">Bahan Beku</option>
                                                       <option value="golang">ALat Tulis</option>
                                                       <option value="python">Baju</option>
                                                       <option value="c#">Perabotan Rumah</option>
                                                   </select>
                                               </div>
                                       </div>
   
                                       <div class="input_content_tanggalkadaluarsa mt-3">
                                           <div class="input_judul_tanggalkadaluarsa">
                                               <label for="">
                                                   <p style="font-size: 16px; font-weight: bold;">Dari Tanggal</p>
                                               </label>    
                                           </div>
                                           <div class="input_tanggalkadaluarsa">
                                               <input type="date" class="form-control" id="exampleInputTanggalKadaluarsa1" aria-describedby="emailHelp" placeholder="Tanggal Kadaluarsa" style="border: 1px solid #626262; background-color:transparent;">
                                           </div>
                                       </div>
   
                                       <div class="input_content_tanggalkadaluarsa mt-3">
                                           <div class="input_judul_tanggalkadaluarsa">
                                               <label for="">
                                                   <p style="font-size: 16px; font-weight: bold;">Sampai Tanggal</p>
                                               </label>    
                                           </div>
                                           <div class="input_tanggalkadaluarsa">
                                               <input type="date" class="form-control" id="exampleInputTanggalKadaluarsa1" aria-describedby="emailHelp" placeholder="Tanggal Kadaluarsa" style="border: 1px solid #626262; background-color:transparent;">
                                           </div>
                                       </div>

                                       <div class="button_simpan d-flex justify-content-center pt-4 mt-2">
                                            <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan" style="background-color: #D7CAA0; width: 40%; font-weight: bold; color: black; border-radius: 7px;">Preview</button>
                                        </div>
                                   </div>
                                   <div class="content_right_laporan" style="width: 45%;">
                                       <div class="preview_laporan" style="height: 600px; border:2px solid black; width: 90%;">
   
                                       </div>    
                                       <div class="button_simpan d-flex justify-content-center pt-4 mt-2" style="width: 90%;">
                                            <button type="submit" class="btn btn-primary ps-5 pe-5 " id="btn_simpan" style="background-color: #D7CAA0; width: 60%; border: 2px solid #D7CAA0; font-weight: bold; color: black; border-radius: 7px;"> <img src="{{URL::asset('downloadicon.png')}}" alt="" height="25px">Download PDF</button>
                                        </div>

                                   </div>
                          </div>
                       </div>
                    </div>
        <div style="visibility:hidden">
            <p class="tanda">{{$flag}}</p>
         </div>
@endsection
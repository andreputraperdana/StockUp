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
                                    <form action="/laporanbarang" method="POST">
                                        @csrf
                                       <div class="input_content_jenislaporan mt-3">
                                               <div class="input_judul_jenislaporan">
                                                   <label for="">
                                                       <p style="font-size: 16px; font-weight: bold;">Jenis Laporan</p>
                                                   </label> 
                                               </div>
                                               <div class="daftar_profil_kanan_kategori mb-3">
                                                   <select name="jenislaporan" class="jenislaporan p-2" style="color: #626262; border-radius: 5px;">
                                                       <!-- <option value="javascript">Makanan Beku</option>
                                                       <option value="php">Makanan Instant</option>
                                                       <option value="java">Bahan Beku</option>
                                                       <option value="golang">ALat Tulis</option>
                                                       <option value="python">Baju</option>
                                                       <option value="c#">Perabotan Rumah</option> -->
                                                       <option selected="true" disabled="disabled">Pilih Jenis Laporan</option>
                                                       <option value="Keluar masuk barang">Keluar masuk barang</option>
                                                       <option value="Persediaan stok barang">Persediaan stok barang</option>
                                                       <option value="Barang akan kadaluarsa">Barang akan kadaluarsa</option>
                                                       <option value="Barang akan habis">Barang akan habis</option>
                                                   </select>
                                               </div>
                                       </div>
   
                                       <div class="input_content_tanggalkadaluarsa mt-3">
                                           <div class="input_judul_tanggalawal">
                                               <label for="">
                                                   <p style="font-size: 16px; font-weight: bold;">Dari Tanggal</p>
                                               </label>    
                                           </div>
                                           <div class="input_tanggal">
                                               <input type="date" name="input_tanggalawal" class="form-control input_tanggalawal" id="input_tanggalawal" style="border: 1px solid #626262; background-color:transparent;">
                                           </div>
                                       </div>
   
                                       <div class="input_judul_tanggalakhir mt-3">
                                           <div class="input_judul_tanggalkadaluarsa">
                                               <label for="">
                                                   <p style="font-size: 16px; font-weight: bold;">Sampai Tanggal</p>
                                               </label>    
                                           </div>
                                           <div class="input_tanggal">
                                               <input type="date" name="input_tanggalakhir" class="form-control input_tanggalakhir" id="input_tanggalakhir" style="border: 1px solid #626262; background-color:transparent;">
                                           </div>
                                       </div>

                                       <div class="button_simpan d-flex justify-content-center pt-4 mt-2">
                                            <button type="submit" class="btn btn-primary btn_preview ps-5 pe-5 " id="btn_preview" style="background-color: #D7CAA0; width: 40%; font-weight: bold; color: black; border-radius: 7px;">Preview</button>
                                        </div>                                            
                                    </form>
                                   </div>
                                   <div class="content_right_laporan" style="width: 45%;">
                                       <div class="preview_laporan" style="height: 600px; border:1px solid black; width: 95%; background-color: white;">
                                            <div class="logo_laporan d-flex justify-content-end pt-3 pe-3">
                                                <h5 style="font-weight: 1000;">STOCKUP</h5>
                                            </div>
                                            <div class="judul_laporan text-center pt-4">
                                                <div class="judul_1" style="font-weight: bold;">
                                                    <h4>Laporan</h4>
                                                </div>
                                                <div class="judul_2">
                                                    <!-- <h5>Keluar Masuk Barang</h5> -->
                                                </div>
                                                <div class="judul_3">
                                                    <!-- <p style="font-size: 9pt;">Periode: 15-08-2022 / 19-08-2022</p> -->
                                                </div>
                                            </div>
                                            <div class="isi_laporan d-flex justify-content-center pt-2">
                                                <div class="isi_laporanbarangkadaluarsa" style="display: none;">
                                                <table class="table table-bordered" style="width: 90%;">
                                                    <thead>
                                                      <tr>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;">ID Barang</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;">Tanggal Masuk Barang</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Nama Barang</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Tanggal Kadaluarsa</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang</td>
                                                      </tr>
                                                    </thead>
                                                    <tbody class="content_laporanbarangkadaluarsa">
                                                    </tbody>
                                                </table>
                                                </div>
                                                <div class="isi_laporanbaranghabis" style="display: none;">
                                                <table class="table table-bordered" style="width: 90%;">
                                                    <thead>
                                                      <tr>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;">ID Barang</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Nama Barang</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang</td>
                                                      </tr>
                                                    </thead>
                                                    <tbody class="content_laporanbaranghabis">
                                                    </tbody>
                                                </table>
                                                </div>
                                                <div class="isi_laporankeluarmasukbarang"  style="display: none;" style="display: 50%;">
                                                <table class="table table-bordered" style="width: 90%; font-size: 5pt;">
                                                    <thead>
                                                      <tr>
                                                        <td scope="col" rowspan="2" style="opacity: 0.6; font-weight: bold;">ID Barang</td>
                                                        <td scope="col" rowspan="2" style="opacity: 0.6; font-weight: bold;" class="text-center">Nama Barang</td>
                                                        <td scope="col" rowspan="2" style="opacity: 0.6; font-weight: bold;" class="text-center">Stock Awal</td>
                                                        <td scope="col" colspan="4" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah Barang</td>
                                                        <td scope="col" rowspan="2" style="opacity: 0.6; font-weight: bold;" class="text-center">Stock Akhir</td>
                                                      </tr>
                                                      <tr>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Masuk</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Tanggal Masuk</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Keluar</td>
                                                        <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Tanggal Keluar</td>
                                                      </tr>
                                                    </thead>
                                                    <tbody class="content_laporankeluarmasukbarang">

                                                    </tbody>
                                                </table>
                                                </div>

                                            </div>
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
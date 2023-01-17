<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="/notifikasifilter.js"></script>
    
</head>
<body>
    @if($jenis == 2) 
            @foreach($Allbarang as $AllBarang)
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
                @endforeach
                <div class="d-flex justify-content-center">
                    {{$Allbarang->links()}}
                </div>
        @elseif($jenis == 1)
            @foreach($Allbarang as $AllBarang)
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
                    @endforeach
                    <div class="d-flex justify-content-center">
                    {{$Allbarang->links()}}
                    </div>
        @elseif($jenis == 3)
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
        @endif
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>
</html>

        
@foreach($hasil as $hasil)
    <div class="resp-table-row mb-3 p-3" style="font-size: 16px; border-radius: 7px; background-color: #C7E0BC;"> 
        <div class="d-flex">
            <div class="center" style="width: 20%;">
                {{$hasil->id}}
            </div>
            <div class="center" style="width: 20%;">
                {{$hasil->barang_umkm_id}}
            </div>
            <div class="center" style="width: 20%;">
                {{$hasil->jumlah}}
            </div>
            <div class="center" style="width: 20%;">
                {{$hasil->harga}}
            </div>
            <div class="center" style="width: 20%;">
                {{$hasil->tanggal_kadaluarsa}}
            </div>
            <div class="center">
                <div class="d-flex">
                <form action="{{route('barang.destroy', $hasil->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;" onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus Barang Ini?')"><img src="{{URL::asset('trash.png')}}" alt="" style="height: 25px;"></button>   
                </form>
                    <button class="btn__edit me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> <a href="/editbarang/{{$hasil->id}}"><img src="{{URL::asset('editicon.png')}}" alt="" style="height: 25px; transform: rotate(0deg); transition: all 0.5s;"></a></button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
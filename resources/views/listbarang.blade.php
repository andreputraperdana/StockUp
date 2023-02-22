@php
    $total = 0;
@endphp

@foreach ($hasil as $hasil)
    @php
        $total += 1;
    @endphp
    <div class="resp-table-row mb-3 p-3" style="font-size: 16px; border-radius: 7px; background-color: #C7E0BC;">
        <div class="d-flex">
            <div class="center" style="width: 17vw;">
                00{{ $hasil->barang_umkm_id }} - 00{{ $hasil->id }}
            </div>
            <div class="center" style="width: 18vw;">
                {{ $hasil->jumlah }}
            </div>
            <div class="center" style="width: 18vw; margin-left: 10px;">
                @currency($hasil->harga)
            </div>
            @if (is_null($hasil->tanggal_kadaluarsa))
                <div class="center" style="width: 25vw; margin-right: 30px;">
                    -
                </div>
            @else
                <div class="center" style="width: 25vw; margin-right: 30px;">
                    {{ $hasil->tanggal_kadaluarsa }}
                </div>
            @endif
            <div class="center">
                <div class="d-flex">
                    <!-- <form action="{{ route('barang.destroy', $hasil->id) }}" method="POST">
                    @method('DELETE')
                    @csrf -->
                    <!-- <input type="hidden" name="barang_umkm_id" value="{{ $hasil->barang_umkm_id }}"> -->
                    <button class="btn__delete me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"><img
                            src="{{ URL::asset('trash.png') }}" alt=""
                            onclick="deleteConfirmation( '{{ $hasil->id }}');" style="height: 25px;"></button>
                    <!-- </form> -->
                    <a href="/editbarang/{{ $hasil->id }}">
                        <button class="btn__edit me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;"> 
                            <img src="{{ URL::asset('editicon.png') }}"
                            alt=""
                            style="height: 25px; transform: rotate(0deg); transition: all 0.5s;">    
                        </button>
                    </a>
                    {{-- <form action="/barcode/{{$hasil->id}}" method="POST">
                    <input type="hidden" name="barangKode" value="{{$hasil->barang_umkm_id}} - 00{{$total}}"> --}}
                    <a target="_blank" href="/barcode/{{ $hasil->id }}/{{ $hasil->barang_umkm_id }} - 00{{ $total }}">
                        <button class="btn__edit me-3 p-2 pe-3 ps-3" style="font-size: 16px; font-weight: bold;">Barcode</button>
                    </a>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endforeach

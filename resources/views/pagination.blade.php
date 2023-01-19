@foreach ($AllBarang as $key => $Allbarang)
            {{-- @if (empty($AllBarang->Total)) --}}
                {{-- <form action="/detailnotif" method="POST"> --}}
                    @csrf
                    <div class="list_raja_notif d-flex justify-content-center pt-5">
                        <div class="list_notifikasi d-flex justify-content-center pt-3"
                            style="border: 1px solid black; width: 72%;  border-radius: 7px;">
                            <div class="foto_notif pe-5 pt-4">
                                <img src="\public\image\{{ $Allbarang->BarangUMKM->foto_barang }}" alt=""
                                    style="height: 60px;">
                            </div>
                            <div class="description_notif ps-5">
                                <div class="title_notif">
                                    <p style="font-size: 20px; font-weight: bold;">{{ $Allbarang->BarangUMKM->nama }}</p>
                                </div>
                                @if (empty($Allbarang->Total))
                                <div class="desc_notif">
                                    <p style="font-size: 16px;">Barang hampir kadaluarsa</p>
                                </div>
                                <div class="tanggal_notif">
                                    <p style="font-size: 16px;">Tanggal Kadaluarsa Barang:
                                        {{ $Allbarang->tanggal_kadaluarsa }}</p>
                                </div>
                                <input type="hidden" name="id_barang" class="id_barang_{{ $Allbarang->id}}" value="{{ $Allbarang->id}}">
                                <input type="hidden" name="tipe_notif" class="tipe_notif_{{ $Allbarang->id}}" value={{!empty($Allbarang->Total)  ? "BarangHabis" : "BarangKadaluarsa"}}>
                                @elseif(!empty($Allbarang->Total))
                                <div class="desc_notif">
                                    <p style="font-size: 16px;">Sisa Barang: {{ $Allbarang->Total }}</p>
                                </div>
                                <input type="hidden" name="id_barang" class="id_barang_{{ $Allbarang->barang_umkm_id}}" value="{{ $Allbarang->barang_umkm_id}}">
                                <input type="hidden" name="tipe_notif" class="tipe_notif_{{ $Allbarang->barang_umkm_id}}" value={{!empty($Allbarang->Total)  ? "BarangHabis" : "BarangKadaluarsa"}}>
                                @endif
                            </div>
                            {{-- <input type="hidden" name="id_barang" class="id_barang" value="{{ $AllBarang->id}}">
                            <input type="hidden" name="tipe_notif" class="tipe_notif" value={{!empty($AllBarang->Total) || $jenis ==2 ? "BarangHabis" : "BarangKadaluarsa"}}> --}}
                            <div class="button__rekomen">
                                <div class="button_rekomen_notif ps-5">
                                    <input type="hidden" id="button_notif_val" value="{{$Allbarang->id}}">
                                   
                                    <button type="submit" class="btn btn-primary " id="btn_rekom_notif_{{ $Allbarang->id}}" value="{{!empty($Allbarang->Total) ? $Allbarang -> barang_umkm_id:$Allbarang -> id}}" onclick="onClickDetailBarang(this)"
                                        style="background-color: #D7CAA0; width: 100%; border: none; font-weight: bold; color: black;">Detail
                                        Barang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form>         --}}
        @endforeach
        <div class="d-flex justify-content-center" style="padding-bottom: 30px;">
            {!! $AllBarang->links() !!}
        </div>
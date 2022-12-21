    @php
        $total = 0;
    @endphp
        <div class="popupbarangkeluar d-flex pt-4">
                <div class="daftar_profil_kanan" style="width: 50%">
                    <div class="daftar_profil_kanan_nama pt-3">
                        <p>{{$DetailBarang->get(0)->nama}}</p>
                    </div>
                    <div class="daftar_profil_kanan_jenis pt-3">
                        <p>{{$DetailBarang->get(0)->jenis}}</p>
                    </div>
                </div>
                    <div class="daftar_profil_kanan_id_tanggal mb-3">
                        <select name="listid_tanggal" class="listid_tanggal p-2" style="color: #626262; border-radius: 5px; width: 100%; border: 1px solid #626262; background-color:transparent; transition: all 0.5s;" onchange="outputhasil(this)">
                            @foreach($DetailBarang as $detail)
                                @php
                                    $total +=1 ;
                                @endphp
                                <option value="{{$detail->id}}">{{$detail->barang_umkm_id}}-00{{$total}} / {{$detail->tanggal_kadaluarsa}}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="getdetailvalue">
                         <input type="hidden" value="{{$DetailBarang->get(0)->id}}" name="barangid" class="barangid">
                     </div>
            </div>

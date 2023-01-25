@if ($input == 1)
    <div class="d-flex justify-content-center">
        <table class="table caption-top" style="width: 90%;">
            <thead>
                <tr>
                    <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;">Nama Barang</td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Jenis
                        Barang</td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold; color: black;" class="text-center">Sisa
                        Barang</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($TipeBarang as $Barang_Habis)
                    <tr class="">
                        <td class="pt-4 pb-4">{{ $Barang_Habis->BarangUMKM->nama }}</td>
                        <td class="text-center pt-4 pb-4">{{ $Barang_Habis->BarangUMKM->jenis }}</td>
                        <td class="text-center pt-4 pb-4">{{ $Barang_Habis->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <span class="d-flex justify-content-center">
        {{ $TipeBarang->links() }}
    </span>
@elseif($input == 2)
    <div class="d-flex justify-content-center">
        <table class="table caption-top" style="width: 90%;">
            <thead>
                <tr>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;">Nama Barang</td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jenis Barang
                    </td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Tanggal
                        Kadaluarsa</td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah
                        Barang</td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Status</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($TipeBarang as $Barang_Akan_Kadaluarsa)
                    <tr class="">
                        <td class="pt-4 pb-4">{{ $Barang_Akan_Kadaluarsa->BarangUMKM->nama }}</td>
                        <td class="text-center pt-4 pb-4">{{ $Barang_Akan_Kadaluarsa->BarangUMKM->jenis }}</td>
                        <td class="text-center pt-4 pb-4">{{ $Barang_Akan_Kadaluarsa->tanggal_kadaluarsa }}</td>
                        <td class="text-center pt-4 pb-4">{{ $Barang_Akan_Kadaluarsa->jumlah }}</td>
                        <td class="text-center pt-4 pb-4">
                            @if ($Barang_Akan_Kadaluarsa->Date_Today >= $Barang_Akan_Kadaluarsa->tanggal_kadaluarsa)
                                <p>Kadaluarsa</p>
                            @else
                                <p>Akan kadaluarsa</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <span class="d-flex justify-content-center">
        {{ $TipeBarang->links() }}
    </span>
@elseif($input == 3)
    <div class="d-flex justify-content-center">
        <table class="table caption-top" style="width: 90%;">
            <thead>
                <tr>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;">Nama Barang</td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jenis Barang
                    </td>
                    <td scope="col" style="opacity: 0.6; font-weight: bold;" class="text-center">Jumlah
                        Barang Keluar</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($TipeBarang as $Pengeluran_Per_Hari)
                    <tr class="">
                        <td class="pt-4 pb-4">{{ $Pengeluran_Per_Hari->BarangUMKM->nama }}</td>
                        <td class="text-center pt-4 pb-4">{{ $Pengeluran_Per_Hari->BarangUMKM->jenis }}</td>
                        <td class="text-center pt-4 pb-4">{{ $Pengeluran_Per_Hari->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <span class="d-flex justify-content-center">
        {{ $TipeBarang->links() }}
    </span>
@elseif($input == 4)
    <div class="d-flex justify-content-center" style="width: 100%;">
        @if (!$TipeBarang->isEmpty())
            <table class="table caption-top" style="width: 90%;">
                <thead>
                    <tr>
                        <td scope="col" style="color: black;">Foto Barang</td>
                        <td scope="col" style="color: black;">Nama Barang</td>
                        <td scope="col" style="color: black;" class="text-center">Kuantitas</td>
                        <td scope="col" style="color: black;" class="text-center">Jenis Barang
                        </td>
                        <td scope="col" style="color: black;" class="text-center">Total Batch</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($TipeBarang as $AllItem)
                        <tr class="">
                            <td class="pt-4 pb-4"><img src="\public\image\{{ $AllItem->BarangUMKM->foto_barang }}"
                                    alt="Foto Profil" style="height: 60px;"></td>
                            <td class="pt-4 pb-4">{{ $AllItem->BarangUMKM->nama }}<br><span
                                    style="opacity: 0.6;">00{{ $AllItem->BarangUMKM->id }}</span></td>
                            <td class="text-center pt-4 pb-4">{{ $AllItem->total }}</td>
                            <td class="text-center pt-4 pb-4">{{ $AllItem->BarangUMKM->jenis }}</td>
                            <td class="text-center pt-4 pb-4">{{ $AllItem->totalAll }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="pt-5">
                <div class="d-flex justify-content-center">
                    <img src="{{ URL::asset('emptyicon.png') }}" alt="" height="185px">
                </div>
                <div class="d-flex" style="justify-content: center; align-items:center;">
                    <h4>Barang Kosong</h4>
                </div>
            </div>
        @endif
    </div>
    <span class="d-flex justify-content-center" style="padding-bottom: 25px;">
        {{ $TipeBarang->links() }}
    </span>
@endif

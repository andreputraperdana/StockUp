@section('javascript')
    <script defer src="laporan.js"></script>
@endsection

<!DOCTYPE html>
<html>
<head>
	<title>Laporan {{$jenis}}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5 style="text-transform: capitalize;">Laporan {{$jenis}}</h4>
        <h6>Periode: {{$tanggalawalLaporan}} - {{$tanggalakhirLaporan}}</h6>
	</center>
    
	<table class='table table-bordered'>
        <thead>
            {{-- @if($jenis == "Barang akan kadaluarsa")
			<tr>
				<th>ID Barang</th>
				<th>Tanggal Masuk Barang</th>
				<th>Nama Barang</th>
				<th>Tanggal Kadaluarsa</th>
				<th>Jumlah Barang</th>
			</tr>
            @endif --}}
            <tr>
                @foreach($table_head as $t_head)
                    <td>{{$t_head}}</td>
                @endforeach
            </tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($LaporanBarang as $p)
            <tr>
                @foreach($p as $data)
                    {{-- @if($key != "barang_umkm_id" && $key !="harga" ) --}}
                    <td>{{$data}}</td>
                    {{-- @endif --}}
                    {{-- <td>{{$p->TanggalMasukBarang}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->tanggal_kadaluarsa}}</td>
                    <td>{{$p->jumlah}}</td> --}}
                @endforeach
            </tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>
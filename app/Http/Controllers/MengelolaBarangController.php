<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use App\Models\BarangUMKM;
use App\Models\Role;
use App\Models\TransaksiBarangKeluar;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;
use PhpParser\Node\Expr\Isset_;
use PHPUnit\Framework\Constraint\Count;

class MengelolaBarangController extends Controller
{
    public function getindex()
    {
        $auth = Auth::user();
        $user = $this->CheckUser();
        if($user == 'UMKM'){
            $flag = 4;
            // $AllItems = TransaksiBarangMasuk::groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->get();
            $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->paginate(3);
            if (request('search')) {
                $cari = request('search');
                $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->where('barang_umkm.nama', 'like', "%" . $cari . "%")->paginate(3);
            }
        }else if($user == 'Pemasok'){
            $flag = 4;
            $AllItems = BarangPemasok::all()->where('user_id', '=', $auth->id);
        }

        return view('mengelolabarang', ['flag' => $flag, 'AllItems' => $AllItems]);
    }

    public function destroy($id)
    {
        $auth = Auth::user();
        $user = $this->CheckUser();
        if($user == 'UMKM'){
            $this->DeleteBarangUMKM($id);
            return redirect('mengelolabarang')->with('success', 'Barang Telah Di hapus');
        }else if($user == 'Pemasok'){
            $this->DeleteBarangPemasok($id);
            return redirect('mengelolabarang')->with('success', 'Barang Telah Di hapus');
        }
    }

    public function ajaxData()
    {
        $BarangMasuk = DB::select('select * from transaksi_barang_masuk where barang_umkm_id = 1');
        return response()->json(['BarangMasuk' => $BarangMasuk]);
    }

    public function GetBarangKeluar(Request $request){
        $inputbarangkeluar = $request->all();
        $NewBarangKeluar = new TransaksiBarangKeluar();
        $idTransaksi = $inputbarangkeluar['listid_tanggal'];
        $BarangMasuk = TransaksiBarangMasuk::where('id', '=', $idTransaksi)->first();
        if($inputbarangkeluar['pengeluaran'] == "Manual"){
            $this->GetBarangByID($BarangMasuk, $inputbarangkeluar);
            $this->InsertBarangKeluar($NewBarangKeluar, $BarangMasuk['id'], $inputbarangkeluar);
        }
        else if($inputbarangkeluar['pengeluaran'] == "FIFO"){   
            $BarangUMKMid =  $this->GetBarangMasukPertama($inputbarangkeluar);
        }

        return redirect()->back();
    }

    public function CheckUser(){
        $Check = Role::where('id', '=', auth()->user()->role_id)->first();
        return $Check->name;
    }

    public function DeleteBarangUMKM($id){
        DB::delete('DELETE FROM barang_umkm WHERE id = ?', [$id]);
    }

    public function DeleteBarangPemasok($id){
        DB::delete('DELETE FROM barang_pemasok WHERE id = ?', [$id]);
    }

    public function GetBarangMasukPertama($inputbarangkeluar){
        $BarangUMKMid =  $inputbarangkeluar['barangid'];
        $BarangFIFO = TransaksiBarangMasuk::where('id', '=', $BarangUMKMid)->first();
        $Barang_UMKM = $BarangFIFO['barang_umkm_id'];
        $BarangUMKMAll = TransaksiBarangMasuk::where('barang_umkm_id', '=', $Barang_UMKM)->get();
        $TotalBarang = Count($BarangUMKMAll);
        $JumlahBarang = $inputbarangkeluar['kuantitas'];
        $NewBarangKeluar = new TransaksiBarangKeluar();
        // dd($BarangUMKMAll[1]['jumlah']);
        for($j=0; $j<$TotalBarang; $j++){
            if($JumlahBarang > $BarangUMKMAll[$j]['jumlah']){
                $JumlahBarang -= $BarangUMKMAll[$j]['jumlah'];
                $BarangUMKMAll[$j]['jumlah']  = 0;
                $BarangUMKMAll[$j]->save();
                $this->InsertBarangKeluar($NewBarangKeluar, $BarangUMKMAll[$j]['id'], $BarangUMKMAll[$j]['jumlah']);
            }
            else if($JumlahBarang < $BarangUMKMAll[$j]['jumlah']){
                $BarangUMKMAll[$j]['jumlah'] -= $JumlahBarang;
                $BarangUMKMAll[$j]->save();
                $this->InsertBarangKeluar($NewBarangKeluar, $BarangUMKMAll[$j]['id'], $BarangUMKMAll[$j]['jumlah']);
                break;
            }
        }

    }

    public function InsertBarangKeluar($NewBarangKeluar, $BarangUMKMid, $inputbarangkeluar){
        $NewBarangKeluar['transaksi_barang_masuk_id'] = $BarangUMKMid;
        $NewBarangKeluar['jumlah'] = $inputbarangkeluar;
        $NewBarangKeluar->save();
    }

    public function GetBarangByID($BarangMasuk, $inputbarangkeluar){
        $BarangMasuk['jumlah'] -= $inputbarangkeluar['kuantitas'];
        $BarangMasuk->save();
    }

    public function DeleteTransaksiBarangMasuk($id){
        DB::delete('DELETE FROM transaksi_barang_masuk WHERE id = ?', [$id]);
    }
}

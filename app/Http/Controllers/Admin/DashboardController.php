<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembayaranKredit;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $belum_lunas = Transaksi::where('jenis_pembayaran', 'kredit')->where('status',0)->count();
        $lunas = Transaksi::where('jenis_pembayaran', 'kredit')->where('status',1)->count();

        $now = Carbon::now();
        $seminggu_lalu = Carbon::today()->subWeek();
        $data_pembayaran = Transaksi::whereBetween('tanggal_transaksi', [$seminggu_lalu, $now])
            ->get();
        $bayar = [];
        $tanggal = [];
        foreach ($data_pembayaran as $pembayaran) {
            // $bayar[] = $pembayaran->bayar;
            // $tanggal[] = tanggal($pembayaran->tanggal_bayar);
        }

        $data = DB::table('pembayaran_kredit')
        ->select([
        DB::raw('sum(bayar) as jumlah'),
        DB::raw('EXTRACT(MONTH from tanggal_bayar) as bulan'),
        DB::raw('EXTRACT(YEAR from tanggal_bayar) as tahun')
        ])
        ->groupBy(['bulan','tahun'])
        ->orderBy('tanggal_bayar','asc')
        ->limit(6)
        ->get();
        foreach($data as $item){
        $bayar[] = $item->jumlah;
        $tanggal[] = $item->bulan;
        }
        
        return view('admin.dashboard.index', compact(
            'tanggal',
            'bayar',
            'belum_lunas',
            'lunas',
        ));
    }
}

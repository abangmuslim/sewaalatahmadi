<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PenyewaDashboardController extends Controller
{
    public function index()
    {
        $idpenyewa = session('idpenyewa');

        $riwayat = [];

        if ($idpenyewa) {
            try {
                $riwayat = DB::table('pemesanan')
                    ->where('idpenyewa', $idpenyewa)
                    ->orderByDesc('created_at')
                    ->get();
            } catch (\Exception $e) {
                // kalau tabel belum siap
                $riwayat = [];
            }
        }

        return view('zonaPenyewa.dashboard.Penyewa', compact('riwayat'));
    }
}
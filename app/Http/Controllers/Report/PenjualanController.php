<?php

namespace App\Http\Controllers\Report;

use App\Exports\PenjualanExport;
use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('report.penjualan.index');
    }

    public function print(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        if ($request->action == 'pdf') {
            $checkouts = Checkouts::with('items.product')
                ->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
                ->latest()->get();
            $items = $checkouts->flatMap->items;

            $period = Carbon::parse($tanggal_awal)->translatedFormat('d F Y') . ' - ' . Carbon::parse($tanggal_akhir)->translatedFormat('d F Y');

            $pdf = Pdf::loadView('report.penjualan.printPDF', ['items' => $items, 'period' => $period]);
            return $pdf->download('laporan-keuangan.pdf');
        } else {
            return Excel::download(new PenjualanExport($tanggal_awal, $tanggal_akhir), 'laporan-keuangan.xlsx');
        }
    }
}

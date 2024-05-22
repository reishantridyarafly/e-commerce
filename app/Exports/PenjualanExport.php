<?php

namespace App\Exports;

use App\Models\Checkouts;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        $checkouts = Checkouts::with('items.product')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->latest()
            ->get();

        $items = $checkouts->flatMap->items;

        $data = collect([]);

        foreach ($items as $item) {
            $data->push([
                'Tanggal' => Carbon::parse($item->created_at)->translatedFormat('l, d F Y'),
                'Produk' => $item->product->nama,
                'Qty' => $item->quantity,
                'Harga' => 'Rp ' . number_format($item->product->harga_jual, 0, ',', '.'),
                'Jumlah' => 'Rp ' . number_format($item->product->harga_jual * $item->quantity, 0, ',', '.'),
            ]);
        }

        $total = $items->sum(function ($item) {
            return $item->product->harga_jual * $item->quantity;
        });

        $data->push([
            'Tanggal' => '',
            'Produk' => '',
            'Qty' => '',
            'Harga' => 'Total',
            'Jumlah' => 'Rp ' . number_format($total, 0, ',', '.'),
        ]);

        return $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Tanggal',
            'Produk',
            'Qty',
            'Harga',
            'Jumlah',
        ];
    }
}

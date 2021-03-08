<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class BarangExport implements FromView
{
    private $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function view(): View
    {
        return view('admin.barang.laporan.excel.all',[
            'data' => $this->results,
        ]);
    }
}

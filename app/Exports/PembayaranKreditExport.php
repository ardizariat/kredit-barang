<?php

namespace App\Exports;

use App\Models\PembayaranKredit;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PembayaranKreditExport implements FromView
{
    private $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function view(): View
    {
        return view('admin.kredit.laporan.excel.all',[
            'data' => $this->results,
        ]);
    }
}

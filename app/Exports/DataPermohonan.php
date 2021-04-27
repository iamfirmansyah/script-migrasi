<?php

namespace App\Exports;

use App\Cabang;
use App\Identitas;
use App\Praktik;
use App\RequestAm;
use App\User;
use Carbon\Carbon;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class DataPermohonan implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // FromQuery ,WithHeadings,ShouldAutoSize,
    use Exportable;
    public function __construct($data)
    {
        $this->datas = $data;
    }

    public function view(): View
    {
        return view('exports.permohonan-str', [
            'datas'     => $this->datas,
        ]);
    }
   
}

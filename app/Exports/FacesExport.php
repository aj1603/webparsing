<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Faces;

class FacesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Faces::select(
            'productcode',
            'name',
            'price',
            'quantity',
            'status',
            'maincat',
            'seccat',
            'language',
            'imgUrl',
            'description',
        )->get();
    }
}

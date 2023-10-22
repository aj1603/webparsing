<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProduct implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::select(
            'productcode',
            'name',
            'price',
            'quantity',
            'status',
            'maincat',
            'seccat',
            'language',
            'description',
            'imgUrl',
            'size',
            'brand'
        )->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use App\Exports\ExportProduct;
use App\Models\Product;

class ProductController extends Controller
{
    public function allproducts(Request $request){
        return view('importproduct');
    }
 
    public function import(Request $request){
        Excel::import(new ImportProduct,
                        $request->file('file')->store('files'));
        return redirect()->back();
    }
    
    public function export(Request $request){
        return Excel::download(new ExportProduct, 'products.xlsx');
    }
}

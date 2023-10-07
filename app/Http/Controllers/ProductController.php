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
    
    // public function export(Request $request){
    //     return Excel::download(new ExportProduct, 'products.xlsx');
    // }

    public function export(Request $request)
    {
        // Set the path to the file
        $file = 'products.xlsx'; // Replace with the actual file path

        // Check if the file exists
        if (Storage::exists($file)) {
            return response()->download(storage_path("app/$file"), 'products.xlsx');
        } else {
            // Handle the case where the file does not exist
            abort(404, 'File not found');
        }
    }

    public function product_all(Request $request){
        return view('productall');
    }

    public function url() {

        
        $client = new Client();
        
        // Specify the URL of the page you want to scrape
        $url = 'https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=21';
        
        // Send a GET request to the URL
        $crawler = $client->request('GET', $url);
        
        // Extract product URLs using CSS selectors
        $productLinks = $crawler->filter('.p-card-chldrn-cntnr.card-border a')->links();
        
        // Loop through the links and display the URLs
        foreach ($productLinks as $link) {
            print_r($link->getUri()) . "<br>";
        }
    }
}

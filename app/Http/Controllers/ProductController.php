<?php

namespace App\Http\Controllers;

use App\Exports\FacesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use App\Exports\ExportProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Goutte\Client;



class ProductController extends Controller
{
    public function allproducts(Request $request)
    {
        return view('importproduct');
    }

    public function import(Request $request)
    {
        Excel::import(
            new ImportProduct,
            $request->file('file')->store('files')
        );
        return redirect()->back();
    }

    public function export(Request $request)
    {
        return Excel::download(new ExportProduct, 'products.xlsx');
    }

    public function exportf(Request $request)
    {
        return Excel::download(new FacesExport, 'productsf.xlsx');
    }

    public function product_all(Request $request)
    {
        $products = DB::select("SELECT * FROM womencoatproducts");
        return view('productall', ['products' => $products]);
    }

    public function delete(Product $product)
    {
        DB::table('products')->delete();
        return "Successfully deleted all products";
    }



    public function url()
    {
        DB::table('productsurl')->delete();
        $client = new Client();
        $urls = [
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=1",
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=2",
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=3",
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=4",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=1",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=2",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=3",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=4",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=1",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=2",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=3",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=4",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=5",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=6",
            "https://www.trendyol.com/mavi-kadin-ceket-x-b43-g1-c1030?pi=1",
            "https://www.trendyol.com/mavi-kadin-ceket-x-b43-g1-c1030?pi=2",
            "https://www.trendyol.com/mavi-kadin-ceket-x-b43-g1-c1030?pi=3",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=1",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=2",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=3",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=4",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=5",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=6",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=7",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=8",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=9",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=10",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=11",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=12",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=13",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=14",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=15",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=16",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=17",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=18",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=19",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=20",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=21",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=1",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=2",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=3",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=4",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=5",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=6",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=7",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=8",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=9",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=10",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=11",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=12",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=13",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=14",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=1",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=2",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=3",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=4",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=5",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=6",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=1",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=2",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=3",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=4",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=5",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=6",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=7",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=8",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=9",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=10",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=11",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=12",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=13",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=14",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=1",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=2",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=3",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=4",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=5",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=6",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=7",
            "https://www.trendyol.com/grimelange-kadin-ceket-x-b110329-g1-c1030",
            "https://www.trendyol.com/asics-kadin-ceket-x-b145479-g1-c1030",
        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $productLinks = $response->filter('.p-card-chldrn-cntnr.card-border a')->links();

            foreach ($productLinks as $link) {
                $linkUrl = $link->getUri();
                $brandspl = explode("/", $linkUrl);
                $brand = $brandspl[3];
                DB::insert("INSERT INTO productsurl (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }
}
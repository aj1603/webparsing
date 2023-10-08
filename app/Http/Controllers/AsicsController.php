<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class AsicsController extends Controller
{
    public function allasics(Request $request){
        $products = DB::select("SELECT * FROM products WHERE brand='Asics'");
        return view('brands/asics', ['products' => $products]);
    }
    
    public function dbasics() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/asics/2011c259-fujitrail-waterproof-jacket-kirmizi-unisex-ceket-p-761555668',
            'https://www.trendyol.com/asics/2012c253-fujitrail-waterproof-jacket-acik-mavi-unisex-ceket-p-761555635',
            'https://www.trendyol.com/asics/fujitrail-waterproof-jacket-kadin-lacivert-ceket-2012c253-400-p-666738535',
        ];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $name = $response->filter('h1.pr-new-br')->each(function ($node) { return $node->text(); });
            $size = $response->filter('.sp-itm')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.prc-dsc')->each(function ($node) { return $node->text(); });
            $image = $response->filter('img')->each(function ($node) { return $node->attr('src'); });
            
            $imgUrl;
            for ($i = 0; $i < count($image); $i++) {
                $surat = explode(".", $image[$i]);
                if ($surat[3] == 'jpg') {
                    $imgUrl = $image[$i];
                    break;
                }
            }
            
            for ($i = 0; $i < count($name); $i++) {
                $fullprice = explode(" ", $price[$i]);
                $floatValue = floatval($fullprice[0]);
                $fullpricee = $floatValue * 0.78;
                
                $product = array(
                    'name' => $name[$i],
                    'price' => $fullpricee,
                    'imgUrl' => $imgUrl,
                    'size' => $size,
                    'brand' => "Asics",
                );
                array_push($products, $product);
            }
        }
        
        $insertData = array();
        foreach ($products as $product) {
            $newprice = $product['price'] < 10 ? $product['price'] * 1000 : $product['price'];
            $insertData[] = [
                'name' => $product['name'],
                'price' => $newprice,
                'imgUrl' => $product['imgUrl'],
                'brand' => $product['brand'],
                'size' => $size[1],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        DB::table('products')->insert($insertData);
        
        $products = DB::select("SELECT * FROM products WHERE brand='Asics'");
        return view('brands/asics', ['products' => $products]);
    }

    public function getasics() {
        $products = DB::select('SELECT * FROM products WHERE brand = "Asics"');
        return $products;
    }

}

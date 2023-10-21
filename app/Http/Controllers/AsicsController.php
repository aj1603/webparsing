<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class AsicsController extends Controller
{
    public function products_1()
    {
        $client = new Client();
        $products = array();
        $productsurls = DB::select("SELECT brands, links FROM productsurl");

        foreach ($productsurls as $row) {
            $url = $row->links;
            $response = $client->request('GET', $url);
            $name = $response->filter('h1.pr-new-br')->each(function ($node) {
                return $node->text();
            });
            $size = $response->filter('.sp-itm')->each(function ($node) {
                return $node->text();
            });
            $price = $response->filter('.prc-dsc')->each(function ($node) {
                return $node->text();
            });
            $image = $response->filter('img')->each(function ($node) {
                return $node->attr('src');
            });

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
                $fullpricee = $floatValue * 0.82;

                $product = array(
                    'name' => $name[$i],
                    'price' => $fullpricee,
                    'imgUrl' => $imgUrl,
                    'size' => $size,
                    'brand' => "Grimelange",
                );
                array_push($products, $product);
            }
        }
        // $insertData = array();
        // foreach ($products as $product) {
        //     $newprice = $product['price'] < 10 ? $product['price'] * 1000 : $product['price'];
        //     $insertData[] = [
        //         'name' => $product['name'],
        //         'price' => $newprice,
        //         'imgUrl' => $product['imgUrl'],
        //         'brand' => $product['brand'],
        //         'size' => $size[1],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // DB::table('products')->insert($insertData);
        return $products;
    }
}
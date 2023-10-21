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
        $code = 1;
        $productsurls = DB::select("SELECT brands, links FROM productsurl");

        foreach ($productsurls as $row) {
            $url = $row->links;
            $brand = $row->brands;
            $response = $client->request('GET', $url);
            $name = $response->filter('h1.pr-new-br')->each(function ($node) {
                return $node->text();
            });
            $esize = $response->filter('.sp-itm')->each(function ($node) {
                return $node->text();
            });
            $nsize = $response->filter('.so.sp-itm')->each(function ($node) {
                return $node->text();
            });
            $price = $response->filter('.prc-dsc')->each(function ($node) {
                return $node->text();
            });
            $image = $response->filter('img')->each(function ($node) {
                return $node->attr('src');
            });
            $stringcode = strval($code);
            $missingSizes = array_diff($esize, $nsize);
            $size = implode('-', $missingSizes);

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
                $turkprice = DB::table('fprice')->where('id', 1)->value('fprice');
                $pricedb = $floatValue * $turkprice;
                $newprice = $pricedb < 10 ? $pricedb * 1000 : $pricedb;
                $product = array(
                    'productCode' => 'turk-parc-' . $stringcode,
                    'name' => $name[$i],
                    'price' => $newprice,
                    'imgUrl' => $imgUrl,
                    'brand' => $brand,
                    'size' => $size,
                );
                array_push($products, $product);
            }
            $code++;
        }
        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'imgUrl' => $product['imgUrl'],
                'brand' => $product['brand'],
                'size' => $product['size'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($insertData);
        return $products;
    }
}
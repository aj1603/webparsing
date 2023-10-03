<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsicsController extends Controller
{
    public function dbasics() {
        $client = new Client();
        $asics = $client->request('GET', 'https://www.trendyol.com/asics-kadin-ceket-x-b145479-g1-c1030');

        $products = array();
        $asics1_name = $asics->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $asics1_price = $asics->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $asics1_image = $asics->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });

        $count = count($asics1_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $asics1_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $asics1_image[$i],
                'name' => $asics1_name[$i],
                'price' => $fullpricee,
                'brand' => "Asics",
            );

            array_push($products, $product);
        }

        foreach ($products as $product) {
            $newprice = 0;
            if ($product['price'] < 10) {
                $newprice = $product['price'] * 1000;
            }
            else {
                $newprice = $product['price'];
            }
            DB::table('products')->insert([
                'imgUrl' => $product['imgUrl'],
                'name' => $product['name'],
                'price' => $newprice,
                'shop' => $product['brand'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return "Sucessfully update";
    }

    public function getasics() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Asics"');
        return $products;
    }

}

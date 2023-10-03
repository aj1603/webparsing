<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PullBearController extends Controller
{

    public function getdata() {
        return 'Salam';
    }

    public function dbpullbear() {
        $client = new Client();
        $pullbear1 = $client->request('GET', 'https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=1');
        $pullbear2 = $client->request('GET', 'https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=2');
        $pullbear3 = $client->request('GET', 'https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=3');

        $products = array();
        $pullbear1_name = $pullbear1->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $pullbear2_name = $pullbear2->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $pullbear3_name = $pullbear3->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $pullbear1_price = $pullbear1->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $pullbear2_price = $pullbear2->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $pullbear3_price = $pullbear3->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $pullbear1_image = $pullbear1->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $pullbear2_image = $pullbear2->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $pullbear3_image = $pullbear3->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });

        $count = count($pullbear1_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $pullbear1_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $pullbear1_image[$i],
                'name' => $pullbear1_name[$i],
                'price' => $fullpricee,
                'brand' => "Pullbear",
            );

            array_push($products, $product);
        }

        $count = count($pullbear2_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $pullbear2_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $pullbear2_image[$i],
                'name' => $pullbear2_name[$i],
                'price' => $fullpricee,
                'brand' => "Pullbear",
            );

            array_push($products, $product);
        }

        $count = count($pullbear3_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $pullbear3_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $pullbear3_image[$i],
                'name' => $pullbear3_name[$i],
                'price' => $fullpricee,
                'brand' => "Pullbear",
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

    public function getpullbear() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Pullbear"');
        return $products;
    }
}

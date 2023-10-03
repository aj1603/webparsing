<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LCWaikikiController extends Controller
{
    public function dbbershka() {
        $client = new Client();
        $bershka1 = $client->request('GET', 'https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=1');
        $bershka2 = $client->request('GET', 'https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=2');
        $bershka3 = $client->request('GET', 'https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=3');
        $bershka4 = $client->request('GET', 'https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=4');

        $products = array();
        $bershka1_name = $bershka1->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $bershka2_name = $bershka2->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $bershka3_name = $bershka3->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $bershka4_name = $bershka4->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $bershka1_price = $bershka1->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $bershka2_price = $bershka2->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $bershka3_price = $bershka3->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $bershka4_price = $bershka4->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $bershka1_image = $bershka1->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $bershka2_image = $bershka2->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $bershka3_image = $bershka3->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $bershka4_image = $bershka4->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });

        $count = count($bershka1_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $bershka1_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $bershka1_image[$i],
                'name' => $bershka1_name[$i],
                'price' => $fullpricee,
                'brand' => "Bershka",
            );

            array_push($products, $product);
        }

        $count = count($bershka2_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $bershka2_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $bershka2_image[$i],
                'name' => $bershka2_name[$i],
                'price' => $fullpricee,
                'brand' => "Bershka",
            );

            array_push($products, $product);
        }

        $count = count($bershka3_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $bershka3_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $bershka3_image[$i],
                'name' => $bershka3_name[$i],
                'price' => $fullpricee,
                'brand' => "Bershka",
            );

            array_push($products, $product);
        }

        $count = count($bershka4_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $bershka4_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $bershka4_image[$i],
                'name' => $bershka4_name[$i],
                'price' => $fullpricee,
                'brand' => "Bershka",
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

    public function getbershka() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Bershka"');
        return $products;
    }

}


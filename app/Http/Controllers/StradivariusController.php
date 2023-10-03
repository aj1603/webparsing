<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StradivariusController extends Controller
{
    public function test() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Stradivarius"');
        return $products;
    }

    public function dbstradivarius() {
        $client = new Client();
        $stradivarius1 = $client->request('GET', 'https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=1');
        $stradivarius2 = $client->request('GET', 'https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=2');
        $stradivarius3 = $client->request('GET', 'https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=3');
        $stradivarius4 = $client->request('GET', 'https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=4');
        $stradivarius5 = $client->request('GET', 'https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=5');
        $stradivarius6 = $client->request('GET', 'https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=6');

        $products = array();
        $stradivarius1_name = $stradivarius1->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $stradivarius2_name = $stradivarius2->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $stradivarius3_name = $stradivarius3->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $stradivarius4_name = $stradivarius4->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $stradivarius5_name = $stradivarius5->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $stradivarius6_name = $stradivarius6->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $stradivarius1_price = $stradivarius1->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $stradivarius2_price = $stradivarius2->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $stradivarius3_price = $stradivarius3->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $stradivarius4_price = $stradivarius4->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $stradivarius5_price = $stradivarius5->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $stradivarius6_price = $stradivarius6->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $stradivarius1_image = $stradivarius1->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $stradivarius2_image = $stradivarius2->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $stradivarius3_image = $stradivarius3->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $stradivarius4_image = $stradivarius4->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $stradivarius5_image = $stradivarius5->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $stradivarius6_image = $stradivarius6->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });

        $count = count($stradivarius1_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $stradivarius1_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $stradivarius1_image[$i],
                'name' => $stradivarius1_name[$i],
                'price' => $fullpricee,
                'brand' => "Stradivarius",
            );

            array_push($products, $product);
        }

        $count = count($stradivarius2_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $stradivarius2_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $stradivarius2_image[$i],
                'name' => $stradivarius2_name[$i],
                'price' => $fullpricee,
                'brand' => "Stradivarius",
            );

            array_push($products, $product);
        }

        $count = count($stradivarius3_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $stradivarius3_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $stradivarius3_image[$i],
                'name' => $stradivarius3_name[$i],
                'price' => $fullpricee,
                'brand' => "Stradivarius",
            );

            array_push($products, $product);
        }

        $count = count($stradivarius4_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $stradivarius4_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $stradivarius4_image[$i],
                'name' => $stradivarius4_name[$i],
                'price' => $fullpricee,
                'brand' => "Stradivarius",
            );

            array_push($products, $product);
        }

        $count = count($stradivarius5_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $stradivarius5_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $stradivarius5_image[$i],
                'name' => $stradivarius5_name[$i],
                'price' => $fullpricee,
                'brand' => "Stradivarius",
            );

            array_push($products, $product);
        }

        $count = count($stradivarius6_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $stradivarius6_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $stradivarius6_image[$i],
                'name' => $stradivarius6_name[$i],
                'price' => $fullpricee,
                'brand' => "Stradivarius",
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

    public function getstradivarius() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Stradivarius"');
        return $products;
    }
}

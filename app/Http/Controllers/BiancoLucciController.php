<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiancoLucciController extends Controller
{
    public function dbbiancolucci() {
        $client = new Client();
        $biancolucci1 = $client->request('GET', 'https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=1');
        $biancolucci2 = $client->request('GET', 'https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=2');
        $biancolucci3 = $client->request('GET', 'https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=3');
        $biancolucci4 = $client->request('GET', 'https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=4');
        $biancolucci5 = $client->request('GET', 'https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=5');
        $biancolucci6 = $client->request('GET', 'https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=6');

        
        $products = array();
        $biancolucci1_name = $biancolucci1->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $biancolucci2_name = $biancolucci2->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $biancolucci3_name = $biancolucci3->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $biancolucci4_name = $biancolucci4->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $biancolucci5_name = $biancolucci5->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $biancolucci6_name = $biancolucci6->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $biancolucci1_price = $biancolucci1->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $biancolucci2_price = $biancolucci2->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $biancolucci3_price = $biancolucci3->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $biancolucci4_price = $biancolucci4->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $biancolucci5_price = $biancolucci5->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $biancolucci6_price = $biancolucci6->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $biancolucci1_image = $biancolucci1->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $biancolucci2_image = $biancolucci2->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $biancolucci3_image = $biancolucci3->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $biancolucci4_image = $biancolucci4->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $biancolucci5_image = $biancolucci5->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $biancolucci6_image = $biancolucci6->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });

        $count = count($biancolucci1_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $biancolucci1_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $biancolucci1_image[$i],
                'name' => $biancolucci1_name[$i],
                'price' => $fullpricee,
                'brand' => "Biancolucci",
            );

            array_push($products, $product);
        }

        $count = count($biancolucci2_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $biancolucci2_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $biancolucci2_image[$i],
                'name' => $biancolucci2_name[$i],
                'price' => $fullpricee,
                'brand' => "Biancolucci",
            );

            array_push($products, $product);
        }

        $count = count($biancolucci3_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $biancolucci3_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $biancolucci3_image[$i],
                'name' => $biancolucci3_name[$i],
                'price' => $fullpricee,
                'brand' => "Biancolucci",
            );

            array_push($products, $product);
        }

        $count = count($biancolucci4_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $biancolucci4_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $biancolucci4_image[$i],
                'name' => $biancolucci4_name[$i],
                'price' => $fullpricee,
                'brand' => "Biancolucci",
            );

            array_push($products, $product);
        }

        $count = count($biancolucci5_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $biancolucci5_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $biancolucci5_image[$i],
                'name' => $biancolucci5_name[$i],
                'price' => $fullpricee,
                'brand' => "Biancolucci",
            );

            array_push($products, $product);
        }

        $count = count($biancolucci6_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $biancolucci6_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $biancolucci6_image[$i],
                'name' => $biancolucci6_name[$i],
                'price' => $fullpricee,
                'brand' => "Biancolucci",
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

    public function getbiancolucci() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Biancolucci"');
        return $products;
    }

}

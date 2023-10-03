<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefactoController extends Controller
{
    public function dbdefacto() {
        $client = new Client();
        $defacto1 = $client->request('GET', 'https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=1');
        $defacto2 = $client->request('GET', 'https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=2');
        $defacto3 = $client->request('GET', 'https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=3');
        $defacto4 = $client->request('GET', 'https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=4');
        $defacto5 = $client->request('GET', 'https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=5');
        $defacto6 = $client->request('GET', 'https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=6');

        $products = array();
        $defacto1_name = $defacto1->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $defacto2_name = $defacto2->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $defacto3_name = $defacto3->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $defacto4_name = $defacto4->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $defacto5_name = $defacto5->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $defacto6_name = $defacto6->filter('.prdct-desc-cntnr-name')->each(function ($node) {
            return $node->text();
        });
        $defacto1_price = $defacto1->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $defacto2_price = $defacto2->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $defacto3_price = $defacto3->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $defacto4_price = $defacto4->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $defacto5_price = $defacto5->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $defacto6_price = $defacto6->filter('.prc-box-dscntd')->each(function ($node) {
            return $node->text();
        });
        $defacto1_image = $defacto1->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $defacto2_image = $defacto2->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $defacto3_image = $defacto3->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $defacto4_image = $defacto4->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $defacto5_image = $defacto5->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });
        $defacto6_image = $defacto6->filter('img.p-card-img')->each(function ($node) {
            return $node->attr('src');
        });

        $count = count($defacto1_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $defacto1_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $defacto1_image[$i],
                'name' => $defacto1_name[$i],
                'price' => $fullpricee,
                'brand' => "Defacto",
            );

            array_push($products, $product);
        }

        $count = count($defacto2_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $defacto2_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $defacto2_image[$i],
                'name' => $defacto2_name[$i],
                'price' => $fullpricee,
                'brand' => "Defacto",
            );

            array_push($products, $product);
        }

        $count = count($defacto3_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $defacto3_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $defacto3_image[$i],
                'name' => $defacto3_name[$i],
                'price' => $fullpricee,
                'brand' => "Defacto",
            );

            array_push($products, $product);
        }

        $count = count($defacto4_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $defacto4_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $defacto4_image[$i],
                'name' => $defacto4_name[$i],
                'price' => $fullpricee,
                'brand' => "Defacto",
            );

            array_push($products, $product);
        }

        $count = count($defacto5_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $defacto5_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $defacto5_image[$i],
                'name' => $defacto5_name[$i],
                'price' => $fullpricee,
                'brand' => "Defacto",
            );

            array_push($products, $product);
        }

        $count = count($defacto6_name);
        for ($i = 0; $i < $count; $i++) {
            $fullprice = explode(" ", $defacto6_price[$i]);
            $floatValue = floatval($fullprice[0]);
            $fullpricee = $floatValue * 0.78;
            $product = array(
                'imgUrl' => $defacto6_image[$i],
                'name' => $defacto6_name[$i],
                'price' => $fullpricee,
                'brand' => "Defacto",
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

    public function getdefacto() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Defacto"');
        return $products;
    }

}

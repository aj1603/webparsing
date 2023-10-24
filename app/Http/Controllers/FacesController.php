<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class FacesController extends Controller
{
    public function faces1()
    {
        $client = new Client();
        echo ("HI");

        $urls = [
            'https://www.faces.com/ae-en/haircare?sz=647',
        ];

        $products = [];

        $code = 6500;

        // $last = DB::select('select productCode from facestables order by id desc limit 1');
        // $lastcode = explode("-", $last[['productCode']]);
        // // echo($lastcode);
        // return $last;

        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('money')->where('id', 2)->value('money');
                $price = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price * $uaeprice;

                $product = [
                    'productCode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'mainCategory' => 'Gerekli Global',
                    'secCategory' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
                    'language' => 'ru',
                    'imgUrl' => $image,
                    'description' => "Цена товара может меняться за счет коэффицента и дополнительных затрат.",
                ];

                $products[] = $product;

                $code++;
            });
        }

        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'productCode' => $product['productCode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'mainCategory' => $product['mainCategory'],
                'secCategory' => $product['secCategory'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('facestables')->insert($insertData);

        $products = DB::select("SELECT * FROM facestables");
        return $products;
    }

    public function hairmistdb()
    {
        $client = new Client();
        echo ("HI");

        $urls = [
            'https://www.faces.com/ae-en/fragrance/fragrance_hairmists?sz=40',
            'https://www.faces.com/ae-en/fragrance/niche_fragrance?sz=235',
            'https://www.faces.com/ae-en/fragrance/luxury-perfumes?sz=472',
            'https://www.faces.com/ae-en/fragrance/fragrance_men?sz=745',
        ];

        $products = [];

        $code = 1;

        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('money')->where('id', 2)->value('money');
                $price = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price * $uaeprice;

                $product = [
                    'productCode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'mainCategory' => 'Gerekli Global',
                    'secCategory' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
                    'language' => 'ru',
                    'imgUrl' => $image,
                    'description' => "Цена товара может меняться за счет коэффицента и дополнительных затрат.",
                ];

                $products[] = $product;

                $code++;
            });
        }

        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'productCode' => $product['productCode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'mainCategory' => $product['mainCategory'],
                'secCategory' => $product['secCategory'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('facestables')->insert($insertData);

        $products = DB::select("SELECT * FROM facestables");
        return $products;
    }

    public function makeupdb()
    {
        $client = new Client();
        echo ("HI");

        $urls = [
            'https://www.faces.com/ae-en/makeup?sz=1285',
        ];

        $products = [];

        $code = 5000;

        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('money')->where('id', 2)->value('money');
                $price = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price * $uaeprice;

                $product = [
                    'productCode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'mainCategory' => 'Gerekli Global',
                    'secCategory' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
                    'language' => 'ru',
                    'imgUrl' => $image,
                    'description' => "Цена товара может меняться за счет коэффицента и дополнительных затрат.",
                ];

                $products[] = $product;

                $code++;
            });
        }

        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'productCode' => $product['productCode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'mainCategory' => $product['mainCategory'],
                'secCategory' => $product['secCategory'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('facestables')->insert($insertData);

        $products = DB::select("SELECT * FROM facestables");
        return $products;
    }

    public function privatedb()
    {
        $client = new Client();

        $urls = [
            'https://www.faces.com/ae-en/fragrance/fragrance_women?sz=955',
            'https://www.faces.com/ae-en/fragrance/private_collection?sz=124',
            'https://www.faces.com/ae-en/fragrance/fragrance_oud'
        ];

        $products = [];

        $code = 2500;

        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);

                $uaeprice = DB::table('money')->where('id', 2)->value('money');
                $price = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price * $uaeprice;

                $product = [
                    'productCode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'mainCategory' => 'Gerekli Global',
                    'secCategory' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
                    'language' => 'ru',
                    'imgUrl' => $image,
                    'description' => "Цена товара может меняться за счет коэффицента и дополнительных затрат.",
                ];

                $products[] = $product;

                $code++;
            });
        }

        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'productCode' => $product['productCode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'mainCategory' => $product['mainCategory'],
                'secCategory' => $product['secCategory'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('facestables')->insert($insertData);

        $products = DB::select("SELECT * FROM facestables");
        return $products;
    }

    public function skincaredb()
    {
        $client = new Client();
        echo ("HI");

        $urls = [
            'https://www.faces.com/ae-en/skincare?sz=2519',
        ];

        $products = [];

        $code = 1;

        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('money')->where('id', 2)->value('money');
                $price = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price * $uaeprice;

                $product = [
                    'productCode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'mainCategory' => 'Gerekli Global',
                    'secCategory' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
                    'language' => 'ru',
                    'imgUrl' => $image,
                    'description' => "Цена товара может меняться за счет коэффицента и дополнительных затрат.",
                ];

                $products[] = $product;

                $code++;
            });
        }

        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'productCode' => $product['productCode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'mainCategory' => $product['mainCategory'],
                'secCategory' => $product['secCategory'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('facestables')->insert($insertData);

        $products = DB::select("SELECT * FROM facestables");
        return $products;
    }
}

<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class FacesController extends Controller
{
    public function haircaredb()
    {
        $client = new Client();
        $urls = [
            'https://www.faces.com/ae-en/haircare?sz=647',
        ];
        $code = 1;
        $products = [];
        DB::table('faces')->delete();

        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('fprice')->where('id', 2)->value('fprice');
                $price1 = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price1 * $uaeprice;

                $product = [
                    'productcode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'maincat' => 'Gerekli Global',
                    'seccat' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
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
                'productcode' => $product['productcode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'maincat' => $product['maincat'],
                'seccat' => $product['seccat'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('faces')->insert($insertData);
        return $products;
    }

    public function hairmistdb()
    {
        $client = new Client();
        $code = 1;
        $last = DB::select('select productcode from faces order by id desc limit 1');
        $firstProduct = $last[0];
        $productCode = $firstProduct->productcode;
        $parts = explode('-', $productCode);
        $number = (int) $parts[2];
        if ($number > 1) {
            $code = $number + 1;
        }

        $urls = [
            'https://www.faces.com/ae-en/fragrance/fragrance_hairmists?sz=40',
            'https://www.faces.com/ae-en/fragrance/niche_fragrance?sz=235',
            'https://www.faces.com/ae-en/fragrance/luxury-perfumes?sz=472',
            'https://www.faces.com/ae-en/fragrance/fragrance_men?sz=745',
        ];

        $products = [];
        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('fprice')->where('id', 2)->value('fprice');
                $price1 = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price1 * $uaeprice;

                $product = [
                    'productcode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'maincat' => 'Gerekli Global',
                    'seccat' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
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
                'productcode' => $product['productcode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'maincat' => $product['maincat'],
                'seccat' => $product['seccat'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('faces')->insert($insertData);

        return $products;
    }

    public function makeupdb()
    {
        $client = new Client();
        $code = 1;
        $last = DB::select('select productcode from faces order by id desc limit 1');
        $firstProduct = $last[0];
        $productCode = $firstProduct->productcode;
        $parts = explode('-', $productCode);
        $number = (int) $parts[2];
        if ($number > 1) {
            $code = $number + 1;
        }

        $urls = [
            'https://www.faces.com/ae-en/makeup?sz=1285',
        ];

        $products = [];
        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('fprice')->where('id', 2)->value('fprice');
                $price1 = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price1 * $uaeprice;

                $product = [
                    'productcode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'maincat' => 'Gerekli Global',
                    'seccat' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
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
                'productcode' => $product['productcode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'maincat' => $product['maincat'],
                'seccat' => $product['seccat'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('faces')->insert($insertData);

        return $products;
    }
    public function privatedb()
    {
        $client = new Client();
        $code = 1;
        $last = DB::select('select productcode from faces order by id desc limit 1');
        $firstProduct = $last[0];
        $productCode = $firstProduct->productcode;
        $parts = explode('-', $productCode);
        $number = (int) $parts[2];
        if ($number > 1) {
            $code = $number + 1;
        }

        $urls = [
            'https://www.faces.com/ae-en/fragrance/fragrance_women?sz=955',
            'https://www.faces.com/ae-en/fragrance/private_collection?sz=124',
            'https://www.faces.com/ae-en/fragrance/fragrance_oud',
        ];

        $products = [];
        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('fprice')->where('id', 2)->value('fprice');
                $price1 = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price1 * $uaeprice;

                $product = [
                    'productcode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'maincat' => 'Gerekli Global',
                    'seccat' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
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
                'productcode' => $product['productcode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'maincat' => $product['maincat'],
                'seccat' => $product['seccat'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('faces')->insert($insertData);

        return $products;
    }
    public function skincaredb()
    {
        $client = new Client();
        $code = 1;
        $last = DB::select('select productcode from faces order by id desc limit 1');
        $firstProduct = $last[0];
        $productCode = $firstProduct->productcode;
        $parts = explode('-', $productCode);
        $number = (int) $parts[2];
        if ($number > 1) {
            $code = $number + 1;
        }

        $urls = [
            'https://www.faces.com/ae-en/skincare?sz=2519',
        ];

        $products = [];
        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products, &$code) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                $stringcode = strval($code);
                $uaeprice = DB::table('fprice')->where('id', 2)->value('fprice');
                $price1 = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price1 * $uaeprice;

                $product = [
                    'productcode' => 'uae-parc-' . $stringcode,
                    'name' => $name,
                    'price' => $fullprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'maincat' => 'Gerekli Global',
                    'seccat' => 'Gerekli Global///Широкий ассортимент из ОАЭ',
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
                'productcode' => $product['productcode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'status' => $product['status'],
                'maincat' => $product['maincat'],
                'seccat' => $product['seccat'],
                'language' => $product['language'],
                'imgUrl' => $product['imgUrl'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('faces')->insert($insertData);

        return $products;
    }
}
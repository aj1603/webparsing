<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class FacesController extends Controller
{
    public function getFacesProducts(){
        $client = new Client();

        $urls = [
            'https://www.faces.com/ae-en/fragrance/private_collection?sz=123',
        ];

        $products = [];

        foreach ($urls as $url) {
            $crawler = $client->request('GET', $url);

            $productNodes = $crawler->filter('.product-tile');

            $productNodes->each(function ($node) use (&$products) {
                $name = $node->filter('.product-tile-name-text.rtlfix')->text();
                $price = $node->filter('.js-price')->text();
                $image = $node->filter('img.product-tile-image-el.tile-image.js-tile-image')->attr('src');

                // Convert price to a numeric value
                $price = floatval(str_replace(['$', ','], '', $price));
                $fullprice = $price * 6.4;

                $product = [
                    'name' => $name,
                    'price' => $fullprice,
                    'imgUrl' => $image,
                    'size' => 'S', // You can modify this as needed
                    'brand' => 'Dior', // You can modify this as needed
                ];

                $products[] = $product;
            });
        }

        return $products;
    }


    public function getfaces() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.faces.com/ae-en/fragrance/private_collection?sz=123',];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $names = $response->filter('.product-tile-name-text.rtlfix')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.js-price')->each(function ($node) { return $node->text(); });
            $images = $response->filter('img.product-tile-image-el.tile-image.js-tile-image')->each(function ($node) { return $node->attr('src'); });


            for ($i = 0; $i < count($price); $i++) {
                $fullprice = explode(" ", $price[$i]);
                $floatValue = floatval($fullprice[0]);
                $fullpricee = $floatValue * 6.4;
                
                for ($name=0; $name<count($names); $name++) {
                    for ($image=0; $image<count($images); $image++) {
                        $product = array(
                            'name' => $name,
                            'price' => $fullpricee,
                            'imgUrl' => $image,
                            'size' => 'S',
                            'brand' => 'Dior',
                        );
                        array_push($products, $product);
                    }
                }
            }
        }
        
        $insertData = array();
        foreach ($products as $product) {
            $newprice = $product['price'] < 10 ? $product['price'] * 1000 : $product['price'];
            $insertData[] = [
                'name' => $product['name'],
                'price' => $newprice,
                'imgUrl' => $product['imgUrl'],
                'brand' => $product['brand'],
                'size' => $product['size'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // DB::table('products')->insert($insertData);
        
        // $products = DB::select("SELECT * FROM products WHERE brand='Asics'");
        return $products;

        }
    }
    


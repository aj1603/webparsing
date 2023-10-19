<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use App\Http\Controllers\FacesController;
use Illuminate\Support\Facades\DB;


class GetFacesProducts extends Command
{

    protected $signature = 'day:update';
    protected $description = 'Fetch Faces products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // info("Every prssso");
        // DB::table('products')->delete();
        $client = new Client();
        echo("HI");

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
        
        DB::table('products')->insert($insertData);
        }
        $this->info('Faces products fetched successfully.');
    }
}
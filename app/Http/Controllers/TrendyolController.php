<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class TrendyolController extends Controller
{
    public function trendyolurl()
    {
        DB::table('productsurl')->delete();
        $client = new Client();
        $urls = [
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=1",
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=2",
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=3",
            "https://www.trendyol.com/bershka-kadin-ceket-x-b486-g1-c1030?pi=4",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=1",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=2",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=3",
            "https://www.trendyol.com/pull-bear-kadin-ceket-x-b592-g1-c1030?pi=4",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=1",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=2",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=3",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=4",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=5",
            "https://www.trendyol.com/stradivarius-kadin-ceket-x-b147-g1-c1030?pi=6",
            "https://www.trendyol.com/mavi-kadin-ceket-x-b43-g1-c1030?pi=1",
            "https://www.trendyol.com/mavi-kadin-ceket-x-b43-g1-c1030?pi=2",
            "https://www.trendyol.com/mavi-kadin-ceket-x-b43-g1-c1030?pi=3",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=1",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=2",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=3",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=4",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=5",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=6",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=7",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=8",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=9",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=10",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=11",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=12",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=13",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=14",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=15",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=16",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=17",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=18",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=19",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=20",
            "https://www.trendyol.com/koton-kadin-ceket-x-b38-g1-c1030?pi=21",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=1",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=2",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=3",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=4",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=5",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=6",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=7",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=8",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=9",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=10",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=11",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=12",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=13",
            "https://www.trendyol.com/mango-kadin-ceket-x-b41-g1-c1030?pi=14",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=1",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=2",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=3",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=4",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=5",
            "https://www.trendyol.com/defacto-kadin-ceket-x-b37-g1-c1030?pi=6",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=1",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=2",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=3",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=4",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=5",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=6",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=7",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=8",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=9",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=10",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=11",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=12",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=13",
            "https://www.trendyol.com/lc-waikiki-kadin-ceket-x-b859-g1-c1030?pi=14",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=1",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=2",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=3",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=4",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=5",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=6",
            "https://www.trendyol.com/bianco-lucci-kadin-ceket-x-b108614-g1-c1030?pi=7",
            "https://www.trendyol.com/grimelange-kadin-ceket-x-b110329-g1-c1030",
            "https://www.trendyol.com/asics-kadin-ceket-x-b145479-g1-c1030",
        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $productLinks = $response->filter('.p-card-chldrn-cntnr.card-border a')->links();

            foreach ($productLinks as $link) {
                $linkUrl = $link->getUri();
                $brandspl = explode("/", $linkUrl);
                $brand = $brandspl[3];
                DB::insert("INSERT INTO productsurl (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }

    public function products(Request $request)
    {
        $batchSize = 200;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $batchSize;
        $code = 1;
        $page2 = (int) $page;
        if ($page2 == 1) {
            DB::table('products')->delete();
        } else {
            $last = DB::select('select productcode from products order by id desc limit 1');
            $firstProduct = $last[0];
            $productCode = $firstProduct->productcode;
            $parts = explode('-', $productCode);
            $number = (int) $parts[2];

            if ($number > 1) {
                $code = $number + 1;
            }
        }
        $client = new Client();
        $products = array();
        $productsurls = DB::table('productsurl')
            ->select('brands', 'links')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        foreach ($productsurls as $row) {
            $url = $row->links;
            $brand = $row->brands;
            $response = $client->request('GET', $url);
            $name = $response->filter('h1.pr-new-br')->each(function ($node) {
                return $node->text();
            });
            $esize = $response->filter('.sp-itm')->each(function ($node) {
                return $node->text();
            });
            $nsize = $response->filter('.so.sp-itm')->each(function ($node) {
                return $node->text();
            });
            $price = $response->filter('.prc-dsc')->each(function ($node) {
                return $node->text();
            });
            $image = $response->filter('img')->each(function ($node) {
                return $node->attr('src');
            });
            $stringcode = strval($code);
            $missingSizes = array_diff($esize, $nsize);
            $size = implode('-', $missingSizes);

            $imgUrl;
            for ($i = 0; $i < count($image); $i++) {
                $surat = explode(".", $image[$i]);
                if ($surat[3] == 'jpg') {
                    $imgUrl = $image[$i];
                    break;
                }
            }

            for ($i = 0; $i < count($name); $i++) {
                $fullprice = explode(" ", $price[$i]);
                $floatValue = floatval($fullprice[0]);
                $turkprice = DB::table('fprice')->where('id', 1)->value('fprice');
                $pricedb = $floatValue * $turkprice;
                $newprice = $pricedb < 10 ? $pricedb * 1000 : $pricedb;
                $product = array(
                    'productcode' => 'turk-parc-' . $stringcode,
                    'name' => $name[$i],
                    'price' => $newprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'maincat' => 'Gerekli Global',
                    'seccat' => 'Gerekli Global///Турецкое качество',
                    'language' => 'ru',
                    'description' => 'Цена товара может меняться за счет коэффицента и дополнительных затрат.',
                    'imgUrl' => $imgUrl,
                    'size' => $size,
                    'brand' => $brand,
                );
                array_push($products, $product);
            }
            $code++;
        }
        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'productcode' => $product['productcode'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1,
                'status' => 'A',
                'maincat' => 'Gerekli Global',
                'seccat' => 'Gerekli Global///Турецкое качество',
                'language' => 'ru',
                'description' => 'Цена товара может меняться за счет коэффицента и дополнительных затрат.',
                'imgUrl' => $product['imgUrl'],
                'size' => $product['size'],
                'brand' => $product['brand'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($insertData);
        $products = DB::table('products')->get();
        return $products;
    }
}

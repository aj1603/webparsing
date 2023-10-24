<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsDB extends Controller
{
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
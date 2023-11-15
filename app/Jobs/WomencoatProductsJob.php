<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class WomencoatProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        $batchSize = 200;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $batchSize;
        $productCode = 0;
        $page2 = (int) $page;
        if ($page2 == 1) {
            DB::table('womencoatproducts')->delete();
        }
        ;

        $client = new Client();
        $products = array();
        $womencoaturls = DB::table('womencoaturl')
            ->select('brands', 'links')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        foreach ($womencoaturls as $row) {
            $url = $row->links;
            echo ($url);
            $regex = '/-p-(\d+)\?/';
            preg_match($regex, $url, $matches);
            $productCode = $matches[1] ?? null;
            if ($productCode == null) {
                $urlParts = parse_url($url);
                if (isset($urlParts['path'])) {
                    $splitslesh = explode('/', $urlParts['path']);
                    $lastSegment = end($splitslesh);
                    $splitminus = explode('-', $lastSegment);
                    $productCode = end($splitminus);
                }
            }
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
            $missingSizes = array_diff($esize, $nsize);
            $size = implode('-', $missingSizes);

            $imgUrl;
            for ($i = 0; $i < count($image); $i++) {
                $surat = explode(".", $image[$i]);
                if ($surat[3] == 'jpg') {
                    $imgUrl = $image[$i];
                }
            }

            for ($i = 0; $i < count($name); $i++) {
                $fullprice = explode(" ", $price[$i]);
                $floatValue = floatval($fullprice[0]);
                $turkprice = DB::table('fprices')->where('id', 1)->value('fprice');
                $pricedb = $floatValue * $turkprice;
                $newprice = $pricedb < 10 ? $pricedb * 1000 : $pricedb;
                $product = array(
                    'productcode' => 'turk-parc-' . $productCode,
                    'name' => $name[$i],
                    'orginalprice' => $floatValue,
                    'price' => $newprice,
                    'quantity' => 1,
                    'status' => 'A',
                    'maincat' => 'Gerekli Global///Турецкое качество///Женская верхняя одежда',
                    'seccat' => 'Gerekli Global///Турецкое качество',
                    'language' => 'ru',
                    'description' => 'Цена товара может меняться за счет коэффицента и дополнительных затрат.',
                    'imgUrl' => $imgUrl,
                    'size' => $size,
                    'brand' => $brand,
                );
                array_push($products, $product);
            }
        }
        $insertData = array();
        foreach ($products as $product) {
            $insertData[] = [
                'productcode' => $product['productcode'],
                'name' => $product['name'],
                'orginalprice' => $product['orginalprice'],
                'price' => $product['price'],
                'quantity' => 1,
                'status' => 'A',
                'maincat' => 'Gerekli Global///Турецкое качество///Женская верхняя одежда',
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

        DB::table('womencoatproducts')->insert($insertData);
        $products = DB::table('womencoatproducts')->get();
    }
}

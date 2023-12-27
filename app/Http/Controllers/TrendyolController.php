<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class TrendyolController extends Controller
{
    public function womencoaturl()
    {
        DB::table('womencoaturl')->delete();
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
                DB::insert("INSERT INTO womencoaturl (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }

    public function womencoatproducts(Request $request)
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
        return $products;
    }
    public function pullbearurl()
    {
        DB::table('pullbearurl')->delete();
        $client = new Client();
        $urls = [
            'https://www.trendyol.com/sr?mid=112044&pi=1',
            'https://www.trendyol.com/sr?mid=112044&pi=2',
            'https://www.trendyol.com/sr?mid=112044&pi=3',
            'https://www.trendyol.com/sr?mid=112044&pi=4',
            'https://www.trendyol.com/sr?mid=112044&pi=5',
            'https://www.trendyol.com/sr?mid=112044&pi=6',
            'https://www.trendyol.com/sr?mid=112044&pi=7',
            'https://www.trendyol.com/sr?mid=112044&pi=8',
            'https://www.trendyol.com/sr?mid=112044&pi=9',
            'https://www.trendyol.com/sr?mid=112044&pi=10',
            'https://www.trendyol.com/sr?mid=112044&pi=11',
            'https://www.trendyol.com/sr?mid=112044&pi=12',
            'https://www.trendyol.com/sr?mid=112044&pi=13',
            'https://www.trendyol.com/sr?mid=112044&pi=14',
            'https://www.trendyol.com/sr?mid=112044&pi=15',
            'https://www.trendyol.com/sr?mid=112044&pi=16',
            'https://www.trendyol.com/sr?mid=112044&pi=17',
            'https://www.trendyol.com/sr?mid=112044&pi=18',
            'https://www.trendyol.com/sr?mid=112044&pi=19',
            'https://www.trendyol.com/sr?mid=112044&pi=20',
            'https://www.trendyol.com/sr?mid=112044&pi=21',
            'https://www.trendyol.com/sr?mid=112044&pi=22',
            'https://www.trendyol.com/sr?mid=112044&pi=23',
            'https://www.trendyol.com/sr?mid=112044&pi=24',
            'https://www.trendyol.com/sr?mid=112044&pi=25',
            'https://www.trendyol.com/sr?mid=112044&pi=26',
            'https://www.trendyol.com/sr?mid=112044&pi=27',
            'https://www.trendyol.com/sr?mid=112044&pi=28',
            'https://www.trendyol.com/sr?mid=112044&pi=29',
            'https://www.trendyol.com/sr?mid=112044&pi=30',
            'https://www.trendyol.com/sr?mid=112044&pi=31',
            'https://www.trendyol.com/sr?mid=112044&pi=32',
            'https://www.trendyol.com/sr?mid=112044&pi=33',
            'https://www.trendyol.com/sr?mid=112044&pi=34',
            'https://www.trendyol.com/sr?mid=112044&pi=35',
            'https://www.trendyol.com/sr?mid=112044&pi=36',
            'https://www.trendyol.com/sr?mid=112044&pi=37',
            'https://www.trendyol.com/sr?mid=112044&pi=38',
            'https://www.trendyol.com/sr?mid=112044&pi=39',
            'https://www.trendyol.com/sr?mid=112044&pi=40',
            'https://www.trendyol.com/sr?mid=112044&pi=41',
            'https://www.trendyol.com/sr?mid=112044&pi=42',
            'https://www.trendyol.com/sr?mid=112044&pi=43',
            'https://www.trendyol.com/sr?mid=112044&pi=44',
            'https://www.trendyol.com/sr?mid=112044&pi=45',
            'https://www.trendyol.com/sr?mid=112044&pi=46',
            'https://www.trendyol.com/sr?mid=112044&pi=47',
            'https://www.trendyol.com/sr?mid=112044&pi=48',
            'https://www.trendyol.com/sr?mid=112044&pi=49',
            'https://www.trendyol.com/sr?mid=112044&pi=50',
            'https://www.trendyol.com/sr?mid=112044&pi=51',
            'https://www.trendyol.com/sr?mid=112044&pi=52',
            'https://www.trendyol.com/sr?mid=112044&pi=53',
            'https://www.trendyol.com/sr?mid=112044&pi=54',
            'https://www.trendyol.com/sr?mid=112044&pi=55',
            'https://www.trendyol.com/sr?mid=112044&pi=56',
            'https://www.trendyol.com/sr?mid=112044&pi=57',
            'https://www.trendyol.com/sr?mid=112044&pi=58',
            'https://www.trendyol.com/sr?mid=112044&pi=59',
            'https://www.trendyol.com/sr?mid=112044&pi=60',
            'https://www.trendyol.com/sr?mid=112044&pi=61',
            'https://www.trendyol.com/sr?mid=112044&pi=62',
            'https://www.trendyol.com/sr?mid=112044&pi=63',
            'https://www.trendyol.com/sr?mid=112044&pi=64',
            'https://www.trendyol.com/sr?mid=112044&pi=65',
            'https://www.trendyol.com/sr?mid=112044&pi=66',
            'https://www.trendyol.com/sr?mid=112044&pi=67',
            'https://www.trendyol.com/sr?mid=112044&pi=68',
            'https://www.trendyol.com/sr?mid=112044&pi=69',
            'https://www.trendyol.com/sr?mid=112044&pi=70',
            'https://www.trendyol.com/sr?mid=112044&pi=71',
            'https://www.trendyol.com/sr?mid=112044&pi=72',
            'https://www.trendyol.com/sr?mid=112044&pi=73',
            'https://www.trendyol.com/sr?mid=112044&pi=74',
            'https://www.trendyol.com/sr?mid=112044&pi=75',
            'https://www.trendyol.com/sr?mid=112044&pi=76',
            'https://www.trendyol.com/sr?mid=112044&pi=77',
            'https://www.trendyol.com/sr?mid=112044&pi=78',
            'https://www.trendyol.com/sr?mid=112044&pi=79',
            'https://www.trendyol.com/sr?mid=112044&pi=80',
            'https://www.trendyol.com/sr?mid=112044&pi=81',
            'https://www.trendyol.com/sr?mid=112044&pi=82',
            'https://www.trendyol.com/sr?mid=112044&pi=83',
            'https://www.trendyol.com/sr?mid=112044&pi=84',
            'https://www.trendyol.com/sr?mid=112044&pi=85',
            'https://www.trendyol.com/sr?mid=112044&pi=86',
            'https://www.trendyol.com/sr?mid=112044&pi=87',
            'https://www.trendyol.com/sr?mid=112044&pi=88',
            'https://www.trendyol.com/sr?mid=112044&pi=90',
            'https://www.trendyol.com/sr?mid=112044&pi=91',
            'https://www.trendyol.com/sr?mid=112044&pi=92',
            'https://www.trendyol.com/sr?mid=112044&pi=93',
            'https://www.trendyol.com/sr?mid=112044&pi=94',
            'https://www.trendyol.com/sr?mid=112044&pi=95',
            'https://www.trendyol.com/sr?mid=112044&pi=96',
            'https://www.trendyol.com/sr?mid=112044&pi=97',
            'https://www.trendyol.com/sr?mid=112044&pi=98',
            'https://www.trendyol.com/sr?mid=112044&pi=99',
            'https://www.trendyol.com/sr?mid=112044&pi=100',
            'https://www.trendyol.com/sr?mid=112044&pi=101',
            'https://www.trendyol.com/sr?mid=112044&pi=102',
            'https://www.trendyol.com/sr?mid=112044&pi=103',
            'https://www.trendyol.com/sr?mid=112044&pi=104',
            'https://www.trendyol.com/sr?mid=112044&pi=105',
            'https://www.trendyol.com/sr?mid=112044&pi=106',
            'https://www.trendyol.com/sr?mid=112044&pi=107',
            'https://www.trendyol.com/sr?mid=112044&pi=108',
            'https://www.trendyol.com/sr?mid=112044&pi=109',
            'https://www.trendyol.com/sr?mid=112044&pi=110',
            'https://www.trendyol.com/sr?mid=112044&pi=111',
            'https://www.trendyol.com/sr?mid=112044&pi=112',
            'https://www.trendyol.com/sr?mid=112044&pi=113',
            'https://www.trendyol.com/sr?mid=112044&pi=114',
            'https://www.trendyol.com/sr?mid=112044&pi=115',
            'https://www.trendyol.com/sr?mid=112044&pi=116',
            'https://www.trendyol.com/sr?mid=112044&pi=117',
            'https://www.trendyol.com/sr?mid=112044&pi=118',
            'https://www.trendyol.com/sr?mid=112044&pi=119',
            'https://www.trendyol.com/sr?mid=112044&pi=120',
            'https://www.trendyol.com/sr?mid=112044&pi=121',
            'https://www.trendyol.com/sr?mid=112044&pi=122',
            'https://www.trendyol.com/sr?mid=112044&pi=123',
            'https://www.trendyol.com/sr?mid=112044&pi=124',
            'https://www.trendyol.com/sr?mid=112044&pi=125',
            'https://www.trendyol.com/sr?mid=112044&pi=126',
            'https://www.trendyol.com/sr?mid=112044&pi=127',
            'https://www.trendyol.com/sr?mid=112044&pi=128',
            'https://www.trendyol.com/sr?mid=112044&pi=129',
            'https://www.trendyol.com/sr?mid=112044&pi=130',
            'https://www.trendyol.com/sr?mid=112044&pi=131',
        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $productLinks = $response->filter('.p-card-chldrn-cntnr.card-border a')->links();

            foreach ($productLinks as $link) {
                $linkUrl = $link->getUri();
                // $brandspl = explode("/", $linkUrl);
                $brand = 'Pull & Bear';
                DB::insert("INSERT INTO pullbearurl (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }
    public function pullbearproducts(Request $request)
    {
        $batchSize = 200;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $batchSize;
        $productCode = 0;
        $page2 = (int) $page;
        if ($page2 == 1) {
            DB::table('pullbearproducts')->delete();
        }
        ;

        $client = new Client();
        $products = array();
        $pullbearurls = DB::table('pullbearurl')
            ->select('brands', 'links')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        foreach ($pullbearurls as $row) {
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
                'maincat' => 'Gerekli Global///Турецкое качество///Бестселлеры от Paul & Bear',
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

        DB::table('pullbearproducts')->insert($insertData);
        $products = DB::table('pullbearproducts')->get();
        return $products;
    }


    public function mencoaturl()
    {
        DB::table('mencoaturl')->delete();
        $client = new Client();
        $urls = [
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=1',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=2',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=3',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=4',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=5',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=6',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=7',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=8',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=9',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=10',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=11',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=12',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=13',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=14',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=15',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=16',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=17',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=18',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=19',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=20',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=21',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=22',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=23',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=24',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=25',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=26',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=27',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=28',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=29',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=30',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=31',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=32',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=33',
            'https://www.trendyol.com/erkek-palto-x-g2-c1130?pi=34',
        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $productLinks = $response->filter('.p-card-chldrn-cntnr.card-border a')->links();

            foreach ($productLinks as $link) {
                $linkUrl = $link->getUri();
                $brandspl = explode("/", $linkUrl);
                $brand = $brandspl[3];
                DB::insert("INSERT INTO mencoaturl (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }
    public function mencoatproducts(Request $request)
    {
        $batchSize = 200;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $batchSize;
        $productCode = 0;
        $page2 = (int) $page;
        if ($page2 == 1) {
            DB::table('mencoatproducts')->delete();
        }
        ;

        $client = new Client();
        $products = array();
        $mencoaturls = DB::table('mencoaturl')
            ->select('brands', 'links')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        foreach ($mencoaturls as $row) {
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
                    'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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
                'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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

        DB::table('mencoatproducts')->insert($insertData);
        $products = DB::table('mencoatproducts')->get();
        return $products;
    }

    public function pumaurl1()
    {
        DB::table('pumaurl1')->delete();
        $client = new Client();
        $urls = [
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=1',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=2',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=3',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=4',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=5',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=6',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=7',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=8',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=9',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=10',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=11',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=12',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=13',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=14',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=15',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=16',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=17',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=18',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=19',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=20',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=21',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=22',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=23',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=24',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=25',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=26',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=27',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=28',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=29',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=30',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=31',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=32',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=33',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=34',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=35',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=36',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=37',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=38',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=39',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=40',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=41',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=42',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=43',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=44',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=45',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=46',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=47',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=48',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=49',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=50',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=51',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=52',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=53',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=54',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=55',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=56',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=57',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=58',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=59',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=60',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=61',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=62',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=63',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=64',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=65',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=66',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=67',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=68',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=69',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=70',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=71',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=72',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=73',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=74',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=75',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=76',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=77',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=78',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=79',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=80',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=81',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=82',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=83',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=84',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=85',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=86',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=87',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=88',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=89',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=90',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=91',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=92',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=93',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=94',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=95',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=96',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=97',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=98',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=99',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=100',

        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $productLinks = $response->filter('.p-card-chldrn-cntnr.card-border a')->links();

            foreach ($productLinks as $link) {
                $linkUrl = $link->getUri();
                $brandspl = explode("/", $linkUrl);
                $brand = $brandspl[3];
                DB::insert("INSERT INTO pumaurl1 (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }

    public function pumaproducts1(Request $request)
    {
        $batchSize = 200;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $batchSize;
        $productCode = 0;
        $page2 = (int) $page;
        if ($page2 == 1) {
            DB::table('pumaproducts1')->delete();
        }
        ;

        $client = new Client();
        $products = array();
        $pumaurls = DB::table('pumaurl1')
            ->select('brands', 'links')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        foreach ($pumaurls as $row) {
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
                    'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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
                'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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

        DB::table('pumaproducts1')->insert($insertData);
        $products = DB::table('pumaproducts1')->get();
        return $products;
    }

    public function pumaurl2()
    {
        DB::table('pumaurl2')->delete();
        $client = new Client();
        $urls = [
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=101',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=102',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=103',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=104',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=105',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=106',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=107',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=108',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=109',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=110',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=111',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=112',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=113',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=114',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=115',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=116',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=117',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=118',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=119',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=120',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=121',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=122',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=123',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=124',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=125',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=126',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=127',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=128',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=129',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=130',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=131',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=132',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=133',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=134',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=135',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=136',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=137',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=138',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=139',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=140',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=141',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=142',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=143',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=144',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=145',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=146',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=147',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=148',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=149',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=150',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=151',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=152',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=153',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=154',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=155',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=156',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=157',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=158',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=159',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=160',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=161',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=162',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=163',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=164',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=165',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=166',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=167',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=168',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=169',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=170',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=171',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=172',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=173',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=174',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=175',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=176',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=177',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=178',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=179',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=180',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=181',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=182',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=183',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=184',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=185',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=186',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=187',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=188',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=189',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=190',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=191',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=192',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=193',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=194',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=195',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=196',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=197',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=198',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=199',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=200',

        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $productLinks = $response->filter('.p-card-chldrn-cntnr.card-border a')->links();

            foreach ($productLinks as $link) {
                $linkUrl = $link->getUri();
                $brandspl = explode("/", $linkUrl);
                $brand = $brandspl[3];
                DB::insert("INSERT INTO pumaurl2 (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }

    public function pumaproducts2(Request $request)
    {
        $batchSize = 200;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $batchSize;
        $productCode = 0;
        $page2 = (int) $page;
        if ($page2 == 1) {
            DB::table('pumaproducts2')->delete();
        }
        ;

        $client = new Client();
        $products = array();
        $pumaurls = DB::table('pumaurl2')
            ->select('brands', 'links')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        foreach ($pumaurls as $row) {
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
                    'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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
                'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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

        DB::table('pumaproducts2')->insert($insertData);
        $products = DB::table('pumaproducts2')->get();
        return $products;
    }

    public function pumaurl3()
    {
        DB::table('pumaurl3')->delete();
        $client = new Client();
        $urls = [
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=201',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=202',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=203',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=204',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=205',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=206',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=207',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=208',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=209',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=210',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=211',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=212',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=213',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=214',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=215',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=216',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=217',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=218',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=219',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=220',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=221',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=222',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=223',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=224',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=225',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=226',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=227',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=228',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=229',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=230',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=231',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=232',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=233',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=234',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=235',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=236',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=237',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=238',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=239',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=240',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=241',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=242',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=243',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=244',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=245',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=246',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=247',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=248',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=249',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=250',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=251',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=252',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=253',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=254',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=255',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=256',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=257',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=258',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=259',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=260',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=261',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=262',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=263',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=264',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=265',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=266',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=267',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=268',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=269',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=270',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=271',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=272',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=273',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=274',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=275',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=276',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=277',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=278',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=279',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=280',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=281',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=282',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=283',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=284',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=285',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=286',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=287',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=288',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=289',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=290',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=291',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=292',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=293',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=294',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=295',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=296',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=297',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=298',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=299',
            'https://www.trendyol.com/sr?q=puma&qt=puma&st=puma&os=1&pi=300',
        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $productLinks = $response->filter('.p-card-chldrn-cntnr.card-border a')->links();

            foreach ($productLinks as $link) {
                $linkUrl = $link->getUri();
                $brandspl = explode("/", $linkUrl);
                $brand = $brandspl[3];
                DB::insert("INSERT INTO pumaurl3 (brands, links, created_at, updated_at) VALUES (?, ?, ?, ?)", [$brand, $linkUrl, now(), now()]);
            }
        }
    }

    public function pumaproducts3(Request $request)
    {
        $batchSize = 200;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $batchSize;
        $productCode = 0;
        $page2 = (int) $page;
        if ($page2 == 1) {
            DB::table('pumaproducts3')->delete();
        }
        ;

        $client = new Client();
        $products = array();
        $pumaurls = DB::table('pumaurl3')
            ->select('brands', 'links')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        foreach ($pumaurls as $row) {
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
                    'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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
                'maincat' => 'Gerekli Global///Турецкое качество///Мужская верхняя одежда',
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

        DB::table('pumaproducts3')->insert($insertData);
        $products = DB::table('pumaproducts3')->get();
        return $products;
    }
}
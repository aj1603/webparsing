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
                    break;
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
}
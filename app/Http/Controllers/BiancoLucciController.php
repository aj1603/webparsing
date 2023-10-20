<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class BiancoLucciController extends Controller
{
    public function allbiancolucci(Request $request)
    {
        $products = DB::select("SELECT * FROM products WHERE brand='Biancolucci'");
        return view('brands/biancolucci', ['products' => $products]);
    }

    public function dbbiancolucci()
    {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-gabardin-ceket-p-762208090',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-buyuk-cepli-deri-ceket-p-234660729',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-bomber-ceket-p-765018180',
            'https://www.trendyol.com/bianco-lucci/kadin-nakisli-kot-ceket-p-699202490',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-gabardin-ceket-p-762284844',
            'https://www.trendyol.com/bianco-lucci/kadin-on-ve-arkasi-baskili-ribanali-denim-ceket-p-766746861',
            'https://www.trendyol.com/bianco-lucci/kadin-nakisli-tas-islemeli-kot-ceket-p-712306612',
            'https://www.trendyol.com/bianco-lucci/kadin-etnik-nakis-desenli-gabardin-ceket-p-712287561',
            'https://www.trendyol.com/bianco-lucci/kadin-cebi-ve-arkasi-islemeli-puskullu-gabardin-ceket-p-762248306',
            'https://www.trendyol.com/bianco-lucci/kadin-ribanali-astarli-ceket-p-683447774',
            'https://www.trendyol.com/bianco-lucci/kadin-deri-ve-tas-detayli-kase-ceket-p-767053770',
            'https://www.trendyol.com/bianco-lucci/kadin-beli-lastikli-scuba-krep-bomber-ceket-p-762214769',
            'https://www.trendyol.com/bianco-lucci/kadin-omuz-ve-kol-nakisli-cift-cepli-ceket-p-641322382',
            'https://www.trendyol.com/bianco-lucci/kadin-yakasi-kemerli-lamine-ceket-p-762238068',
            'https://www.trendyol.com/bianco-lucci/kadin-etnik-nakis-desenli-gabardin-ceket-p-767047474',
            'https://www.trendyol.com/bianco-lucci/kadin-kemer-yakali-omuz-detayli-denim-ceket-p-766747699',
            'https://www.trendyol.com/bianco-lucci/kadin-kurklu-ici-astarli-kot-ceket-p-761549821',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-gabardin-ceket-p-762270200',
            'https://www.trendyol.com/bianco-lucci/kadin-etnik-nakis-desenli-gabardin-ceket-p-765049924',
            'https://www.trendyol.com/bianco-lucci/kadin-ucu-puskullu-kol-katlamali-gomlek-p-522877772',
            'https://www.trendyol.com/bianco-lucci/kadin-hakim-yaka-cepleri-fermuarli-denim-ceket-p-766710745',
            'https://www.trendyol.com/bianco-lucci/kadin-dort-dugmeli-ceket-8080-p-269270702',
            'https://www.trendyol.com/bianco-lucci/kadin-etnik-nakis-desenli-gabardin-ceket-p-765056783',
            'https://www.trendyol.com/bianco-lucci/kadin-6-dugmeli-ekose-ceket-3010-p-362512479',
            'https://www.trendyol.com/bianco-lucci/kadin-dugmeli-keten-ceket-p-287412649',
            'https://www.trendyol.com/bianco-lucci/kadin-tas-islemeli-cift-cepli-kase-ceket-p-766711989',
            'https://www.trendyol.com/bianco-lucci/kadin-dort-dugmeli-ceket-8080-p-269286413',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-dugmeli-ceket-p-282458349',
            'https://www.trendyol.com/bianco-lucci/kadin-tas-islemeli-deri-ceket-p-765018700',
            'https://www.trendyol.com/bianco-lucci/kadin-apoletli-balik-sirti-desenli-ceket-p-765133289',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-kase-ceket-p-765017534',
            'https://www.trendyol.com/bianco-lucci/kadin-tas-islemeli-cift-cepli-kase-ceket-p-766644617',
            'https://www.trendyol.com/bianco-lucci/kadin-buyuk-cift-cepli-puskullu-kot-ceket-p-762228380',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-bomber-kumas-deri-ceket-p-762216110',
            'https://www.trendyol.com/bianco-lucci/kadin-deri-ceket-p-348934841',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-dugmeli-ceket-p-282451679',
            'https://www.trendyol.com/bianco-lucci/kadin-polo-yaka-astarli-torba-cepli-ceket-p-682931786',
            'https://www.trendyol.com/bianco-lucci/kadin-yakasi-ve-cebi-tas-islemeli-gabardin-ceket-p-762235353',
            // 'https://www.trendyol.com/bianco-lucci/kadin-cikarilabilir-kapispnlu-dugmeli-ceket-p-766716020',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-dugmeli-ceket-p-762214429',
            'https://www.trendyol.com/bianco-lucci/kadin-tas-puskullu-kanvas-gabardin-ceket-p-674545643',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-bomber-ceket-p-765037769',
            'https://www.trendyol.com/bianco-lucci/kadin-kapitone-desenli-kolej-ceket-p-348934478',
            'https://www.trendyol.com/bianco-lucci/bianco-kadin-puskullu-kot-ceket-p-765017340',
            'https://www.trendyol.com/bianco-lucci/kadin-deri-ceket-p-348934913',
            'https://www.trendyol.com/bianco-lucci/kadin-kruvaze-yaka-multi-desenli-viskon-ceket-p-684036203',
            'https://www.trendyol.com/bianco-lucci/kadin-kolu-buzgulu-blazer-ceket-p-245067746',
            'https://www.trendyol.com/bianco-lucci/kadin-ribanali-astarli-ceket-p-683451550',
            'https://www.trendyol.com/bianco-lucci/kadin-dort-dugmeli-ceket-8080-p-269286772',
            'https://www.trendyol.com/bianco-lucci/kadin-senel-dokuma-ceket-p-377123845',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-fermuarli-deri-ceket-p-87693088',
            'https://www.trendyol.com/bianco-lucci/kadin-beli-lastikli-scuba-krep-bomber-ceket-p-762281727',
            'https://www.trendyol.com/bianco-lucci/kadin-sim-seritli-kruvaze-yaka-4-dugmeli-ceket-p-686033438',
            'https://www.trendyol.com/bianco-lucci/kadin-ekose-desenli-sanel-kumas-ceket-p-766658063',
            'https://www.trendyol.com/bianco-lucci/kadin-tas-islemeli-deri-ceket-p-765017938',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-kase-ceket-p-765017119',
            'https://www.trendyol.com/bianco-lucci/kadin-dugmeli-lamineli-keten-ceket-p-307973604',
            'https://www.trendyol.com/bianco-lucci/kadin-tas-islemeli-deri-ceket-p-765015827',
            'https://www.trendyol.com/bianco-lucci/kadin-6-dugmeli-astarli-borumcuk-ceket-3018-p-371045646',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-ve-omzu-apoletli-baglamali-borumcuk-kumas-ceket-20032-p-378766082',
            'https://www.trendyol.com/bianco-lucci/kadin-ribanali-astarli-ceket-p-683461402',
            'https://www.trendyol.com/bianco-lucci/kadin-garneli-kol-detayli-blazer-ceket-p-679961154',
            'https://www.trendyol.com/bianco-lucci/kadin-iki-dugmeli-keten-ceket-8081-p-269289123',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-cep-detayli-fermuarli-bomber-ceket-p-765270712',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-fermuarli-deri-ceket-p-371042861',
            'https://www.trendyol.com/bianco-lucci/kadin-ucu-puskullu-kol-katlamali-gomlek-p-641809988',
            'https://www.trendyol.com/bianco-lucci/kadin-beli-lastikli-citcitli-deri-bomber-ceket-p-766713415',
            'https://www.trendyol.com/bianco-lucci/kadin-kruvaze-yaka-deri-ceket-1025-p-378768079',
            'https://www.trendyol.com/bianco-lucci/kadin-kucuk-cepli-biker-deri-ceket-2204-p-348934486',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-kimono-p-483699438',
            'https://www.trendyol.com/bianco-lucci/kadin-cakimli-motorcu-deri-ceket-p-765347272',
            'https://www.trendyol.com/bianco-lucci/kadin-tas-islemeli-cift-cepli-kase-ceket-p-766712527',
        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $name = $response->filter('h1.pr-new-br')->each(function ($node) {
                return $node->text();
            });
            $size = $response->filter('.sp-itm')->each(function ($node) {
                return $node->text();
            });
            $price = $response->filter('.prc-dsc')->each(function ($node) {
                return $node->text();
            });
            $image = $response->filter('img')->each(function ($node) {
                return $node->attr('src');
            });

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
                $fullpricee = $floatValue * 0.82;

                $product = array(
                    'name' => $name[$i],
                    'price' => $fullpricee,
                    'imgUrl' => $imgUrl,
                    'size' => $size,
                    'brand' => "Biancolucci",
                );
                array_push($products, $product);
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
                'size' => $size[1],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($insertData);

        $products = DB::select("SELECT * FROM products WHERE brand='Biancolucci'");
        return view('brands/biancolucci', ['products' => $products]);
    }

    public function dbbiancolucci1()
    {
        $client = new Client();
        $products = array();
        $urls = [
            // 'https://www.trendyol.com/bianco-lucci/kadin-ekose-desenli-sanel-kumas-ceket-p-766711229',
            // 'https://www.trendyol.com/bianco-lucci/kadin-beli-lastikli-citcitli-deri-bomber-ceket-p-766710106',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-bomber-ceket-p-765017278',
            'https://www.trendyol.com/bianco-lucci/kadin-fermuarli-gabardin-ceket-2195-p-355654015',
            'https://www.trendyol.com/bianco-lucci/kadin-dugmeli-lamineli-keten-ceket-p-307972145',
            'https://www.trendyol.com/bianco-lucci/kadin-fermuarli-gabardin-ceket-2195-p-355649365',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-bomber-ceket-p-765016299',
            'https://www.trendyol.com/bianco-lucci/kadin-apoletli-onden-kemerli-deri-ceket-p-762235339',
            'https://www.trendyol.com/bianco-lucci/kadin-ucu-puskullu-kol-katlamali-gomlek-p-641816252',
            'https://www.trendyol.com/pd/bianco-lucci/kadin-nakisli-kapitone-ceket-p-767350845',
            'https://www.trendyol.com/pd/bianco-lucci/kadin-yirtik-detayli-denim-ceket-p-767343453',
            'https://www.trendyol.com/bianco-lucci/kadin-deri-ve-tas-detayli-kase-ceket-p-767121729',
            'https://www.trendyol.com/bianco-lucci/kadin-nakisli-kapitone-ceket-p-767050220',
            'https://www.trendyol.com/bianco-lucci/kadin-dort-dugmeli-ceket-8080-p-269289544',
            'https://www.trendyol.com/bianco-lucci/kadin-cepli-deri-ceket-p-348934526',
            'https://www.trendyol.com/bianco-lucci/kadin-borumcuk-kumas-cift-cepli-ceket-4636-p-355654335',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-torba-cepli-nakis-islemeli-ceket-p-641321752',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-247433018',
            'https://www.trendyol.com/bianco-lucci/kadin-iki-buyuk-cepli-crop-gabardin-ceket-2212-p-355654461',
            'https://www.trendyol.com/bianco-lucci/kadin-r-nakisli-ici-kapitone-ceket-2213-p-410130653',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-ve-omzu-apoletli-baglamali-borumcuk-kumas-ceket-20032-p-378768655',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-triko-desenli-ceket-50016-p-378768316',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-247537003',
            'https://www.trendyol.com/bianco-lucci/kadin-m-baskili-kolej-ceket-55386-p-377124562',
            'https://www.trendyol.com/bianco-lucci/kadin-fermuarli-gabardin-ceket-2195-p-355654186',
            'https://www.trendyol.com/bianco-lucci/kadin-garneli-kol-detayli-blazer-ceket-p-664954095',
            'https://www.trendyol.com/bianco-lucci/kadin-ajurlu-krose-bolero-ceket-p-282457133',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-247427701',
            'https://www.trendyol.com/bianco-lucci/kadin-tek-dugmeli-blazer-ceket-p-287419601',
            'https://www.trendyol.com/bianco-lucci/kadin-garneli-kol-detayli-blazer-ceket-p-680386688',
            'https://www.trendyol.com/bianco-lucci/kadin-garneli-kol-detayli-blazer-ceket-p-665009111',
            'https://www.trendyol.com/bianco-lucci/kadin-garneli-kol-detayli-blazer-ceket-p-664942070',
            'https://www.trendyol.com/bianco-lucci/kadin-fermuarli-gabardin-ceket-2195-p-355654409',
            'https://www.trendyol.com/bianco-lucci/kadin-fermuarli-gabardin-ceket-2195-p-355653924',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-247433752',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-247429380',
            'https://www.trendyol.com/bianco-lucci/kadin-fermuarli-gabardin-ceket-2195-p-355654426',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-247987318',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-kimono-p-269289580',
            'https://www.trendyol.com/bianco-lucci/kadin-3-iplik-kolej-ceket-2215-p-371041760',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-270117784',
            'https://www.trendyol.com/bianco-lucci/kadin-cemberli-dugmeli-atlas-ceket-p-247433111',
            'https://www.trendyol.com/bianco-lucci/kadin-3-iplik-kolej-ceket-2215-1-p-378766562',
            'https://www.trendyol.com/bianco-lucci/kadin-kolu-buzgulu-dugmesiz-keten-ceket-p-684011285',
            'https://www.trendyol.com/bianco-lucci/kadin-r-nakisli-ici-kapitone-ceket-2213-p-378766102',
            'https://www.trendyol.com/bianco-lucci/kadin-m-baskili-kolej-ceket-55386-p-377124460',
            'https://www.trendyol.com/bianco-lucci/kadin-6-dugmeli-ekose-ceket-3010-p-362511565',
            'https://www.trendyol.com/bianco-lucci/kadin-ekose-desenli-altin-dugmeli-ceket-p-355649211',
            'https://www.trendyol.com/bianco-lucci/kadin-6-dugmeli-blazer-ceket-p-287410987',
            'https://www.trendyol.com/bianco-lucci/kadin-cift-cepli-cift-dugmeli-ceket-p-282452999',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-kurklu-triko-ceket-p-261702497',
            'https://www.trendyol.com/bianco-lucci/kadin-polo-yaka-astarli-torba-cepli-ceket-p-682928742',
            'https://www.trendyol.com/bianco-lucci/kadin-etek-ucu-puskullu-cift-cepli-kot-ceket-p-674508907',
            'https://www.trendyol.com/bianco-lucci/kadin-ribanali-astarli-ceket-p-683411828',
            'https://www.trendyol.com/bianco-lucci/kadin-dugmeli-lamineli-keten-ceket-p-307972477',
            'https://www.trendyol.com/bianco-lucci/kadin-6-dugmeli-astarli-borumcuk-ceket-3018-p-371045987',
            'https://www.trendyol.com/bianco-lucci/kadin-kollari-3-dugmeli-desenli-ceket-3014-p-362503918',
            'https://www.trendyol.com/bianco-lucci/kadin-kruvaze-yaka-kase-ithal-yun-blazer-ceket-p-377123334',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-kase-ceket-3001-p-378774160',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-kase-ceket-3001-p-378770555',
            'https://www.trendyol.com/pd/bianco-lucci/kadin-desenli-kase-ceket-3001-p-378768709',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-kase-ceket-3001-p-378768492',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-kase-ceket-3001-p-378768479',
            'https://www.trendyol.com/bianco-lucci/kadin-desenli-kase-ceket-3001-p-378766243',
            'https://www.trendyol.com/bianco-lucci/kadin-kruvaze-yaka-kase-ithal-yun-blazer-ceket-p-377124486',
            'https://www.trendyol.com/bianco-lucci/kadin-kruvaze-yaka-kase-ithal-yun-blazer-ceket-p-377124474',
        ];

        foreach ($urls as $url) {
            $response = $client->request('GET', $url);
            $name = $response->filter('h1.pr-new-br')->each(function ($node) {
                return $node->text();
            });
            $size = $response->filter('.sp-itm')->each(function ($node) {
                return $node->text();
            });
            $price = $response->filter('.prc-dsc')->each(function ($node) {
                return $node->text();
            });
            $image = $response->filter('img')->each(function ($node) {
                return $node->attr('src');
            });

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
                $fullpricee = $floatValue * 0.82;

                $product = array(
                    'name' => $name[$i],
                    'price' => $fullpricee,
                    'imgUrl' => $imgUrl,
                    'size' => $size,
                    'brand' => "Biancolucci",
                );
                array_push($products, $product);
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
                'size' => $size[1],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($insertData);

        $products = DB::select("SELECT * FROM products WHERE brand='Biancolucci'");
        return view('brands/biancolucci', ['products' => $products]);
    }

    public function getbiancolucci()
    {
        $products = DB::select('SELECT * FROM products WHERE brand = "Biancolucci"');
        return $products;
    }

}

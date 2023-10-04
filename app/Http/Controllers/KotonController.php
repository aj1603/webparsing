<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotonController extends Controller
{
    public function dbkoton() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/koton/kot-ceket-kapusonlu-serpali-p-358861095',
            'https://www.trendyol.com/koton/oversize-kapitone-ceket-gomlek-yaka-cepli-p-411232785',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-oversize-cepli-dugmeli-gomlek-yaka-p-755016328',
            'https://www.trendyol.com/koton/crop-tuvit-blazer-ceket-cepli-dugmeli-suni-deri-detayli-p-744105544',
            'https://www.trendyol.com/koton/melis-agazat-x-bros-detayli-blazer-ceket-p-444042803',
            'https://www.trendyol.com/koton/biker-ceket-deri-gorunumlu-fermuarli-kemer-detayli-p-752654038',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-kapakli-cepli-kruvaze-p-767059232',
            'https://www.trendyol.com/koton/kadin-kirik-beyaz-ceket-3wak20098ew-p-371851499',
            'https://www.trendyol.com/koton/tuvit-ceket-inci-dugme-detayli-kapakli-cepli-p-764824826',
            'https://www.trendyol.com/koton/kot-ceket-cep-detayli-metal-dugmeli-pamuklu-p-747866510',
            'https://www.trendyol.com/koton/suet-gorunumlu-ceket-cep-detayli-gomlek-yaka-citcitli-p-755242259',
            'https://www.trendyol.com/koton/blazer-ceket-kruvaze-kapakli-cep-detayli-dugmeli-p-763977283',
            'https://www.trendyol.com/koton/kadin-acik-gul-kurusu-ceket-3wak20098ew-p-372675511',
            'https://www.trendyol.com/koton/tuvit-blazer-ceket-kruvaze-kapama-kapakli-cepli-astarli-p-760737475',
            'https://www.trendyol.com/koton/tuvit-ceket-cepli-arma-dugmeli-p-749020860',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-cep-kapakli-p-744560376',
            'https://www.trendyol.com/koton/deri-gorunumlu-mont-p-358860607',
            'https://www.trendyol.com/koton/melis-agazat-x-inci-dugmeli-tuvit-ceket-p-379733785',
            'https://www.trendyol.com/koton/blazer-ceket-uzun-cep-detayli-cizgili-p-637168845',
            'https://www.trendyol.com/koton/kadin-siyah-ekose-ceket-3wak50027iw-p-371851313',
            'https://www.trendyol.com/koton/blazer-ceket-cift-dugmeli-p-334433061',
            'https://www.trendyol.com/koton/yakasiz-blazer-ceket-tek-dugmeli-cep-detayli-p-391595974',
            'https://www.trendyol.com/koton/kadin-ceket-3sal50033mdmid-p-765783486',
            'https://www.trendyol.com/koton/siyah-kadin-deri-ceket-3wak20120ew-p-356739924',
            'https://www.trendyol.com/koton/deri-gorunumlu-mont-p-358860606',
            'https://www.trendyol.com/koton/blazer-ceket-uzun-cep-detayli-cizgili-p-637323729',
            'https://www.trendyol.com/koton/kazayagi-desenli-blazer-ceket-p-375127315',
            'https://www.trendyol.com/koton/blazer-ceket-kruvaze-dugmeli-modal-karisimli-p-739774600',
            'https://www.trendyol.com/koton/kot-ceket-cep-detayli-citcit-kapama-pamuklu-p-747865026',
            'https://www.trendyol.com/koton/fermuarli-kapusonlu-ruzgarlik-mont-p-358860456',
            'https://www.trendyol.com/koton/oversize-kruvaze-blazer-ceket-p-375383779',
            'https://www.trendyol.com/koton/kot-ceket-rahat-kesim-renk-bloklu-klasik-gomlek-yaka-kapakli-cepli-pamuklu-p-757269923',
            'https://www.trendyol.com/koton/kot-ceket-islemeli-fermuar-detayli-p-358861200',
            'https://www.trendyol.com/koton/rachel-araz-x-sherpa-detayli-deri-gorunumlu-oversize-biker-ceket-p-633003848',
            'https://www.trendyol.com/koton/kadin-siyah-desenli-ceket-3wak50160uw-p-348688370',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-gizli-cep-detayli-astarli-p-744883873',
            'https://www.trendyol.com/koton/kadin-kirik-beyaz-ceket-3wal50030md-p-358859994',
            'https://www.trendyol.com/koton/siyah-kadin-deri-ceket-4wal20031iw-p-758961446',
            'https://www.trendyol.com/koton/kadin-aysegul-afacan-x-crop-cepli-ceket-3sak50100uw-p-704346141',
            'https://www.trendyol.com/koton/ceket-p-347799746',
            'https://www.trendyol.com/koton/standart-bej-kadin-ceket-4wak20102ew-p-765453312',
            'https://www.trendyol.com/koton/acik-indigo-kadin-ceket-p-754519813',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-kapakli-cepli-kruvaze-p-767155520',
            'https://www.trendyol.com/koton/crop-kruvaze-blazer-ceket-p-760752681',
            'https://www.trendyol.com/koton/kapusonlu-yagmurluk-ceket-cep-detayli-fermuarli-uzun-kollu-p-457992251',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-suni-kurk-detayli-dugmeli-p-763975971',
            'https://www.trendyol.com/koton/kapitone-ceket-citcit-dugmeli-gomlek-yaka-cep-detayli-p-759828953',
            'https://www.trendyol.com/koton/aysegul-afacan-x-dugmeli-cep-detayli-kruvaze-blazer-ceket-p-443894643',
            'https://www.trendyol.com/koton/cepli-dugmeli-gomlek-ceket-p-675059743',
            'https://www.trendyol.com/koton/aysegul-afacan-x-oversize-kruvaze-blazer-ceket-p-410992024',
            'https://www.trendyol.com/koton/gomlek-ceket-pamuklu-uzun-kollu-cep-detayli-p-457992203',
            'https://www.trendyol.com/koton/kadin-kirmizi-ceket-3sak50047uw-p-457992297',
            'https://www.trendyol.com/koton/kadin-goldu-dugmeli-kapakli-cep-detayli-kruvaze-blazer-ceket-4wak50111uw-p-756633253',
            'https://www.trendyol.com/koton/dugme-detayli-blazer-ceket-p-371037582',
            'https://www.trendyol.com/koton/deri-gorunumlu-blazer-ceket-cep-detayli-tek-dugmeli-p-444042966',
            'https://www.trendyol.com/koton/kadife-kruvaze-blazer-ceket-p-633415711',
            'https://www.trendyol.com/koton/biker-ceket-suet-gorunumlu-kapakli-cepli-citcit-dugmeli-p-763977604',
            'https://www.trendyol.com/koton/kadin-pencere-detayli-cepli-gomlek-yaka-crop-kot-ceket-3sal50026md-p-703919162',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-cift-dugmeli-p-744083989',
            'https://www.trendyol.com/koton/rachel-araz-x-gomlek-yaka-bomber-tuvit-ceket-p-640157629',
            'https://www.trendyol.com/koton/crop-kot-ceket-kemerli-rahat-kalip-dugmeli-kapakli-cepli-pamuklu-p-764891042',
            'https://www.trendyol.com/koton/kruvaze-dugmeli-katli-yaka-kareli-blazer-ceket-p-241399644',
            'https://www.trendyol.com/koton/kot-ceket-yildiz-parlak-tas-islemeli-cepli-dugmeli-p-750622372',
            'https://www.trendyol.com/koton/crop-ceket-dugmeli-cep-detayli-ribanali-p-763972830',
            'https://www.trendyol.com/koton/crop-kadin-ceket-deri-gorunumlu-p-358860624',
            'https://www.trendyol.com/koton/pamuklu-blazer-ceket-cepli-p-679982587',
            'https://www.trendyol.com/koton/kadin-fermuarli-cepli-gomlek-yaka-bomber-ceket-3sak50015uw-p-736831767',
            'https://www.trendyol.com/koton/blazer-ceket-v-yaka-cep-detayli-p-641744412',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-cepli-dugmeli-katli-yaka-p-754743537',
            'https://www.trendyol.com/koton/kadin-acik-indigo-ceket-3wal50038md-p-348688524',
            'https://www.trendyol.com/koton/rachel-araz-x-dugmeli-kruvaze-tuvit-blazer-ceket-p-443890605',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-p-752437610',
            'https://www.trendyol.com/koton/crop-ceket-cepli-dugmeli-deri-gorunumlu-p-761265860',
            'https://www.trendyol.com/koton/kadin-kirik-beyaz-ceket-p-752437671',
            'https://www.trendyol.com/koton/bomber-ceket-fermuarli-cepli-gomlek-yaka-p-736350493',
            'https://www.trendyol.com/koton/melis-agazat-x-jakarli-oversize-bomber-ceket-p-454997181',
            'https://www.trendyol.com/koton/kadin-kahverengi-ceket-3wal20181iw-p-444042962',
        ];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $name = $response->filter('h1.pr-new-br')->each(function ($node) { return $node->text(); });
            $size = $response->filter('.sp-itm')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.pr-bx-nm')->each(function ($node) { return $node->text(); });
            $image = $response->filter('img')->each(function ($node) { return $node->attr('src'); });
            
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
                $fullpricee = $floatValue * 0.78;
                
                $product = array(
                    'name' => $name[$i],
                    'price' => $fullpricee,
                    'imgUrl' => $imgUrl,
                    'size' => $size,
                    'brand' => "Bershka",
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
        
        return "Successfully updated";
    }

    public function getkoton() {
        $products = DB::select('SELECT * FROM products WHERE shop = "Koton"');
        return $products;
    }

}
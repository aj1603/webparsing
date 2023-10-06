<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotonController extends Controller
{
    public function allkoton(Request $request){
        $products = DB::select("SELECT * FROM products WHERE brand='Koton'");
        return view('brands/koton', ['products' => $products]);
    }

    public function dbkoton1() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/koton/oversize-kapitone-ceket-gomlek-yaka-cepli-p-411232785',
            'https://www.trendyol.com/koton/biker-ceket-deri-gorunumlu-fermuarli-kemer-detayli-p-752654038',
            'https://www.trendyol.com/koton/kadife-blazer-ceket-kruvaze-dugmeli-cep-detayli-p-636519935',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-oversize-cepli-dugmeli-gomlek-yaka-p-755016328',
            'https://www.trendyol.com/koton/crop-tuvit-blazer-ceket-cepli-dugmeli-suni-deri-detayli-p-744105544',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak50029uw-p-348688726',
            'https://www.trendyol.com/koton/melis-agazat-x-bros-detayli-blazer-ceket-p-444042803',
            'https://www.trendyol.com/koton/blazer-ceket-kruvaze-kapakli-cep-detayli-dugmeli-p-763977283',
            'https://www.trendyol.com/koton/renk-bloklu-kot-ceket-suni-kurklu-p-363509140',
            'https://www.trendyol.com/koton/tuvit-blazer-ceket-kruvaze-kapama-kapakli-cepli-astarli-p-760737475',
            'https://www.trendyol.com/koton/tuvit-bomber-ceket-payet-detayli-tasli-dugmeli-yuvarlak-yaka-p-441176231',
            'https://www.trendyol.com/koton/fermuarli-bomber-ceket-gomlek-yaka-p-371851906',
            'https://www.trendyol.com/koton/suet-gorunumlu-ceket-cep-detayli-gomlek-yaka-citcitli-p-755242259',
            'https://www.trendyol.com/koton/siyah-kadin-ceket-p-756324625',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-cep-kapakli-p-744560376',
            'https://www.trendyol.com/koton/tuvit-ceket-cepli-arma-dugmeli-p-749020860',
            'https://www.trendyol.com/koton/kadin-ceket-3sal50033mdmid-p-765783486',
            'https://www.trendyol.com/koton/kadin-siyah-ekose-ceket-3wak50027iw-p-371851313',
            'https://www.trendyol.com/koton/kapitone-ceket-citcit-dugmeli-gomlek-yaka-cep-detayli-p-759828953',
            'https://www.trendyol.com/koton/oduncu-gomlek-ceket-uzun-kollu-dugmeli-cep-detayli-p-465346588',
            'https://www.trendyol.com/koton/deri-gorunumlu-mont-p-358860607',
            'https://www.trendyol.com/koton/kruvaze-kisa-kase-yunlu-kaban-p-443888285',
            'https://www.trendyol.com/koton/kadin-pembe-ceket-2kal58014ow-p-200260533',
            'https://www.trendyol.com/koton/kot-ceket-cep-detayli-metal-dugmeli-pamuklu-p-747866510',
            'https://www.trendyol.com/koton/ekoseli-kruvaze-blazer-ceket-dugmeli-p-391646473',
            'https://www.trendyol.com/koton/siyah-kadin-deri-ceket-3wak20120ew-p-356739924',
            'https://www.trendyol.com/koton/blazer-ceket-cift-dugmeli-p-334433061',
            'https://www.trendyol.com/koton/melis-agazat-x-biye-detayli-fitilli-kadife-ceket-p-463318092',
            'https://www.trendyol.com/koton/oversize-cepli-ceket-3wak00089ew-p-366040087',
            'https://www.trendyol.com/koton/kadin-kahverengi-ceket-3wak50100uw-p-334433074',
            'https://www.trendyol.com/koton/rachel-araz-x-tasli-dugmeli-tuvit-bomber-ceket-p-458178296',
            'https://www.trendyol.com/koton/piriltili-tuvit-ceket-p-375385732',
            'https://www.trendyol.com/koton/aslihan-malbora-x-yakasi-cikarilabilir-pelus-biker-ceket-deri-gorunumlu-p-383036421',
            'https://www.trendyol.com/koton/kruvaze-dugmeli-blazer-ceket-kapakli-cep-detayli-p-453237603',
            'https://www.trendyol.com/koton/oversize-gomlek-ceket-citcitli-cepli-p-472893036',
            'https://www.trendyol.com/koton/rachel-araz-x-sherpa-detayli-deri-gorunumlu-oversize-biker-ceket-p-633003848',
            'https://www.trendyol.com/koton/oversize-kruvaze-blazer-ceket-p-375383779',
            'https://www.trendyol.com/koton/blazer-ceket-kruvaze-dugmeli-modal-karisimli-p-739774600',
            'https://www.trendyol.com/koton/blazer-ceket-kruvaze-dugmeli-modal-karisimli-p-739774600',
            'https://www.trendyol.com/koton/biker-ceket-suet-gorunumlu-kapakli-cepli-citcit-dugmeli-p-763977604',
            'https://www.trendyol.com/koton/kadin-acik-gul-kurusu-ceket-3wak20098ew-p-372675511',
            'https://www.trendyol.com/koton/fermuarli-bomber-ceket-gomlek-yaka-p-358860290',
            'https://www.trendyol.com/koton/siyah-kadin-deri-ceket-4wal20031iw-p-758961446',
            'https://www.trendyol.com/koton/fermuarli-kapusonlu-ruzgarlik-mont-p-358860456',
            'https://www.trendyol.com/koton/blazer-ceket-uzun-cep-detayli-cizgili-p-637323729',
            'https://www.trendyol.com/koton/kot-ceket-rahat-kesim-renk-bloklu-klasik-gomlek-yaka-kapakli-cepli-pamuklu-p-757269923',
            'https://www.trendyol.com/koton/kadin-goldu-dugmeli-kapakli-cep-detayli-kruvaze-blazer-ceket-4wak50111uw-p-756633253',
            'https://www.trendyol.com/koton/kadin-kirik-beyaz-ceket-3wal50030md-p-358859994',
            'https://www.trendyol.com/koton/yakasiz-blazer-ceket-tek-dugmeli-cep-detayli-p-391595974',
            'https://www.trendyol.com/koton/tas-kadin-ceket-p-754519827',
            'https://www.trendyol.com/koton/deri-gorunumlu-blazer-ceket-cep-detayli-tek-dugmeli-p-444042966',
            'https://www.trendyol.com/koton/rachel-araz-x-pelus-detayli-cepli-tuvit-ceket-p-633462874',
            'https://www.trendyol.com/koton/blazer-ceket-uzun-cep-detayli-cizgili-p-637168845',
            'https://www.trendyol.com/koton/etnik-desenli-dugmeli-yuvarlak-yaka-ceket-p-454762437',
            'https://www.trendyol.com/koton/kadife-kruvaze-blazer-ceket-p-633415711',
            'https://www.trendyol.com/koton/kroko-deri-gorunumlu-bomber-ceket-p-379618645',
            'https://www.trendyol.com/koton/jakarli-kadife-detayli-kusakli-ceket-p-455886446',
            'https://www.trendyol.com/koton/kadin-pembe-ekose-ceket-3sak50016uw-p-444042948',
            'https://www.trendyol.com/koton/aysegul-afacan-x-ekoseli-dugmeli-kruvaze-blazer-ceket-p-379683731',
            'https://www.trendyol.com/koton/suet-gorunumlu-oversize-ceket-p-377610472',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-kapakli-cep-detayli-p-448102256',
            'https://www.trendyol.com/koton/tuvit-ceket-inci-dugme-detayli-kapakli-cepli-p-764824826',
            'https://www.trendyol.com/koton/crop-kruvaze-blazer-ceket-p-760752681',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-saten-detayli-p-391646469',
            'https://www.trendyol.com/koton/kadin-kirmizi-ceket-3sak50047uw-p-457992297',
            'https://www.trendyol.com/koton/kadin-siyah-desenli-ceket-3wak50160uw-p-348688370',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-cep-detayli-p-457992288',
            'https://www.trendyol.com/koton/standart-bej-kadin-ceket-4wak20102ew-p-765453312',
            'https://www.trendyol.com/koton/deri-gorunumlu-gomlek-ceket-kusakli-cepli-dugmeli-p-444042897',
            'https://www.trendyol.com/koton/dugme-detayli-blazer-ceket-p-371037582',
            'https://www.trendyol.com/koton/kazayagi-desenli-blazer-ceket-p-375127315',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-gizli-cep-detayli-astarli-p-744883873',
            'https://www.trendyol.com/koton/oversize-kruvaze-blazer-ceket-p-411233052',
            'https://www.trendyol.com/koton/kadin-aysegul-afacan-x-crop-cepli-ceket-3sak50100uw-p-704346141',
            'https://www.trendyol.com/koton/rachel-araz-x-gomlek-yaka-bomber-tuvit-ceket-p-640157629',
            'https://www.trendyol.com/koton/aysegul-afacan-x-oversize-kruvaze-blazer-ceket-p-410992024',
            'https://www.trendyol.com/koton/cepli-dugmeli-gomlek-ceket-p-675059743',
            'https://www.trendyol.com/koton/dugmeli-cepli-shacket-p-371042364',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-cep-detayli-p-641685304',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-dugmeli-keten-karisimli-p-641744300',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-kapakli-cepli-kruvaze-p-767059232',
            'https://www.trendyol.com/koton/leopar-deri-gorunumlu-oversize-biker-ceket-p-391655941',
            'https://www.trendyol.com/koton/rachel-araz-x-fiyonklu-tas-detayli-crop-tuvit-ceket-p-475156039',
            'https://www.trendyol.com/koton/aysegul-afacan-x-dugmeli-cep-detayli-kruvaze-blazer-ceket-p-443894643',
            'https://www.trendyol.com/koton/kapusonlu-yagmurluk-ceket-cep-detayli-fermuarli-uzun-kollu-p-457992251',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-suni-kurk-detayli-dugmeli-p-763975971',
            'https://www.trendyol.com/koton/kadin-acik-indigo-ceket-3wal50038md-p-348688524',
            'https://www.trendyol.com/koton/kadin-aysegul-afacan-x-gold-dugmeli-blazer-ceket-p-684550528',
            'https://www.trendyol.com/koton/gomlek-ceket-pamuklu-uzun-kollu-cep-detayli-p-457992203',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-cift-dugmeli-p-744083989',
            'https://www.trendyol.com/koton/ceket-p-347799746',
            'https://www.trendyol.com/koton/standart-siyah-kadin-ceket-4wak20146ew-p-760060067',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak50017uw-p-348688382',
            'https://www.trendyol.com/koton/v-yaka-blazer-ceket-p-358861005',
            'https://www.trendyol.com/koton/rachel-araz-x-jakarli-bomber-ceket-p-457992277',
            'https://www.trendyol.com/koton/rachel-araz-x-dugmeli-kruvaze-tuvit-blazer-ceket-p-443890605',
            'https://www.trendyol.com/koton/kot-ceket-islemeli-fermuar-detayli-p-358861200',
        ];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $name = $response->filter('h1.pr-new-br')->each(function ($node) { return $node->text(); });
            $size = $response->filter('.sp-itm')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.prc-dsc')->each(function ($node) { return $node->text(); });
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
                    'brand' => "Koton",
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

    public function dbkoton2() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak20123ew-p-348688544',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-cep-detayli-p-372675520',
            'https://www.trendyol.com/koton/blazer-ceket-yuvarlak-yaka-tek-dugmeli-p-457992316',
            'https://www.trendyol.com/koton/kadin-kirik-beyaz-ceket-p-752437454',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak20247ew-p-377617231',
            'https://www.trendyol.com/koton/kadin-ekru-ceket-3wak20103ew-p-348688416',
            'https://www.trendyol.com/koton/rachel-araz-x-katli-yaka-fermuarli-pelus-ceket-p-634655188',
            'https://www.trendyol.com/koton/melis-agazat-x-simli-blazer-ceket-p-455850294',
            'https://www.trendyol.com/koton/crop-ceket-cepli-dugmeli-deri-gorunumlu-p-761265860',
            'https://www.trendyol.com/koton/melis-agazat-x-inci-dugmeli-tuvit-ceket-p-379733785',
            'https://www.trendyol.com/koton/kadin-antrasit-ceket-3wak50217uw-p-457992275',
            'https://www.trendyol.com/koton/kadin-kirik-beyaz-ceket-p-752437671',
            'https://www.trendyol.com/koton/fermuar-detayli-spor-ceket-p-196076549',
            'https://www.trendyol.com/koton/suet-gorunumlu-gomlek-ceket-p-662017064',
            'https://www.trendyol.com/koton/crop-kadin-ceket-deri-gorunumlu-p-358860624',
            'https://www.trendyol.com/koton/sahika-ercumen-x-cepli-citcitli-gomlek-yaka-ceket-p-463399020',
            'https://www.trendyol.com/koton/cep-detayli-blazer-ceket-p-372447746',
            'https://www.trendyol.com/koton/kot-ceket-yildiz-parlak-tas-islemeli-cepli-dugmeli-p-750622372',
            'https://www.trendyol.com/koton/acik-indigo-kadin-ceket-p-754519813',
            'https://www.trendyol.com/koton/deri-gorunumlu-mont-p-358860606',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-p-364419563',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-cepli-dugmeli-katli-yaka-p-754743537',
            'https://www.trendyol.com/koton/kadin-pencere-detayli-cepli-gomlek-yaka-crop-kot-ceket-3sal50026md-p-703919162',
            'https://www.trendyol.com/koton/aslihan-malbora-x-deri-gorunumlu-biker-ceket-p-371066172',
            'https://www.trendyol.com/koton/renk-bloklu-pilot-ceket-fermuarli-kapusonlu-cepli-p-391594787',
            'https://www.trendyol.com/koton/melisa-agazat-x-piriltili-kruvaze-blazer-ceket-p-460703690',
            'https://www.trendyol.com/koton/melis-agazat-x-jakarli-oversize-bomber-ceket-p-454997181',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-p-752437610',
            'https://www.trendyol.com/koton/aysegul-afacan-x-deri-gorunumlu-blazer-ceket-p-436825793',
            'https://www.trendyol.com/koton/kadin-fermuarli-cepli-gomlek-yaka-bomber-ceket-3sak50015uw-p-736831767',
            'https://www.trendyol.com/koton/kadin-kahverengi-ceket-3wal20181iw-p-444042962',
            'https://www.trendyol.com/koton/piriltili-blazer-ceket-p-475424588',
            'https://www.trendyol.com/koton/dugmeli-cepli-shacket-p-364439877',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-modal-karisimli-p-308206767',
            'https://www.trendyol.com/koton/oversize-gomlek-ceket-citcit-dugmeli-kapakli-cepli-p-764845698',
            'https://www.trendyol.com/koton/kot-ceket-pelus-yaka-detayli-cepli-p-364420498',
            'https://www.trendyol.com/koton/kadin-melis-agazat-x-kruvaze-dugmeli-ekoseli-tuvit-ceket-3wak50021ew-p-471731778',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak20068ew-p-348688691',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-kapakli-cepli-kruvaze-p-767155520',
            'https://www.trendyol.com/koton/blazer-ceket-kollari-katlama-detayli-p-692267026',
            'https://www.trendyol.com/koton/tek-dugmeli-blazer-ceket-p-681600778',
            'https://www.trendyol.com/koton/kot-ceket-tas-islemeli-cepli-gomlek-yaka-p-755156504',
            'https://www.trendyol.com/koton/crop-kot-ceket-kemerli-rahat-kalip-dugmeli-kapakli-cepli-pamuklu-p-764891042',
            'https://www.trendyol.com/koton/crop-ceket-dugmeli-cep-detayli-apoletli-p-758405352',
            'https://www.trendyol.com/koton/cep-detayli-blazer-ceket-p-442445125',
            'https://www.trendyol.com/koton/kadin-renk-bloklu-cep-detayli-dugmeli-crop-kot-ceket-3sal50020md-p-691934821',
            'https://www.trendyol.com/koton/deri-gorunumlu-blazer-ceket-p-444039186',
            'https://www.trendyol.com/koton/bomber-ceket-fermuarli-cepli-gomlek-yaka-p-736350493',
            'https://www.trendyol.com/koton/beli-kusakli-desenli-ceket-p-309458295',
            'https://www.trendyol.com/koton/parasut-sweatshirt-kapusonlu-beli-lastikli-p-659638131',
            'https://www.trendyol.com/koton/pamuklu-blazer-ceket-cepli-p-679982587',
            'https://www.trendyol.com/koton/kadin-deve-tuyu-ceket-3wak20224ew-p-460321753',
            'https://www.trendyol.com/koton/jackets-p-672756021',
            'https://www.trendyol.com/koton/blazer-ceket-cep-detayli-p-359384976',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-cepli-beli-buzgulu-p-679661545',
            'https://www.trendyol.com/koton/kadife-ceket-yakasi-suni-kurklu-p-358861064',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak20009ew-p-348688648',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-p-379743107',
            'https://www.trendyol.com/koton/keten-blazer-ceket-3sak50153uw-p-684035092',
            'https://www.trendyol.com/koton/ceket-p-347815582',
            'https://www.trendyol.com/koton/aysegul-afacan-x-kollari-yirtmacli-kruvaze-blazer-ceket-p-389670164',
            'https://www.trendyol.com/koton/kot-ceket-suni-kurk-detayli-p-358860335',
            'https://www.trendyol.com/koton/kadife-blazer-ceket-cep-detayli-p-636510616',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-p-375385595',
            'https://www.trendyol.com/koton/kahverengi-kadin-ceket-p-754519255',
            'https://www.trendyol.com/koton/kadin-deri-gorunumlu-fermuarli-kemer-detayli-biker-ceket-4wak20096ew-p-756631748',
            'https://www.trendyol.com/koton/kol-detayli-blazer-ceket-yakasiz-onu-acik-p-457992300',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-kapakli-cep-detayli-p-458784642',
            'https://www.trendyol.com/koton/jackets-p-760543655',
            'https://www.trendyol.com/koton/oversize-deri-gorunumlu-shacket-p-444042949',
            'https://www.trendyol.com/koton/kadin-hardal-ekoseli-ceket-3sak50043iw-p-459216163',
            'https://www.trendyol.com/koton/melis-agazat-x-bros-detayli-blazer-ceket-3wak50023ew-p-448160390',
            'https://www.trendyol.com/koton/siyah-kadin-deri-ceket-3wak20119ew-p-356694787',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-gizli-cep-detayli-astarli-p-744883876',
            'https://www.trendyol.com/koton/kadin-mavi-ekose-ceket-3sak50016uw-p-641744335',
            'https://www.trendyol.com/koton/katli-yaka-kot-ceket-p-213832354',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-cep-detayli-p-377610388',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-deri-gorunum-detayli-p-746378648',
            'https://www.trendyol.com/koton/cepli-ceket-gomlek-yaka-tas-detayli-pamuklu-p-303247048',
            'https://www.trendyol.com/koton/basic-blazer-ceket-cep-detayli-p-371851602',
            'https://www.trendyol.com/koton/oversize-spor-ceket-su-itici-kapusonlu-fermuarli-cepli-p-765807284',
            'https://www.trendyol.com/koton/suet-gorunumlu-blazer-ceket-p-371752523',
            'https://www.trendyol.com/koton/pelus-ceket-kapusonlu-kolsuz-bel-detayli-cepli-dik-yaka-p-457992216',
            'https://www.trendyol.com/koton/kadin-aslihan-malbora-x-ekoseli-cepli-citcitli-gomlek-ceket-3wak10218ek-p-366193180',
            'https://www.trendyol.com/koton/kapusonlu-ceket-fermuarli-beli-buzgulu-p-655342097',
            'https://www.trendyol.com/koton/yanlari-pencere-detayli-blazer-ceket-p-375377014',
            'https://www.trendyol.com/koton/blazer-ceket-kruvaze-dugmeli-ipeksi-dokulu-p-679673801',
            'https://www.trendyol.com/koton/oversize-ceket-gomlek-yaka-cepli-dugmeli-p-391572585',
            'https://www.trendyol.com/koton/deri-gorunumlu-kapitone-ceket-p-655437505',
            'https://www.trendyol.com/koton/ebru-salli-loves-sports-metalik-detayli-bomber-spor-ceket-p-632427287',
            'https://www.trendyol.com/koton/aysegul-afacan-x-kollari-katlamali-crop-blazer-ceket-p-389212986',
            'https://www.trendyol.com/koton/kadin-antrasit-ceket-p-752437388',
            'https://www.trendyol.com/koton/simli-saten-detayli-blazer-ceket-p-457992257',
            'https://www.trendyol.com/koton/blazer-ceket-kopca-detayli-p-358860062',
            'https://www.trendyol.com/koton/kadin-suni-deri-ceket-2yak23523ow-p-363675708',
            'https://www.trendyol.com/koton/blazer-ceket-v-yaka-cep-detayli-p-641744412',
        ];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $name = $response->filter('h1.pr-new-br')->each(function ($node) { return $node->text(); });
            $size = $response->filter('.sp-itm')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.prc-dsc')->each(function ($node) { return $node->text(); });
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
                    'brand' => "Koton",
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

    public function dbkoton3() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/koton/deri-gorunumlu-gomlek-ceket-citcitli-yirtmac-detayli-p-459216172',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-dugmeli-cepli-yuvarlak-yaka-p-372675452',
            'https://www.trendyol.com/koton/bomber-ceket-fermuarli-cepli-beli-buzgulu-p-641744268',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-cep-detayli-p-645523386',
            'https://www.trendyol.com/koton/kot-ceket-tasli-cepli-metal-dugmeli-pamuklu-p-746381752',
            'https://www.trendyol.com/koton/tas-detayli-kruvaze-crop-blazer-ceket-p-366177948',
            'https://www.trendyol.com/koton/kadin-leopar-deri-gorunumlu-oversize-biker-ceket-3wak20017pw-p-422991172',
            'https://www.trendyol.com/koton/kadin-kirmizi-desenli-ceket-3wak50035pw-p-348688457',
            'https://www.trendyol.com/koton/kadin-bej-ceket-3wal20072iw-p-348688397',
            'https://www.trendyol.com/koton/aysegul-afacan-x-koton-kruvaze-dugmeli-keten-karisimli-blazer-ceket-p-741580316',
            'https://www.trendyol.com/koton/aysegul-afacan-x-dugme-detayli-kruvaze-blazer-ceket-p-379434875',
            'https://www.trendyol.com/koton/dugmeli-tuvit-ceket-p-367419745',
            'https://www.trendyol.com/koton/dugme-detayli-tuvit-crop-ceket-p-302151885',
            'https://www.trendyol.com/koton/crop-kot-ceket-cepli-kollari-pencere-detayli-tasli-pamuklu-p-757067201',
            'https://www.trendyol.com/koton/kiz-cocuk-aplike-detayli-cepli-sardonlu-cizgili-kaskorse-detayli-kolej-ceket-4wkg10056-p-755011771',
            'https://www.trendyol.com/koton/kruvaze-dugmeli-katli-yaka-kareli-blazer-ceket-p-241399644',
            'https://www.trendyol.com/koton/aslihan-malbora-x-pelus-detayli-citcitli-bomber-ceket-p-444101373',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-yuvarlak-yaka-p-370991393',
            'https://www.trendyol.com/koton/kadin-bej-ceket-p-752437917',
            'https://www.trendyol.com/koton/haki-kadin-ceket-p-754519448',
            'https://www.trendyol.com/koton/blazer-ceket-kircilli-tek-dugmeli-cep-detayli-p-744082395',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-cepli-dugmeli-p-748926571',
            'https://www.trendyol.com/koton/fitilli-kadife-kruvaze-blazer-ceket-p-377617310',
            'https://www.trendyol.com/koton/kadin-turuncu-ekose-ceket-3wak50083ew-p-459216141',
            'https://www.trendyol.com/koton/aslihan-malbora-x-tas-islemeli-crop-kot-ceket-p-366776932',
            'https://www.trendyol.com/koton/uzun-kot-ceket-zimba-islemeli-buyuk-kapakli-cepli-p-746385228',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-2sal20040iw-p-242096353',
            'https://www.trendyol.com/koton/kot-ceket-cep-detayli-citcit-kapama-pamuklu-p-747865026',
            'https://www.trendyol.com/koton/tuvit-blazer-ceket-dugmeli-kapakli-cepli-astarli-p-752352688',
            'https://www.trendyol.com/koton/kadin-siyah-ekoseli-ceket-3sak50046iw-p-641744484',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-crop-kapakli-cepli-dugmeli-p-759967311',
            'https://www.trendyol.com/koton/kadin-gomlek-yaka-cep-detayli-kot-ceket-3wal50029md-p-334432827',
            'https://www.trendyol.com/koton/kadin-3-4-kollu-cep-detayli-blazer-ceket-3sak50012uw-p-515990265',
            'https://www.trendyol.com/koton/aysegul-afacan-x-ekoseli-kruvaze-blazer-ceket-p-389004398',
            'https://www.trendyol.com/koton/blazer-ceket-kollari-tuy-detayli-tek-dugmeli-p-389073240',
            'https://www.trendyol.com/koton/oversize-deri-gorunumlu-ceket-gomlek-yaka-kusakli-p-391627769',
            'https://www.trendyol.com/koton/melis-agazat-x-piriltili-kadife-blazer-ceket-p-443341252',
            'https://www.trendyol.com/koton/kimono-gorunumlu-ceket-kusakli-p-472893023',
            'https://www.trendyol.com/koton/blazer-ceket-cift-dugmeli-cep-detayli-p-458759715',
            'https://www.trendyol.com/koton/crop-blazer-ceket-kruvaze-yaka-dugmeli-bros-detayli-p-752653979',
            'https://www.trendyol.com/koton/aysegul-afacan-x-dugmeli-kruvaze-blazer-ceket-p-388992742',
            'https://www.trendyol.com/koton/kadin-kapakli-cep-detayli-kruvaze-dugmeli-blazer-ceket-3sak50003uw-p-457992215',
            'https://www.trendyol.com/koton/kot-ceket-yirtik-detayli-kapakli-cepli-pamuklu-p-762641612',
            'https://www.trendyol.com/koton/cep-kapakli-keten-karisimli-blazer-ceket-p-675040336',
            'https://www.trendyol.com/koton/oversize-keten-blazer-ceket-p-686014249',
            'https://www.trendyol.com/koton/crop-blazer-ceket-tek-dugmeli-p-679682290',
            'https://www.trendyol.com/koton/piriltili-kruvaze-blazer-ceket-p-444122464',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-p-691141862',
            'https://www.trendyol.com/koton/kadin-siyah-ekose-ceket-3wal20165iw-p-372675399',
            'https://www.trendyol.com/koton/tek-dugmeli-blazer-ceket-p-376443311',
            'https://www.trendyol.com/koton/deri-gorunumlu-dugmeli-ceket-p-376452303',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-p-411261860',
            'https://www.trendyol.com/koton/tuvit-kruvaze-crop-blazer-ceket-p-410968774',
            'https://www.trendyol.com/koton/4wal50014md-koton-kadin-jean-ceket-siyah-p-760154580',
            'https://www.trendyol.com/koton/aysegul-afacan-x-kruvaze-dugmeli-blazer-ceket-p-683118484',
            'https://www.trendyol.com/koton/deri-gorunumlu-kruvaze-blazer-ceket-cep-detayli-p-443897349',
            'https://www.trendyol.com/koton/kisa-sisme-mont-p-358860146',
            'https://www.trendyol.com/koton/tuvit-gomlek-ceket-crop-uzun-kollu-kareli-p-460321747',
            'https://www.trendyol.com/koton/oversize-gomlek-ceket-citcit-dugmeli-kapakli-cepli-p-761513171',
            'https://www.trendyol.com/koton/standart-deve-tuyu-kadin-ceket-4wal20120iw-p-756563314',
            'https://www.trendyol.com/koton/crop-ceket-dugmeli-cepli-gomlek-yaka-p-691046759',
            'https://www.trendyol.com/koton/bomber-ceket-leopar-desenli-fermuarli-cep-detayli-p-761183093',
            'https://www.trendyol.com/koton/cep-detayli-dugmeli-blazer-ceket-p-289027158',
            'https://www.trendyol.com/koton/pelus-detayli-crop-fermuarli-ceket-p-465337010',
            'https://www.trendyol.com/koton/kareli-cepli-ceket-p-260623395',
            'https://www.trendyol.com/koton/aysegul-afacan-x-koton-kruvaze-dugmeli-keten-karisimli-blazer-ceket-p-741581758',
            'https://www.trendyol.com/koton/oversize-kot-ceket-baskili-p-358860613',
            'https://www.trendyol.com/koton/pelus-detayli-citcitli-bomber-ceket-p-452503774',
            'https://www.trendyol.com/koton/renk-bloklu-fermuarli-ceket-p-259811010',
            'https://www.trendyol.com/koton/kolej-ceket-deri-gorunumlu-aplike-detayli-p-377610311',
            'https://www.trendyol.com/koton/parasut-sweatshirt-kapusonlu-beli-lastikli-p-659626661',
            'https://www.trendyol.com/koton/kadin-mor-desenli-ceket-3wak50133uw-p-371851779',
            'https://www.trendyol.com/koton/jackets-p-761527763',
            'https://www.trendyol.com/koton/leopar-desenli-plus-ceket-kapusonlu-p-364440914',
            'https://www.trendyol.com/koton/kruvaze-tuvit-ceket-dugmeli-p-379703616',
            'https://www.trendyol.com/koton/melis-agazat-x-bros-detayli-kruvaze-tuvit-ceket-p-459216142',
            'https://www.trendyol.com/koton/kadin-fermuar-detayli-hakim-yaka-uzun-kollu-kot-ceket-3sal50032md-p-703890444',
            'https://www.trendyol.com/koton/zebra-desenli-oversize-blazer-ceket-tek-dugmeli-p-744272825',
            'https://www.trendyol.com/koton/aysegul-afacan-x-dugmeli-crop-ceket-p-391567378',
            'https://www.trendyol.com/koton/kot-ceket-kisa-aplike-asimetrik-cep-detayli-pamuklu-p-753724505',
            'https://www.trendyol.com/koton/deri-gorunumlu-yelek-fermuarli-cep-detayli-kruvaze-p-744761288',
            'https://www.trendyol.com/koton/suet-gorunumlu-blazer-ceket-p-377612077',
            'https://www.trendyol.com/koton/zebra-desenli-kapusonlu-pelus-ceket-p-374802024',
            'https://www.trendyol.com/koton/crop-blazer-ceket-kruvaze-dugmeli-p-723237279',
            'https://www.trendyol.com/koton/aysegul-afacan-x-kollari-triko-kase-ceket-p-463315353',
            'https://www.trendyol.com/koton/crop-kot-ceket-kusgozu-detayli-p-366300149',
            'https://www.trendyol.com/koton/melis-agazat-x-oversize-kruvaze-blazer-ceket-p-455852241',
            'https://www.trendyol.com/koton/biker-ceket-deri-gorunumlu-fermuarli-p-764823088',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3sak40001bw-p-637317381',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-dugmeli-kruvaze-kapakli-cepli-p-759158741',
            'https://www.trendyol.com/koton/aysegul-afacan-x-kruvaze-crop-blazer-ceket-p-371850543',
            'https://www.trendyol.com/koton/blazer-ceket-dugmeli-ters-yaka-kapakli-cep-detayli-p-761500856',
            'https://www.trendyol.com/koton/tuvit-blazer-ceket-gold-dugmeli-p-371060681',
            'https://www.trendyol.com/koton/blazer-ceket-p-263492380',
            'https://www.trendyol.com/koton/rachel-araz-x-puskul-detayli-cepli-tuvit-ceket-p-461805726',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-kruvaze-dugmeli-p-702178069',
      ];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $name = $response->filter('h1.pr-new-br')->each(function ($node) { return $node->text(); });
            $size = $response->filter('.sp-itm')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.prc-dsc')->each(function ($node) { return $node->text(); });
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
                    'brand' => "Koton",
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

    public function dbkoton4() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/koton/dugme-detayli-blazer-ceket-p-372433657',
            'https://www.trendyol.com/koton/yakasiz-blazer-ceket-p-359384786',
            'https://www.trendyol.com/koton/kadin-ekru-ceket-3sak50059uw-p-641744410',
            'https://www.trendyol.com/koton/buyuk-cep-detayli-crop-kot-ceket-p-680470841',
            'https://www.trendyol.com/koton/deri-gorunumlu-gomlek-ceket-cepli-dugmeli-p-443889666',
            'https://www.trendyol.com/koton/oversize-kruvaze-ceket-cift-dugmeli-p-383434059',
            'https://www.trendyol.com/koton/kadin-tek-dugmeli-blazer-ceket-p-354431913',
            'https://www.trendyol.com/koton/blazer-ceket-deri-gorunumlu-dugmeli-kapakli-cepli-p-758362154',
            'https://www.trendyol.com/koton/desenli-cep-detayli-blazer-ceket-p-455840180',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-p-752437380',
            'https://www.trendyol.com/koton/polo-yaka-hirka-dugmeli-uzun-kollu-ajurlu-p-752358128',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-kisa-kollu-kruvaze-dugmeli-v-yaka-p-472083592',
            'https://www.trendyol.com/koton/rachel-araz-x-kruvaze-blazer-ceket-p-637173583',
            'https://www.trendyol.com/koton/blazer-tuvit-ceket-tek-dugmeli-cep-detayli-p-391624878',
            'https://www.trendyol.com/koton/melis-agazat-x-inci-dugmeli-kruvaze-tuvit-blazer-ceket-p-411232728',
            'https://www.trendyol.com/koton/kadin-yesil-ekose-ceket-3wak20334ew-p-459216152',
            'https://www.trendyol.com/koton/pembe-kadin-ceket-3sak50011uw-p-472831425',
            'https://www.trendyol.com/koton/siyah-kadin-ceket-p-754519780',
            'https://www.trendyol.com/koton/kadin-dik-yaka-fermuarli-sisme-mont-3wal20072iw-p-348688394',
            'https://www.trendyol.com/koton/tuvit-ceket-gold-dugmeli-cepli-simli-p-744058177',
            'https://www.trendyol.com/koton/standart-cok-renkli-kadin-ceket-3sak20006nw-p-673198583',
            'https://www.trendyol.com/koton/deri-gorunumlu-blazer-ceket-cep-detayli-p-442696339',
            'https://www.trendyol.com/koton/suni-deri-detayli-shacket-p-358860845',
            'https://www.trendyol.com/koton/kadin-aslihan-malbora-x-zebra-desenli-kapusonlu-pelus-ceket-3wak00305ew-p-384952656',
            'https://www.trendyol.com/koton/crop-parasut-ceket-fermuarli-dik-yaka-p-679512206',
            'https://www.trendyol.com/koton/kadin-suni-kurklu-renk-bloklu-kot-ceket-3wal50052md-p-380508265',
            'https://www.trendyol.com/koton/aysegul-afacan-x-pencere-detayli-blazer-ceket-p-379703313',
            'https://www.trendyol.com/koton/melis-agazat-x-jakarli-cep-detayli-blazer-ceket-p-444042903',
            'https://www.trendyol.com/koton/kadin-gri-ekose-ceket-3wak20329ew-p-459216158',
            'https://www.trendyol.com/koton/oversize-blazer-ceket-yilan-derisi-desenli-dugme-detayli-p-757269949',
            'https://www.trendyol.com/koton/deri-gorunumlu-crop-blazer-ceket-tek-dugmeli-cep-detayli-p-441385696',
            'https://www.trendyol.com/koton/kadin-siyah-ekose-ceket-3wak50011pw-p-371851397',
            'https://www.trendyol.com/koton/crop-kot-ceket-pamuklu-zimba-detayli-kapakli-cift-cepli-p-751661726',
            'https://www.trendyol.com/koton/melis-agazat-x-cicekli-oversize-blazer-ceket-p-728103353',
            'https://www.trendyol.com/koton/oversize-tuvit-shacket-cepli-dugmeli-p-437207720',
            'https://www.trendyol.com/koton/kadin-kiremit-ceket-3wak50006iw-p-358860572',
            'https://www.trendyol.com/koton/tek-dugmeli-blazer-ceket-cep-detayli-p-723311375',
            'https://www.trendyol.com/koton/kadin-kirik-beyaz-ceket-p-727785362',
            'https://www.trendyol.com/koton/kadife-crop-shacket-cepli-dugmeli-p-391646474',
            'https://www.trendyol.com/koton/jackets-pu-p-239769730',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-cep-detayli-citcit-dugmeli-gomlek-yaka-p-767187219',
            'https://www.trendyol.com/koton/kadin-beli-buzgulu-fermuarli-turuncu-ceket-beli-buzgulu-fermuarli-ceket-2sak50029pw-p-260780120',
            'https://www.trendyol.com/koton/kadin-leopar-astarli-kruvaze-dugmeli-blazer-ceket-3sak50010uw-p-465896025',
            'https://www.trendyol.com/koton/kirik-beyaz-kadin-ceket-p-754519175',
            'https://www.trendyol.com/koton/standart-beyaz-siyah-kadin-ceket-4wak20099ew-p-756563338',
            'https://www.trendyol.com/koton/kadin-tek-dugme-kollari-katlamali-blazer-ceket-4wak10017ek-p-744053832',
            'https://www.trendyol.com/koton/3sak50009uw-koton-kadin-ceket-siyah-p-744098839',
            'https://www.trendyol.com/koton/kadin-tas-islemeli-cepli-gomlek-yaka-kot-ceket-4wal50014md-p-756634182',
            'https://www.trendyol.com/koton/melis-agazat-x-tasli-dugmeli-desenli-blazer-ceket-p-455783675',
            'https://www.trendyol.com/koton/kadin-bej-ceket-2sak50034cw-p-334432721',
            'https://www.trendyol.com/koton/basic-blazer-ceket-kapakli-cepli-p-759854467',
            'https://www.trendyol.com/koton/standart-kirik-beyaz-kadin-ceket-4wak20101ew-p-763549271',
            'https://www.trendyol.com/koton/melis-agazat-x-simli-crop-blazer-ceket-p-445613061',
            'https://www.trendyol.com/koton/zebra-desenli-blazer-ceket-p-364635138',
            'https://www.trendyol.com/koton/kadin-x-cepli-oversize-pelus-yaka-gomlek-ceket-3wak20192ew-p-448208236',
            'https://www.trendyol.com/koton/kadin-lacivert-ekoseli-ceket-3wak50238uw-p-459216138',
            'https://www.trendyol.com/koton/acik-indigo-kadin-denim-ceket-4wal50014md-p-757762242',
            'https://www.trendyol.com/koton/tek-dugmeli-blazer-ceket-p-344939941',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-kapakli-cep-detayli-p-448204597',
            'https://www.trendyol.com/koton/aysegul-afacan-x-jakarli-oversize-blazer-ceket-p-391563104',
            'https://www.trendyol.com/koton/kadin-ceket-4wak20102ew-p-762750433',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-cepli-dugmeli-p-691061596',
            'https://www.trendyol.com/koton/kiz-cocuk-fileto-ve-kapakli-cepli-pul-islemeli-kot-ceket-3skg20001ad-p-515510474',
            'https://www.trendyol.com/koton/kadin-aysegul-afacan-x-tek-dugmeli-jakarli-ceket-3sak50151uw-p-680232704',
            'https://www.trendyol.com/koton/suni-deri-blazer-ceket-cep-detayli-p-379740969',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak50211uw-p-637317314',
            'https://www.trendyol.com/koton/polar-gomlek-ceket-kapakli-cep-detayli-citcitli-p-754742621',
            'https://www.trendyol.com/koton/kadin-bej-ekose-ceket-p-752437347',
            'https://www.trendyol.com/koton/kadin-siyah-ekose-ceket-3wak50174uw-p-377610144',
            'https://www.trendyol.com/koton/tuvit-ceket-dugmeli-gomlek-yaka-cep-detayli-p-752348717',
            'https://www.trendyol.com/koton/suni-deri-detayli-gomlek-ceket-cepli-citcitli-p-391646483',
            'https://www.trendyol.com/koton/kadin-siyah-desenli-mont-1kak22417nk-p-49576543',
            'https://www.trendyol.com/koton/etnik-desenli-kimono-kusakli-midi-boy-p-377617272',
            'https://www.trendyol.com/koton/3sal20008iw-kadin-ceket-kahverengi-p-457992235',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-p-744569477',
            'https://www.trendyol.com/koton/kadin-melis-agazat-x-dugme-detayli-tuvit-crop-ceket-2sak50070pw-p-363676797',
            'https://www.trendyol.com/koton/kadin-ceket-bej-3wal10168ik-p-348688293',
            'https://www.trendyol.com/koton/ekoseli-cepli-shacket-p-376442677',
            'https://www.trendyol.com/koton/kadin-beyaz-ekose-ceket-3wak50097uw-p-371851639',
            'https://www.trendyol.com/koton/kadin-acik-indigo-ceket-3sal50007md-p-641744310',
            'https://www.trendyol.com/koton/kruvaze-blazer-ceket-arma-dugmeli-p-691061720',
            'https://www.trendyol.com/koton/dugmeli-cepli-ekose-ceket-p-147047891',
            'https://www.trendyol.com/koton/blazer-ceket-suit-gorunumlu-dugmeli-cep-detayli-p-759026364',
            'https://www.trendyol.com/koton/cep-detayli-desenli-blazer-ceket-p-280565465',
            'https://www.trendyol.com/koton/tuvit-biker-ceket-fermuarli-cepli-suni-deri-gorunumlu-yaka-detayli-p-762582508',
            'https://www.trendyol.com/koton/aplike-cepli-ceket-p-377610358',
            'https://www.trendyol.com/koton/crop-kot-ceket-aplike-asimetrik-cep-detayli-pamuklu-p-752653973',
            'https://www.trendyol.com/koton/parasut-spor-ceket-fermuarli-p-674410918',
            'https://www.trendyol.com/koton/siyah-kadin-ceket-p-754519845',
            'https://www.trendyol.com/koton/crop-yelek-dugmeli-mini-cepli-p-761512855',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-p-752437642',
            'https://www.trendyol.com/koton/crop-parasut-ceket-beli-lastikli-dik-yaka-p-744272671',
            'https://www.trendyol.com/koton/erkek-cocuk-kapakli-cepli-uzun-kollu-kot-ceket-4wkb20002td-p-741210507',
            'https://www.trendyol.com/koton/kadin-kahverengi-desenli-ceket-p-727785254',
            'https://www.trendyol.com/koton/crop-tuvit-ceket-kisa-kollu-kruvaze-dugmeli-v-yaka-p-641744420',
            'https://www.trendyol.com/koton/melis-agazat-x-bros-detayli-kruvaze-tuvit-ceket-3wak50064ew-p-465897658',
        ];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $name = $response->filter('h1.pr-new-br')->each(function ($node) { return $node->text(); });
            $size = $response->filter('.sp-itm')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.prc-dsc')->each(function ($node) { return $node->text(); });
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
                    'brand' => "Koton",
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

    public function dbkoton5() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/koton/kadin-deri-gorunumlu-oversize-shacket-3wak20170ew-p-384919571',
            'https://www.trendyol.com/koton/kadin-kruvaze-kapama-crop-tuvit-ceket-p-380486808',
            'https://www.trendyol.com/koton/kadin-cepli-dugmeli-jakarli-blazer-ceket-2sak50045pw-p-363675374',
            'https://www.trendyol.com/koton/crop-kot-ceket-pencere-detayli-cepli-gomlek-yaka-p-685757093',
            'https://www.trendyol.com/koton/kadin-yesil-ceket-p-752437433',
            'https://www.trendyol.com/koton/ceket-p-154172615',
            'https://www.trendyol.com/koton/kisa-sisme-mont-kapusonlu-fermuarli-cepli-p-444042788',
            'https://www.trendyol.com/koton/kadin-gumus-ceket-3wak20139ew-p-377610603',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wal20195iw-p-377610491',
            'https://www.trendyol.com/koton/ceket-p-160115263',
            'https://www.trendyol.com/koton/crop-fermuarli-bomber-ceket-p-372087904',
            'https://www.trendyol.com/koton/kot-ceket-klasik-yaka-buyuk-kapakli-cepli-pamuklu-uzun-kollu-p-759082758',
            'https://www.trendyol.com/koton/kadin-kahverengi-ekoseli-ceket-3wak50219uw-p-444042798',
            'https://www.trendyol.com/koton/rachel-araz-x-kruvaze-blazer-ceket-p-641745161',
            'https://www.trendyol.com/koton/kadin-siyah-ekose-ceket-3wak50231uw-p-457992346',
            'https://www.trendyol.com/koton/crop-parasut-ceket-beli-lastikli-dik-yaka-p-744105517',
            'https://www.trendyol.com/koton/oversize-deri-gorunumlu-shacket-p-391646476',
            'https://www.trendyol.com/koton/kadin-pencere-detayli-cepli-gomlek-yaka-crop-kot-ceket-3sal50026md-p-705164656',
            'https://www.trendyol.com/koton/oversize-gomlek-ceket-cep-detayli-citcit-dugmeli-p-758115016',
            'https://www.trendyol.com/koton/oversize-shacket-cep-detayli-citcitli-p-379718675',
            'https://www.trendyol.com/koton/kadin-suet-gorunumlu-cepli-oversize-gomlek-ceket-3wak10054ek-p-377617063',
            'https://www.trendyol.com/koton/dugmeli-cepli-shacket-p-371036084',
            'https://www.trendyol.com/koton/zebra-desenli-kruvaze-blazer-ceket-p-371851362',
            'https://www.trendyol.com/koton/kadin-aysegul-afacan-x-kruvaze-dugmeli-blazer-ceket-3sak50155uw-p-684023642',
            'https://www.trendyol.com/koton/oversize-tuvit-ceket-deri-gorunum-detayli-kapakli-cepli-p-761512960',
            'https://www.trendyol.com/koton/fusya-kadin-ceket-4wkg20002aw-p-760059998',
            'https://www.trendyol.com/koton/kadin-lacivert-cizgili-ceket-6yak52792uk-p-3175692',
            'https://www.trendyol.com/koton/kaidn-kisa-sisme-mont-2yak23524ow-p-359452069',
            'https://www.trendyol.com/koton/kiz-cocuk-ceket-cep-detayli-uzun-kollu-gomlek-4wkg20023aw-p-755014688',
            'https://www.trendyol.com/koton/tuvit-ceket-deri-gorunum-detayli-cepli-dugmeli-p-752347822',
            'https://www.trendyol.com/koton/standart-beyaz-siyah-kadin-ceket-4wal10017ik-p-749179331',
            'https://www.trendyol.com/koton/standart-vizon-kadin-ceket-3sak50114uw-p-741192429',
            'https://www.trendyol.com/koton/kadin-yirtmac-detayli-tek-dugmeli-blazer-ceket-3sak50060uw-p-516015713',
            'https://www.trendyol.com/koton/kadin-melis-agazat-x-oversize-kruvaze-blazer-ceket-3wak50052ew-p-471716876',
            'https://www.trendyol.com/koton/cep-detayli-tek-dugmeli-crop-blazer-ceket-p-411259397',
            'https://www.trendyol.com/koton/kadin-ekoseli-cepli-ceket-3wak20111ew-p-376714840',
            'https://www.trendyol.com/koton/melis-agazat-x-puskul-detayli-kimono-p-322202790',
            'https://www.trendyol.com/koton/tek-dugmeli-blazer-ceket-yirtmac-detayli-p-463697867',
            'https://www.trendyol.com/koton/siyah-kadin-ceket-p-754518650',
            'https://www.trendyol.com/koton/kadin-kiremit-ceket-p-752437779',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-p-752437583',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak50071uw-p-444042911',
            'https://www.trendyol.com/koton/kadin-bej-ekose-ceket-3wak20137ew-p-377610449',
            'https://www.trendyol.com/koton/cep-detayli-ceket-p-32433875',
            'https://www.trendyol.com/koton/siyah-kadin-ceket-p-754519679',
            'https://www.trendyol.com/koton/acik-indigo-kadin-ceket-p-754519484',
            'https://www.trendyol.com/koton/bej-kadin-ceket-p-754519330',
            'https://www.trendyol.com/koton/kadin-hardal-desenli-ceket-p-727785368',
            'https://www.trendyol.com/koton/kadin-cep-detayli-citcitli-oversize-gomlek-ceket-3wak50032pw-p-380484394',
            'https://www.trendyol.com/koton/ceket-42-bej-melanj-p-373816758',
            'https://www.trendyol.com/koton/kadin-cepli-tek-dugmeli-ceket-2sak50065pw-p-363676316',
            'https://www.trendyol.com/koton/kadin-x-cep-detayli-desenli-blazer-ceket-2sak50031ew-p-363675610',
            'https://www.trendyol.com/koton/kadin-kazayagi-desenli-ceket-3wak20107ew-p-358860640',
            'https://www.trendyol.com/koton/kruvaze-dugmeli-blazer-ceket-kapakli-cep-detayli-p-463702192',
            'https://www.trendyol.com/koton/crop-kruvaze-blazer-ceket-p-708571152',
            'https://www.trendyol.com/koton/siyah-kadin-blazer-4wak50022uw-p-749193166',
            'https://www.trendyol.com/koton/blazer-ceket-tek-dugmeli-kapakli-cep-detayli-p-649679585',
            'https://www.trendyol.com/koton/kadin-siyah-ceket-3wak50210uw-p-457992267',
            'https://www.trendyol.com/koton/kot-ceket-fermuar-detayli-hakim-yaka-uzun-kollu-p-684120702',
            'https://www.trendyol.com/koton/suni-deri-detayli-tuvit-gomlek-ceket-cepli-citcitli-p-411262632',
            'https://www.trendyol.com/koton/siyah-beyaz-kadin-ceket-4wkg10056ak-p-756776699',
            'https://www.trendyol.com/koton/blazer-ceket-v-yaka-cep-detayli-p-641744408',
            'https://www.trendyol.com/koton/ceket-kadin-p-154815244',
            'https://www.trendyol.com/koton/zebra-desenli-blazer-ceket-tek-dugmeli-p-391646479',
            'https://www.trendyol.com/koton/zebra-desenli-kruvaze-blazer-ceket-p-370965017',
            'https://www.trendyol.com/koton/kadin-kirmizi-ekose-ceket-3wak50032pw-p-371851291',
            'https://www.trendyol.com/koton/standart-ekru-kadin-ceket-3sak50116uw-p-736541428',
            'https://www.trendyol.com/koton/cepli-kareli-uzun-kollu-ceket-p-248996583',
            'https://www.trendyol.com/koton/deri-gorunumlu-biker-ceket-ters-yaka-yakasi-ve-mansetleri-suni-kurklu-fermuarli-p-764853399',
            'https://www.trendyol.com/koton/fermuarli-deri-gorunumlu-ceket-p-158369259',
            'https://www.trendyol.com/koton/suet-gorunumlu-biker-ceket-ters-yaka-suni-kurklu-dugmeli-cepli-p-764848975',
            'https://www.trendyol.com/koton/biker-ceket-suet-gorunumlu-cepli-yakalari-ve-astari-pelus-p-754013532',
            'https://www.trendyol.com/koton/biker-ceket-suet-gorunumlu-suni-kurk-detayli-dugmeli-p-759981961',
            'https://www.trendyol.com/koton/biker-ceket-suet-gorunumlu-suni-kurk-detayli-kemerli-p-754029400',
            'https://www.trendyol.com/koton/deri-ceket-oversize-cepli-zimba-detayli-gomlek-yaka-p-649651337',
            'https://www.trendyol.com/koton/oversize-ceket-gomlek-yaka-uzun-kollu-cep-detayli-p-458772180',
            'https://www.trendyol.com/koton/oduncu-gomlek-ceket-puskul-detayli-cepli-dugmeli-p-475243648',
            'https://www.trendyol.com/koton/pilot-ceket-deri-gorunumlu-aplike-detayli-p-379605523',
            'https://www.trendyol.com/koton/deri-gorunumlu-ceket-yakasi-suni-kurklu-cep-detayli-p-475255315',
            'https://www.trendyol.com/koton/biker-ceket-pelus-ters-yaka-suet-gorunumlu-cepli-dugme-detayli-p-754873486',
            'https://www.trendyol.com/koton/parlak-deri-gorunumlu-ceket-yakasi-suni-kurk-detayli-p-391609514',
            'https://www.trendyol.com/koton/crop-krokodil-ceket-uzun-kollu-dugmeli-kapakli-cep-detayli-p-759966750',
            'https://www.trendyol.com/koton/oversize-ceket-gomlek-yaka-uzun-kollu-cep-detayli-p-459383966',
            'https://www.trendyol.com/koton/atlet-p-721254870',
            'https://www.trendyol.com/koton/tuvit-gomlek-ceket-crop-uzun-kollu-kareli-p-636548942',
            'https://www.trendyol.com/koton/kadin-kruvaze-fermuarli-cep-detayli-astarli-biker-ceket-4wak20103ew-p-767618822',
            'https://www.trendyol.com/koton/kadin-cepli-dugmeli-suni-deri-detayli-crop-tuvit-blazer-ceket-4wak50080uw-p-767614274'
        ];
        
        foreach ($urls as $url) {
            $response = $client->request('GET', $url);            
            $name = $response->filter('h1.pr-new-br')->each(function ($node) { return $node->text(); });
            $size = $response->filter('.sp-itm')->each(function ($node) { return $node->text(); });
            $price = $response->filter('.prc-dsc')->each(function ($node) { return $node->text(); });
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
                    'brand' => "Koton",
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
        $products = DB::select('SELECT * FROM products WHERE brand = "Koton"');
        return $products;
    }
}
<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DefactoController extends Controller
{
    public function alldefacto(Request $request){
        $products = DB::select("SELECT * FROM products WHERE brand='Defacto'");
        return view('brands/defacto', ['products' => $products]);
    }

    public function dbdefacto() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/defacto/su-gecirmez-oversize-fit-suni-deri-mont-p-753243402',
            'https://www.trendyol.com/defacto/su-itici-suni-deri-blazer-biker-ceket-p-645885480',
            'https://www.trendyol.com/defacto/su-itici-suni-deri-biker-ceket-p-649379400',
            'https://www.trendyol.com/defacto/oversize-fit-blazer-p-755758257',
            'https://www.trendyol.com/defacto/crop-blazer-ceket-p-754442577',
            'https://www.trendyol.com/defacto/regular-fit-suni-deri-crop-biker-ceket-p-334252550',
            'https://www.trendyol.com/defacto/oversize-fit-kalin-kumas-bomber-ceket-p-756054428',
            'https://www.trendyol.com/defacto/regular-fit-suni-deri-su-itici-mont-p-335233186',
            'https://www.trendyol.com/defacto/regular-fit-suni-deri-su-itici-biker-ceket-p-334451747',
            'https://www.trendyol.com/defacto/oversize-fit-blazer-p-749691152',
            'https://www.trendyol.com/defacto/regular-fit-kareli-tek-dugmeli-blazer-ceket-p-358441819',
            'https://www.trendyol.com/defacto/regular-fit-yun-gorunumlu-blazer-p-376018217',
            'https://www.trendyol.com/defacto/oversize-fit-tweed-blazer-p-751493705',
            'https://www.trendyol.com/defacto/oversize-fit-jean-100-pamuk-ceket-p-759838764',
            'https://www.trendyol.com/defacto/regular-fit-kareli-tek-dugmeli-blazer-ceket-p-354397123',
            'https://www.trendyol.com/defacto/oversize-fit-blazer-p-749429456',
            'https://www.trendyol.com/pd/defacto/overisze-fit-cep-kapakli-tek-yirtmacli-blazer-ceket-p-766966654',
            'https://www.trendyol.com/defacto/loose-fit-suni-deri-blazer-p-350152525',
            'https://www.trendyol.com/defacto/coool-oversize-fit-kalin-kumas-bomber-ceket-p-746840763',
            'https://www.trendyol.com/defacto/regular-fit-kolej-yaka-bomber-ceket-p-345889801',
            'https://www.trendyol.com/defacto/loose-fit-blazer-p-752812059',
            'https://www.trendyol.com/defacto/oversize-fit-blazer-p-749691268',
            'https://www.trendyol.com/defacto/su-itici-regular-fit-suni-deri-blazer-biker-ceket-p-645929509',
            'https://www.trendyol.com/defacto/regular-fit-suni-deri-mont-p-335227057',
            'https://www.trendyol.com/defacto/regular-fit-suni-deri-mont-p-337183362',
            'https://www.trendyol.com/defacto/oversize-fit-cizgili-dokuma-blazer-ceket-p-764068196',
            'https://www.trendyol.com/defacto/su-itici-relax-fit-suni-deri-kemerli-crop-biker-ceket-p-650019636',
            'https://www.trendyol.com/defacto/su-itici-relax-fit-suni-deri-crop-mont-p-645894119',
            'https://www.trendyol.com/defacto/oversize-fit-cep-kapakli-blazer-ceket-p-754442401',
            'https://www.trendyol.com/defacto/crop-blazer-ceket-p-746283942',
            'https://www.trendyol.com/defacto/kareli-kapakli-cepli-regular-fit-uzun-kollu-blazer-ceket-p-366133261',
            'https://www.trendyol.com/defacto/oversize-fit-blazer-ceket-p-760558119',
            'https://www.trendyol.com/defacto/baskili-bomber-ceket-p-475661352',
            'https://www.trendyol.com/defacto/regular-fit-kareli-tek-dugmeli-blazer-ceket-p-369699187',
            'https://www.trendyol.com/defacto/baskili-bomber-ceket-p-475673924',
            'https://www.trendyol.com/defacto/coool-regular-fit-kolej-yaka-bomber-ceket-p-345338367',
            'https://www.trendyol.com/defacto/coool-regular-fit-blazer-ceket-p-761171146',
            'https://www.trendyol.com/defacto/regular-fit-keten-karisimli-blazer-p-328451797',
            'https://www.trendyol.com/defacto/crop-blazer-p-340497657',
            'https://www.trendyol.com/defacto/baskili-bomber-ceket-p-475654261',
            'https://www.trendyol.com/defacto/dugmeli-blazer-ceket-p-347926073',
            'https://www.trendyol.com/defacto/loose-fit-blazer-p-357036625',
            'https://www.trendyol.com/defacto/regular-fit-suni-deri-su-itici-mont-p-335228675',
            'https://www.trendyol.com/defacto/regular-fit-cep-detayli-su-itici-suni-deri-blazer-ceket-p-339543632',
            'https://www.trendyol.com/defacto/oversize-fit-cep-kapakli-tek-yirtmacli-blazer-ceket-p-333895514',
            'https://www.trendyol.com/defacto/oversize-fit-blazer-p-341669899',
            'https://www.trendyol.com/defacto/loose-fit-suni-deri-blazer-p-346987252',
            'https://www.trendyol.com/defacto/regular-fit-blazer-ceket-p-346184300',
            'https://www.trendyol.com/defacto/regular-fit-fitilli-kadife-blazer-p-468218038',
            'https://www.trendyol.com/defacto/crop-tweed-blazer-p-759256288',
            'https://www.trendyol.com/defacto/oversize-fit-blazer-p-342795038',
            'https://www.trendyol.com/defacto/su-itici-suni-deri-ceket-p-645901023',
            'https://www.trendyol.com/defacto/su-itici-suni-deri-biker-ceket-p-645916691',
            'https://www.trendyol.com/defacto/regular-fit-blazer-ceket-p-347969892',
            'https://www.trendyol.com/defacto/su-itici-suni-deri-crop-mont-p-676878130',
            'https://www.trendyol.com/defacto/regular-fit-gomlek-yaka-blazer-p-359314337',
            'https://www.trendyol.com/defacto/coool-oversize-fit-bisiklet-yaka-kalin-kumas-bomber-ceket-p-764742892',
            'https://www.trendyol.com/defacto/baskili-bomber-ceket-p-475655997',
            'https://www.trendyol.com/defacto/oversize-fit-kalin-kumas-bomber-ceket-p-759043211',
            'https://www.trendyol.com/defacto/regular-fit-gomlek-yaka-blazer-p-347927161',
            'https://www.trendyol.com/defacto/baskili-bomber-ceket-p-475645865',
            'https://www.trendyol.com/defacto/regular-fit-blazer-p-749430115',
            'https://www.trendyol.com/defacto/oversize-fit-tweed-blazer-p-353668169',
            'https://www.trendyol.com/defacto/oversize-fit-cep-kapakli-blazer-ceket-p-749033560',
            'https://www.trendyol.com/defacto/oversize-fit-kazayagi-desenli-dokulu-tuvit-blazer-ceket-p-373223718',
            'https://www.trendyol.com/defacto/regular-fit-blazer-p-474114756',
            'https://www.trendyol.com/defacto/oversize-fit-keten-karisimli-blazer-p-675564629',
            'https://www.trendyol.com/defacto/oversize-fit-cep-kapakli-tek-yirtmacli-blazer-ceket-p-325614778',
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
                    'brand' => "Defacto",
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
        
        $products = DB::select("SELECT * FROM products WHERE brand='Defacto'");
        return view('brands/defacto', ['products' => $products]);
    }

    public function dbdefacto1() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/defacto/loose-fit-ceket-yaka-blazer-p-443783885',
            'https://www.trendyol.com/defacto/sorbe-x-oversize-fit-blazer-p-680475779',
            'https://www.trendyol.com/defacto/kadin-blazer-ceket-l1969az-19sm-bk46-p-5999677',
            'https://www.trendyol.com/defacto/relax-fit-basic-blazer-ceket-p-329550915',
            'https://www.trendyol.com/defacto/baskili-bomber-ceket-p-639316117',
            'https://www.trendyol.com/defacto/loose-fit-kazayagi-desenli-tweed-blazer-ceket-p-376019468',
            'https://www.trendyol.com/defacto/oversize-fit-kazayagi-desenli-dokulu-tuvit-blazer-ceket-p-754988972',
            'https://www.trendyol.com/defacto/su-itici-suni-deri-biker-ceket-p-658704106',
            'https://www.trendyol.com/defacto/coool-regular-fit-blazer-ceket-p-649374220',
            'https://www.trendyol.com/defacto/oversize-fit-tweed-blazer-p-346985174',
            'https://www.trendyol.com/defacto/oversize-fit-tweed-blazer-p-349313457',
            'https://www.trendyol.com/defacto/coool-oversize-fit-gabardin-blazer-ceket-p-759687624',
            'https://www.trendyol.com/defacto/su-itici-relax-fit-suni-deri-kemerli-crop-biker-ceket-p-674636262',
            'https://www.trendyol.com/defacto/crop-tweed-blazer-p-759240998',
            'https://www.trendyol.com/defacto/crop-bisiklet-yaka-tweed-blazer-p-346050844',
            'https://www.trendyol.com/defacto/sorbe-x-loose-fit-blazer-p-681295700',
            'https://www.trendyol.com/defacto/loose-fit-suni-deri-blazer-p-764481031',
            'https://www.trendyol.com/defacto/regular-fit-kapakli-cepli-blazer-ceket-p-260468308',
            'https://www.trendyol.com/defacto/loose-fit-blazer-p-676640472',
            'https://www.trendyol.com/defacto/sorbe-x-loose-fit-triko-blazer-ceket-p-666570514',
            'https://www.trendyol.com/defacto/regular-fit-gomlek-yaka-blazer-p-359391694',
            'https://www.trendyol.com/defacto/regular-fit-cift-yuzlu-blazer-ceket-p-420890026',
            'https://www.trendyol.com/defacto/sorbe-x-loose-fit-blazer-p-680475687',
            'https://www.trendyol.com/defacto/df-plus-buyuk-beden-regular-fit-ceket-yaka-dokulu-blazer-ceket-p-366820210',
            'https://www.trendyol.com/defacto/oversize-fit-tweed-blazer-p-752812120',
            'https://www.trendyol.com/defacto/kadin-fermuar-detayli-ceket-i7294az-18sp-bk46-p-2610811',
            'https://www.trendyol.com/defacto/regular-fit-keten-karisimli-blazer-p-333893012',
            'https://www.trendyol.com/defacto/coool-oversize-fit-kare-desenli-dugmeli-crop-blazer-p-649369459',
            'https://www.trendyol.com/defacto/relax-fit-suni-deri-ceket-p-342456934',
            'https://www.trendyol.com/defacto/relax-fit-cep-detayli-yarim-kol-gomlek-ceket-p-342797866',
            'https://www.trendyol.com/defacto/crop-blazer-p-333409741',
            'https://www.trendyol.com/defacto/regular-fit-crop-blazer-p-670198446',
            'https://www.trendyol.com/defacto/sorbe-x-oversize-fit-yun-gorunumlu-blazer-ceket-p-666572612',
            'https://www.trendyol.com/defacto/regular-fit-tweed-blazer-p-354398127',
            'https://www.trendyol.com/defacto/sorbe-x-loose-fit-blazer-ceket-p-707194288',
            'https://www.trendyol.com/defacto/regular-fit-blazer-p-641037606',
            'https://www.trendyol.com/defacto/regular-fit-crop-blazer-p-702007918',
            'https://www.trendyol.com/defacto/relax-fit-cep-detayli-yarim-kol-gomlek-ceket-p-340500206',
            'https://www.trendyol.com/defacto/relax-fit-cep-detayli-yarim-kol-gomlek-ceket-p-342815591',
            'https://www.trendyol.com/defacto/oversize-fit-kazayagi-desenli-blazer-ceket-p-358437162',
            'https://www.trendyol.com/defacto/relax-fit-basic-blazer-ceket-p-329551488',
            'https://www.trendyol.com/defacto/sorbe-x-slim-fit-dugmeli-yelek-p-680470535',
            'https://www.trendyol.com/defacto/regular-fit-bisiklet-yaka-keten-karisimli-blazer-p-346183490',
            'https://www.trendyol.com/defacto/regular-fit-gomlek-yaka-blazer-p-359392313',
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
                    'brand' => "Defacto",
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
        
        $products = DB::select("SELECT * FROM products WHERE brand='Defacto'");
        return view('brands/defacto', ['products' => $products]);
    }

    public function getdefacto() {
        $products = DB::select('SELECT * FROM products WHERE brand = "Defacto"');
        return $products;
    }

}

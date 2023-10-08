<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class BershkaController extends Controller
{
    public function allbershka(Request $request){
        $products = DB::select("SELECT * FROM products WHERE brand='Bershka'");
        return view('brands/bershka', ['products' => $products]);
    }

    public function dbbershka() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/bershka/feminen-kesim-regular-fit-klasik-kruvaze-blazer-p-652816143',
            'https://www.trendyol.com/bershka/feminen-kesim-regular-fit-klasik-kruvaze-blazer-p-641292789',
            'https://www.trendyol.com/bershka/feminen-kesim-regular-fit-klasik-kruvaze-blazer-p-648525117',
            'https://www.trendyol.com/bershka/basic-blazer-p-749818037',
            'https://www.trendyol.com/bershka/basic-blazer-p-749818009',
            'https://www.trendyol.com/bershka/basic-blazer-p-754893046',
            'https://www.trendyol.com/bershka/suni-deri-dad-fit-ceket-p-743313661',
            'https://www.trendyol.com/bershka/suni-deri-dad-fit-ceket-p-745795651',
            'https://www.trendyol.com/bershka/suni-deri-dad-fit-ceket-p-743313657',
            'https://www.trendyol.com/bershka/cift-tarafli-suni-deri-ceket-p-187902245',
            'https://www.trendyol.com/bershka/uzun-ceket-p-752741864',
            'https://www.trendyol.com/bershka/uzun-ceket-p-760767244',
            'https://www.trendyol.com/bershka/uzun-ceket-p-752741851',
            'https://www.trendyol.com/bershka/uzun-ceket-p-752743200',
            'https://www.trendyol.com/bershka/blok-renkli-kapusonlu-ceket-p-759376825',
            'https://www.trendyol.com/bershka/blok-renkli-kapusonlu-ceket-p-759381977',
            'https://www.trendyol.com/bershka/pamuklu-kisa-ceket-p-665014744',
            'https://www.trendyol.com/bershka/blok-renkli-naylon-karisimli-ceket-p-758794183',
            'https://www.trendyol.com/bershka/suni-yunlu-vintage-suni-deri-trucker-ceket-p-756808597',
            'https://www.trendyol.com/bershka/cift-tarafli-suni-deri-ceket-p-758120078',
            'https://www.trendyol.com/bershka/cropped-denim-mont-p-648525140',
            'https://www.trendyol.com/bershka/distressed-suni-deri-bomber-ceket-p-746355971',
            'https://www.trendyol.com/bershka/cepli-pamuklu-kapusonlu-ceket-p-652794536',
            'https://www.trendyol.com/bershka/dokulu-yirtilmaz-crop-ceket-p-666228292',
            'https://www.trendyol.com/bershka/suni-deri-crop-fit-ince-ceket-p-743130846',
            'https://www.trendyol.com/bershka/feminen-bol-kesim-klasik-blazer-p-635010162',
            'https://www.trendyol.com/bershka/suni-kurklu-oversize-biker-ceket-p-756891279',
            'https://www.trendyol.com/bershka/dokulu-yirtilmaz-crop-ceket-p-666177819',
            'https://www.trendyol.com/bershka/detayli-crop-blazer-ceket-p-749817632',
            'https://www.trendyol.com/bershka/3-boyutlu-cepli-ceket-p-732037773',
            'https://www.trendyol.com/bershka/spy-x-family-baskili-naylon-ceket-p-748889983',
            'https://www.trendyol.com/bershka/feminen-kesim-dokumlu-blazer-p-514307185',
            'https://www.trendyol.com/bershka/pamuklu-bolero-bomber-ceket-p-747794146',
            'https://www.trendyol.com/bershka/feminen-bol-kesim-klasik-blazer-p-637312506',
            'https://www.trendyol.com/bershka/fermuarli-tailored-fit-trucker-blazer-p-751624392',
            'https://www.trendyol.com/bershka/denim-crop-ceket-p-742778412',
            'https://www.trendyol.com/bershka/soluk-efektli-bomber-ceket-p-760766949',
            'https://www.trendyol.com/bershka/soluk-efektli-denim-oversize-biker-ceket-p-764036478',
            'https://www.trendyol.com/bershka/sisme-denim-ceket-p-762617134',
            'https://www.trendyol.com/bershka/fermuarli-crop-fit-ceket-p-748890235',
            'https://www.trendyol.com/bershka/feminen-kesim-dokumlu-blazer-p-511616926',
            'https://www.trendyol.com/bershka/uzun-ceket-p-752741908',
            'https://www.trendyol.com/bershka/fitilli-strec-ceket-p-752741780',
            'https://www.trendyol.com/bershka/distressed-suni-deri-bolero-p-760767079',
            'https://www.trendyol.com/bershka/crop-denim-ceket-p-748890172',
            'https://www.trendyol.com/bershka/askili-crop-fit-blazer-p-755076345',
            'https://www.trendyol.com/bershka/fermuarli-denim-ceket-p-764034925',
            'https://www.trendyol.com/bershka/vatkali-crop-denim-ceket-p-754567905',
            'https://www.trendyol.com/bershka/bomber-ceket-p-748890026',
            'https://www.trendyol.com/bershka/parlak-pelus-mont-p-764034711',
            'https://www.trendyol.com/bershka/pamuk-ve-naylon-karisimli-kisa-ceket-p-744785614',
            'https://www.trendyol.com/bershka/naylon-karisimli-yarisci-ceket-p-754892874',
            'https://www.trendyol.com/bershka/suni-deri-biker-ceket-p-714327401',
            'https://www.trendyol.com/bershka/bomber-ceket-p-747844908',
            'https://www.trendyol.com/bershka/distressed-detayli-suni-deri-biker-ceket-p-744785857',
            'https://www.trendyol.com/bershka/suni-deri-oversize-dad-fit-ceket-p-751624493',
            'https://www.trendyol.com/bershka/ince-cizgili-crop-fit-blazer-p-754893027',
            'https://www.trendyol.com/bershka/suni-yunlu-suni-suet-crop-ceket-p-760767052',
            'https://www.trendyol.com/bershka/kapusonlu-pelus-ceket-p-752856490',
            'https://www.trendyol.com/bershka/metalik-renk-sisme-mont-p-761306419',
            'https://www.trendyol.com/bershka/kapitone-kanvas-worker-ceket-p-750038939',
            'https://www.trendyol.com/bershka/ozel-dikim-bomber-ceket-p-753760398',
            'https://www.trendyol.com/bershka/metalik-bomber-ceket-p-764034833',
            'https://www.trendyol.com/bershka/yakasi-suni-yunlu-kisa-suni-deri-pilot-ceket-p-760766972',
            'https://www.trendyol.com/bershka/new-york-islemeli-fermuarli-sweatshirt-p-752845393',
            'https://www.trendyol.com/bershka/kapusonlu-pelus-ceket-p-747771631',
            'https://www.trendyol.com/bershka/suni-deri-biker-ceket-p-754565709',
            'https://www.trendyol.com/bershka/denim-bomber-ceket-p-762617145',
            'https://www.trendyol.com/bershka/deri-katli-yaka-crop-sisme-mont-p-760766994',
            'https://www.trendyol.com/bershka/denim-ince-ceket-p-754893466',
            'https://www.trendyol.com/bershka/denim-trenckot-p-747795619',
            'https://www.trendyol.com/bershka/crop-naylon-karisimli-kapusonlu-ceket-p-750778253',
            'https://www.trendyol.com/bershka/suni-kurklu-oversize-biker-ceket-p-762616795',
            'https://www.trendyol.com/bershka/cepli-bolero-p-762617935',
            'https://www.trendyol.com/bershka/oversize-blazer-ceket-p-760766805',
            'https://www.trendyol.com/bershka/fermuarli-tailored-fit-trucker-blazer-p-744786073',
            'https://www.trendyol.com/bershka/feminen-bol-kesim-klasik-blazer-p-637342650',
            'https://www.trendyol.com/bershka/cepli-pamuklu-ceket-p-747773830',
            'https://www.trendyol.com/bershka/cepli-pamuklu-ceket-p-747773930',
            'https://www.trendyol.com/bershka/fosforlu-detayli-kapusonlu-ceket-p-750039073',
            'https://www.trendyol.com/bershka/ince-cizgili-crop-fit-blazer-p-754891848',
            'https://www.trendyol.com/bershka/crop-denim-trench-ceket-p-752739761',
            'https://www.trendyol.com/bershka/fosforlu-detayli-kapusonlu-ceket-p-750039068',
            'https://www.trendyol.com/bershka/distressed-suni-deri-trucker-ceket-p-751624910',
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
        
        $products = DB::select("SELECT * FROM products WHERE brand='Bershka'");
        return view('brands/bershka', ['products' => $products]);
    }

    public function getbershka() {
        $products = DB::select('SELECT * FROM products WHERE brand = "Bershka"');
        return $products;
    }
}
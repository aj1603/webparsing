<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StradivariusController extends Controller
{
    public function dbstradivarius() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-suni-suet-crop-biker-ceket-p-235563079',
            'https://www.trendyol.com/stradivarius/kemerli-suni-deri-biker-ceket-p-37197593',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-suni-suet-crop-biker-ceket-p-47049000',
            'https://www.trendyol.com/stradivarius/suni-kurklu-biker-ceket-p-51247165',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-48161635',
            'https://www.trendyol.com/stradivarius/suni-deri-oversize-biker-ceket-p-37197269',
            'https://www.trendyol.com/stradivarius/ici-kurklu-suni-deri-biker-ceket-p-51038668',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-331883816',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-suni-suet-crop-biker-ceket-p-47049006',
            'https://www.trendyol.com/stradivarius/cepli-suni-deri-ceket-p-354097910',
            'https://www.trendyol.com/stradivarius/vintage-efektli-suni-deri-biker-ceket-p-743166001',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-752646624',
            'https://www.trendyol.com/stradivarius/oversize-denim-ince-ceket-p-636370263',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-331888269',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-suni-deri-biker-ceket-p-142574203',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-suni-deri-biker-ceket-p-142574203',
            'https://www.trendyol.com/stradivarius/kemerli-suni-deri-biker-ceket-p-37792115',
            'https://www.trendyol.com/stradivarius/soluk-efektli-suni-deri-pilot-ceket-p-750778440',
            'https://www.trendyol.com/stradivarius/ici-kurklu-suni-deri-biker-ceket-p-341469740',
            'https://www.trendyol.com/stradivarius/orta-boy-suni-deri-biker-ceket-p-755146028',
            'https://www.trendyol.com/stradivarius/triko-blazer-p-208559177',
            'https://www.trendyol.com/stradivarius/suni-deri-crop-biker-ceket-p-252555409',
            'https://www.trendyol.com/stradivarius/suni-yunlu-uzun-biker-ceket-p-750505115',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-750040532',
            'https://www.trendyol.com/stradivarius/suni-deri-suni-yunlu-ceket-p-750677510',
            'https://www.trendyol.com/stradivarius/yumusak-kisa-ceket-p-750016910',
            'https://www.trendyol.com/stradivarius/yumusak-suni-kurklu-biker-ceket-p-761638083',
            'https://www.trendyol.com/stradivarius/suni-deri-suni-yunlu-ceket-p-750677125',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-743563460',
            'https://www.trendyol.com/stradivarius/yumusak-dokulu-oversize-bomber-ceket-p-758012195',
            'https://www.trendyol.com/stradivarius/straight-fit-blazer-p-640008131',
            'https://www.trendyol.com/stradivarius/yumusak-bomber-ceket-p-750505756',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-753341934',
            'https://www.trendyol.com/stradivarius/regular-fit-denim-ceket-p-645572730',
            'https://www.trendyol.com/stradivarius/kadin-kahverengi-kemerli-suni-deri-basic-ceket-01733030-p-45312834',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-crop-biker-ceket-p-37197608',
            'https://www.trendyol.com/stradivarius/yumusak-kisa-ceket-p-750016867',
            'https://www.trendyol.com/stradivarius/yumusak-dokulu-oversize-bomber-ceket-p-758011433',
            'https://www.trendyol.com/stradivarius/triko-blazer-p-45192184',
            'https://www.trendyol.com/stradivarius/yumusak-kruvaze-ceket-p-750673457',
            'https://www.trendyol.com/stradivarius/soluk-efektli-suni-deri-bomber-ceket-p-761506598',
            'https://www.trendyol.com/stradivarius/yumusak-kisa-ceket-p-750118267',
            'https://www.trendyol.com/stradivarius/kruvaze-detayli-ici-suni-kurklu-crop-mont-p-348082750',
            'https://www.trendyol.com/stradivarius/yumusak-suni-kurklu-biker-ceket-p-761636782',
            'https://www.trendyol.com/stradivarius/suni-kurklu-biker-ceket-p-358501502',
            'https://www.trendyol.com/stradivarius/suni-kurklu-oversize-ceket-p-763435127',
            'https://www.trendyol.com/stradivarius/cikarilabilir-yakali-pilot-biker-ceket-p-753343112',
            'https://www.trendyol.com/stradivarius/suni-yunlu-astar-detayli-naylon-ceket-p-752659693',
            'https://www.trendyol.com/stradivarius/soluk-efektli-suni-deri-crop-bomber-ceket-p-752663557',
            'https://www.trendyol.com/stradivarius/kemerli-suni-deri-biker-ceket-p-759170505',
            'https://www.trendyol.com/stradivarius/oversize-denim-ince-ceket-p-752406750',
            'https://www.trendyol.com/stradivarius/suni-yunlu-crop-fit-ceket-p-752663312',
            'https://www.trendyol.com/stradivarius/suni-deri-bomber-ceket-p-743120275',
            'https://www.trendyol.com/stradivarius/kapusonlu-suni-kurklu-pilot-ceket-p-757989171',
            'https://www.trendyol.com/stradivarius/oversize-denim-ince-ceket-p-691917725',
            'https://www.trendyol.com/stradivarius/kontrast-suni-kurklu-crop-biker-ceket-p-747038011',
            'https://www.trendyol.com/stradivarius/oversize-suni-deri-ceket-p-757997994',
            'https://www.trendyol.com/stradivarius/yumusak-biker-ceket-p-750506018',
            'https://www.trendyol.com/stradivarius/kemerli-suni-deri-biker-ceket-p-750768369',
            'https://www.trendyol.com/stradivarius/klasik-bomber-ceket-p-748824794',
            'https://www.trendyol.com/stradivarius/oversize-denim-ince-ceket-p-645550702',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-kapitone-mont-p-135524472',
            'https://www.trendyol.com/stradivarius/yumusak-dokulu-oversize-bomber-ceket-p-767139628',
            'https://www.trendyol.com/stradivarius/vucuda-oturan-suni-deri-ceket-p-750848936',
            'https://www.trendyol.com/stradivarius/yumusak-kisa-kruvaze-ceket-p-755150516',
            'https://www.trendyol.com/stradivarius/vintage-efektli-suni-deri-biker-ceket-p-761638092',
            'https://www.trendyol.com/stradivarius/dokumlu-crop-blazer-p-658612792',
            'https://www.trendyol.com/stradivarius/uzun-suni-deri-biker-ceket-p-750672364',
            'https://www.trendyol.com/stradivarius/kontrast-dikisli-suni-deri-ceket-p-750043041',
            'https://www.trendyol.com/stradivarius/suni-deri-biker-ceket-p-750016665',
            'https://www.trendyol.com/stradivarius/kapusonlu-kisa-parka-p-763662845',
            'https://www.trendyol.com/stradivarius/kadin-siyah-deri-biker-ceket-p-101190467',
            'https://www.trendyol.com/stradivarius/ici-suni-kurklu-biker-ceket-p-761317043',            
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
                    'brand' => "Stradivarius",
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

    public function dbstradivarius1() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/stradivarius/yumusak-suni-kurklu-biker-ceket-p-359344491',        
            'https://www.trendyol.com/stradivarius/triko-blazer-p-208543810',        
            'https://www.trendyol.com/stradivarius/yumusak-biker-ceket-p-761318270',        
            'https://www.trendyol.com/stradivarius/suni-deri-blazer-p-751636294',        
            'https://www.trendyol.com/stradivarius/cepli-oversize-ceket-p-757991256',        
            'https://www.trendyol.com/stradivarius/dokumlu-crop-blazer-p-655275180',        
            'https://www.trendyol.com/stradivarius/suni-yunlu-crop-fit-ceket-p-752660546',        
            'https://www.trendyol.com/stradivarius/yumusak-kisa-kruvaze-ceket-p-649537089',        
            'https://www.trendyol.com/stradivarius/suni-kurk-cift-tarafli-pilot-ceket-p-757991741',        
            'https://www.trendyol.com/stradivarius/oversize-suni-deri-ceket-p-761158990',        
            'https://www.trendyol.com/stradivarius/yumusak-suni-kurklu-ceket-p-753708697',        
            'https://www.trendyol.com/stradivarius/cift-tarafli-bomber-ceket-p-761317755',        
            'https://www.trendyol.com/stradivarius/dugmeli-blazer-p-636422959',        
            'https://www.trendyol.com/stradivarius/soluk-efektli-bomber-ceket-p-755517714',        
            'https://www.trendyol.com/stradivarius/cepli-suni-deri-ceket-p-751637145',
            'https://www.trendyol.com/stradivarius/vintage-deri-biker-ceket-p-748656844',      
            'https://www.trendyol.com/stradivarius/soluk-efektli-oversize-suni-deri-ceket-p-750777818',        
            'https://www.trendyol.com/stradivarius/ince-cizgili-uzun-blazer-p-345974869',        
            'https://www.trendyol.com/stradivarius/suni-yunlu-kontrast-pilot-ceket-p-754038307',        
            'https://www.trendyol.com/stradivarius/kemerli-suni-deri-biker-ceket-p-635156116',        
            'https://www.trendyol.com/stradivarius/vintage-efektli-suni-deri-ceket-p-762912622',        
            'https://www.trendyol.com/stradivarius/suni-deri-crop-biker-ceket-p-748844680',        
            'https://www.trendyol.com/stradivarius/vintage-efektli-suni-kurklu-ceket-p-755058822',        
            'https://www.trendyol.com/stradivarius/soluk-efektli-suni-deri-bomber-ceket-p-761313621',        
            'https://www.trendyol.com/stradivarius/soluk-efektli-fitilli-kumas-ceket-p-758004252',        
            'https://www.trendyol.com/stradivarius/suni-kurklu-pilot-ceket-p-753342771',        
            'https://www.trendyol.com/stradivarius/kisa-denim-ceket-p-268844186',        
            'https://www.trendyol.com/stradivarius/kemerli-deri-biker-ceket-p-130596951',        
            'https://www.trendyol.com/stradivarius/soluk-efektli-denim-bomber-ceket-p-752662501',        
            'https://www.trendyol.com/stradivarius/uzun-blazer-p-135933754',        
            'https://www.trendyol.com/stradivarius/on-cepli-suni-deri-ceket-p-748679901',        
            'https://www.trendyol.com/stradivarius/cepli-oversize-suni-deri-ceket-p-750778938',        
            'https://www.trendyol.com/stradivarius/kadin-ceket-p-751636640',        
            'https://www.trendyol.com/stradivarius/vintage-deri-biker-ceket-p-748671175',        
            'https://www.trendyol.com/stradivarius/suni-deri-blazer-p-756901090',        
            'https://www.trendyol.com/stradivarius/kazayagi-desenli-dokumlu-blazer-p-752652716',        
            'https://www.trendyol.com/stradivarius/crop-fit-blazer-p-752696757',        
            'https://www.trendyol.com/stradivarius/oversize-blazer-p-752653053',        
            'https://www.trendyol.com/stradivarius/kivrik-kollu-blazer-p-752409112',        
            'https://www.trendyol.com/stradivarius/kazayagi-desenli-oversize-blazer-p-752697923',        
            'https://www.trendyol.com/stradivarius/yelekli-blazer-p-761590581',  
            'https://www.trendyol.com/stradivarius/suni-suet-blazer-p-756794329',    
            'https://www.trendyol.com/stradivarius/onu-acik-blazer-p-761580706',        
            'https://www.trendyol.com/stradivarius/crop-fit-blazer-p-752696792',        
            'https://www.trendyol.com/stradivarius/crop-blazer-p-756898045',        
            'https://www.trendyol.com/stradivarius/bol-kesim-onu-acik-blazer-p-754915117',        
            'https://www.trendyol.com/stradivarius/crop-fit-blazer-p-752697470',        
            'https://www.trendyol.com/stradivarius/kruvaze-blazer-p-761586918',        
            'https://www.trendyol.com/stradivarius/kemerli-uzun-blazer-p-760549716',        
            'https://www.trendyol.com/stradivarius/kivrik-kollu-blazer-p-752660979',        
            'https://www.trendyol.com/stradivarius/distressed-suni-deri-blazer-p-753318018',        
            'https://www.trendyol.com/stradivarius/denim-blazer-p-761590836',        
            'https://www.trendyol.com/stradivarius/kivrik-kollu-blazer-p-752652141',
            'https://www.trendyol.com/stradivarius/kemerli-uzun-blazer-p-760828288',
            'https://www.trendyol.com/stradivarius/tokali-crop-blazer-p-756962257',
            'https://www.trendyol.com/stradivarius/kemerli-uzun-blazer-p-760569713',
            'https://www.trendyol.com/stradivarius/suni-deri-blazer-ceket-p-761181871',
            'https://www.trendyol.com/stradivarius/denim-blazer-p-760830038',
            'https://www.trendyol.com/stradivarius/kemerli-uzun-blazer-p-760543469',
            'https://www.trendyol.com/stradivarius/crop-blazer-p-760921781',
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
                    'brand' => "Stradivarius",
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

    public function getstradivarius() {
        $products = DB::select('SELECT * FROM products WHERE brand = "Stradivarius"');
        return $products;
    }
}

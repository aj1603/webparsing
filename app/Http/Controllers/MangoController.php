<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class MangoController extends Controller
{
    public function allmango(Request $request){
        $products = DB::select("SELECT * FROM products WHERE brand='Mango'");
        return view('brands/mango', ['products' => $products]);
    }

    public function dbmango() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/mango/deri-gorunumlu-biker-ceket-p-737861600',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-748875708',
            'https://www.trendyol.com/mango/suni-kurk-astarli-ceket-p-751645490',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-737859129',
            'https://www.trendyol.com/mango/suni-kurk-astarli-ceket-p-751645471',
            'https://www.trendyol.com/mango/capraz-dugmeli-blazer-ceket-p-748875954',
            'https://www.trendyol.com/mango/kemerli-denim-mont-p-753330128',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-737856505',
            'https://www.trendyol.com/mango/cepleri-kapakli-blazer-ceket-p-748875896',
            'https://www.trendyol.com/mango/dugmeli-kumas-blazer-ceket-p-748875984',
            'https://www.trendyol.com/mango/ceket-p-759422690',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-737848578',
            'https://www.trendyol.com/mango/cepli-tuvit-ceket-p-748875652',
            'https://www.trendyol.com/mango/cepli-denim-gomlek-ceket-p-739936659',
            'https://www.trendyol.com/mango/suni-kurk-astarli-ceket-p-765471903',
            'https://www.trendyol.com/mango/oversize-deri-gorunumlu-ceket-p-748876255',
            'https://www.trendyol.com/mango/buzgulu-kollu-blazer-ceket-p-748876648',
            'https://www.trendyol.com/mango/ceket-p-762732134',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-749643881',
            'https://www.trendyol.com/mango/kadin-haki-ceket-p-691833798',
            'https://www.trendyol.com/mango/oversize-pamuklu-ceket-p-280988971',
            'https://www.trendyol.com/pd/mango/yelek-p-763217259',
            'https://www.trendyol.com/mango/dugmeli-kalipli-blazer-ceket-p-748876380',
            'https://www.trendyol.com/mango/roma-dokuma-uste-oturan-amerikan-ceket-p-740111458',
            'https://www.trendyol.com/mango/capraz-dugmeli-blazer-ceket-p-748876082',
            'https://www.trendyol.com/mango/pamuklu-kapitone-ceket-p-755839120',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-737886481',
            'https://www.trendyol.com/mango/kazayagi-desenli-klapali-blazer-ceket-p-759816453',
            'https://www.trendyol.com/mango/cicek-aplikli-yelek-p-740231777',
            'https://www.trendyol.com/mango/polo-yakali-dokuma-yelek-p-748876540    ',
            'https://www.trendyol.com/mango/kruvaze-kesim-tuvit-ceket-p-242097896',
            'https://www.trendyol.com/mango/kruvaze-blazer-ceket-p-749244987',
            'https://www.trendyol.com/mango/mango-yakasi-kurklu-biker-ceket-p-670215619',
            'https://www.trendyol.com/mango/polo-yakali-dokuma-yelek-p-748876187',
            'https://www.trendyol.com/mango/fermuarli-pamuklu-ceket-p-766076759',
            'https://www.trendyol.com/mango/oversize-denim-mont-p-737854060',
            'https://www.trendyol.com/mango/ceket-p-755632612',
            'https://www.trendyol.com/mango/oversize-bomber-ceket-p-749643833',
            'https://www.trendyol.com/mango/mucevher-dugme-tweed-amerikan-ceket-p-759816569',
            'https://www.trendyol.com/mango/kruvaze-yakali-kumas-blazer-ceket-p-242072435',
            'https://www.trendyol.com/mango/kruvaze-yakali-blazer-ceket-p-242108122',
            'https://www.trendyol.com/mango/cepli-denim-gomlek-ceket-p-748879045',
            'https://www.trendyol.com/mango/diplomatik-cizgili-yelek-p-748876259',
            'https://www.trendyol.com/mango/buzgulu-kollu-blazer-ceket-p-748876549',
            'https://www.trendyol.com/mango/tuvit-bomber-ceket-p-748876248',
            'https://www.trendyol.com/mango/oversize-keten-blazer-p-276341040',
            'https://www.trendyol.com/mango/mucevher-dugmeli-blazer-ceket-p-748877575',
            'https://www.trendyol.com/mango/oversize-bomber-ceket-p-756690512',
            'https://www.trendyol.com/mango/cicek-aplikli-yelek-p-740231791',
            'https://www.trendyol.com/mango/kalipli-yirtik-detayli-blazer-ceket-p-229727592',
            'https://www.trendyol.com/mango/deri-gorunumlu-biker-ceket-p-738555736',
            'https://www.trendyol.com/mango/oversize-keten-ceket-p-688509873',
            'https://www.trendyol.com/mango/dugmeleri-tasli-tuvit-ceket-p-748879066',
            'https://www.trendyol.com/mango/cepli-tuvit-ceket-p-224566308',
            'https://www.trendyol.com/mango/mango-kalipli-gri-blazer-ceket-p-334065763',
            'https://www.trendyol.com/mango/dugmeli-pamuklu-gomlek-ceket-p-756005688',
            'https://www.trendyol.com/mango/oversize-bomber-ceket-p-756690679',
            'https://www.trendyol.com/mango/ceket-p-755839112',
            'https://www.trendyol.com/mango/ceket-p-763217675',
            'https://www.trendyol.com/mango/ceket-p-755839053',
            'https://www.trendyol.com/mango/yapili-takim-ceket-p-760988306',
            'https://www.trendyol.com/mango/pamuklu-kapitone-ceket-p-240354877',
            'https://www.trendyol.com/mango/roma-dokuma-uste-oturan-amerikan-ceket-p-740111497',
            'https://www.trendyol.com/mango/dugmeli-kumas-blazer-ceket-p-748876217',
            'https://www.trendyol.com/mango/dugmeli-takim-yelek-p-373598359',
            'https://www.trendyol.com/mango/cepli-tuvit-ceket-p-748878469',
            'https://www.trendyol.com/mango/pensli-saf-yun-pantolon-p-757672563',
            'https://www.trendyol.com/mango/saten-bomber-ceket-p-766333029',
            'https://www.trendyol.com/mango/kazayagi-desenli-yun-blazer-ceket-p-753330058',
            'https://www.trendyol.com/mango/ince-cizgili-kumas-blazer-ceket-p-748876095',
            'https://www.trendyol.com/mango/dugmeli-fit-kesim-yelek-p-740111417',
            'https://www.trendyol.com/mango/cepli-kot-ceket-p-275968475',
            'https://www.trendyol.com/mango/oversize-denim-mont-p-737857629',
            'https://www.trendyol.com/mango/kollari-fermuarli-blazer-p-753330062',
            'https://www.trendyol.com/mango/aplikli-kurklu-palto-p-763627870',
            'https://www.trendyol.com/mango/kapitone-hafifi-yelek-p-748878755',
            'https://www.trendyol.com/mango/ceket-p-756022238',
            'https://www.trendyol.com/mango/dugmeli-fit-kesim-yelek-p-740111414',
            'https://www.trendyol.com/mango/cepli-bomber-ceket-p-755011655',
            'https://www.trendyol.com/mango/kapitoneli-bomber-ceket-p-759438213',
            'https://www.trendyol.com/mango/vatkali-bomber-ceket-p-753330052',
            'https://www.trendyol.com/mango/yakasi-kurklu-mont-p-753330111',
            'https://www.trendyol.com/mango/fitted-kesim-ceket-p-748878611',
            'https://www.trendyol.com/mango/cepli-tuvit-ceket-p-748881453',
            'https://www.trendyol.com/mango/mont-p-753500841',
            'https://www.trendyol.com/mango/kontrast-smokin-yakali-kalipli-blazer-ceket-p-748878772',
            'https://www.trendyol.com/mango/100-keten-kumas-blazer-ceket-p-670251842',
            'https://www.trendyol.com/mango/dugmeli-kolsuz-trenckot-p-748876796',
        ];
        
        Product::where('brand', '=', 'Mango')->delete();

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
                    'brand' => "Mango",
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

    public function dbmango1() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/mango/cepli-tuvit-ceket-p-748879740',
            'https://www.trendyol.com/mango/kisa-kruvaze-blazer-ceket-p-748876538',
            'https://www.trendyol.com/mango/kapitone-hafifi-yelek-p-748879640',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-742125921',
            'https://www.trendyol.com/mango/mucevher-dugmeli-blazer-ceket-p-748876053',
            'https://www.trendyol.com/mango/dugmeli-kumas-blazer-ceket-p-656008643',
            'https://www.trendyol.com/mango/oversize-bomber-ceket-p-749643747',
            'https://www.trendyol.com/mango/kruvaze-yaka-kumas-blazer-ceket-p-655974924',
            'https://www.trendyol.com/mango/yun-takim-elbise-yelegi-p-753330135',
            'https://www.trendyol.com/mango/cift-tarafli-kapitone-ceket-p-755839200',
            'https://www.trendyol.com/mango/oversize-yun-bomber-ceket-p-753390899',
            'https://www.trendyol.com/mango/roma-dokuma-uste-oturan-amerikan-ceket-p-740111456',
            'https://www.trendyol.com/mango/kalipli-blazer-ceket-p-757817167',
            'https://www.trendyol.com/mango/denim-bomber-ceket-p-748875713',
            'https://www.trendyol.com/mango/mucevher-dugme-tweed-amerikan-ceket-p-741210577',
            'https://www.trendyol.com/mango/kareli-pamuklu-ceket-p-210867822',
            'https://www.trendyol.com/mango/100-keten-kumas-blazer-ceket-p-670259489',
            'https://www.trendyol.com/mango/ceket-p-761639047',
            'https://www.trendyol.com/mango/deri-gorunumlu-biker-ceket-p-759426611',
            'https://www.trendyol.com/mango/kullanilmis-efektli-bomber-ceket-p-750860924',
            'https://www.trendyol.com/mango/mucevher-dugme-tweed-amerikan-ceket-p-748877746',
            'https://www.trendyol.com/mango/cepli-kisa-tuvit-ceket-p-748881238',
            'https://www.trendyol.com/mango/deri-gorunumlu-biker-ceket-p-752420218',
            'https://www.trendyol.com/mango/pamuklu-kapitone-ceket-p-240356757',
            'https://www.trendyol.com/mango/ince-cizgili-yelek-p-754639780',
            'https://www.trendyol.com/mango/yakasi-kurklu-mont-p-753330036',
            'https://www.trendyol.com/mango/kurk-yakali-denim-ceket-p-762061983',
            'https://www.trendyol.com/mango/fitted-kesim-ceket-p-738540248',
            'https://www.trendyol.com/mango/ceket-p-755839146',
            'https://www.trendyol.com/mango/kruvaze-kesim-ceket-p-753330136',
            'https://www.trendyol.com/mango/uzun-kapitone-yelek-p-756722069',
            'https://www.trendyol.com/mango/ceket-p-761400352',
            'https://www.trendyol.com/mango/ceket-p-759816477',
            'https://www.trendyol.com/mango/uzun-kapitone-yelek-p-760977704',
            'https://www.trendyol.com/mango/kisa-kruvaze-blazer-ceket-p-755377641',
            'https://www.trendyol.com/mango/kisa-klapali-blazer-p-753330161',
            'https://www.trendyol.com/mango/oversize-bomber-ceket-p-749643756',
            'https://www.trendyol.com/mango/deri-gorunumlu-ceket-p-749545855',
            'https://www.trendyol.com/mango/kruvaze-kesimli-blazer-ceket-p-748876729',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-739936608',
            'https://www.trendyol.com/mango/oversize-denim-mont-p-738851387',
            'https://www.trendyol.com/mango/fitted-kesim-ceket-p-443868549',
            'https://www.trendyol.com/mango/cepli-oversize-yelek-p-200620578',
            'https://www.trendyol.com/mango/fitted-kesim-ceket-p-748877045',
            'https://www.trendyol.com/mango/keten-blazer-ceket-p-737856073',
            'https://www.trendyol.com/mango/kapusonlu-su-gecirmez-kapitoneli-yelek-p-755839049',
            'https://www.trendyol.com/mango/ceket-p-760007504',
            'https://www.trendyol.com/mango/dugmeli-takim-yelek-p-670271759',
            'https://www.trendyol.com/mango/vatkali-bomber-ceket-p-753330074',
            'https://www.trendyol.com/mango/kadin-seftali-ceket-p-54316849',
            'https://www.trendyol.com/mango/dugmeli-crop-yelek-p-748881372',
            'https://www.trendyol.com/mango/kadin-siyah-ceket-77997883-p-659809292',
            'https://www.trendyol.com/mango/ceket-p-757435153',
            'https://www.trendyol.com/mango/kapusonlu-su-gecirmez-kapitoneli-yelek-p-755839065',
            'https://www.trendyol.com/mango/klapali-kalipli-blazer-ceket-p-751294300',
            'https://www.trendyol.com/mango/bag-detayli-uzun-yelek-p-748876934',
            'https://www.trendyol.com/mango/cizgili-pamuklu-ceket-p-239900760',
            'https://www.trendyol.com/mango/deri-gorunumlu-biker-ceket-p-761576185',
            'https://www.trendyol.com/mango/regular-kesim-yunlu-blazer-ceket-p-757187563',
            'https://www.trendyol.com/mango/deri-gorunumlu-ceket-p-756006388',
            'https://www.trendyol.com/mango/diplomatik-cizgili-yelek-p-753500890',
            'https://www.trendyol.com/mango/kapitone-hafifi-yelek-p-748877495',
            'https://www.trendyol.com/mango/yirtmacli-uzun-suveter-p-748876109',
            'https://www.trendyol.com/mango/roma-dokuma-uste-oturan-amerikan-ceket-p-740111522',
            'https://www.trendyol.com/mango/boncuklu-kaftan-p-737851664',
            'https://www.trendyol.com/pd/mango/yelek-p-762732111',
            'https://www.trendyol.com/mango/kadin-ekru-delikli-orgu-kaftan-p-105674857',
            'https://www.trendyol.com/mango/eskitilmis-gorunumlu-biker-ceket-p-748881716',
            'https://www.trendyol.com/pd/mango/oversize-tuvit-yelek-p-761912970',
            'https://www.trendyol.com/mango/yelek-p-763216985',
            'https://www.trendyol.com/mango/ceket-p-759816444',
            'https://www.trendyol.com/mango/cicekli-keten-yelek-p-737864922',
            'https://www.trendyol.com/mango/kareli-tuvit-ceket-p-761400463',
            'https://www.trendyol.com/mango/saten-blazer-ceket-p-660038385',
            'https://www.trendyol.com/mango/uclu-dugmeli-blazer-p-753330203',
            'https://www.trendyol.com/mango/vatkali-ceket-p-760582719',
            'https://www.trendyol.com/mango/ceket-p-757187701',
            'https://www.trendyol.com/mango/cepli-tuvit-ceket-p-753330081',
            'https://www.trendyol.com/mango/cepli-dokulu-ceket-p-748876653',
            'https://www.trendyol.com/mango/genis-cepli-yelek-p-748876460',
            'https://www.trendyol.com/mango/yirtmacli-uzun-suveter-p-748875995',
            'https://www.trendyol.com/mango/crop-denim-ceket-p-748875638',
            'https://www.trendyol.com/mango/saten-blazer-ceket-p-665816139',
            'https://www.trendyol.com/mango/cepli-denim-mont-p-749545843',
            'https://www.trendyol.com/mango/beli-cicekli-ust-gomlek-p-748876589',
            'https://www.trendyol.com/mango/mucevher-dugme-tweed-amerikan-ceket-p-751645061',
            'https://www.trendyol.com/mango/bag-detayli-uzun-yelek-p-748876863',
            'https://www.trendyol.com/mango/bag-detayli-uzun-yelek-p-748876541',
            'https://www.trendyol.com/mango/dugmeli-crop-yelek-p-748880002',
            'https://www.trendyol.com/mango/kruvaze-yaka-kumas-blazer-ceket-p-766983875',
        ];
        
        Product::where('brand', '=', 'Mango')->delete();

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
                    'brand' => "Mango",
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

    public function getmango() {
        $products = DB::select('SELECT * FROM products WHERE brand = "Mango"');
        return $products;
    }

}


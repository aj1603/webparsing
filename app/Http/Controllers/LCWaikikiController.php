<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LCWaikikiController extends Controller
{
    public function alllcwaikiki(Request $request){
        $products = DB::select("SELECT * FROM products WHERE brand='LCWaikiki'");
        return view('brands/lcwaikiki', ['products' => $products]);
    }

    public function dblcwaikiki() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-ceket-p-750668457',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-deri-gorunumlu-kadin-ceket-p-762092667',
            'https://www.trendyol.com/lc-waikiki/bisiklet-yaka-ekose-uzun-kollu-kadin-ceket-p-751561938',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-366942146',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-kadin-biker-yaka-duz-deri-gorunumlu-mont-p-766801531',
            'https://www.trendyol.com/lc-waikiki/kadin-deri-ceket-p-766199854',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-kadin-duz-blazer-ceket-p-760806952',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-765930943',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-ceket-p-765944893',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-desenli-oversize-kadin-oduncu-gomlek-ceket-p-761509849',
            'https://www.trendyol.com/lc-waikiki/classic-duz-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-764109294',
            'https://www.trendyol.com/lc-waikiki/kadin-ceket-p-759019112',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-ceket-city-p-761440785',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-759204205',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-oversize-kadin-kolej-ceket-p-754019769',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadife-kadin-gomlek-ceket-p-366942180',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-gomlek-yaka-duz-uzun-kollu-oversize-kadin-jean-ceket-p-749705234',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-tuvit-kadin-gomlek-ceket-p-366931174',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-762091995',
            'https://www.trendyol.com/lc-waikiki/nakisli-uzun-kollu-kadin-kolej-ceket-p-762092071',
            'https://www.trendyol.com/lc-waikiki/kadin-jean-ceket-p-752813446',
            'https://www.trendyol.com/lc-waikiki/biker-yaka-duz-uzun-kollu-kadin-jean-ceket-p-662807272',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-kadin-kolej-ceket-p-762092070',
            'https://www.trendyol.com/lc-waikiki/kolej-yaka-baskili-uzun-kollu-kadin-bomber-ceket-p-679252271',
            'https://www.trendyol.com/lc-waikiki/kadin-jean-ceket-p-766503712',
            'https://www.trendyol.com/lc-waikiki/casual-duz-uzun-kollu-kadin-ceket-p-750667684',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-deri-gorunumlu-kadin-ceket-p-762091997',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-tuvit-oversize-kadin-gomlek-ceket-p-662807529',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-760152603',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kase-kadin-gomlek-ceket-p-366942249',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-751157573',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-duz-uzun-kollu-oversize-kadin-jean-gomlek-ceket-p-753344898',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-desenli-oversize-kadin-oduncu-gomlek-ceket-p-757967126',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-kadin-gomlek-yaka-duz-jean-ceket-p-760781499',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-baskili-uzun-kollu-kadin-kolej-ceket-p-751693856',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-suet-kadin-gomlek-ceket-p-750898098',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-662766863',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-751137417',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-kadin-kruvaze-yaka-duz-kase-kaban-p-765655024',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-kadin-oduncu-gomlek-ceket-p-662807652',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-tuvit-kadin-ceket-p-751614445',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-kadin-ceket-p-662807952',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-759550091',
            'https://www.trendyol.com/lc-waikiki/casual-gomlek-yaka-duz-cep-detayli-uzun-kollu-kadin-ceket-p-741562468',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-760145038',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-751180759',
            'https://www.trendyol.com/lc-waikiki/basic-kapusonlu-duz-uzun-kollu-kadin-spor-ceket-p-750200091',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-gabardin-kumas-kadin-gomlek-ceket-p-366971582',
            'https://www.trendyol.com/lc-waikiki/classic-bisiklet-yaka-kendinden-desenli-uzun-kollu-kadin-ceket-p-760814111',
            'https://www.trendyol.com/lc-waikiki/uzun-kollu-kadin-kolej-ceke-p-759165608',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-oversize-kadin-gomlek-ceket-p-754020024',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-762092210',
            'https://www.trendyol.com/lc-waikiki/kadin-duz-blazer-ceket-p-762092082',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-762091990',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-kadin-jean-gomlek-ceket-p-762091950',
            'https://www.trendyol.com/lc-waikiki/kadin-ceket-p-760170433',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-760141956',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-duz-uzun-kollu-oversize-kadin-jean-gomlek-ceket-p-760119623',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-ceket-p-690774031',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-rodeo-jean-ceket-p-762091978',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-kadin-kolej-ceket-p-751613690',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-duz-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-758758754',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-662807824',
            'https://www.trendyol.com/lc-waikiki/kolej-yaka-baskili-uzun-kollu-kadin-bomber-ceket-p-662781318',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-jean-ceket-p-366966542',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-pamuklu-kadin-gomlek-ceket-p-366946716',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-366937826',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-renk-bloklu-uzun-kollu-kadin-rodeo-jean-ceket-p-366934493',
            'https://www.trendyol.com/lc-waikiki/kadin-derin-koyu-yik-classic-jean-ceket-p-96714698',
            'https://www.trendyol.com/lc-waikiki/kadin-orta-rodeo-lcw-modest-jean-ceket-p-93603925',
            'https://www.trendyol.com/lc-waikiki/kadin-koyu-lacivert-ceket-0sk852z8-p-36512488',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-762092001',
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
                    'brand' => "LCWaikiki",
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

    public function dblcwaikiki1() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-blazer-ceket-p-662807544',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadife-kadin-gomlek-ceket-p-366931298',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-gabardin-kadin-ceket-p-762092022',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-oversize-kadin-gomlek-ceket-p-762092016',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-762535406',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-nakisli-uzun-kollu-oversize-kadin-kolej-ceket-p-762923095',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-desenli-uzun-kollu-tuvit-kadin-gomlek-ceket-p-662807730',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kase-kadin-gomlek-ceket-p-366938438',
            'https://www.trendyol.com/lc-waikiki/sal-yaka-desenli-uzun-kollu-kadin-ceket-p-366941830',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-kadin-gomlek-yaka-duz-jean-ceket-p-756270991',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-basic-v-yaka-duz-uzun-kollu-kadin-triko-hirka-p-754037575',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-sal-yaka-duz-uzun-kollu-oversize-kadin-triko-hirka-p-754028675',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-662807428',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-cep-detayli-rodeo-kadin-jean-ceket-p-366938213',
            'https://www.trendyol.com/lc-waikiki/kadin-duz-blazer-ceket-p-760809387',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-ceket-p-767110466',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-ceket-p-767108518',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-kase-ceket-p-767061403',
            'https://www.trendyol.com/lc-waikiki/classic-duz-uzun-kollu-oversize-suet-kadin-gomlek-ceket-p-765681571',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-765576625',
            'https://www.trendyol.com/lc-waikiki/xside-gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-765471222',
            'https://www.trendyol.com/lc-waikiki/casual-duz-uzun-kollu-kadin-gomlek-ceket-p-765418787',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-gomlek-ceket-p-765392095',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-765392084',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-765392025',
            'https://www.trendyol.com/lc-waikiki/kadin-uzun-kollu-flanel-ceket-p-765035324',
            'https://www.trendyol.com/lc-waikiki/kadin-uzun-kollu-flanel-ceket-p-765031982',
            'https://www.trendyol.com/lc-waikiki/ekose-desenli-uzun-kollu-kadin-gomlek-ceket-p-764916305',
            'https://www.trendyol.com/lc-waikiki/ekose-desenli-uzun-kollu-kadin-gomlek-ceket-p-764911476',
            'https://www.trendyol.com/lc-waikiki/kadin-uzun-kollu-ceket-p-764897629',
            'https://www.trendyol.com/lc-waikiki/uzun-kollu-kadin-ceket-p-764883707',
            'https://www.trendyol.com/lc-waikiki/uzun-kollu-kadin-ceket-p-764876208',
            'https://www.trendyol.com/lc-waikiki/basic-v-yaka-cizgili-uzun-kollu-kadin-triko-hirka-p-764838558',
            'https://www.trendyol.com/lc-waikiki/grace-ekose-uzun-kollu-kadin-gomlek-ceket-p-764264725',
            'https://www.trendyol.com/lc-waikiki/duz-deri-gorunumlu-kadin-ceket-p-762535299',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-762529323',
            'https://www.trendyol.com/lc-waikiki/dik-yaka-duz-uzun-kollu-tuvit-kadin-ceket-p-762529315',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-gomlek-ceket-p-762094184',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-desenli-uzun-kollu-tuvit-kadin-gomlek-ceket-p-762094035',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-ceket-p-762094017',
            'https://www.trendyol.com/lc-waikiki/kadin-gomlek-yaka-duz-jean-ceket-p-762092772',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-762092465',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-kadin-jean-gomlek-ceket-p-762092213',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-kadin-ceket-p-762092206',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-blazer-ceket-p-762092181',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-crop-kadin-ceket-p-762092056',
            'https://www.trendyol.com/lc-waikiki/renk-bloklu-uzun-kollu-tuvit-kadin-gomlek-ceket-p-762092043',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-desenli-uzun-kollu-kadin-ceket-p-762091981',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-762091977',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-762091975',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-crop-kadin-jean-gomlek-ceket-p-762091964',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-kadin-gomlek-ceket-p-762091961',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-gomlek-ceket-p-762091952',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-desenli-uzun-kollu-tuvit-kadin-gomlek-ceket-p-762091951',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-762091949',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-desenli-oversize-kadin-oduncu-gomlek-ceket-p-761510119',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-oversize-kadin-gomlek-ceket-p-760815610',
            'https://www.trendyol.com/lc-waikiki/casual-desenli-oversize-kadin-oduncu-gomlek-ceket-p-760811367',
            'https://www.trendyol.com/lc-waikiki/casual-gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-760806341',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-kadin-gomlek-yaka-duz-jean-ceket-p-760640568',
            'https://www.trendyol.com/lc-waikiki/kadin-kolej-ceket-p-760572083',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-kadin-gomlek-yaka-duz-jean-ceket-p-760388775',
            'https://www.trendyol.com/lc-waikiki/lcw-casuual-baskili-uzun-kollu-kadin-kolej-ceket-p-760208520',
            'https://www.trendyol.com/lc-waikiki/jeans-duz-uzun-kollu-oversize-kadin-jean-gomlek-ceket-p-760180593',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-cep-detayli-poplin-kadin-ceket-p-760144484',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-blazer-ceket-p-760144477',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-gabardin-kadin-gomlek-ceket-p-760144058',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-760144047',
            'https://www.trendyol.com/lc-waikiki/baskili-uzun-kollu-kadin-kolej-ceket-p-760140061',
            'https://www.trendyol.com/lc-waikiki/desenli-oversize-kadin-oduncu-gomlek-ceket-p-760139649',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-classic-duz-uzun-kollu-kadin-gomlek-p-759827150',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-759793918',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-duz-uzun-kollu-crop-kadin-jean-gomlek-ceket-p-759789081',
            'https://www.trendyol.com/lc-waikiki/baskili-uzun-kollu-kadin-kolej-ceket-city-p-759589581',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-759569104',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-oversize-kadin-jean-ceket-p-759550183',
            'https://www.trendyol.com/lc-waikiki/nakisli-uzun-kollu-kadin-kolej-ceket-p-759550073',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-gabardin-kadin-ceket-p-759550043',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-759549965',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-kadin-kolej-ceket-p-759549927',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-759146316',
            'https://www.trendyol.com/lc-waikiki/mnt-munmo-p-690773714',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-gabardin-kadin-ceket-p-681278784',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-662808156',
            'https://www.trendyol.com/lc-waikiki/kendinden-desenli-uzun-kollu-kadin-gomlek-ceket-p-662808012',
            'https://www.trendyol.com/lc-waikiki/kendinden-desenli-uzun-kollu-kadin-gomlek-ceket-p-662807995',
            'https://www.trendyol.com/lc-waikiki/kapusonlu-ekose-uzun-kollu-flanel-oversize-kadin-oduncu-gomlek-ceket-p-662807970',
            'https://www.trendyol.com/lc-waikiki/kapusonlu-ekose-uzun-kollu-flanel-oversize-kadin-oduncu-gomlek-ceket-p-662807954',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-662807913',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadife-oversize-kadin-gomlek-ceket-p-662807739',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-gabardin-kumas-kadin-ceket-p-662807448',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-662807371',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-gabardin-kadin-ceket-p-662801559',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-tuvit-kadin-ceket-p-662762779',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-deri-gorunumlu-oversize-kadin-gomlek-ceket-p-662761635',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-crop-kadin-ceket-p-639531614',
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
                    'brand' => "LCWaikiki",
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

    public function dblcwaikiki2() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-desenli-uzun-kollu-kadin-ceket-p-474634952',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadife-oversize-kadin-gomlek-ceket-p-468216921',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-kadin-oduncu-gomlek-ceket-p-463385236',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-kadin-oduncu-gomlek-ceket-p-463385121',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-jean-gomlek-ceket-p-383798993',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-gomlek-ceket-p-374668510',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-gomlek-ceket-p-366940327',
            'https://www.trendyol.com/lc-waikiki/sal-yaka-desenli-uzun-kollu-kadin-ceket-p-366939056',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-uzun-kollu-kadife-kadin-gomlek-ceket-p-366937389',
            'https://www.trendyol.com/lc-waikiki/deri-gorunumlu-duz-uzun-kollu-kadin-gomlek-ceket-p-366936034',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-gabardin-kadin-gomlek-ceket-p-366933461',
            'https://www.trendyol.com/lc-waikiki/duz-deri-gorunumlu-kadin-ceket-p-366932610',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-kendinden-desenli-uzun-kollu-kadin-ceket-p-357968077',
            'https://www.trendyol.com/lc-waikiki/casual-ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-766322536',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-oversize-kadin-jean-ceket-p-759557915',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-kadin-kolej-ceket-p-762092602',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-kadin-duz-blazer-ceket-p-761898956',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-gabardin-kadin-gomlek-ceket-p-366930265',
            'https://www.trendyol.com/lc-waikiki/lcw-grace-ekose-uzun-kollu-kadin-gomlek-ceket-p-764054704',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-maternity-ekose-uzun-kollu-hamile-oduncu-gomlek-ceket-p-764052420',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-maternity-ekose-uzun-kollu-hamile-oduncu-gomlek-ceket-p-764052322',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-classic-duz-uzun-kollu-kadife-kadin-gomlek-ceket-p-764041960',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-maternity-ekose-uzun-kollu-hamile-oduncu-gomlek-ceket-p-764041257',
            'https://www.trendyol.com/lc-waikiki/casual-desenli-uzun-kollu-crop-kadin-gomlek-ceket-p-764040558',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-gomlek-ceket-p-764038304',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-gomlek-ceket-p-764038243',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-oversize-gabardin-kadin-gomlek-ceket-p-366944982',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-blazer-ceket-p-366939141',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-tuvit-kadin-blazer-ceket-p-366936992',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-desenli-uzun-kollu-kadin-ceket-p-366933572',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-desenli-uzun-kollu-oversize-kadin-gomlek-ceket-p-752775695',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-662807309',
            'https://www.trendyol.com/lc-waikiki/uzun-kollu-kadin-kolej-ceket-p-758790136',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-kadin-gomlek-p-757972112',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-oversize-kadin-gomlek-p-757969658',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-757967131',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-757965608',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-poplin-kadin-gomlek-p-757964146',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-cizgili-uzun-kollu-oversize-kadin-gomlek-p-757963593',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-parlak-tas-baskili-uzun-kollu-oversize-kadin-gomlek-ceket-p-757959813',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-desenli-oversize-kadin-oduncu-gomlek-ceket-p-757958213',
            'https://www.trendyol.com/lc-waikiki/kadin-kolej-ceket-p-755189151',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-desenli-uzun-kollu-kadin-blazer-ceket-p-754554025',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-754019859',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-oversize-kadin-gomlek-ceket-p-752774412',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-752768110',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-classic-duz-uzun-kollu-oversize-kadin-gomlek-ceket-p-750770382',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-oversize-kadin-gomlek-ceket-p-749763413',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-oversize-kadin-gomlek-ceket-p-749759154',
            'https://www.trendyol.com/lc-waikiki/casual-gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-749493767',
            'https://www.trendyol.com/lc-waikiki/kadin-ceket-p-675705833',
            'https://www.trendyol.com/lc-waikiki/onden-citcit-kapamali-duz-uzun-kollu-kadin-gomlek-ceket-p-664135872',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-662808235',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-flanel-kadin-oduncu-gomlek-ceket-p-662808229',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-oversize-deri-gorunumlu-kadin-gomlek-ceket-p-662808138',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-662808128',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-blazer-ceket-p-662808046',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-blazer-ceket-p-662808009',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-gomlek-ceket-p-662807966',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-tuvit-oversize-kadin-gomlek-ceket-p-662807927',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-662807867',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-oversize-tuvit-kadin-gomlek-ceket-p-662807781',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-uzun-kollu-ekose-kadin-oversize-gomlek-ceket-p-662807733',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-kadin-gomlek-ceket-p-662807727',
            'https://www.trendyol.com/lc-waikiki/onden-citcit-kapamali-duz-uzun-kollu-kadin-gomlek-ceket-p-662807721',
            'https://www.trendyol.com/lc-waikiki/kolej-yaka-baskili-uzun-kollu-kadin-bomber-ceket-p-662807689',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-blazer-ceket-p-662807688',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-uzun-kollu-ekose-kadin-oversize-gomlek-ceket-p-662807653',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-662807650',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-kadin-oduncu-gomlek-ceket-p-662807590',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-jean-gomlek-ceket-p-662807557',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-662807538',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-662807526',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-662807517',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-662807509',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-flanel-kadin-gomlek-ceket-p-662807444',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-kadin-gomlek-ceket-p-662807395',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-gabardin-oversize-kadin-gomlek-ceket-p-662807376',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-gomlek-ceket-p-662807283',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-kadin-gomlek-ceket-p-662807250',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-kadin-gomlek-ceket-p-662807240',
            'https://www.trendyol.com/lc-waikiki/kadin-koyu-lacivert-ceket-0sk852z8-p-507206914',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-tuvit-kadin-gomlek-ceket-p-366975741',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-cep-detayli-poplin-kadin-ceket-p-366968406',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-oversize-gabardin-kadin-gomlek-ceket-p-366963097',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-rodeo-jean-ceket-p-366955815',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-cep-detayli-poplin-kadin-ceket-p-366951570',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-gabardin-kumas-kadin-gomlek-ceket-p-366948827',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-kazayagi-desenli-uzun-kollu-kadin-gomlek-ceket-p-366944974',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-gomlek-ceket-p-366944425',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadife-kadin-gomlek-ceket-p-366944179',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadife-kadin-gomlek-ceket-p-366942808',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-cep-detayli-poplin-kadin-ceket-p-366942192',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-desenli-uzun-kollu-tuvit-kadin-gomlek-ceket-p-366941256',
            'https://www.trendyol.com/lc-waikiki/dik-yaka-duz-uzun-kollu-kadin-jean-ceket-p-366940978',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-662807495',
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
                    'brand' => "LCWaikiki",
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

    public function dblcwaikiki3() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/lc-waikiki/duz-deri-gorunumlu-kadin-ceket-p-366939979',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-beli-kemerli-kolsuz-kadin-ceket-p-366939076',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-tuvit-kadin-gomlek-ceket-p-366939008',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-gomlek-ceket-p-366938726',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-pamuklu-kadin-gomlek-ceket-p-366937600',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-pamuklu-kadin-gomlek-ceket-p-366937300',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-tuvit-kadin-gomlek-ceket-p-366936655',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-366934722',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadife-kadin-ceket-p-366932664',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadife-kadin-gomlek-ceket-p-366932576',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-cep-detayli-uzun-kollu-kadin-rodeo-jean-ceket-p-366932336',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-366931899',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-gabardin-kadin-ceket-p-366930285',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadife-hamile-gomlek-ceket-p-366929863',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-kadin-gomlek-ceket-p-366928295',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-tuvit-kadin-gomlek-ceket-p-357957968',
            'https://www.trendyol.com/lc-waikiki/kadin-acik-rodeo-classic-jean-ceket-p-96714493',
            'https://www.trendyol.com/lc-waikiki/kadin-orta-rodeo-ceket-9wh565z8-p-31375478',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-formal-ceket-p-31375125',
            'https://www.trendyol.com/lc-waikiki/ceket-p-31097407',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-752970648',
            'https://www.trendyol.com/lc-waikiki/standart-kalip-ceket-p-691227738',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-368538077',
            'https://www.trendyol.com/lc-waikiki/nakisli-uzun-kollu-kadin-kolej-ceket-p-759194350',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-duz-uzun-kollu-crop-kadin-jean-gomlek-ceket-p-750853549',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-752768133',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-flanel-kadin-oduncu-gomlek-ceket-p-662777106',
            'https://www.trendyol.com/lc-waikiki/classic-duz-uzun-kollu-kadin-gomlek-ceket-p-661939214',
            'https://www.trendyol.com/lc-waikiki/kadin-kolej-yaka-duz-ceket-p-759229402',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-kadin-rodeo-jean-ceket-p-366955844',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-766210772',
            'https://www.trendyol.com/lc-waikiki/nakisli-uzun-kollu-kadin-kolej-ceket-p-758402397',
            'https://www.trendyol.com/lc-waikiki/lcw-eco-duz-uzun-kollu-oversize-kadin-jean-gomlek-ceket-p-759370547',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-750387020',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-754018461',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-blazer-ceket-p-754019637',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-749686715',
            'https://www.trendyol.com/lc-waikiki/gomlek-yaka-duz-uzun-kollu-gabardin-kadin-ceket-p-662807632',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-gomlek-yaka-duz-uzun-kollu-kadin-ceket-p-749704435',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-767066700',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-classic-bisiklet-yaka-kendinden-desenli-uzun-kollu-kadin-ceket-p-765572221',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-flanel-kadin-gomlek-ceket-city-p-763285355',
            'https://www.trendyol.com/lc-waikiki/ekose-uzun-kollu-flanel-kadin-gomlek-ceket-city-p-763279912',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-duz-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-762967628',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-desenli-uzun-kollu-crop-kadin-gomlek-ceket-p-762720342',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-desenli-uzun-kollu-crop-kadin-gomlek-ceket-p-762720234',
            'https://www.trendyol.com/lc-waikiki/kadin-kapusonlu-duz-jean-ceket-city-p-762209294',
            'https://www.trendyol.com/lc-waikiki/parlak-tas-baskili-uzun-kollu-oversize-kadin-gomlek-ceket-city-p-762206211',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-kase-ceket-p-762092917',
            'https://www.trendyol.com/lc-waikiki/duz-uzun-kollu-kadin-ceket-p-762092090',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-ekose-uzun-kollu-oversize-kadin-gomlek-ceket-p-761313775',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-baskili-uzun-kollu-kadin-kolej-ceket-p-760895859',
            'https://www.trendyol.com/lc-waikiki/lcw-grace-duz-uzun-kollu-suet-kadin-gomlek-ceket-p-760837346',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-duz-uzun-kollu-oversize-kadin-jean-gomlek-ceket-p-760627490',
            'https://www.trendyol.com/lc-waikiki/lcw-jeans-kadin-gomlek-yaka-duz-jean-ceket-p-759789719',
            'https://www.trendyol.com/lc-waikiki/casual-ekose-uzun-kollu-flanel-kadin-gomlek-ceket-p-767227573',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-765771889',
            'https://www.trendyol.com/lc-waikiki/jeans-gomlek-yaka-duz-uzun-kollu-kadin-jean-ceket-p-758142158',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-754019303',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-ekose-uzun-kollu-oversize-kadin-oduncu-gomlek-ceket-p-753828466',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-duz-uzun-kollu-kadin-ceket-p-750663097',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-gabardin-kadin-gomlek-ceket-p-349158404',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-ekose-uzun-kollu-gabardin-kadin-gomlek-ceket-p-348233469',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-765770700',
            'https://www.trendyol.com/lc-waikiki/desenli-uzun-kollu-kadin-blazer-ceket-p-759160300',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-749616135',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-760060151',
            'https://www.trendyol.com/lc-waikiki/vision-duz-uzun-kollu-kadin-blazer-ceket-p-765769736',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-duz-uzun-kollu-kadin-blazer-ceket-p-704849548',
            'https://www.trendyol.com/lc-waikiki/kadin-duz-blazer-ceket-p-750899213',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-duz-uzun-kollu-kadin-blazer-ceket-p-765422581',
            'https://www.trendyol.com/lc-waikiki/kadin-duz-blazer-ceket-p-751560087',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-desenli-uzun-kollu-kadin-blazer-ceket-p-749611140',
            'https://www.trendyol.com/lc-waikiki/casual-kadin-duz-blazer-ceket-p-761559410',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-kadin-duz-blazer-ceket-p-765768467',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-cizgili-uzun-kollu-kadin-blazer-ceket-p-765778915',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-classic-desenli-uzun-kollu-kadin-blazer-ceket-p-765415347',
            'https://www.trendyol.com/lc-waikiki/lcw-modest-gomlek-yaka-desenli-tuvit-kadin-blazer-ceket-p-765770263',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-765772038',
            'https://www.trendyol.com/lc-waikiki/lcw-casual-kadin-duz-blazer-ceket-p-762514859',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-classic-duz-uzun-kollu-kadin-blazer-ceket-p-765413756',
            'https://www.trendyol.com/lc-waikiki/lcwaikiki-classic-duz-uzun-kollu-kadin-blazer-ceket-p-756077706',
            'https://www.trendyol.com/lc-waikiki/onden-dugme-kapamali-uzun-kollu-ekose-kadin-blazer-ceket-p-639361983',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-duz-uzun-kollu-kadin-blazer-ceket-p-766346163',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-kendinden-desenli-uzun-kollu-kadin-ceket-p-639537104',
            'https://www.trendyol.com/lc-waikiki/lcw-vision-desenli-uzun-kollu-kadin-blazer-ceket-p-765776054',
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
                    'brand' => "LCWaikiki",
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

    public function getlcwaikiki() {
        $products = DB::select('SELECT * FROM products WHERE brand = "LCWaikiki"');
        return $products;
    }
}


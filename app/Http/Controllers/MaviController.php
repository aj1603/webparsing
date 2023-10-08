<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class MaviController extends Controller
{
    public function allmavi(Request $request){
        $products = DB::select("SELECT * FROM products WHERE brand='Mavi'");
        return view('brands/mavi', ['products' => $products]);
    }

    public function dbmavi() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/mavi/kapitone-haki-ceket-loose-fit-bol-rahat-kesim-1110137-71818-p-635351428',
            'https://www.trendyol.com/mavi/lexa-koyu-duman-gri-jean-ceket-oversize-genis-kesim-110641-82671-p-353733561',
            'https://www.trendyol.com/mavi/siyah-biker-ceket-slim-fit-dar-kesim-1110221-900-p-749399971',
            'https://www.trendyol.com/mavi/kapitone-gri-ceket-loose-fit-bol-rahat-kesim-1110137-83746-p-635350999',
            'https://www.trendyol.com/mavi/m-baskili-siyah-kolej-ceketi-crop-kisa-kesim-1110120-900-p-353732344',
            'https://www.trendyol.com/mavi/karla-gold-icon-koyu-jean-ceket-boyfriend-110154-30105-p-7069224',
            'https://www.trendyol.com/mavi/kapusonlu-beyaz-ceket-loose-fit-bol-rahat-kesim-1110025-70048-p-749400017',
            'https://www.trendyol.com/mavi/luna-indigo-kolej-jean-ceket-oversize-genis-kesim-1110177-85299-p-760375090',
            'https://www.trendyol.com/mavi/elvin-vintage-street-jean-ceket-oversize-genis-kesim-1110178-85389-p-749017926',
            'https://www.trendyol.com/mavi/lexa-kapusonlu-indigo-jean-ceket-oversize-genis-kesim-110641-35265-p-149152251',
            'https://www.trendyol.com/mavi/kapusonlu-kirmizi-ceket-regular-fit-normal-kesim-110775-80791-p-749400025',
            'https://www.trendyol.com/mavi/daisy-90-s-zimparali-jean-ceket-slim-fit-dar-kesim-1113632061-p-49092671',
            'https://www.trendyol.com/mavi/kapitone-lacivert-ceket-regular-fit-normal-kesim-1110147-83699-p-637746343',
            'https://www.trendyol.com/mavi/cepli-ceket-loose-fit-bol-rahat-kesim-1110025-70854-p-660166973',
            'https://www.trendyol.com/mavi/daisy-siyah-jean-ceket-slim-fit-dar-kesim-1113627254-p-3760900',
            'https://www.trendyol.com/mavi/m-baskili-lacivert-kolej-ceketi-crop-kisa-kesim-1110120-70912-p-754734022',
            'https://www.trendyol.com/mavi/daphne-jean-ceket-fitted-vucuda-oturan-kesim-1174134922-p-154623562',
            'https://www.trendyol.com/mavi/karla-siyah-jean-ceket-boyfriend-110154-32065-p-48942006',
            'https://www.trendyol.com/mavi/kapusonlu-gri-ruzgarlik-regular-fit-normal-kesim-1110136-70080-p-647655930',
            'https://www.trendyol.com/mavi/kapusonlu-mavi-ceket-oversize-genis-kesim-1110014-81324-p-758689737',
            'https://www.trendyol.com/mavi/yesil-ceket-loose-fit-bol-rahat-kesim-1110254-85173-p-758689728',
            'https://www.trendyol.com/mavi/kapusonlu-indigo-ceket-regular-fit-normal-kesim-1110145-18790-p-649989668',
            'https://www.trendyol.com/mavi/kapusonlu-yesil-ceket-regular-fit-normal-kesim-110775-33989-p-92756446',
            'https://www.trendyol.com/mavi/daisy-puslu-retro-jean-ceket-slim-fit-dar-kesim-1113635377-p-125390703',
            'https://www.trendyol.com/mavi/kapusonlu-lacivert-ceket-regular-fit-normal-kesim-110775-82906-p-749400022',
            'https://www.trendyol.com/mavi/cift-cepli-yesil-ceket-loose-fit-bol-rahat-kesim-1110025-71818-p-281639827',
            'https://www.trendyol.com/mavi/cift-cepli-kahverengi-ceket-loose-fit-bol-rahat-kesim-1110025-70182-p-281651877',
            'https://www.trendyol.com/mavi/indigo-detayli-kapitone-beyaz-ceket-regular-fit-normal-kesim-1110122-70053-p-467108553',
            'https://www.trendyol.com/pd/mavi/kahverengi-suni-deri-ceket-crop-kisa-kesim-1110263-85397-p-767323497',
            'https://www.trendyol.com/mavi/kolej-ceket-regular-fit-normal-kesim-1110251-70789-p-749400019',
            'https://www.trendyol.com/mavi/karla-mavi-90s-jean-ceket-boyfriend-110154-85296-p-759951541',
            'https://www.trendyol.com/mavi/kadin-lexa-koyu-duman-gri-jean-ceket-110641-82671-p-758540999',
            'https://www.trendyol.com/mavi/karla-gold-icon-jean-ceket-boyfriend-110154-30868-p-49090946',
            'https://www.trendyol.com/mavi/destiny-gold-icon-jean-ceket-boyfriend-110555-80665-p-214932334',
            'https://www.trendyol.com/mavi/m1110043-900-22k-kapusonlu-siyah-kadin-ceket-p-648375025',
            'https://www.trendyol.com/mavi/kapusonlu-yesil-ceket-1110014-71544-p-244736165',
            'https://www.trendyol.com/mavi/kadin-luna-indigo-kolej-jean-ceket-1110177-85299-p-761256543',
            'https://www.trendyol.com/mavi/darcy-duman-gri-jean-ceket-fitted-vucuda-oturan-kesim-110196-82252-p-413032975',
            'https://www.trendyol.com/mavi/m-baskili-kirmizi-kolej-ceketi-oversize-genis-kesim-1110103-71083-p-355894477',
            'https://www.trendyol.com/mavi/pembe-bomber-ceket-regular-fit-normal-kesim-1110147-70580-p-660167571',
            'https://www.trendyol.com/mavi/kadin-siyah-biker-ceket-1110221-900-p-758525903',
            'https://www.trendyol.com/mavi/kadin-daisy-siyah-jean-ceket-1113627254-p-692687613',
            'https://www.trendyol.com/mavi/sandy-suni-kurk-detayli-jean-ceket-oversize-genis-kesim-110908-80666-p-235117037',
            'https://www.trendyol.com/mavi/kadin-dik-yaka-mavi-ceket-110698-34521-110698-34521-p-137490064',
            'https://www.trendyol.com/mavi/kapusonlu-siyah-ruzgarlik-regular-fit-normal-kesim-1110136-900-p-647655367',
            'https://www.trendyol.com/mavi/beyaz-kolej-ceketi-regular-fit-normal-kesim-1110112-81964-p-355895716',
            'https://www.trendyol.com/mavi/kadin-mavi-kot-ceket-m110154-30105-p-754571895',
            'https://www.trendyol.com/mavi/kapusonlu-haki-ruzgarlik-regular-fit-normal-kesim-1110136-70123-p-647655934',
            'https://www.trendyol.com/mavi/kapusonlu-bej-ceket-oversize-genis-kesim-1110014-70182-p-235089547',
            'https://www.trendyol.com/mavi/kirmizi-kolej-ceket-regular-fit-normal-kesim-1110251-84538-p-749400016',
            'https://www.trendyol.com/mavi/kadin-daisy-90-s-zimparali-jean-ceket-1113632061-p-327290342',
            'https://www.trendyol.com/mavi/1113627254-kadin-daisy-black-str-kadin-denim-ceket-p-661820193',
            'https://www.trendyol.com/mavi/m1110043-71795-22k-kapusonlu-mint-kadin-ceket-p-648375896',
            'https://www.trendyol.com/pd/mavi/luna-gri-kolej-jean-ceket-oversize-genis-kesim-1110177-85298-p-767323668',
            'https://www.trendyol.com/pd/mavi/baskili-pembe-ceket-loose-fit-bol-rahat-kesim-1110217-71083-p-767323433',
            'https://www.trendyol.com/mavi/karla-gold-icon-suni-kurk-detayli-jean-ceket-boyfriend-110154-35601-p-214932316',
            'https://www.trendyol.com/mavi/kadin-kapusonlu-kirmizi-sisme-mont-110698-70468-p-758543150',
            'https://www.trendyol.com/pd/mavi/baskili-siyah-ceket-loose-fit-bol-rahat-kesim-1110217-900-p-767323417',
            'https://www.trendyol.com/mavi/daphne-eskitilmis-jean-ceket-fitted-vucuda-oturan-kesim-1174183761-p-672680322',
            'https://www.trendyol.com/mavi/m1110043-81776-22k-kapusonlu-kadin-ceket-p-648381167',
            'https://www.trendyol.com/mavi/suni-deri-siyah-ceket-fitted-vucuda-oturan-kesim-1110140-900-p-467108732',
            'https://www.trendyol.com/pd/mavi/baskili-mavi-ceket-loose-fit-bol-rahat-kesim-1110217-71902-p-767485103',
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
                    'brand' => "Mavi",
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
        
        $products = DB::select("SELECT * FROM products WHERE brand='Mavi'");
        return view('brands/mavi', ['products' => $products]);
    }


    public function getmavi() {
        $products = DB::select('SELECT * FROM products WHERE brand = "Mavi"');
        return $products;
    }

}


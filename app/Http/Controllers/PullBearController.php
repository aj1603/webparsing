<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PullBearController extends Controller
{
    public function dbpullbear() {
        $client = new Client();
        $products = array();
        $urls = [
            'https://www.trendyol.com/pull-bear/fermuarli-basic-bomber-ceket-p-747860278',
            'https://www.trendyol.com/pull-bear/oversize-suni-deri-biker-ceket-p-252458149',
            'https://www.trendyol.com/pull-bear/cepli-suni-deri-blazer-p-333509264',
            'https://www.trendyol.com/pull-bear/cift-yuzlu-uzun-ceket-p-356779278?advertItems=eyJhZHZlcnRJZCI6IjdkM2JkMGFkLTBlMGEtNDhjZS04ZTU1LTIxZTljY2M3NzQwOCIsInNvcnRpbmdTY29yZSI6MC4wMDYxNjU5ODExNjIzMzk0NDksImFkU2NvcmUiOjAuMDM3MzY5NTgyODAyMDU3MjY2LCJhZFNjb3JlcyI6eyIxIjowLjAzNzM2OTU4MjgwMjA1NzI2NiwiMiI6MC4wMzczNjk1ODI4MDIwNTcyNjZ9LCJjcGMiOjAuMTY1LCJtaW5DcGMiOjAuMDEsImVDcGMiOjAuMTY1LCJhZHZlcnRTbG90IjoxLCJvcmRlciI6MiwiYXR0cmlidXRlcyI6IlN1Z2dlc3Rpb25fQSxSZWxldmFuY3lfMSxGaWx0ZXJSZWxldmFuY3lfMSxMaXN0aW5nU2NvcmluZ0FsZ29yaXRobUlkXzEsU21hcnRsaXN0aW5nXzYwLFN1Z2dlc3Rpb25CYWRnZXNfQixQcm9kdWN0R3JvdXBUb3BQZXJmb3JtZXJfQixPcGVuRmlsdGVyVG9nZ2xlXzIsUkZfMSxTdWdnZXN0aW9uUG9wdWxhckNUUl9CIn0=',
            'https://www.trendyol.com/pull-bear/fermuarli-basic-bomber-ceket-p-756657485',
            'https://www.trendyol.com/pull-bear/suni-yunlu-crop-fit-ceket-p-758132017?advertItems=eyJhZHZlcnRJZCI6IjdkM2JkMGFkLTBlMGEtNDhjZS04ZTU1LTIxZTljY2M3NzQwOCIsInNvcnRpbmdTY29yZSI6MC4wMDU2MDg1NjM4MTQzMTIyMiwiYWRTY29yZSI6MC4wMzM5OTEyOTU4NDQzMTY0OCwiYWRTY29yZXMiOnsiMSI6MC4wMzM5OTEyOTU4NDQzMTY0OCwiMiI6MC4wMzM5OTEyOTU4NDQzMTY0OH0sImNwYyI6MC4xNjUsIm1pbkNwYyI6MC4wMSwiZUNwYyI6MC4xNjUsImFkdmVydFNsb3QiOjIsIm9yZGVyIjo1LCJhdHRyaWJ1dGVzIjoiU3VnZ2VzdGlvbl9BLFJlbGV2YW5jeV8xLEZpbHRlclJlbGV2YW5jeV8xLExpc3RpbmdTY29yaW5nQWxnb3JpdGhtSWRfMSxTbWFydGxpc3RpbmdfNjAsU3VnZ2VzdGlvbkJhZGdlc19CLFByb2R1Y3RHcm91cFRvcFBlcmZvcm1lcl9CLE9wZW5GaWx0ZXJUb2dnbGVfMixSRl8xLFN1Z2dlc3Rpb25Qb3B1bGFyQ1RSX0IifQ==',
            'https://www.trendyol.com/pull-bear/hafif-bomber-ceket-p-344564227',
            'https://www.trendyol.com/pull-bear/distressed-suni-deri-biker-ceket-p-745794363',
            'https://www.trendyol.com/pull-bear/suni-yunlu-biker-ceket-p-345910733?advertItems=eyJhZHZlcnRJZCI6IjdkM2JkMGFkLTBlMGEtNDhjZS04ZTU1LTIxZTljY2M3NzQwOCIsInNvcnRpbmdTY29yZSI6MC4wMDUxMDY3MDMwNjE2MTA0NiwiYWRTY29yZSI6MC4wMzA5NDk3MTU1MjQ5MTE4OCwiYWRTY29yZXMiOnsiMSI6MC4wMzA5NDk3MTU1MjQ5MTE4OCwiMiI6MC4wMzA5NDk3MTU1MjQ5MTE4OH0sImNwYyI6MC4xNjUsIm1pbkNwYyI6MC4wMSwiZUNwYyI6MC4xNjMxNTIyMzQ3Nzk4OTEzNSwiYWR2ZXJ0U2xvdCI6NCwib3JkZXIiOjksImF0dHJpYnV0ZXMiOiJTdWdnZXN0aW9uX0EsUmVsZXZhbmN5XzEsRmlsdGVyUmVsZXZhbmN5XzEsTGlzdGluZ1Njb3JpbmdBbGdvcml0aG1JZF8xLFNtYXJ0bGlzdGluZ182MCxTdWdnZXN0aW9uQmFkZ2VzX0IsUHJvZHVjdEdyb3VwVG9wUGVyZm9ybWVyX0IsT3BlbkZpbHRlclRvZ2dsZV8yLFJGXzEsU3VnZ2VzdGlvblBvcHVsYXJDVFJfQiJ9',
            'https://www.trendyol.com/pull-bear/kadin-renkli-blazer-p-666842439',
            'https://www.trendyol.com/pull-bear/suni-deri-pilot-ceket-p-759538950',
            'https://www.trendyol.com/pull-bear/suni-yunlu-biker-ceket-p-345910733',
            'https://www.trendyol.com/pull-bear/cift-yuzlu-uzun-ceket-p-356779278',
            'https://www.trendyol.com/pull-bear/suni-deri-biker-ceket-p-141152620',
            'https://www.trendyol.com/pull-bear/renkli-basic-blazer-p-446097609',
            'https://www.trendyol.com/pull-bear/hafif-bomber-ceket-p-344564227?advertItems=eyJhZHZlcnRJZCI6IjdkM2JkMGFkLTBlMGEtNDhjZS04ZTU1LTIxZTljY2M3NzQwOCIsInNvcnRpbmdTY29yZSI6MC4wMDM5NDQ2ODM2MTUxMTgyNjUsImFkU2NvcmUiOjAuMDIzOTA3MTczNDI0OTU5MTgzLCJhZFNjb3JlcyI6eyIxIjowLjAyMzkwNzE3MzQyNDk1OTE4MywiMiI6MC4wMjM5MDcxNzM0MjQ5NTkxODN9LCJjcGMiOjAuMTY1LCJtaW5DcGMiOjAuMDEsImVDcGMiOjAuMDEsImFkdmVydFNsb3QiOjYsIm9yZGVyIjoxMiwiYXR0cmlidXRlcyI6IlN1Z2dlc3Rpb25fQSxSZWxldmFuY3lfMSxGaWx0ZXJSZWxldmFuY3lfMSxMaXN0aW5nU2NvcmluZ0FsZ29yaXRobUlkXzEsU21hcnRsaXN0aW5nXzYwLFN1Z2dlc3Rpb25CYWRnZXNfQixQcm9kdWN0R3JvdXBUb3BQZXJmb3JtZXJfQixPcGVuRmlsdGVyVG9nZ2xlXzIsUkZfMSxTdWdnZXN0aW9uUG9wdWxhckNUUl9CIn0=',
            'https://www.trendyol.com/pull-bear/suni-yunlu-crop-fit-ceket-p-758132017',
            'https://www.trendyol.com/pull-bear/crop-kase-ceket-p-762321706',
            'https://www.trendyol.com/pull-bear/mumlu-gorunumlu-fitilli-kadife-yakali-ceket-p-758026659',
            'https://www.trendyol.com/pull-bear/italyan-yaka-suni-kurk-ceket-p-760133867',
            'https://www.trendyol.com/pull-bear/cift-tarafli-fermuarli-crop-ceket-p-753741961',
            'https://www.trendyol.com/pull-bear/dusuk-omuzlu-denim-ceket-p-239775538',
            'https://www.trendyol.com/pull-bear/fitilli-kadife-yaka-mumlu-gorunumlu-crop-ceket-p-756653078',
            'https://www.trendyol.com/pull-bear/uzun-lacivert-yagmurluk-p-762214070',
            'https://www.trendyol.com/pull-bear/cift-yuzlu-uzun-mont-p-755513520',
            'https://www.trendyol.com/pull-bear/oversize-yagmurluk-p-762222513',
            'https://www.trendyol.com/pull-bear/kadin-oversize-denim-ceket-p-666838203',
            'https://www.trendyol.com/pull-bear/uzun-cift-tarafli-suni-deri-ceket-p-762571389',
            'https://www.trendyol.com/pull-bear/rustik-kruvaze-blazer-p-747859752',
            'https://www.trendyol.com/pull-bear/suni-deri-bomber-ceket-p-756103169',
            'https://www.trendyol.com/pull-bear/cift-yuzlu-uzun-mont-p-755512035',
            'https://www.trendyol.com/pull-bear/suni-deri-bomber-ceket-p-764535104',
            'https://www.trendyol.com/pull-bear/oversize-kruvaze-dugmeli-blazer-p-751539384',
            'https://www.trendyol.com/pull-bear/cepli-keten-karisimli-ceket-p-740044415',
            'https://www.trendyol.com/pull-bear/cepli-kisa-hafif-ceket-p-756992880',
            'https://www.trendyol.com/pull-bear/ince-cizgili-blazer-p-757973308',
            'https://www.trendyol.com/pull-bear/basic-blazer-p-735165786',
            'https://www.trendyol.com/pull-bear/kadin-oversize-denim-ceket-p-666843595',
            'https://www.trendyol.com/pull-bear/basic-suni-deri-biker-ceket-p-211235779',
            'https://www.trendyol.com/pull-bear/suni-deri-bomber-ceket-p-764532938',
            'https://www.trendyol.com/pull-bear/kareli-ince-ceket-p-764601382',
            'https://www.trendyol.com/pull-bear/ince-cizgili-gri-blazer-p-762184029',
            'https://www.trendyol.com/pull-bear/kemerli-kimono-p-727825895',
            'https://www.trendyol.com/pull-bear/cift-tarafli-fermuarli-crop-ceket-p-753742078',
            'https://www.trendyol.com/pull-bear/pamuklu-crop-hirka-p-710909531',
            'https://www.trendyol.com/pull-bear/kapakli-cepli-kruvaze-dugmeli-blazer-p-755951092',
            'https://www.trendyol.com/pull-bear/ny-yazili-bomber-ceket-p-762577200',
            'https://www.trendyol.com/pull-bear/basic-kruvaze-dugmeli-blazer-p-751539815',
            'https://www.trendyol.com/pull-bear/crop-bomber-ceket-p-762321646',
            'https://www.trendyol.com/pull-bear/kontrast-yamali-denim-blazer-p-758024720',
            'https://www.trendyol.com/pull-bear/cepli-kisa-hafif-ceket-p-756970543',
            'https://www.trendyol.com/pull-bear/kivrik-kollu-basic-blazer-p-78311896',
            'https://www.trendyol.com/pull-bear/uzun-krepe-kimono-p-740874414',
            'https://www.trendyol.com/pull-bear/krepe-kimono-p-740876498',
            'https://www.trendyol.com/pull-bear/worker-denim-ceket-p-758022473',
            'https://www.trendyol.com/pull-bear/kapakli-cepli-kruvaze-dugmeli-blazer-p-756071540',
            'https://www.trendyol.com/pull-bear/worker-ceket-p-753744441',
            'https://www.trendyol.com/pull-bear/ince-cizgili-blazer-p-762184860',
            'https://www.trendyol.com/pull-bear/denim-bomber-ceket-p-749792395',
            'https://www.trendyol.com/pull-bear/kapakli-cepli-kruvaze-dugmeli-blazer-p-755951083',
            'https://www.trendyol.com/pull-bear/kontrast-denim-ceket-p-762211627',
            'https://www.trendyol.com/pull-bear/brooklyn-yazili-bomber-ceket-p-764708503',
            'https://www.trendyol.com/pull-bear/kivrik-kollu-suni-suet-ceket-p-235864342',
            'https://www.trendyol.com/pull-bear/kapakli-cepli-kruvaze-dugmeli-blazer-p-756060633',
            'https://www.trendyol.com/pull-bear/balikci-yaka-pamuklu-ceket-p-710910084',
            'https://www.trendyol.com/pull-bear/siyah-crop-suni-deri-blazer-p-747859786',
            'https://www.trendyol.com/pull-bear/basic-kivrik-kollu-blazer-p-285486345',
            'https://www.trendyol.com/pull-bear/kapakli-cepli-kruvaze-dugmeli-blazer-p-755951171',
            'https://www.trendyol.com/pull-bear/ince-cizgili-ceket-p-762324120',
            'https://www.trendyol.com/pull-bear/kisa-suni-suet-ceket-p-764599207',
            'https://www.trendyol.com/pull-bear/crop-gri-denim-ceket-p-758023410',
            'https://www.trendyol.com/pull-bear/uzun-denim-trenckot-p-749791341',
            'https://www.trendyol.com/pull-bear/oversize-kimono-p-710909474',
            'https://www.trendyol.com/pull-bear/basic-blazer-limited-edition-p-710773786',
            'https://www.trendyol.com/pull-bear/denim-blazer-p-762202501',
            'https://www.trendyol.com/pull-bear/suni-yun-detayli-crop-denim-ceket-p-759482476',
            'https://www.trendyol.com/pull-bear/crop-denim-ceket-p-758025550',
            'https://www.trendyol.com/pull-bear/crop-denim-kapusonlu-sweatshirt-p-749790517',
            'https://www.trendyol.com/pull-bear/fermuarli-crop-denim-ceket-p-732801430',
            'https://www.trendyol.com/pull-bear/metalik-denim-ceket-p-756141522',
            'https://www.trendyol.com/pull-bear/basic-kruvaze-dugmeli-blazer-p-751539812',
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
                    'brand' => "Pullbear",
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

    public function getpullbear() {
        $products = DB::select('SELECT * FROM products WHERE brand = "Pullbear"');
        return $products;
    }
}

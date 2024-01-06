<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class XmlController extends Controller
{

    public function index() {
        return view('panel.xml.index');
    }

    public function generate() {
        // download XML
        $downloadXml = file_get_contents('https://quarta-hunt.ru/bitrix/catalog_export/export_Ngq.xml');

        // parse XML
        $xml = simplexml_load_string($downloadXml);

        // categories
        $this->generateCategory($xml);

        // offers
        $this->generateProduct($xml);

        return response()->json(['message' => 'OK'], 200);
    }

    private function generateCategory($xml) {
        // count categories in XML
        $countCategories = count($xml->shop->categories->category);
        $rows = [];
        for ($i = 0; $i < $countCategories; $i++) {
            $category = $xml->shop->categories->category[$i];
            $json = json_encode($category);
            $array = json_decode($json, true);

            // @attributes => id & parentId
            $attributes = $array['@attributes'];

            // generate category
            $row = [
                'id' => $this->checkKey($attributes, 'id'),
                'name' => $array[0],
                'category_id' => $this->checkKey($attributes, 'parentId')
            ];

            array_push($rows, $row);
        }

        // truncate & insert categories
        Category::truncate();
        Category::insert($rows);
    }

    private function generateProduct($xml) {
        // count offers in XML
        $countOffers = count($xml->shop->offers->offer);
        $rows = [];
        for ($i = 0; $i < $countOffers; $i++) {
            $offer = $xml->shop->offers->offer[$i];
            $json = json_encode($offer);
            $array = json_decode($json, true);

            // @attributes => id & available
            $attributes = $array['@attributes'];

            // generate product
            $row = [
                'productId' => $this->checkKey($attributes, 'id'),
                'available' => $this->checkKey($attributes, 'available'),
                'url' => $this->checkKey($array, 'url'),
                'price' => $this->checkKey($array, 'price'),
                'oldprice' => $this->checkKey($array, 'oldprice'),
                'currencyId' => $this->checkKey($array, 'currencyId'),
                'category_id' => $this->checkKey($array, 'categoryId'),
                'picture' => $this->checkKey($array, 'picture'),
                'name' => $this->checkKey($array, 'name'),
                'vendor' => $this->checkKey($array, 'vendor'),
            ];

            array_push($rows, $row);
        }

        // truncate & insert products
        Product::truncate();
        Product::insert($rows);
    }

    private function checkKey($array, $key) {
        return isset($array[$key]) ? $array[$key] : null;
    }

}

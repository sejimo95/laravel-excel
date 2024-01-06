<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProduct implements FromCollection
{

    public function collection()
    {
        $rows = Product::with(['category' => function($q) {
            $q->with('category');
        }])->get();

        $column = [];
        array_push($column, [
            'id',
            'productId',
            'picture',
            'name',
            'available',
            'category',
            'sub category',
            'url',
            'price',
            'oldprice',
            'currencyId',
            'vendor'
        ]);
        foreach ($rows as $row) {
            array_push($column, [
                $row['id'],
                $row['productId'],
                $row['picture'],
                $row['name'],
                $row['available'],
                isset($row['category']['name']) ? $row['category']['name'] : '',
                isset($row['category']['category']['name']) ? $row['category']['category']['name'] : '',
                $row['url'],
                $row['price'],
                $row['oldprice'],
                $row['currencyId'],
                $row['vendor']
            ]);
        }

        return collect($column);
    }

}

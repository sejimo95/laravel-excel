<?php

namespace App\Http\Controllers;
use App\Models\Product;

class PanelController extends Controller
{

    public function index() {
        $rows = Product::with(['category' => function($q) {
            $q->with('category');
        }])->paginate(5);

        return view('panel.product.index', compact('rows'));
    }

}

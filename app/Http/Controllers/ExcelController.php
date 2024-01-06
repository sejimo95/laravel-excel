<?php

namespace App\Http\Controllers;

use App\Exports\ExportProduct;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function index() {
        return view('panel.excel.index');
    }

    public function download() {
        return Excel::download(new ExportProduct, 'products.xlsx');
    }

}

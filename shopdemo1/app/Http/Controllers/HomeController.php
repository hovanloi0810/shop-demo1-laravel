<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use database and session
use DB;
use Session;

//library session
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    //
    public function index()
    {
        $cate_product = DB::table('tbl_category_product')
                    -> where('category_status', '1')
                    -> orderby('category_id', 'desc')
                    -> get();                                        //hiển thị dữ liệu khi category_status = 0

        $brand_product = DB::table('table_brand')
                    -> where('brand_status', '1')
                    -> orderby('brand_id', 'desc')
                    -> get();                                       //hiển thị dữ liệu khi brand_status = 0

        //$all_product     = DB::table('table_product')
        //-> join('tbl_category_product', 'tbl_category_product.category_id', '=', 'table_product.category_id')        //join bảng table_product -> giao nhau với tbl_category_product với điều kiện 'tbl_category_product.category_id', '=', 'table_product.category_id'
        //-> join('table_brand','table_brand.brand_id', '=', 'table_product.brand_id')                                 //join bảng table_product -> giao nhau với table_brand
        //-> join('table_supplier','table_supplier.supplier_id', '=', 'table_product.supplier_id')
        //-> orderby('table_product.product_id', 'desc') -> get();                                                     //nhóm lại theo 'table_product.product_id', 'desc' -> get()

        $all_product = DB::table('table_product')
                    -> join('tbl_category_product', 'tbl_category_product.category_id', '=', 'table_product.category_id')
                    -> where('product_status', '1')
                    -> orderby('product_id', 'desc')
                    -> limit(6)
                    -> get();

        return view('pages.home')
                -> with('category', $cate_product)
                -> with('brand', $brand_product)
                -> with('all_product', $all_product); //trả về trang home.blade.php trong folder pages
    }
}

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

class BrandProduct extends Controller
{
    //Trả về phần từ trang /add_category_product
    public function add_brand_product() {
        return view('admin.add_brand_product'); //từ routes qua function add_category_product => add_category_product.blade.php
    }

    //liệt kê data ra list ở trang all-brand-product.blade.php
    public function all_brand_product() {

        $all_brand_product     = DB::table('table_brand') -> get(); //lấy data từ table('tbl_category_product') rồi gán vào $all_category_product

        $manager_brand_product = view('admin.all_brand_product')  //hiển thị với dữ liệu đã lấy đc từ $all_category_product
                                  -> with('all_brand_product',$all_brand_product);   //lấy dữ liệu từ biến $all_category_product rồi gán vào 'all_category_product' để dùng all_category_product lấy data


        return view('admin_layout') -> with('admin.all_category_product', $manager_brand_product); //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //insert thông tin brand_product
    public function save_brand_product(Request $request) {

        $data = array(); //khởi tạo biến data thành 1 array

        //$request -> category_product_name: lấy dữ liệu thì biến name = "category_product_name" -> (add_category_product.blade.php)
        //$data['category_name']: tên đã đặt migration
        $data['brand_name']   = $request -> brand_product_name;
        // $data['category_desc']   = $request -> category_product_desc;
        $data['brand_status'] = $request -> brand_product_status;

        //insert data vào database
        DB::table('table_brand') -> insert($data);  //lấy data từ $data insert vào table('tbl_category_product')

        $request->session()->put('message', 'add brand success');    //tạo message để thông báo

        return redirect('/add-brand-product'); //điều hướng về '/add-brand-product'
    }


    //Chuyển từ Hidden => Show
    public function unactive_brand_product($brand_product_id) { // truyền tham số $category_product_id từ routes để controll cái category_id

        //=>Vào db table('tbl_category_product') để lấy category_id so sánh với $category_product_id nếu == thì update('category_status' từ 0 => 1)
        DB::table('table_brand') -> where('brand_id',$brand_product_id) -> update(['brand_status' => 1]); //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'did not activate brand successfully');//Tạo message

        return redirect('/all-brand-product'); //điều hướng về '/all-brand-product'
    }

    //Chuyển từ Hidden => Show
    public function active_brand_product($brand_product_id) { // truyền tham số $category_product_id từ routes để controll cái category_id

        //=>Vào db table('tbl_category_product') để lấy category_id so sánh với $category_product_id nếu == thì update('category_status' từ 0 => 1)
        DB::table('table_brand') -> where('brand_id',$brand_product_id) -> update(['brand_status' => 0]); //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'activate brand successfully');//Tạo message

        return redirect('/all-brand-product'); //điều hướng về '/all-brand-product'
    }

    // Trả về trang edit_brand_product với cái category_id
    public function edit_brand_product($brand_product_id) {   // truyền tham số $category_product_id từ routes để controll cái category_id

        $edit_brand_product     = DB::table('table_brand') -> where('brand_id', $brand_product_id) -> get(); //lấy data từ table('tbl_category_product') rồi so sánh với  $edit_category_product
        $manager_brand_product = view('admin.edit_brand_product')  //hiển thị với dữ liệu đã lấy đc từ $edit_category_product
                                  -> with('edit_brand_product',$edit_brand_product);   //lấy dữ liệu từ biến $edit_category_product rồi gán vào 'edit_category_product' để dùng all_category_product lấy data


        return view('admin_layout') -> with('admin.edit_brand_product', $manager_brand_product); //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //sửa brand_product
    public function update_brand_product(Request $request, $brand_product_id) { //Lấy biến request ở trên truyền tham số $category_product_id từ routes để controll cái category_id
        $data = array(); //lấy data array ở trên

        //lấy data category_name và category_desc
        $data['brand_name']   = $request -> brand_product_name;   //sẻ lấy data dựa vào name=category_product_name
        // $data['category_desc']   = $request -> category_product_desc;   //sẻ lấy data dựa vào name=category_product_desc

        //update lại $data['category_name'], $data['category_desc'] trong $data
        DB::table('table_brand') //trỏ tới db table('tbl_category_product')
        -> where('brand_id',$brand_product_id)    //so sánh category_id và $category_product_id nếu === nhau
        -> update($data);   //cập nhật lại biến $data có  => $data['category_name']   = $request -> category_product_name;
                            //                           => $data['category_desc']   = $request -> category_product_desc;

        session()->put('message', 'update brand successfully');//Tạo message

        return redirect('/all-brand-product');   // điều hướng về trang '/all-brand-product'
    }


    //xoá brand_product
    public function delete_brand_product($brand_product_id) { //không cần $request vì không lấy yêu cầu của db
        //update lại $data['category_name'], $data['category_desc'] trong $data
        DB::table('table_brand') //trỏ tới db table('tbl_category_product')
        -> where('brand_id',$brand_product_id)    //so sánh category_id và $category_product_id nếu === nhau
        -> delete();   //xoá lại biến $data có  => $data['category_name']   = $request -> category_product_name;
                    //                           => $data['category_desc']   = $request -> category_product_desc;

        session()->put('message', 'delete brand successfully');//Tạo message thông báo xoá

        return redirect('/all-brand-product');   // điều hướng về trang '/all-brand-product'
    }
}

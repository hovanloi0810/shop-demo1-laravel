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

session_start();

class CategoryProduct extends Controller
{
    //Trả về phần từ trang /add_category_product
    public function add_category_product() {
        return view('admin.add_category_product'); //từ routes qua function add_category_product => add_category_product.blade.php
    }

    //liệt kê data ra list ở trang all-category-product.blade.php
    public function all_category_product() {

        $all_category_product     = DB::table('tbl_category_product') -> get(); //lấy data từ table('tbl_category_product') rồi gán vào $all_category_product

        $manager_category_product = view('admin.all_category_product')  //hiển thị với dữ liệu đã lấy đc từ $all_category_product
                                  -> with('all_category_product',$all_category_product);   //lấy dữ liệu từ biến $all_category_product rồi gán vào 'all_category_product' để dùng all_category_product lấy data


        return view('admin_layout') -> with('admin.all_category_product', $manager_category_product); //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //insert thông tin category_product
    public function save_category_product(Request $request) {

        $data = array(); //khởi tạo biến data thành 1 array

        //$request -> category_product_name: lấy dữ liệu thì biến name = "category_product_name" -> (add_category_product.blade.php)
        //$data['category_name']: tên đã đặt migration
        $data['category_name']   = $request -> category_product_name;
        // $data['category_desc']   = $request -> category_product_desc;
        $data['category_status'] = $request -> category_product_status;

        //insert data vào database
        DB::table('tbl_category_product') -> insert($data);  //lấy data từ $data insert vào table('tbl_category_product')

        $request->session()->put('message', 'add category success');    //tạo message để thông báo

        return redirect('/add-category-product'); //điều hướng về '/add-category-product'
    }


    //Chuyển từ Hidden => Show
    public function unactive_category_product($category_product_id) { // truyền tham số $category_product_id từ routes để controll cái category_id

        //=>Vào db table('tbl_category_product') để lấy category_id so sánh với $category_product_id nếu == thì update('category_status' từ 0 => 1)
        DB::table('tbl_category_product') -> where('category_id',$category_product_id) -> update(['category_status' => 1]); //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'did not activate Category successfully');//Tạo message

        return redirect('/all-category-product'); //điều hướng về '/all-category-product'
    }

    //Chuyển từ Show => Hidden
    public function active_category_product($category_product_id) { // truyền tham số $category_product_id từ routes để controll cái category_id
        //=>Vào db table('tbl_category_product') để lấy category_id so sánh với $category_product_id nếu == thì update('category_status'từ 1 => 0)
        DB::table('tbl_category_product') -> where('category_id',$category_product_id) -> update(['category_status' => 0]); //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'Successful Category activation');  //Tạo message

        return redirect('/all-category-product'); //điều hướng về '/all-category-product'
    }

    // Trả về trang edit_category_product với cái category_id
    public function edit_category_product($category_product_id) {   // truyền tham số $category_product_id từ routes để controll cái category_id

        $edit_category_product     = DB::table('tbl_category_product') -> where('category_id', $category_product_id) -> get(); //lấy data từ table('tbl_category_product') rồi so sánh với  $edit_category_product
        $manager_category_product = view('admin.edit_category_product')  //hiển thị với dữ liệu đã lấy đc từ $edit_category_product
                                  -> with('edit_category_product',$edit_category_product);   //lấy dữ liệu từ biến $edit_category_product rồi gán vào 'edit_category_product' để dùng all_category_product lấy data


        return view('admin_layout') -> with('admin.edit_category_product', $manager_category_product); //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //sửa category_product
    public function update_category_product(Request $request, $category_product_id) { //Lấy biến request ở trên truyền tham số $category_product_id từ routes để controll cái category_id
        $data = array(); //lấy data array ở trên

        //lấy data category_name và category_desc
        $data['category_name']   = $request -> category_product_name;   //sẻ lấy data dựa vào name=category_product_name
        // $data['category_desc']   = $request -> category_product_desc;   //sẻ lấy data dựa vào name=category_product_desc

        //update lại $data['category_name'], $data['category_desc'] trong $data
        DB::table('tbl_category_product') //trỏ tới db table('tbl_category_product')
        -> where('category_id',$category_product_id)    //so sánh category_id và $category_product_id nếu === nhau
        -> update($data);   //cập nhật lại biến $data có  => $data['category_name']   = $request -> category_product_name;
                            //                           => $data['category_desc']   = $request -> category_product_desc;

        session()->put('message', 'update Category successfully');//Tạo message

        return redirect('/all-category-product');   // điều hướng về trang '/all-category-product'
    }


    //xoá category_product
    public function delete_category_product($category_product_id) { //không cần $request vì không lấy yêu cầu của db
        //update lại $data['category_name'], $data['category_desc'] trong $data
        DB::table('tbl_category_product') //trỏ tới db table('tbl_category_product')
        -> where('category_id',$category_product_id)    //so sánh category_id và $category_product_id nếu === nhau
        -> delete();   //xoá lại biến $data có  => $data['category_name']   = $request -> category_product_name;
                    //                           => $data['category_desc']   = $request -> category_product_desc;

        session()->put('message', 'delete Category successfully');//Tạo message thông báo xoá

        return redirect('/all-category-product');   // điều hướng về trang '/all-category-product'
    }
}

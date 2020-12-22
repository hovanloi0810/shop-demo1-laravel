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

class SupplierController extends Controller
{
    //Xac thuc dang nhap
    public function AuthLogin()
    {
        $admin_id = session()->get('admin_id');                             //lay du lieu admin_id

        if ($admin_id) {                                                    //neu admin_id ton tai
            return Redirect::to('admin.dashboard');                         //thi Redirect ve admin.dashboard
        } else {                                                            //Nguoc lai
            return Redirect::to('admin') -> send();                         //thi Redirect ve admin
        }

    }

    //Trả về phần từ trang /add_category_product
    public function add_supplier()
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()
        $cate_supplier = DB::table('tbl_category_product')
                        -> orderby('category_id', 'desc')
                        -> get();                                           //dùng để nhóm cột category_id rồi get() ra

        // $product_supplier = DB::table('table_product')
        //                 -> orderby('product_id', 'desc')
        //                 -> get();                                        //dùng để nhóm cột category_id rồi get() ra

        return view('admin.add_supplier')
                        -> with('cate_supplier', $cate_supplier);
    }

    //liệt kê data ra list ở trang all-brand-product.blade.php
    public function all_supplier()
    {
        $this -> AuthLogin();                                                               //Goi lai fuction AuthLogin()
        $all_supplier     = DB::table('table_supplier')
                            -> join('tbl_category_product', 'tbl_category_product.category_id', '=', 'table_supplier.category_id')
                            -> get();                                                       //lấy data từ table('tbl_category_product') rồi gán vào $all_category_product

        $manager_supplier = view('admin.all_supplier')                                      //hiển thị với dữ liệu đã lấy đc từ $all_category_product
                                  -> with('all_supplier',$all_supplier);                    //lấy dữ liệu từ biến $all_category_product rồi gán vào 'all_category_product' để dùng all_category_product lấy data

        return view('admin_layout')
            -> with('admin.all_supplier', $manager_supplier);                               //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //insert thông tin supplier
    public function save_supplier(Request $request)
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()
        $data = array();                                                    //khởi tạo biến data thành 1 array

        $data['supplier_name']    = $request -> supplier_name;
        $data['supplier_amuont']  = $request -> supplier_amuont;            //$data['category_name']: tên đã đặt migration => tên cột
        $data['supplier_price']   = $request -> supplier_price;             //$request -> product_desc: lấy dữ liệu thì biến name = "product_desc" -> (add_product.blade.php)
        $data['category_id']      = $request -> supplier_cate;
        $data['supplier_product'] = $request -> supplier_product;
        $data['supplier_status']  = $request -> supplier_status;

        //insert data vào database
        DB::table('table_supplier') -> insert($data);                        //lấy data từ $data insert vào table('tbl_category_product')

        $request->session()->put('message', 'add supplier success');        //tạo message để thông báo

        return redirect('all-supplier');                                    //điều hướng về '/add-brand-product'
    }


    //Chuyển từ Hidden => Show
    public function unactive_supplier($supplier_id)                         // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()

        DB::table('table_supplier')                                         //=>Vào db table('tbl_category_product')
        -> where('supplier_id',$supplier_id)                                //để lấy category_id so sánh với $category_product_id nếu == thì update('category_status' từ 0 => 1)
        -> update(['supplier_status' => 1]);                                //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'did not activate supplier successfully');//Tạo message

        return redirect('/all-supplier');                                   //điều hướng về '/all-brand-product'
    }

    //Chuyển từ Hidden => Show
    public function active_supplier($supplier_id)                                       // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                           //Goi lai fuction AuthLogin()

        DB::table('table_supplier')                                                     //=>Vào db table('tbl_category_product')
        -> where('supplier_id',$supplier_id)                                            //để lấy supplier_id so sánh với $supplier_id nếu == thì update('supplier_status' từ 0 => 1)
        -> update(['supplier_status' => 0]);                                            //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'did not activate supplier successfully');            //Tạo message

        return redirect('/all-supplier');                                               //điều hướng về '/all-brand-product'
    }

    // Trả về trang edit_brand_product với cái category_id
    public function edit_supplier($supplier_id)                                         // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                           //Goi lai fuction AuthLogin()
        $cate_supplier = DB::table('tbl_category_product')
                        -> orderby('category_id', 'desc')
                        -> get();                                                       //dùng để nhóm cột category_id rồi get() ra

        // $product_supplier = DB::table('table_product')
        //                 -> orderby('product_id', 'desc')
        //                 -> get();                                                    //dùng để nhóm cột category_id rồi get() ra

        $edit_supplier     = DB::table('table_supplier')
                                -> where('supplier_id', $supplier_id)
                                -> get();                                               //lấy data từ table('tbl_category_product') rồi so sánh với  $edit_category_product

        $manager_supplier = view('admin.edit_supplier')                                 //hiển thị với dữ liệu đã lấy đc từ $edit_category_product
                            -> with('edit_supplier',$edit_supplier)
                            -> with('cate_supplier',$cate_supplier);

        return view('admin_layout') -> with('admin.edit_supplier', $manager_supplier); //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //sửa supplier
    public function update_supplier(Request $request, $supplier_id)         //Lấy biến request ở trên truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()
        $data = array();                                                    //lấy data array ở trên
        $data['supplier_name']   = $request -> supplier_name;
        $data['supplier_amuont'] = $request -> supplier_amuont;             //$data['category_name']: tên đã đặt migration => tên cột
        $data['supplier_price']  = $request -> supplier_price;              //$request -> product_desc: lấy dữ liệu thì biến name = "product_desc" -> (add_product.blade.php)
        $data['category_id']     = $request -> supplier_cate;
        $data['supplier_product']= $request -> supplier_product;
        $data['supplier_status'] = $request -> supplier_status;

        DB::table('table_supplier')                                         //trỏ tới db table('tbl_category_product')
        -> where('supplier_id', $supplier_id)                               //so sánh category_id và $supplier_id nếu === nhau
        -> update($data);                                                   //update lại biến $data có

        $request->session()->put('message', 'update supplier success');     //tạo message để thông báo

        return redirect('all-supplier');                                    //điều hướng về '/add-brand-product'
    }


    //xoá brand_product
    public function delete_supplier($supplier_id)                           //không cần $request vì không lấy yêu cầu của db
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()
        //update lại $data['category_name']
        DB::table('table_supplier')                                         //trỏ tới db table('tbl_category_product')
        -> where('supplier_id',$supplier_id)                                //so sánh category_id và $category_product_id nếu === nhau
        -> delete();                                                        //xoá lại biến $data có  => $data['category_name'] = $request -> category_product_name;

        session()->put('message', 'delete brand successfully');             //Tạo message thông báo xoá

        return redirect('all-supplier');                                    // điều hướng về trang '/all-brand-product'
    }
}

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
    //Xac thuc dang nhap
    public function AuthLogin()
    {
        $admin_id = session()->get('admin_id');                                     //lay du lieu admin_id

        if ($admin_id) {                                                            //neu admin_id ton tai
            return Redirect::to('admin.dashboard');                                 //thi Redirect ve admin.dashboard
        } else {                                                                    //Nguoc lai
            return Redirect::to('admin') -> send();                                 //thi Redirect ve admin
        }

    }

    //Trả về phần từ trang /add_category_product
    public function add_brand_product()
    {
        $this -> AuthLogin();                                                       //Goi lai fuction AuthLogin()
        return view('admin.add_brand_product');                                     //từ routes qua function add_category_product => add_category_product.blade.php
    }

    //liệt kê data ra list ở trang all-brand-product.blade.php
    public function all_brand_product()
    {
        $this -> AuthLogin();                                                        //Goi lai fuction AuthLogin()
        $all_brand_product     = DB::table('table_brand') -> get();                  //lấy data từ table('tbl_category_product') rồi gán vào $all_category_product

        $manager_brand_product = view('admin.all_brand_product')                     //hiển thị với dữ liệu đã lấy đc từ $all_category_product
                                -> with('all_brand_product',$all_brand_product);     //lấy dữ liệu từ biến $all_category_product rồi gán vào 'all_category_product' để dùng all_category_product lấy data

        return view('admin_layout')
            -> with('admin.all_category_product', $manager_brand_product);          //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //insert thông tin brand_product
    public function save_brand_product(Request $request)
    {
        $this -> AuthLogin();                                                       //Goi lai fuction AuthLogin()
        $data = array();                                                            //khởi tạo biến data thành 1 array

        $data['brand_name']   = $request -> brand_product_name;                     //$request -> category_product_name: lấy dữ liệu thì biến name = "category_product_name" -> (add_category_product.blade.php)
        $data['brand_status'] = $request -> brand_product_status;                   //$data['category_name']: tên đã đặt migration

        //insert data vào database
        DB::table('table_brand') -> insert($data);                                  //lấy data từ $data insert vào table('tbl_category_product')

        $request->session()->put('message', 'add brand success');                   //tạo message để thông báo

        return redirect('/add-brand-product');                                      //điều hướng về '/add-brand-product'
    }


    //Chuyển từ Hidden => Show
    public function unactive_brand_product($brand_product_id)                       // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                       //Goi lai fuction AuthLogin()
        DB::table('table_brand')                                                    //=>Vào db table('tbl_category_product') để lấy category_id
        -> where('brand_id',$brand_product_id)                                      //so sánh với $category_product_id nếu == thì update('category_status' từ 0 => 1)
        -> update(['brand_status' => 1]);                                           //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'did not activate brand successfully');           //Tạo message

        return redirect('/all-brand-product');                                      //điều hướng về '/all-brand-product'
    }

    //Chuyển từ Hidden => Show
    public function active_brand_product($brand_product_id)                         // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                       //Goi lai fuction AuthLogin()

        DB::table('table_brand')                                                    //=>Vào db table('table_brand') để lấy brand_id
        -> where('brand_id',$brand_product_id)                                      //so sánh với $brand_product_id nếu == thì update('brand_status' từ 0 => 1)
        -> update(['brand_status' => 0]);                                           //để trong [] vì nó đc khái báo ở trên là 1 array

        session()->put('message', 'activate brand successfully');                   //Tạo message

        return redirect('/all-brand-product');                                      //điều hướng về '/all-brand-product'
    }

    // Trả về trang edit_brand_product với cái category_id
    public function edit_brand_product($brand_product_id)                           // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                       //Goi lai fuction AuthLogin()

        $edit_brand_product     = DB::table('table_brand')                          //lấy data từ table('tbl_category_product')
        -> where('brand_id', $brand_product_id)                                     //rồi so sánh với  $edit_category_product
        -> get();                                                                   //

        $manager_brand_product = view('admin.edit_brand_product')                   //hiển thị với dữ liệu đã lấy đc từ $edit_category_product
                                -> with('edit_brand_product',$edit_brand_product);  //lấy dữ liệu từ biến $edit_category_product rồi gán vào 'edit_category_product' để dùng all_category_product lấy data


        return view('admin_layout')
                -> with('admin.edit_brand_product', $manager_brand_product);        //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //sửa brand_product
    public function update_brand_product(Request $request, $brand_product_id)       //Lấy biến request ở trên truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                       //Goi lai fuction AuthLogin()
        $data = array();                                                            //lấy data array ở trên
        $data['brand_name']   = $request -> brand_product_name;                     //sẻ lấy data dựa vào name=category_product_name

        DB::table('table_brand')                                                    //trỏ tới db table('tbl_category_product')
        -> where('brand_id',$brand_product_id)                                      //so sánh category_id và $category_product_id nếu === nhau
        -> update($data);                                                           //cập nhật lại biến $data có  => $data['category_name']   = $request -> category_product_name;

        session()->put('message', 'update brand successfully');                     //Tạo message

        return redirect('/all-brand-product');                                      // điều hướng về trang '/all-brand-product'
    }


    //xoá brand_product
    public function delete_brand_product($brand_product_id)                          //không cần $request vì không lấy yêu cầu của db
    {
        $this -> AuthLogin();                                                       //Goi lai fuction AuthLogin()
        DB::table('table_brand')                                                     //trỏ tới db table('tbl_category_product')
        -> where('brand_id',$brand_product_id)                                       //so sánh category_id và $category_product_id nếu === nhau
        -> delete();                                                                 //xoá lại biến $data có  => $data['category_name']   = $request -> category_product_name;

        session()->put('message', 'delete brand successfully');                      //Tạo message thông báo xoá

        return redirect('/all-brand-product');                                       // điều hướng về trang '/all-brand-product'
    }

    //End function admin
    //=======================================================================================================================================================
    //HOME

    //hiển thị nội dung khi click vào 'thương hiệu sản phẩm'
    public function show_brand_home($brand_id)
    {
        $cate_product = DB::table('tbl_category_product')
                    -> where('category_status', '1')
                    -> orderby('category_id', 'desc')
                    -> get();

        $brand_product = DB::table('table_brand')
                    -> where('brand_status', '1')
                    -> orderby('brand_id', 'desc')
                    -> get();

        //lấy ra Danh mục sản phẩm
        $brand_by_id = DB::table('table_product')                                        //Vào table_product
                        -> join('table_brand', 'table_product.brand_id',
                                '=', 'table_brand.brand_id')                    //Liên kết 2 bảng tbl_category_product và table_product DK => 'table_product.category_id', '=', 'tbl_category_product.category_id'
                        -> where('table_product.brand_id', $brand_id)                 //Và 'table_product.category_id' = $category_id
                        -> get();                                                           //Lấy dữ liệu ra


        $brand_name = DB::table('table_brand')                                  //Vào tbl_category_product
                        -> where('table_brand.brand_id', $brand_id)          //nếu 'tbl_category_product.category_id' = $category_id
                        -> limit(1)                                                         //Chỉ lấy 1 cái duy nhất => lấy ra 1 category_name vd: 10sp apple thì -> lấy một(limit(1)) category_name = apple
                        -> get();                                                           //lấy dữ liệu ra

        return view('pages.brand.show_brand')
                -> with('category', $cate_product)
                -> with('brand', $brand_product)
                -> with('brand_by_id', $brand_by_id)
                -> with('brand_name', $brand_name);
    }
}

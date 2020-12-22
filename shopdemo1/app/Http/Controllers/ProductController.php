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

class ProductController extends Controller
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

    //Trả về phần từ trang /add_product
    public function add_product()
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()
        $cate_product = DB::table('tbl_category_product')
                    -> orderby('category_id', 'desc')
                    -> get();

        $brand_product = DB::table('table_brand')
                    -> orderby('brand_id', 'desc')
                    -> get();

        $supplier_product = DB::table('table_supplier')
                    -> orderby('supplier_id', 'desc')
                    -> get();

        return view('admin.add_product') -> with('cate_pro', $cate_product)
                                         -> with('brand_pro', $brand_product)
                                         -> with('supplier_pro', $supplier_product); //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product

    }

    //liệt kê data ra list ở trang all-product.blade.php
    public function all_product()
    {
        $this -> AuthLogin();                                                                                       //Goi lai fuction AuthLogin()
        $all_product     = DB::table('table_product')
        -> join('tbl_category_product', 'tbl_category_product.category_id', '=', 'table_product.category_id')        //join bảng table_product -> giao nhau với tbl_category_product với điều kiện 'tbl_category_product.category_id', '=', 'table_product.category_id'
        -> join('table_brand','table_brand.brand_id', '=', 'table_product.brand_id')                                 //join bảng table_product -> giao nhau với table_brand
        -> join('table_supplier','table_supplier.supplier_id', '=', 'table_product.supplier_id')
        -> orderby('table_product.product_id', 'desc') -> get();                                                     //nhóm lại theo 'table_product.product_id', 'desc' -> get()


        $manager_product = view('admin.all_product')                                                                //hiển thị với dữ liệu đã lấy đc từ $all_category_product
                            -> with('all_product',$all_product);                                                    //lấy dữ liệu từ biến $all_category_product rồi gán vào 'all_category_product' để dùng all_category_product lấy data

        return view('admin_layout') -> with('admin.all_product', $manager_product);                                 //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //insert thông tin product
    public function save_product(Request $request)
    {
        $this -> AuthLogin();                                                     //Goi lai fuction AuthLogin()
        $data = array();                                                          //khởi tạo biến data thành 1 array
        $data['product_name']    = $request -> product_name;
        $data['product_price']   = $request -> product_price;                     //$data['category_name']: tên đã đặt migration => tên cột
        $data['product_desc']    = $request -> product_desc;                      //$request -> product_desc: lấy dữ liệu thì biến name = "product_desc" -> (add_product.blade.php)
        $data['product_content'] = $request -> product_content;
        $data['category_id']     = $request -> product_cate;
        $data['brand_id']        = $request -> product_brand;
        $data['supplier_id']     = $request -> product_supplier;
        $data['product_status']  = $request -> product_status;
        $data['product_image']   = $request -> product_status;
        $get_image               = $request -> file('product_image');                                       //Thao tác với file image => cách khác

        // add image
        if ($get_image)                                                                                     //nếu mà người dùng có chọn ảnh từ mấy tính
        {
            $get_name_image = $get_image -> getClientOriginalName();                                        //lấy tên của image vd: 1.png - tên image
            $name_iamge     = current(explode('.', $get_name_image));                                       //tách chuổi theo dấu . -> current lấy phần trước của chuổi vd: 1.png -> 1
            $new_image      = $name_iamge.rand(0,99).'.'.$get_image -> getClientOriginalExtension();        //lấy đuôi mở rộng của image vd: *.png và gán số và tên - $name_iamge vào img => lấy ảnh
            $get_image -> move('public/uploads/product', $new_image);                                       //di chuyển file image -> public\uploads\product
            $data['product_image'] = $new_image;                                                            //chọn ảnh thì thêm $new_image vào field product_image => thêm ảnh vào product_image

            //insert image vào database
            DB::table('table_product') -> insert($data);                                                    //lấy data từ $data insert vào table('table_product')
            $request -> session() -> put('message', 'add image product success');                           //tạo message để thông báo
            return redirect('all-product');                                                                 //điều hướng về '/add-brand-product'
        }

        $data['product_image'] = '';                                                                        //không chọn ảnh thì không thêm ảnh vào field product_image => bỏ ảnh trống
        //insert data vào database
        DB::table('table_product') -> insert($data);                                                        //lấy data từ $data insert vào table('table_product')
        $request -> session() -> put('message', 'add product success');                                     //tạo message để thông báo
        return redirect('all-product');                                                                     //điều hướng về '/add-brand-product'

    }


    //Chuyển từ Hidden => Show
    public function unactive_product($product_id)                                     // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                         //Goi lai fuction AuthLogin()
        DB::table('table_product')                                                    //=>Vào db table('tbl_category_product') để lấy category_id so sánh với $category_product_id nếu == thì update('category_status' từ 0 => 1)
        -> where('product_id',$product_id)
        -> update(['product_status' => 1]);                                           //để trong [] vì nó đc khái báo ở trên là 1 array
        session()->put('message', 'did not activate product successfully');           //Tạo message
        return redirect('/all-product');                                              //điều hướng về '/all-brand-product'
    }

    //Chuyển từ Hidden => Show
    public function active_product($product_id)                                       //truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                         //Goi lai fuction AuthLogin()
        DB::table('table_product')                                                    //=>Vào db table('tbl_category_product') để lấy category_id so sánh với $category_product_id nếu == thì update('category_status' từ 0 => 1)
        -> where('product_id',$product_id)
        -> update(['product_status' => 0]);                                           //để trong [] vì nó đc khái báo ở trên là 1 array
        session()->put('message', 'activate product successfully');                   //Tạo message
        return redirect('/all-product');                                              //điều hướng về '/all-brand-product'
    }

    // Trả về trang edit_product với cái category_id
    public function edit_product($product_id)                                          // truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                          //Goi lai fuction AuthLogin()
        $cate_pro = DB::table('tbl_category_product')
        -> orderby('category_id', 'desc')
        -> get();                                                                      //dùng để nhóm cột category_id rồi get() ra

        $brand_pro = DB::table('table_brand')
        -> orderby('brand_id', 'desc')
        -> get();                                                                      //dùng để nhóm cột category_id rồi get() ra

        $supplier_pro = DB::table('table_supplier')
                    -> orderby('supplier_id', 'desc')
                    -> get();

        $edit_product     = DB::table('table_product')
                            -> where('product_id', $product_id)
                            -> get();                                                   //lấy data từ table('tbl_category_product') rồi so sánh với  $edit_category_product

        $manager_product = view('admin.edit_product')
                            -> with('edit_product',$edit_product)                       //hiển thị với dữ liệu đã lấy đc từ $edit_category_product
                            -> with('cate_pro',$cate_pro)
                            -> with('brand_pro',$brand_pro)
                            -> with('supplier_pro',$supplier_pro);                      //lấy dữ liệu từ biến $edit_category_product rồi gán vào 'edit_category_product' để dùng all_category_product lấy data


        return view('admin_layout') -> with('admin.edit_product', $manager_product);     //dùng để trang admin_layout chứa manager_category_product -> gáng vào biến $manager_category_product
    }

    //update product
    public function update_product(Request $request, $product_id)                 //Lấy biến request ở trên truyền tham số $category_product_id từ routes để controll cái category_id
    {
        $this -> AuthLogin();                                                      //Goi lai fuction AuthLogin()
        $data = array();                                                          //lấy data array ở trên
        $data['product_name']    = $request -> product_name;
        $data['product_price']   = $request -> product_price;                     //$data['category_name']: tên đã đặt migration => tên cột
        $data['product_desc']    = $request -> product_desc;                      //$request -> product_desc: lấy dữ liệu thì biến name = "product_desc" -> (add_product.blade.php)
        $data['product_content'] = $request -> product_content;
        $data['category_id']     = $request -> product_cate;
        $data['brand_id']        = $request -> product_brand;
        $data['supplier_id']     = $request -> product_supplier;
        $data['product_status']  = $request -> product_status;


        $get_image               = $request -> file('product_image');

        // add image
        if ($get_image)                                                                                     //nếu mà người dùng có chọn ảnh từ mấy tính
        {
            $get_name_image = $get_image -> getClientOriginalName();                                        //lấy tên của image vd: 1.png - tên image
            $name_iamge     = current(explode('.', $get_name_image));                                       //tách chuổi theo dấu . -> current lấy phần trước của chuổi vd: 1.png -> 1
            $new_image      = $name_iamge.rand(0,99).'.'.$get_image -> getClientOriginalExtension();        //lấy đuôi mở rộng của image vd: *.png và gán số và tên - $name_iamge vào img => lấy ảnh
            $get_image -> move('public/uploads/product', $new_image);                                       //di chuyển file image -> public\uploads\product
            $data['product_image'] = $new_image;                                                            //chọn ảnh thì thêm $new_image vào field product_image => thêm ảnh vào product_image

            //insert image vào database
            DB::table('table_product')                                                                   //cập nhật dữ liệu trong bảng table_product
            -> where('product_id', $product_id)                                                          //với điều kiện 'product_id', $product_id
            -> update($data);                                                                            //update dữ liệu
            $request -> session() -> put('message', 'update product success');                           //tạo message để thông báo
            return redirect('all-product');                                                              //điều hướng về '/add-brand-product'
        }

        //insert data vào database
        DB::table('table_product')                                                                       //cập nhật dữ liệu trong bảng table_product
            -> where('product_id', $product_id)                                                          //với điều kiện 'product_id', $product_id
            -> update($data);                                                                            //lấy data từ $data insert vào table('table_product')
        $request -> session() -> put('message', 'update product no success');                            //tạo message để thông báo
        return redirect('all-product');                                                                  //điều hướng về '/add-brand-product'

    }

    //delete product
    public function delete_product($product_id)                               //không cần $request vì không lấy yêu cầu của db
    {
        $this -> AuthLogin();                                                 //Goi lai fuction AuthLogin()
        DB::table('table_product')                                            //trỏ tới db table('tbl_category_product')
        -> where('product_id',$product_id)                                    //so sánh category_id và $category_product_id nếu === nhau
        -> delete();                                                          //xoá lại biến $data có  => $data['category_name']   = $request -> category_product_name;
        session()->put('message', 'delete product successfully');             //Tạo message thông báo xoá
        return redirect('all-product');                                       // điều hướng về trang '/all-brand-product'
    }

    //End function admin
    //=======================================================================================================================================================
    //HOME

    //hiện trang chi-tiet-san-pham
    public function detail_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')
                    -> where('category_status', '1')
                    -> orderby('category_id', 'desc')
                    -> get();

        $brand_product = DB::table('table_brand')
                    -> where('brand_status', '1')
                    -> orderby('brand_id', 'desc')
                    -> get();

        $details_product   = DB::table('table_product')
        -> join('tbl_category_product', 'tbl_category_product.category_id', '=', 'table_product.category_id')        //join bảng table_product -> giao nhau với tbl_category_product với điều kiện 'tbl_category_product.category_id', '=', 'table_product.category_id' => lấy ra được sản phẩm thuộc catefory nào
        -> join('table_brand','table_brand.brand_id', '=', 'table_product.brand_id')                                 //join bảng table_product -> giao nhau với table_brand => lấy ra được sản phẩm thuộc brand nào
        -> join('table_supplier','table_supplier.supplier_id', '=', 'table_product.supplier_id')
        -> where('table_product.product_id', $product_id) -> get();                                                  //nhóm lại theo 'table_product.product_id', 'desc' -> get()

        //lap lai cac san pham trong category
        foreach ($details_product as $key => $value)                            //$details_product lay ra san pham thuoc danh muc
        {
            $category_id = $value -> category_id;
        }

        //san pham lien quan => lay ra cac san pham trong category lien quan
        $related_product  = DB::table('table_product')
        -> join('tbl_category_product', 'tbl_category_product.category_id', '=', 'table_product.category_id')        //join bảng table_product -> giao nhau với tbl_category_product với điều kiện 'tbl_category_product.category_id', '=', 'table_product.category_id' => lấy ra được sản phẩm thuộc catefory nào
        -> join('table_brand','table_brand.brand_id', '=', 'table_product.brand_id')                                 //join bảng table_product -> giao nhau với table_brand => lấy ra được sản phẩm thuộc brand nào
        -> join('table_supplier','table_supplier.supplier_id', '=', 'table_product.supplier_id')
        -> where('tbl_category_product.category_id', $category_id)
        -> whereNotIn('table_product.product_id', [$product_id])                                             //lấy các sản phẩm thuộc table_product nhưng trừ ra sản phẩm có $product_id => lấy những sản phẩm TRỪ sản phẩm đang hiện chi tiết
        -> get();                                                                                           // -> get()

        return view('pages.product.show_details')
            -> with('category', $cate_product)
            -> with('brand', $brand_product)
            -> with('details_product', $details_product)
            -> with('related_product', $related_product);
    }
}

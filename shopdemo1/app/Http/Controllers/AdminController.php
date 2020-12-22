<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use database and session
use DB;
use Session;

//library session
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
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

    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()
        return view('admin.dashboard');                                     //để vào trang dashboard.blade.php
    }

    // login admin
    public function dashboard(Request $request)
    {
        $admin_email = $request -> admin_email;                             //$admin_email sẻ lấy trường data (name=admin_email) trong trang admin_login.blade
        $admin_password = md5($request -> admin_password);                  //md5 => do ta mã háo nó trong db : thiếu thì không chạy

        $result = DB::table('tbl_admin')                                    // DB::table('tbl_admin') => vào database table tbl_admin,
                -> where('admin_email',$admin_email)                        // -> where('admin_email',$admin_email) =>kiểm tra admin_email vs $admin_email
                -> where('admin_password',$admin_password)
                ->first();                                                  // -> first() => lấy limit 1 :lấy giới hạn 1 user

        if ($result) {                                                      //neu $result đúng
            $request->session()->put('admin_name',$result -> admin_name);   //lấy admin_name từ $result => DB::table('tbl_admin')
            $request->session()->put('admin_id',$result -> admin_id);       //lấy admin_id từ $result, $result lấy DB từ table('tbl_admin')
            return Redirect::to('/dashboard');                              //trả về trang '/dashboard'

        } else {                                                            //neu $result Sai
            $request->session()->put('message', 'User account or password incorrect'); //đặt ra massage để thông báo
            return Redirect::to('/admin');                                  //trả về trang '/admin'
        }
    }

    //logout
    public function logout()
    {
        $this -> AuthLogin();                                               //Goi lai fuction AuthLogin()
        session()->put('admin_name',null);  //
        session()->put('admin_id',null);
        return Redirect::to('/admin'); //trả về '/admin'
    }

}

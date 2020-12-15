<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend
Route::get('/','HomeController@index'); //gọi HomeController và tới fuction index

Route::get('/trang-chu','HomeController@index'); //gọi HomeController và tới fuction index => để hiển thị trang home.blade.php vào layout.blade.php





//backend
Route::get('/admin','AdminController@index');   // tra ve fuction index trong AdminController

Route::get('/dashboard','AdminController@show_dashboard');  // tra ve fuction show_dashboard trong AdminController

Route::post('/admin-dashboard','AdminController@dashboard'); //Vì form gửi theo method post nen Route::post, '/admin-dashboard' trả về function dashboard

Route::get('/logout','AdminController@logout'); //toi fuction logout trong AdminController



//Category product
Route::get('/add-category-product','CategoryProduct@add_category_product'); //chuyen ve fuction add_category_product => CategoryProduct controller
                                                                            //khi có đường dẫn là '/add-category-product'

Route::get('/all-category-product','CategoryProduct@all_category_product'); //chuyen ve fuction all_category_product trong CategoryProduct controller

Route::post('/save-category-product','CategoryProduct@save_category_product'); // khi chuyen toi '/save-category-product' thi => CategoryProduct controller -> funcion save_category_product


Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');   //Gọi function unactive_category_product trong CategoryProduct
                                                                                                                //=> /{ category_product_id } khai báo biến số category_id
                                                                                                               //Vì trong all_category_product.blade.php <a href="{{URL::to ('/unactive-category-product/'.$cate_pro->category_id) }}">

Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');   //Gọi function active_category_product trong CategoryProduct
                                                                                                            //=> /{ category_product_id } thêm category_product_id vào URL

Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product'); //vào controller Categoryproduct Gọi function edit_category_product
                                                                                                    //=> /{ category_product_id } để biết id cần edit

Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');//vào controller Categoryproduct Gọi function delete_category_product
                                                                                                        //=> /{ category_product_id } để biết id cần xoá

Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product'); //vào controller Categoryproduct Gọi function update_category_product
                                                                                                        //form trong edit_category_product có method = POST
                                                                                                       //Thêm /{category_product_id} vì có liên quan tới category_id



//Brand product
Route::get('/add-brand-product','BrandProduct@add_brand_product'); //chuyen ve fuction add_category_product => CategoryProduct controller
                                                                            //khi có đường dẫn là '/add-brand-product'

Route::get('/all-brand-product','BrandProduct@all_brand_product'); //chuyen ve fuction all_category_product trong CategoryProduct controller

Route::post('/save-brand-product','BrandProduct@save_brand_product'); // khi chuyen toi '/save-brand-product' thi => CategoryProduct controller -> funcion save_category_product


Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');   //Gọi function unactive_category_product trong CategoryProduct
                                                                                                                //=> /{ category_product_id } khai báo biến số category_id
                                                                                                               //Vì trong all_category_product.blade.php <a href="{{URL::to ('/unactive-brand-product/'.$cate_pro->category_id) }}">

Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');   //Gọi function active_category_product trong CategoryProduct
                                                                                                            //=> /{ category_product_id } thêm category_product_id vào URL

Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product'); //vào controller Categoryproduct Gọi function edit_category_product
                                                                                                    //=> /{ category_product_id } để biết id cần edit

Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');//vào controller Categoryproduct Gọi function delete_category_product
                                                                                                        //=> /{ category_product_id } để biết id cần xoá

Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product'); //vào controller Categoryproduct Gọi function update_category_product
                                                                                                        //form trong edit_category_product có method = POST
                                                                                                       //Thêm /{category_product_id} vì có liên quan tới category_id


//Product
Route::get('/add-product','ProductController@add_product'); //chuyen ve fuction add_category_product => CategoryProduct controller
                                                                            //khi có đường dẫn là '/add-brand-product'

Route::get('/all-product','ProductController@all_product'); //chuyen ve fuction all_category_product trong CategoryProduct controller

Route::post('/save-product','ProductController@save_product'); // khi chuyen toi '/save-brand-product' thi => CategoryProduct controller -> funcion save_category_product


Route::get('/unactive-product/{product_id}','ProductController@unactive_product');   //Gọi function unactive_category_product trong CategoryProduct
                                                                                                                //=> /{ category_product_id } khai báo biến số category_id
                                                                                                               //Vì trong all_category_product.blade.php <a href="{{URL::to ('/unactive-brand-product/'.$cate_pro->category_id) }}">

Route::get('/active-product/{product_id}','ProductController@active_product');   //Gọi function active_category_product trong CategoryProduct
                                                                                                            //=> /{ category_product_id } thêm category_product_id vào URL

Route::get('/edit-product/{product_id}','ProductController@edit_product'); //vào controller Categoryproduct Gọi function edit_category_product
                                                                                                    //=> /{ category_product_id } để biết id cần edit

Route::get('/delete-product/{product_id}','ProductController@delete_product');//vào controller Categoryproduct Gọi function delete_category_product
                                                                                                        //=> /{ category_product_id } để biết id cần xoá

Route::post('/update-product/{product_id}','ProductController@update_product'); //vào controller Categoryproduct Gọi function update_category_product
                                                                                                        //form trong edit_category_product có method = POST
                                                                                                       //Thêm /{category_product_id} vì có liên quan tới category_id
// Nhà cung cấp

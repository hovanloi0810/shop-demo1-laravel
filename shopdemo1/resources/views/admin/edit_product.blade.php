{{-- Trang add category product --}}

@extends('admin_layout') {{-- phan mo rong  --}}
@section('admin_content') {{-- section dung de @yield --}}
<!-- Favicons -->
<link href="img/favicon.png" rel="icon">
<link href="img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/25e8aeaf8c.js" crossorigin="anonymous"></script>
<!-- Bootstrap core CSS -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--external css-->
<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-datepicker/css/datepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-daterangepicker/daterangepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-timepicker/compiled/timepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-datetimepicker/datertimepicker.css') }}" />
<!-- Custom styles for this template -->
<link href="{{asset ('public/backend/css/style.css') }}" rel="stylesheet">
<link href="{{asset ('public/backend/css/style-responsive.css') }}" rel="stylesheet">

<div class="row mt">
    <div class="col-lg-12">
      <h4 class="title"><i class="fa fa-angle-right"></i>Update Product</h4>


        {{-- thông báo thêm thành công --}}
        <div id="message" class="text-center">
            @php
            $message = session()->get('message');   //lấy biến $request->session()->put('message', 'add category success');
            if ($message) {

                echo '<span class="text-alert" style="color:green; font-size:18px;">'.$message.'</span>';  //in ra message
                session()->put('message', null); // khong cho message hiển thị nữa (nếu không có nó sẻ tự động echo $message)
                                                //session()->put == Session::put
            }
            @endphp
        </div>
        {{-- /thông báo thêm thành công --}}

        {{-- foreach để lấy ra những cái cần sữa --}}
        @foreach ($edit_product as $item => $pro)

            {{-- action="{{URL::to ('/save-product')}} => chuyển về routes '/save-product'--}}
            <form class="contact-form php-mail-form" role="form" action="{{URL::to ('/update-product/'.$pro -> product_id) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}  {{-- tạo token cho trang website => bao mat hon >< mysql injection --}}

                {{-- value="{{ $pro -> product_name }}" : lấy biến product_name --}}
            <div class="form-group">
                <input type="text" name="product_name" value="{{ $pro -> product_name }}" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>

            {{-- value="{{ $pro -> product_price }}" : lấy biến product_price --}}
            <div class="form-group">
                <input type="text" name="product_price" value="{{ $pro -> product_price }}" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>

            <div class="form-group">
                <input type="file" name="product_image" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
                <img src="{{URL::to ('public/uploads/product/'.$pro -> product_image) }}" height="100" width="100" alt="">
            </div>

            {{-- {{ $pro -> product_desc }} : lấy biến product_desc --}}
            <div class="form-group">
                <textarea class="form-control" name="product_desc" id="contact-message" rows="5" data-rule="required" data-msg="Please write something for us">
                    {{ $pro -> product_desc }}
                </textarea>
                <div class="validate"></div>
            </div>

            {{-- {{ $pro -> product_content }} : lấy biến product_content --}}
            <div class="form-group">
                <textarea class="form-control" name="product_content" id="contact-message" rows="5" data-rule="required" data-msg="Please write something for us">
                    {{ $pro -> product_content }}
                </textarea>
                <div class="validate"></div>
            </div>

            <div>
                <label for="">Category product</label>
                <select class="form-control" name="product_cate">

                    {{--  --}}
                    @foreach ($cate_product as $item => $cate)               {{-- Duyệt vòng lặp lấy data từ table với biến $cate_product --}}

                        @if ($cate -> category_id == $pro -> category_id)    {{-- NẾU $cate -> category_id == $pro -> category_id--}}

                            <option selected value="{{ $cate -> category_id }}">  {{-- THÌ selected => tự chọn category khi sửa,  value="{{ $cate -> category_id }} => lấy id trong  tbl_category_product  --}}
                                {{ $cate -> category_name }}                     {{-- Biến $cate dùng để trỏ tới category_name trong table tbl_category_product --}}
                            </option>

                        @else                                                     {{-- NGƯỢC lại thì giữ nguyên --}}

                            <option value="{{ $cate -> category_id }}">
                                {{ $cate -> category_name }}
                            </option>

                        @endif

                    @endforeach
                    {{--  --}}

                </select>
            </div>

            <div>
                <label for="">Brand product</label>
                <select class="form-control" name="product_brand">

                    {{--  --}}
                    @foreach ($brand_product as $item => $brand)              {{-- Duyệt vòng lặp lấy data từ table với biến $brand_product --}}
                        @if ($cate -> category_id == $pro -> category_id)

                            <option selected value="{{ $brand -> brand_id }}">           {{-- value="{{ $brand -> brand_name }}" dùng để lấy id trong  table_brand--}}
                                {{ $brand -> brand_name }}                        {{-- Biến $cate dùng để trỏ tới brand_name trong table table_brand --}}
                            </option>

                        @else

                            <option value="{{ $brand -> brand_id }}">           {{-- value="{{ $brand -> brand_name }}" dùng để lấy id trong  table_brand--}}
                                {{ $brand -> brand_name }}                        {{-- Biến $cate dùng để trỏ tới brand_name trong table table_brand --}}
                            </option>

                        @endif
                    @endforeach
                    {{--  --}}

                </select>
            </div>

            </br>

            <select class="form-control" name="product_status">
                <option value="0">Hidden</option>
                <option value="1">Show</option>
            </select>

            </br>

                <div class="form-send">
                <button type="submit" name="add_product" class="btn btn-large btn-primary">Update Product</button>
                </div>

            </form>
        @endforeach
    </div>


@endsection

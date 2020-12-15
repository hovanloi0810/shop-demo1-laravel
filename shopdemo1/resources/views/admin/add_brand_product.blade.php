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
      <h4 class="title"><i class="fa fa-angle-right"></i>Add Brand Product</h4>


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

      {{-- action="{{URL::to ('/save-category-product')}} => chuyển về routes '/save-brand-product'--}}
      <form class="contact-form php-mail-form" role="form" action="{{URL::to ('/save-brand-product') }}" method="POST">

        {{ csrf_field() }}  {{-- tạo token cho trang website => bao mat hon >< mysql injection --}}


        <div class="form-group">
          <input type="text" name="brand_product_name" class="form-control" id="contact-name" placeholder="Category Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
          <div class="validate"></div>
        </div>



        <select class="form-control" name="brand_product_status">
            <option value="0">Hidden</option>
            <option value="1">Show</option>
        </select>

        </br>

          <div class="form-send">
            <button type="submit" name="add_category_product" class="btn btn-large btn-primary">Add Brand</button>
          </div>

      </form>
    </div>


@endsection
